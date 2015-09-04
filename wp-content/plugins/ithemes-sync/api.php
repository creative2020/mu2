<?php

/*
Simple API for managing verbs for Sync.
Written by Chris Jean for iThemes.com
Version 1.1.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.1.0 - 2013-11-18 - Chris Jean
		Updated default verbs.
*/


class Ithemes_Sync_API {
	private $verbs = array();
	
	private $default_verbs = array(
		'deauthenticate-user'   => 'Ithemes_Sync_Verb_Deauthenticate_User',
		'do-update'             => 'Ithemes_Sync_Verb_Do_Update',
		'get-php-details'       => 'Ithemes_Sync_Verb_Get_PHP_Details',
		'get-plugin-details'    => 'Ithemes_Sync_Verb_Get_Plugin_Details',
		'get-server-details'    => 'Ithemes_Sync_Verb_Get_Server_Details',
		'get-status'            => 'Ithemes_Sync_Verb_Get_Status',
		'get-supported-verbs'   => 'Ithemes_Sync_Verb_Get_Supported_Verbs',
		'get-sync-settings'     => 'Ithemes_Sync_Verb_Get_Sync_Settings',
		'get-theme-details'     => 'Ithemes_Sync_Verb_Get_Theme_Details',
		'get-update-details'    => 'Ithemes_Sync_Verb_Get_Update_Details',
		'get-updates'           => 'Ithemes_Sync_Verb_Get_Updates',
		'get-wordpress-details' => 'Ithemes_Sync_Verb_Get_Wordpress_Details',
		'get-wordpress-users'   => 'Ithemes_Sync_Verb_Get_Wordpress_Users',
		'update-show-sync'      => 'Ithemes_Sync_Verb_Update_Show_Sync',
	);
	
	
	public function __construct() {
		$GLOBALS['ithemes-sync-api'] = $this;
		
		require_once( dirname( __FILE__ ) . '/functions.php' );
		
		add_action( 'init', array( $this, 'init' ) );
	}
	
	public function init() {
		$path = dirname( __FILE__ );
		
		require_once( "$path/verbs/verb.php" );
		
		foreach ( $this->default_verbs as $name => $class )
			$this->register( $name, $class, "$path/verbs/$name.php" );
		
		do_action( 'ithemes_sync_register_verbs', $this );
		
		do_action( 'ithemes_sync_verbs_registered' );
	}
	
	public function register( $name, $class, $file = '' ) {
		if ( isset( $this->verbs[$name] ) ) {
			do_action( 'ithemes-sync-add-log', 'Tried to add a verb name that already exists.', compact( 'name', 'class', 'file' ) );
			return false;
		}
		
		$this->verbs[$name] = compact( 'name', 'class', 'file' );
	}
	
	public function get_names() {
		return array_keys( $this->verbs );
	}
	
	public function get_descriptions() {
		$names = $this->get_names();
		$descriptions = array();
		
		foreach ( $names as $name )
			$descriptions[$name] = $this->get_description( $name );
		
		return $descriptions;
	}
	
	public function get_description( $name ) {
		$class = $this->get_class( $name );
		
		if ( false === $class )
			return '';
		
		
		$vars = get_class_vars( $class );
		
		if ( isset( $vars['description'] ) )
			return $vars['description'];
		
		return '';
	}
	
	public function run( $name, $arguments = array() ) {
		$object = $this->get_object( $name );
		
		if ( false == $object )
			return '';
		
		return $object->run( $arguments );
	}
	
	private function get_class( $name ) {
		if ( ! isset( $this->verbs[$name] ) ) {
			do_action( 'ithemes-sync-add-log', 'Unable to find requested verb.', array( 'name' => $name ) );
			return false;
		}
		
		if ( ! class_exists( $this->verbs[$name]['class'] ) ) {
			if ( empty( $this->verbs[$name]['file'] ) ) {
				do_action( 'ithemes-sync-add-log', 'Unable to find requested verb\'s class.', $this->verbs[$name] );
				return false;
			}
			else if ( ! is_file( $this->verbs[$name]['file'] ) ) {
				do_action( 'ithemes-sync-add-log', 'Unable to find requested verb\'s file.', $this->verbs[$name] );
				return false;
			}
			else {
				@include_once( $this->verbs[$name]['file'] );
				
				if ( ! class_exists( $this->verbs[$name]['class'] ) ) {
					do_action( 'ithemes-sync-add-log', 'Unable to find requested verb\'s class even after loading its file.', $this->verbs[$name] );
					return false;
				}
			}
		}
		
		return $this->verbs[$name]['class'];
	}
	
	private function get_object( $name ) {
		if ( ! isset( $this->verbs[$name] ) ) {
			do_action( 'ithemes-sync-add-log', 'Unable to find requested verb.', array( 'name' => $name ) );
			return false;
		}
		
		if ( ! isset( $this->verbs[$name]['object'] ) ) {
			$class = $this->get_class( $name );
			$object = new $class();
			
			if ( ! is_subclass_of( $object, 'Ithemes_Sync_Verb' ) ) {
				do_action( 'ithemes-sync-add-log', 'Verb added without being a subclass of Ithemes_Sync_Verb', $this->verbs[$name] );
				return false;
			}
			
			$this->verbs[$name]['object'] = $object;
		}
		
		return $this->verbs[$name]['object'];
	}
}

new Ithemes_Sync_API();
