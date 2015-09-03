<?php

/*
Central management of options storage for Project Sync.
Written by Chris Jean for iThemes.com
Version 1.1.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.0.1 - 2013-11-18 - Chris Jean
		Updated brace format.
	1.1.0 - 2013-11-19 - Chris Jean
		Added the show_sync option.
*/


class Ithemes_Sync_Settings {
	private $option_name = 'ithemes-sync-cache';
	
	private $options = false;
	private $options_modified = false;
	private $initialized = false;
	
	private $default_options = array(
		'authentications' => array(),
		'use_ca_patch'    => false,
		'show_sync'       => true,
	);
	
	
	public function __construct() {
		$GLOBALS['ithemes-sync-settings'] = $this;
		
		add_action( 'shutdown', array( $this, 'shutdown' ) );
	}
	
	public function init() {
		if ( $this->initialized ) {
			return;
		}
		
		$this->initialized = true;
		
		$this->load();
	}
	
	public function load() {
		if ( false !== $this->options )
			return;
		
		$this->options = get_site_option( $this->option_name, false );
		
		if ( ( false === $this->options ) || ! is_array( $this->options ) ) {
			$this->options = array();
		}
		
		$this->options = array_merge( $this->default_options, $this->options );
	}
	
	public function shutdown() {
		if ( $this->options_modified ) {
			update_site_option( $this->option_name, $this->options );
		}
	}
	
	public function get_options() {
		$this->init();
		
		return $this->options;
	}
	
	public function get_option( $var ) {
		$this->init();
		
		if ( isset( $this->options[$var] ) ) {
			return $this->options[$var];
		}
		
		return null;
	}
	
	public function update_options( $updates ) {
		$this->init();
		
		$this->options = array_merge( $this->options, $updates );
		$this->options_modified = true;
	}
	
	public function add_authentication( $user_id, $username, $key ) {
		$this->init();
		
		
		if ( ! isset( $this->options['authentications'] ) || ! is_array( $this->options['authentications'] ) ) {
			$this->options['authentications'] = array();
		}
		
		$local_user = wp_get_current_user();
		
		$this->options['authentications'][$user_id] = array(
			'key'        => $key,
			'timestamp'  => time(),
			'local_user' => $local_user->user_login,
			'username'   => $username,
		);
		
		$this->options_modified = true;
		
		
		if ( ! empty( $this->options['authentications'] ) ) {
			update_site_option( 'ithemes-sync-authenticated', true );
		} else {
			delete_site_option( 'ithemes_sync_hide_authenticate_notice' );
		}
		
		
		return true;
	}
	
	public function remove_authentication( $user_id, $username ) {
		$this->init();
		
		
		if ( ! isset( $this->options['authentications'] ) || ! is_array( $this->options['authentications'] ) ) {
			$this->options['authentications'] = array();
		}
		
		if ( ! isset( $this->options['authentications'][$user_id] ) ) {
			return new WP_Error( 'unauthenticated-user', __( 'The user is not authenticated. Could not remove authentication for the user.', 'it-l10n-ithemes-sync' ) );
		}
		
		
		unset( $this->options['authentications'][$user_id] );
		
		$this->options_modified = true;
		
		
		if ( empty( $this->options['authentications'] ) ) {
			delete_site_option( 'ithemes-sync-authenticated' );
			delete_site_option( 'ithemes_sync_hide_authenticate_notice' );
		}
		
		
		return true;
	}
	
	public function get_authentication_details( $user_id ) {
		if ( ! isset( $this->options['authentications'][$user_id] ) ) {
			return false;
		}
		
		return $this->options['authentications'][$user_id];
	}
}

new Ithemes_Sync_Settings();
