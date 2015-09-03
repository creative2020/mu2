<?php

/*
Implementation of the do-update verb.
Written by Chris Jean for iThemes.com
Version 1.0.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
*/


class Ithemes_Sync_Verb_Do_Update extends Ithemes_Sync_Verb {
	public static $name = 'do-update';
	public static $description = 'Update WordPress, plugins, and themes.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
		require_once( dirname( dirname( __FILE__ ) ) . '/upgrader-skin.php' );
		
		$this->skin = new Ithemes_Sync_Upgrader_Skin();
		
		
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		
		$response = array();
		
		if ( ! empty( $arguments['plugin'] ) ) {
			$response['plugin'] = $this->do_plugin_upgrade( $arguments['plugin'] );
		}
		if ( ! empty( $arguments['theme'] ) ) {
			$response['theme'] = $this->do_theme_upgrade( $arguments['theme'] );
		}
		if ( ! empty( $arguments['core'] ) ) {
			$response['core'] = $this->do_core_upgrade( $arguments['core'] );
		}
		
		
		return $response;
	}
	
	public function do_core_upgrade( $params ) {
		$required_fields = array(
			'upgrade_id',
			'locale',
			'version',
		);
		
		$errors = array();
		
		foreach ( $required_fields as $field ) {
			if ( ! isset( $params[$field] ) ) {
				$errors[] = "The '$field' field is missing.";
			}
		}
		
		
		if ( empty( $errors ) ) {
			require_once( $GLOBALS['ithemes_updater_path'] . '/functions.php' );
			
			$updates = Ithemes_Sync_Functions::get_update_details( array( 'verbose' => true, 'force_refresh' => array( 'core' ) ) );
			
			if ( empty( $updates['core'] ) ) {
				$errors[] = 'No core updates are currently available.';
			} else if ( empty( $updates['core'][$params['upgrade_id']] ) ) {
				$errors[] = 'Unable to find an availble upgrade matching the requested upgrade_id.';
			} else if ( $params['locale'] != $updates['core'][$params['upgrade_id']]->locale ) {
				$errors[] = 'The requested upgrade does not match the requested locale.';
			} else if ( isset( $updates['core'][$params['upgrade_id']]->version ) && ( $params['version'] != $updates['core'][$params['upgrade_id']]->version ) ) {
				$errors[] = 'The requested upgrade does not match the requested version.';
			} else if ( isset( $updates['core'][$params['upgrade_id']]->current ) && ( $params['version'] != $updates['core'][$params['upgrade_id']]->current ) ) {
				$errors[] = 'The requested upgrade does not match the requested version.';
			}
		}
		
		if ( ! empty( $errors ) ) {
			return array( 'errors' => $errors );
		}
		
		
		Ithemes_Sync_Functions::set_time_limit( 300 );
		
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/update.php' );
		require_once( ABSPATH . 'wp-admin/includes/misc.php' );
		
		$upgrader = new Core_Upgrader( $this->skin );
		$result = $upgrader->upgrade( $updates['core'][$params['upgrade_id']] );
		
		Ithemes_Sync_Functions::refresh_core_updates();
		
		if ( is_wp_error( $result ) ) {
			return array( 'errors' => array( 'Unable to upgrade core: (' . $result->get_error_code() . ') ' . $result->get_error_message() ) );
		}
		
		if ( $result == $params['version'] ) {
			return true;
		}
		
		return $result;
	}
	
	public function do_plugin_upgrade( $plugins ) {
		Ithemes_Sync_Functions::set_time_limit( 300 );
		
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		$upgrader = new Plugin_Upgrader( $this->skin );
		$result = $upgrader->bulk_upgrade( $plugins );
		
		Ithemes_Sync_Functions::refresh_plugin_updates();
		
		
		if ( is_wp_error( $result ) ) {
			return array( 'errors' => array( 'Unable to upgrade requested plugins: (' . $result->get_error_code() . ') ' . $result->get_error_message() ) );
		}
		
		
		$response = array();
		
		foreach ( $result as $plugin => $info ) {
			if ( false === $info ) {
				$response[$plugin] = array( 'errors' => array( 'Unable to upgrade due to a non-connected filesystem.' ) );
			} else if ( is_wp_error( $info ) ) {
				$response[$plugin] = array( 'errors' => $info->get_error_message() . ' (' . $info->get_error_code() . ')' );
			} else {
				$response[$plugin] = array( 'success' => 1 );
				
				
				$removed_old_update_data = $GLOBALS['ithemes_sync_request_handler']->remove_old_update_plugins_data( $plugin );
				
				if ( ! is_null( $removed_old_update_data ) ) {
					$response[$plugin]['removed_old_update_data'] = $removed_old_update_data;
				}
			}
		}
		
		return $response;
	}
	
	public function do_theme_upgrade( $themes ) {
		Ithemes_Sync_Functions::set_time_limit( 300 );
		
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		$upgrader = new Theme_Upgrader( $this->skin );
		$result = $upgrader->bulk_upgrade( $themes );
		
		Ithemes_Sync_Functions::refresh_theme_updates();
		
		
		if ( is_wp_error( $result ) ) {
			return array( 'errors' => array( 'Unable to upgrade requested themes: (' . $result->get_error_code() . ') ' . $result->get_error_message() ) );
		}
		
		
		$response = array();
		
		foreach ( $result as $theme => $info ) {
			if ( false === $info ) {
				$response[$theme] = array( 'errors' => array( 'Unable to upgrade due to a non-connected filesystem.' ) );
			} else if ( is_wp_error( $info ) ) {
				$response[$theme] = array( 'errors' => $info->get_error_message() . ' (' . $info->get_error_code() . ')' );
			} else {
				$response[$theme] = array( 'success' => 1 );
			}
		}
		
		return $response;
	}
}
