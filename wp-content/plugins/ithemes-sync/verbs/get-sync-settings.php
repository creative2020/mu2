<?php

/*
Implementation of the get-sync-settings verb.
Written by Chris Jean for iThemes.com
Version 1.0.0

Version History
	1.0.0 - 2013-11-20 - Chris Jean
		Initial version
*/


class Ithemes_Sync_Verb_Get_Sync_Settings extends Ithemes_Sync_Verb {
	public static $name = 'get-sync-settings';
	public static $description = 'Retrieve the Sync plugin\'s settings.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return Ithemes_Sync_Functions::get_sync_settings( $arguments );
	}
}
