<?php

/*
Implementation of the get-status verb.
Written by Chris Jean for iThemes.com
Version 1.3.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.1.0 - 2013-11-18 - Chris Jean
		Updated code to use external functions to pull the data from.
		Added "php", "server", and "settings" sections.
	1.2.0 - 2013-11-22 - Chris Jean
		Added "supported-verbs" section.
	1.3.0 - 2013-12-19 - Chris Jean
		Updated to support variable element output.
*/


class Ithemes_Sync_Verb_Get_Status extends Ithemes_Sync_Verb {
	public static $name = 'get-status';
	public static $description = 'Retrieve basic details about the site.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		$status_elements = array(
			'wordpress'       => 'get_wordpress_details',
			'plugins'         => 'get_plugin_details',
			'themes'          => 'get_theme_details',
			'updates'         => 'get_update_details',
			'php'             => 'get_php_details',
			'server'          => 'get_server_details',
			'settings'        => 'get_sync_settings',
			'supported-verbs' => 'get_supported_verbs',
		);
		
		if ( ! empty( $arguments['status_elements'] ) ) {
			if ( is_array( $arguments['status_elements'] ) ) {
				$show_status_elements = $arguments['status_elements'];
			} else {
				trigger_error( 'A non-array status_elements argument was supplied. The argument will be ignored.' );
			}
			
			unset( $arguments['status_elements'] );
		}
		
		if ( ! isset( $show_status_elements ) ) {
			$show_status_elements = array_keys( $status_elements );
		}
		
		
		foreach ( $show_status_elements as $element ) {
			if ( isset( $status_elements[$element] ) ) {
				$data = call_user_func( array( 'Ithemes_Sync_Functions', $status_elements[$element] ), $arguments );
			} else {
				$data = "This element is not recognized";
			}
			
			$status[$element] = $data;
		}
		
		
		return $status;
	}
}
