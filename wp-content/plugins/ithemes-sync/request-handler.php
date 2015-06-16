<?php

/*
Handle requests from Sync server.
Written by Chris Jean for iThemes.com
Version 1.1.1

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.1.0 - 2013-11-18 - Chris Jean
		Added $GLOBALS['ithemes_sync_request_handler'].
		Added a time limit of 60 seconds. This also functions to ensure that the requests can take up to 60 seconds to process.
		Updated to new brace style.
		All requests are now protected against the pre-filters for the update transients.
		Added verb_time to response.
		Added compatibility for obsolete plugin updater code so that plugins that have updaters that only work with pre-3.0 WordPress code can function.
		Added a cleanup step that if old updater compatibility is used, the old options will be cleaned up if they are empty.
	1.1.1 - 2013-12-16 - Chris Jean
		Added a call to Ithemes_Sync_Functions::set_full_user_capabilities() on load in order to avoid Better WP Security's $wp_version modification when it is masked from non-administrative users.
*/


require_once( $GLOBALS['ithemes_sync_path'] . '/load-translations.php' );

class Ithemes_Sync_Request_Handler {
	private $logs = array();
	private $options = array();
	private $old_update_data = array();
	private $verb_time = false;
	
	
	public function __construct() {
		$this->show_errors();
		
		
		$GLOBALS['ithemes_sync_request_handler'] = $this;
		
		
		add_action( 'ithemes-sync-add-log', array( $this, 'add_log' ), 10, 2 );
		add_action( 'shutdown', array( $this, 'handle_error' ) );
		
		add_action( 'ithemes_sync_verbs_registered', array( $this, 'handle_request' ) );
		
		require_once( dirname( __FILE__ ) . '/api.php' );
		require_once( dirname( __FILE__ ) . '/functions.php' );
		require_once( dirname( __FILE__ ) . '/settings.php' );
		
		$this->options = $GLOBALS['ithemes-sync-settings']->get_options();
		
		Ithemes_Sync_Functions::set_time_limit( 60 );
		Ithemes_Sync_Functions::set_full_user_capabilities();
		
		$this->parse_request();
	}
	
	private function show_errors() {
		$this->original_display_errors = ini_set( 'display_errors', 1 );
		$this->original_error_reporting = error_reporting( E_ALL );
	}
	
	private function hide_errors() {
		ini_set( 'display_errors', $this->original_display_errors );
		error_reporting( $this->original_error_reporting );
	}
	
	private function parse_request() {
		if ( empty( $this->options['authentications'] ) ) {
			$this->send_response( new WP_Error( 'site-not-authenticated', 'The site does not have any authenticated users.' ) );
		}
		
		
		$request = stripslashes( $_POST['request'] );
		$request = json_decode( $request, true );
		
		$this->request = $request;
		
		
		$required_vars = array(
			'action',
			'arguments',
			'user_id',
			'hash',
			'salt',
		);
		
		foreach ( $required_vars as $var ) {
			if ( ! isset( $request[$var] ) ) {
				$this->send_response( new WP_Error( "missing-$var", "Invalid request. The $var is missing." ) );
			}
		}
		
		
		if ( ! isset( $this->options['authentications'][$request['user_id']] ) ) {
			$this->send_response( new WP_Error( 'user-not-authenticated', 'The requested user is not authenticated.' ) );
		}
		
		
		$user_data = $this->options['authentications'][$request['user_id']];
		
		$hash = hash( 'sha256', $request['user_id'] . $request['action'] . json_encode( $request['arguments'] ) . $user_data['key'] . $request['salt'] );
		
		if ( $hash !== $request['hash'] ) {
			$this->send_response( new WP_Error( 'hash-mismatch', 'The hash could not be validated as a correct hash.' ) );
		}
	}
	
	public function handle_request() {
		$this->disable_updater_transient_pre_filters();
		$this->add_old_plugin_updater_support();
		
		$start_time = microtime( true );
		$results = $GLOBALS['ithemes-sync-api']->run( $this->request['action'], $this->request['arguments'] );
		$this->verb_time = microtime( true ) - $start_time;
		
		$this->send_response( $results );
	}
	
	private function send_response( $data ) {
		if ( is_wp_error( $data ) ) {
			foreach ( $data->get_error_codes() as $code )
				$response['errors'][$code] = $data->get_error_message( $code );
		}
		else {
			$response = array(
				'response' => $data,
			);
		}
		
		if ( ! empty( $this->logs ) ) {
			$response['logs'] = $this->logs;
		}
		
		$response['verb_time'] = $this->verb_time;
		
		echo "\n\nv56CHRcOT+%K\$fk[*CrQ9B5<~9T=h?xx9C</`Sqv;M{Q0ms:FR0w\n\n";
		echo json_encode( $response );
		
		remove_action( 'shutdown', array( $this, 'handle_error' ) );
		
		exit;
	}
	
	private function disable_updater_transient_pre_filters() {
		// Avoid conflicts with plugins that pre-filter the update transients.
		add_filter( 'pre_site_transient_update_plugins', array( $this, 'return_false' ), 9999 );
		add_filter( 'pre_site_transient_update_themes', array( $this, 'return_false' ), 9999 );
		add_filter( 'pre_site_transient_update_core', array( $this, 'return_false' ), 9999 );
	}
	
	public function return_false() {
		return false;
	}
	
	private function add_old_plugin_updater_support() {
		$plugins = Ithemes_Sync_Functions::get_plugin_details();
		
		$data['3.0'] = get_site_transient( 'update_plugins' );
		$data['2.8'] = get_transient( 'update_plugins' );
		$data['2.6'] = get_option( 'update_plugins' );
		
		foreach ( array( '2.8', '2.6' ) as $version ) {
			if ( is_object( $data[$version] ) && ! empty( $data[$version]->response ) ) {
				foreach ( $data[$version]->response as $plugin => $plugin_data ) {
					if ( ! empty( $data['3.0']->response[$plugin] ) || ! empty( $this->old_update_data['plugins'][$plugin] ) ) {
						continue;
					}
					
					if ( ! empty( $plugins[$plugin] ) && ! empty( $plugins[$plugin]['Version'] ) && version_compare( $plugin_data->new_version, $plugins[$plugin]['Version'], '<=' ) ) {
						continue;
					}
					
					$this->old_update_data['plugins'][$plugin] = $plugin_data;
				}
			}
		}
		
		if ( empty( $this->old_update_data['plugins'] ) ) {
			return;
		}
		
		
		add_filter( 'site_transient_update_plugins', array( $this, 'filter_update_plugins_add_old_update_data' ) );
	}
	
	public function filter_update_plugins_add_old_update_data( $update_plugins ) {
		if ( ! isset( $update_plugins->response ) || ! is_array( $update_plugins->response ) ) {
			return $update_plugins;
		}
		
		foreach ( $this->old_update_data['plugins'] as $plugin => $plugin_data ) {
			if ( ! empty( $update_plugins->response[$plugin] ) )
				continue;
			
			$plugin_data->from_old_update_data = true;
			$update_plugins->response[$plugin] = $plugin_data;
		}
		
		return $update_plugins;
	}
	
	public function remove_old_update_plugins_data( $plugin ) {
		if ( empty( $this->old_update_data['plugins'] ) || ! isset( $this->old_update_data['plugins'][$plugin] ) ) {
			return null;
		}
		
		$data['2.8'] = get_transient( 'update_plugins' );
		$data['2.6'] = get_option( 'update_plugins' );
		
		$found_match = array();
		
		foreach ( array( '2.8', '2.6' ) as $version ) {
			$found_match[$version] = false;
			
			if ( is_object( $data[$version] ) && ! empty( $data[$version]->response ) && isset( $data[$version]->response[$plugin] ) ) {
				unset( $data[$version]->response[$plugin] );
				$found_match[$version] = true;
			}
			
			if ( empty( $data[$version]->response ) && ( 1 == count( get_object_vars( $data[$version] ) ) ) ) {
				$data[$version] = false;
			}
		}
		
		if ( $found_match['2.8'] ) {
			if ( false === $data['2.8'] ) {
				delete_transient( 'update_plugins' );
			} else {
				update_transient( 'update_plugins', $data['2.8'] );
			}
		}
		
		if ( $found_match['2.6'] ) {
			if ( false === $data['2.6'] ) {
				delete_option( 'update_plugins' );
			} else {
				update_option( 'update_plugins', $data['2.6'] );
			}
		}
		
		
		return ( $found_match['2.8'] || $found_match['2.6'] );
	}
	
	public function add_log( $description, $data = 'nD{k*v8}Qn4x=_7/j&r83cGD?%GWk}wb6[xal[9;y`PfpLSY[7O>b' ) {
		if ( is_wp_error( $description ) ) {
			$description = array(
				'type'  => 'WP_Error',
			);
			
			$codes = $description->get_error_codes();
			$messages = $description->get_error_messages();
			
			if ( 1 == count( $codes ) ) {
				$description['code'] = current( $codes );
				$description['message'] = current( $messages );
			} else {
				$description['codes'] = $codes;
				$description['messages'] = $messages;
			}
		}
		
		$log['description'] = $description;
		
		if ( 'nD{k*v8}Qn4x=_7/j&r83cGD?%GWk}wb6[xal[9;y`PfpLSY[7O>b' != $data ) {
			$log['data'] = $data;
		}
		
		$this->logs[] = $log;
	}
	
	public function handle_error() {
		$this->send_response( new WP_Error( 'unhandled_request', 'This request was not handled by any registered verb. This was likely caused by a fatal error.' ) );
	}
}

new Ithemes_Sync_Request_Handler();
