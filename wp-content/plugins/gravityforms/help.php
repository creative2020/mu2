<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GFHelp {
	public static function help_page() {
		if ( ! GFCommon::ensure_wp_version() ) {
			return;
		}

		echo GFCommon::get_remote_message();

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || isset( $_GET['gform_debug'] ) ? '' : '.min';

		?>
		<link rel="stylesheet" href="<?php echo GFCommon::get_base_url() ?>/css/admin<?php echo $min; ?>.css" />
		<div class="wrap <?php echo GFCommon::get_browser_class() ?>">
<<<<<<< HEAD
			<h2><?php _e( 'Gravity Forms Help', 'gravityforms' ); ?></h2>
=======
			<h2><?php esc_html_e( 'Gravity Forms Help', 'gravityforms' ); ?></h2>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

			<div style="margin-top:10px;">

				<div
<<<<<<< HEAD
					class="gforms_help_alert alert_yellow"><?php _e( "<strong>IMPORTANT NOTICE:</strong> We do not provide support via e-mail. Please <a href='http://www.gravityhelp.com/support/' target='_blank'>open a support ticket</a>.", 'gravityforms' ) ?></div>

				<div><?php _e( "Please review the plugin documentation and <a href='http://www.gravityhelp.com/frequently-asked-questions/'>frequently asked questions (FAQ)</a> first. If you still can't find the answer <a href='http://www.gravityhelp.com/support/' target='_blank'>open a support ticket</a> and we will be happy to answer your questions and assist you with any problems. <strong>Please note:</strong> If you have not <a href='http://www.gravityforms.com/purchase-gravity-forms/'>purchased a license</a> from us, you won't have access to these help resources.", 'gravityforms' ); ?></div>
=======
					class="gforms_help_alert alert_yellow"><?php printf( esc_html__( '%sIMPORTANT NOTICE:%s We do not provide support via e-mail. Please %sopen a support ticket%s.', 'gravityforms' ), '<strong>', '</strong>', '<a href="https://www.gravityhelp.com/support/" target="_blank">', '</a>' )  ?></div>

				<div><?php printf( esc_html__( "Please review the plugin documentation and %sfrequently asked questions (FAQ)%s first. If you still can't find the answer %sopen a support ticket%s and we will be happy to answer your questions and assist you with any problems. %sPlease note:%s If you have not %spurchased a license%s from us, you won't have access to these help resources.", 'gravityforms' ), '<a href="https://www.gravityhelp.com/frequently-asked-questions/">', '</a>', '<a href="https://www.gravityhelp.com/support/" target="_blank">', '</a>', '<strong>', '</strong>', '<a href="http://www.gravityforms.com/purchase-gravity-forms/">', '</a>' ); ?></div>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836


				<div class="hr-divider"></div>

<<<<<<< HEAD
				<h3><?php _e( 'Gravity Forms Documentation', 'gravityforms' ); ?></h3>
=======
				<h3><?php esc_html_e( 'Gravity Forms Documentation', 'gravityforms' ); ?></h3>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				<ul style="margin-top:15px;">
					<li>
						<div class="gforms_helpbox">
							<form name="jump">
								<select name="menu">
									<!-- begin documentation listing -->
<<<<<<< HEAD
									<option
										selected><?php _e( 'Documentation (please select a topic)', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/Getting_Started"><?php _e( 'Getting Started', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/Using_Gravity_Forms"><?php _e( 'Using Gravity Forms', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/Design_and_Layout"><?php _e( 'Design and Layout', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/Developer_Docs"><?php _e( 'Developer Docs', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/Add-ons"><?php _e( 'Add-Ons', 'gravityforms' ); ?></option>
									<option
										value="http://gravityhelp.com/documentation/page/How_To"><?php _e( 'How To', 'gravityforms' ); ?></option>
=======
									<option selected>
										<?php esc_html_e( 'Documentation (please select a topic)', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/documentation/article/getting-started/">
										<?php esc_html_e( 'Getting Started', 'gravityforms' ); ?>
									</option>
									<option	value="https://www.gravityhelp.com/documentation/article/design-and-layout/">
										<?php esc_html_e( 'Design and Layout', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/documentation/category/extending-gravity-forms/">
										<?php esc_html_e( 'Developer Docs', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/documentation/category/add-ons-gravity-forms/">
										<?php esc_html_e( 'Add-Ons', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/documentation/category/how-to/">
										<?php esc_html_e( 'How To', 'gravityforms' ); ?>
									</option>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
									<!-- end documentation listing -->
								</select>
								<input type="button" class="button"
									   onClick="window.open(document.jump.menu.options[document.jump.menu.selectedIndex].value);"
<<<<<<< HEAD
									   value="<?php _e( 'GO', 'gravityforms' ); ?>">
=======
									   value="<?php esc_attr_e( 'GO', 'gravityforms' ); ?>">
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
							</form>
						</div>

					</li>
				</ul>

				<div class="hr-divider"></div>

<<<<<<< HEAD
				<h3><?php _e( 'Gravity Forms FAQ', 'gravityforms' ); ?></h3>
=======
				<h3><?php esc_html_e( 'Gravity Forms FAQ', 'gravityforms' ); ?></h3>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				<ul style="margin-top:15px;">
					<li>
						<div class="gforms_helpbox">
							<form name="jump1">
								<select name="menu1">

									<!-- begin faq listing -->
<<<<<<< HEAD
									<option selected><?php _e( 'FAQ (please select a topic)', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/frequently-asked-questions/#faq_installation"><?php _e( 'Installation Questions', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/frequently-asked-questions/#faq_styling"><?php _e( 'Formatting/Styling Questions', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/frequently-asked-questions/#faq_notifications"><?php _e( 'Notification Questions', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/frequently-asked-questions/#faq_general"><?php _e( 'General Questions', 'gravityforms' ); ?></option>
=======
									<option selected>
										<?php esc_html_e( 'FAQ (please select a topic)', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/frequently-asked-questions/faq-installation/">
										<?php esc_html_e( 'Installation Questions', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/frequently-asked-questions/faq-styling-formatting/">
										<?php esc_html_e( 'Formatting/Styling Questions', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/frequently-asked-questions/faq-notifications/">
										<?php esc_html_e( 'Notification Questions', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/frequently-asked-questions/faq-general-questions/">
										<?php esc_html_e( 'General Questions', 'gravityforms' ); ?>
									</option>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

									<!-- end faq listing -->
								</select>
								<input type="button" class="button"
									   onClick="window.open(document.jump1.menu1.options[document.jump1.menu1.selectedIndex].value);"
<<<<<<< HEAD
									   value="<?php _e( 'GO', 'gravityforms' ); ?>">
=======
									   value="<?php esc_attr_e( 'GO', 'gravityforms' ); ?>">
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
							</form>
						</div>

					</li>

				</ul>

				<div class="hr-divider"></div>

<<<<<<< HEAD
				<h3><?php _e( 'Gravity Forms Downloads', 'gravityforms' ); ?></h3>
				<?php _e( '<strong>Please Note:</strong> Only licensed Gravity Forms customers are granted access to the downloads section.', 'gravityforms' ); ?>
=======
				<h3><?php esc_html_e( 'Gravity Forms Downloads', 'gravityforms' ); ?></h3>
				<?php printf( esc_html__( '%sPlease Note:%s Only licensed Gravity Forms customers are granted access to the downloads section.', 'gravityforms' ), '<strong>', '</strong>' ); ?>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				<ul style="margin-top:15px;">
					<li>
						<div class="gforms_helpbox">
							<form name="jump3">
								<select name="menu3">

									<!-- begin downloads listing -->
<<<<<<< HEAD
									<option selected><?php _e( 'Downloads (please select a product)', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/downloads/"><?php _e( 'Gravity Forms', 'gravityforms' ); ?></option>
									<option value="http://www.gravityhelp.com/downloads/add-ons/"><?php _e( 'Gravity Forms Add-Ons', 'gravityforms' ); ?></option>
=======
									<option selected>
										<?php esc_html_e( 'Downloads (please select a product)', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/downloads/">
										<?php esc_html_e( 'Gravity Forms', 'gravityforms' ); ?>
									</option>
									<option value="https://www.gravityhelp.com/downloads/add-ons/">
										<?php esc_html_e( 'Gravity Forms Add-Ons', 'gravityforms' ); ?>
									</option>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

									<!-- end downloads listing -->
								</select>
								<input type="button" class="button"
									   onClick="window.open(document.jump3.menu3.options[document.jump3.menu3.selectedIndex].value);"
<<<<<<< HEAD
									   value="<?php _e( 'GO', 'gravityforms' ); ?>">
							</form>
						</div>

					</li>

				</ul>


				<div class="hr-divider"></div>

				<h3><?php _e( 'Gravity Forms Tutorials &amp; Resources', 'gravityforms' ); ?></h3>
				<?php _e( '<strong>Please note:</strong> The Gravity Forms support team does not provide support for third party scripts, widgets, etc.', 'gravityforms' ); ?>

				<div class="gforms_helpbox" style="margin:15px 0;">
					<ul class="resource_list">
						<li><a href="http://www.gravityhelp.com/">Gravity Forms Blog</a></li>
						<li><a target="_blank" href="http://www.gravityhelp.com/gravity-forms-css-visual-guide/">Gravity
								Forms Visual CSS Guide</a></li>
						<li><a target="_blank"
							   href="http://www.rocketgenius.com/gravity-forms-css-targeting-specific-elements/">Gravity
								Forms CSS: Targeting Specific Elements</a></li>
						<li><a target="_blank"
							   href="http://www.gravityhelp.com/creating-a-modal-form-with-gravity-forms-and-fancybox/">Creating
								a Modal Form with Gravity Forms and FancyBox</a></li>
						<li><a target="_blank" href="http://yoast.com/gravity-forms-widget-update/">Gravity Forms Widget
								(Third Party Release)</a></li>
						<li><a target="_blank" href="http://wordpress.org/extend/plugins/wp-mail-smtp/">WP Mail SMTP
								Plugin</a></li>
						<li><a target="_blank" href="http://wordpress.org/extend/plugins/members/">Members Plugin (Role
								Management - Integrates with Gravity Forms)</a></li>
						<li><a target="_blank" href="http://wordpress.org/extend/plugins/really-simple-captcha/">Really
								Simple Captcha Plugin (Integrates with Gravity Forms)</a></li>
=======
									   value="<?php esc_attr_e( 'GO', 'gravityforms' ); ?>">
							</form>
						</div>
					</li>
				</ul>

				<div class="hr-divider"></div>

				<h3><?php esc_html_e( 'Gravity Forms Tutorials & Resources', 'gravityforms' ); ?></h3>
				<?php printf( esc_html__( '%sPlease note:%s The Gravity Forms support team does not provide support for third party scripts, widgets, etc.', 'gravityforms' ), '<strong>', '</strong>' ); ?>

				<div class="gforms_helpbox" style="margin:15px 0;">
					<ul class="resource_list">
						<li>
							<a href="http://www.gravityhelp.com/"><?php esc_html_e( 'Gravity Forms Blog', 'gravityforms' ); ?></a>
						</li>
						<li>
							<a target="_blank" href="https://www.gravityhelp.com/gravity-forms-css-visual-guide/">
								<?php esc_html_e( 'Gravity Forms Visual CSS Guide', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://www.rocketgenius.com/gravity-forms-css-targeting-specific-elements/">
								<?php esc_html_e( 'Gravity Forms CSS: Targeting Specific Elements', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.gravityhelp.com/creating-a-modal-form-with-gravity-forms-and-fancybox/">
								<?php esc_html_e( 'Creating a Modal Form with Gravity Forms and FancyBox', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://yoast.com/gravity-forms-widget-update/">
								<?php esc_html_e( 'Gravity Forms Widget (Third Party Release)', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://wordpress.org/extend/plugins/wp-mail-smtp/">
								<?php esc_html_e( 'WP Mail SMTP Plugin', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://wordpress.org/extend/plugins/members/">
								<?php esc_html_e( 'Members Plugin (Role Management - Integrates with Gravity Forms)', 'gravityforms' ); ?>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://wordpress.org/extend/plugins/really-simple-captcha/">
								<?php esc_html_e( 'Really Simple Captcha Plugin (Integrates with Gravity Forms)', 'gravityforms' ); ?>
							</a>
						</li>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					</ul>

				</div>

			</div>
		</div>


	<?php
	}
}