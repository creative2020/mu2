<?php

/*
Plugin Name: iThemes Sync
Plugin URI: http://ithemes.com/
Description: Manage updates to your WordPress sites easily in one place.
Author: iThemes
Version: 1.1.13
Author URI: http://ithemes.com/
iThemes Package: ithemes-sync
*/

$GLOBALS['ithemes_sync_path'] = dirname( __FILE__ );

if ( ! empty( $_GET['ithemes-sync-request'] ) ) {
	require( $GLOBALS['ithemes_sync_path'] . '/request-handler.php' );
} else if ( is_admin() ) {
	require( $GLOBALS['ithemes_sync_path'] . '/admin.php' );
}


function ithemes_sync_handle_activation_hook() {
	set_site_transient( 'ithemes-sync-activated', true, 120 );
}
register_activation_hook( __FILE__, 'ithemes_sync_handle_activation_hook' );


function ithemes_sync_handle_deactivation_hook() {
	delete_site_option( 'ithemes_sync_hide_authenticate_notice' );
	delete_site_transient( 'ithemes-sync-activated', true, 120 );
}
register_deactivation_hook( __FILE__, 'ithemes_sync_handle_deactivation_hook' );


function ithemes_sync_updater_register( $updater ) {
	$updater->register( 'ithemes-sync', __FILE__ );
}

add_action( 'ithemes_updater_register', 'ithemes_sync_updater_register' );

require( dirname( __FILE__ ) . '/lib/updater/load.php' );
