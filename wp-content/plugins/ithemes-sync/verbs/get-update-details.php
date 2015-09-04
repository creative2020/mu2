<?php

/*
Implementation of the get-update-details verb.
Written by Chris Jean for iThemes.com
Version 1.0.0

Version History
	1.0.0 - 2013-11-14 - Chris Jean
		Initial version
*/


class Ithemes_Sync_Verb_Get_Update_Details extends Ithemes_Sync_Verb {
	public static $name = 'get-update-details';
	public static $description = 'Find details about all available updates on the site. This includes details about updates to WordPress, plugins, themes, and translations.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return Ithemes_Sync_Functions::get_update_details( $arguments );
	}
}
