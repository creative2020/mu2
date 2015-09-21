<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GFUpdate {
	public static function update_page() {
		if ( ! GFCommon::current_user_can_any( 'gravityforms_view_updates' ) ) {
<<<<<<< HEAD
			wp_die( __( "You don't have permissions to view this page", 'gravityforms' ) );
=======
			wp_die( esc_html__( "You don't have permissions to view this page", 'gravityforms' ) );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}

		if ( ! GFCommon::ensure_wp_version() ) {
			return;
		}

		GFCommon::cache_remote_message();
		echo GFCommon::get_remote_message();

		wp_print_styles( array( 'thickbox' ) );

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || isset( $_GET['gform_debug'] ) ? '' : '.min';

		?>

		<link rel="stylesheet" href="<?php echo GFCommon::get_base_url() . "/css/admin{$min}.css" ?>" />

		<div class="wrap <?php echo GFCommon::get_browser_class() ?>">
<<<<<<< HEAD
			<h2><?php _e( 'Gravity Forms Updates', 'gravityforms' ) ?></h2>
=======
			<h2><?php esc_html( 'Gravity Forms Updates', 'gravityforms' ) ?></h2>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			<?php

			$version_info = GFCommon::get_version_info( false );
			do_action( 'gform_after_check_update' );

			if ( version_compare( GFCommon::$version, $version_info['version'], '<' ) ) {
				$plugin_file = 'gravityforms/gravityforms.php';
				$upgrade_url = wp_nonce_url( 'update.php?action=upgrade-plugin&amp;plugin=' . urlencode( $plugin_file ), 'upgrade-plugin_' . $plugin_file );


				$message = __( 'There is a new version of Gravity Forms available.', 'gravityforms' );
				if ( rgar( $version_info, 'is_valid_key' ) ) {
					?>
					<div class="gf_update_outdated alert_yellow">
<<<<<<< HEAD
						<?php echo $message . ' ' . sprintf( __( '<p>You can update to the latest version automatically or download the update and install it manually. %sUpdate Automatically%s %sDownload Update%s', 'gravityforms' ), "</p><a class='button-primary' href='{$upgrade_url}'>", '</a>', "&nbsp;<a class='button' href='{$version_info["url"]}'>", '</a>' ); ?>
=======
						<?php echo esc_html( $message ) . ' <p>' . sprintf( esc_html__( 'You can update to the latest version automatically or download the update and install it manually. %sUpdate Automatically%s %sDownload Update%s', 'gravityforms' ), "</p><a class='button-primary' href='{$upgrade_url}'>", '</a>', "&nbsp;<a class='button' href='{$version_info["url"]}'>", '</a>' ); ?>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					</div>
				<?php
				} else {
					?>
					<div class="gf_update_expired alert_red">
<<<<<<< HEAD
						<?php echo $message . ' ' . __( sprintf( '%sRegister%s your copy of Gravity Forms to receive access to automatic updates and support. Need a license key? %sPurchase one now%s.', '<a href="admin.php?page=gf_settings">', '</a>', '<a href="http://www.gravityforms.com">', '</a>' ), 'gravityforms' ); ?>
=======
						<?php echo esc_html( $message ) . ' ' . sprintf( esc_html( '%sRegister%s your copy of Gravity Forms to receive access to automatic updates and support. Need a license key? %sPurchase one now%s.', 'gravityforms' ), '<a href="admin.php?page=gf_settings">', '</a>', '<a href="http://www.gravityforms.com">', '</a>' ); ?>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					</div>
				<?php
				}

				echo '<br/><br/>';
				$changelog = RGForms::get_changelog();
				echo $changelog;
			} else {

				?>
				<div class="gf_update_current alert_green">
<<<<<<< HEAD
					<?php _e( 'Your version of Gravity Forms is up to date.', 'gravityforms' ); ?>
=======
					<?php esc_html_e( 'Your version of Gravity Forms is up to date.', 'gravityforms' ); ?>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				</div>
			<?php
			}

			do_action( 'gform_updates' );
			?>

			<div id='gform_upgrade_license' style="display:none;"></div>
			<script type="text/javascript">
				jQuery(document).ready(function () {
					jQuery.post(ajaxurl, {
							action            : "gf_upgrade_license",
							gf_upgrade_license: "<?php echo wp_create_nonce( 'gf_upgrade_license' ) ?>"},

						function (data) {
							if (data.trim().length > 0)
								jQuery("#gform_upgrade_license").replaceWith(data);
						}
					);
				});
			</script>
		</div>
	<?php
	}


}
