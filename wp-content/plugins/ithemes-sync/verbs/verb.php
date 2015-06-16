<?php

/*
Parent class for all Sync verbs.
Written by Chris Jean for iThemes.com
Version 1.0.0

Version History
	1.0.0 - 2013-10-01 - Chris Jean
		Initial version
*/


class Ithemes_Sync_Verb {
	public static $name = 'example';
	public static $description = 'This verb is not meant to be used; rather, it serves as the building block for all other verbs.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return array();
	}
}
