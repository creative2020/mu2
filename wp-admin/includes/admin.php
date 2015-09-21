<?php
/**
 * Includes all of the WordPress Administration API files.
 *
 * @package WordPress
 * @subpackage Administration
 */

if ( ! defined('WP_ADMIN') ) {
	/*
	 * This file is being included from a file other than wp-admin/admin.php, so
	 * some setup was skipped. Make sure the admin message catalog is loaded since
	 * load_default_textdomain() will not have done so in this context.
	 */
	load_textdomain( 'default', WP_LANG_DIR . '/admin-' . get_locale() . '.mo' );
}

<<<<<<< HEAD
=======
/** WordPress Administration Hooks */
require_once(ABSPATH . 'wp-admin/includes/admin-filters.php');

>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
/** WordPress Bookmark Administration API */
require_once(ABSPATH . 'wp-admin/includes/bookmark.php');

/** WordPress Comment Administration API */
require_once(ABSPATH . 'wp-admin/includes/comment.php');

/** WordPress Administration File API */
require_once(ABSPATH . 'wp-admin/includes/file.php');

/** WordPress Image Administration API */
require_once(ABSPATH . 'wp-admin/includes/image.php');

/** WordPress Media Administration API */
require_once(ABSPATH . 'wp-admin/includes/media.php');

/** WordPress Import Administration API */
require_once(ABSPATH . 'wp-admin/includes/import.php');

/** WordPress Misc Administration API */
require_once(ABSPATH . 'wp-admin/includes/misc.php');

/** WordPress Plugin Administration API */
require_once(ABSPATH . 'wp-admin/includes/plugin.php');

/** WordPress Post Administration API */
require_once(ABSPATH . 'wp-admin/includes/post.php');

/** WordPress Administration Screen API */
require_once(ABSPATH . 'wp-admin/includes/screen.php');

/** WordPress Taxonomy Administration API */
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php');

/** WordPress Template Administration API */
require_once(ABSPATH . 'wp-admin/includes/template.php');

/** WordPress List Table Administration API and base class */
require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
require_once(ABSPATH . 'wp-admin/includes/list-table.php');

/** WordPress Theme Administration API */
require_once(ABSPATH . 'wp-admin/includes/theme.php');

/** WordPress User Administration API */
require_once(ABSPATH . 'wp-admin/includes/user.php');

<<<<<<< HEAD
=======
/** WordPress Site Icon API */
require_once(ABSPATH . 'wp-admin/includes/class-wp-site-icon.php');

>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
/** WordPress Update Administration API */
require_once(ABSPATH . 'wp-admin/includes/update.php');

/** WordPress Deprecated Administration API */
require_once(ABSPATH . 'wp-admin/includes/deprecated.php');

/** WordPress Multisite support API */
if ( is_multisite() ) {
<<<<<<< HEAD
=======
	require_once(ABSPATH . 'wp-admin/includes/ms-admin-filters.php');
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	require_once(ABSPATH . 'wp-admin/includes/ms.php');
	require_once(ABSPATH . 'wp-admin/includes/ms-deprecated.php');
}
