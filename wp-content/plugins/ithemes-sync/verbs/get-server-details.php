<?php

/*
Implementation of the get-server-details verb.
Written by Chris Jean for iThemes.com
Version 1.0.0

Version History
	1.0.0 - 2013-11-14 - Chris Jean
		Initial version
*/


class Ithemes_Sync_Verb_Get_Server_Details extends Ithemes_Sync_Verb {
	public static $name = 'get-server-details';
	public static $description = 'Retrieve details about the server.';
	
	private $default_arguments = array();
	
	
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		return Ithemes_Sync_Functions::get_server_details( $arguments );
	}
}
