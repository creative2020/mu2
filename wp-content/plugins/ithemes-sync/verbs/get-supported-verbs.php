<?php

/*
Implementation of the get-supported-verbs verb.
Written by Chris Jean for iThemes.com
Version 1.1.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
	1.1.0 - 2013-11-22 - Chris Jean
		Simplified the run() function by having it simply call the Ithemes_Sync_Functions::get_supported_verbs() function.
*/


class Ithemes_Sync_Verb_Get_Supported_Verbs extends Ithemes_Sync_Verb {
	public static $name = 'get-supported-verbs';
	public static $description = 'Retrieve a listing of the supported verbs.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return Ithemes_Sync_Functions::get_supported_verbs( $arguments );
	}
}
