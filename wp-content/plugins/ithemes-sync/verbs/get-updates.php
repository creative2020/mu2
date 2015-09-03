<?php

/*
Implementation of the get-updates verb.
Written by Chris Jean for iThemes.com
Version 1.1.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.1.0 - 2013-11-18 - Chris Jean
		Passed $arguments array to get_update_details() function.
*/


class Ithemes_Sync_Verb_Get_Updates extends Ithemes_Sync_Verb {
	public static $name = 'get-updates';
	public static $description = 'Find details about all available updates on the site. This includes details about updates to WordPress, plugins, themes, and translations.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return Ithemes_Sync_Functions::get_update_details( $arguments );
	}
}
