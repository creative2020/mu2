<?php

add_action('customize_register', function($wpc) {
    /* add sections */
    $wpc->add_section('general', ['title' => 'General']);
    $wpc->add_section('header', ['title' => 'Header']);
    $wpc->add_section('nav', ['title' => 'Navigation']);
    $wpc->add_section('footer', ['title' => 'Footer']);
    $wpc->add_section('home', ['title' => 'Home Page']);

    /*
     * Content Width
     */
    $setting_id = 'content-max-width';
    $wpc->add_setting($setting_id);
    $wpc->add_control(new WP_Customize_Control(
        $wpc, $setting_id, [
            'section' => 'general',
            'label' => __('Content Max Width (pixels)'),
            'settings' => $setting_id,
            'type' => 'number',
    ]));

    /*
     * General Colors
     */

    add_color_control($wpc, 'colors', 'action-bg', 'Action Item Background');
    add_color_control($wpc, 'colors', 'action-fg', 'Action Item Foreground');
    add_color_control($wpc, 'colors', 'title-fg', 'Title Text Color');

    /*
     * Header
     */

    $setting_id = 'header-img';
    $wpc->add_setting($setting_id);
    $wpc->add_control(new WP_Customize_Image_Control(
        $wpc, $setting_id, [
            'section' => 'header',
            'label' => __('Header Image'),
            'settings' => $setting_id,
    ]));

    $setting_id = 'header-img-width';
    $wpc->add_setting($setting_id, ['default' => 100]);
    $wpc->add_control(new WP_Customize_Control(
        $wpc, $setting_id, [
            'section' => 'header',
            'label' => __('Header Image, Max Width (%)'),
            'settings' => $setting_id,
            'type' => 'number',
    ]));

    /*
     * Navigation
     */

    $setting_id = 'nav-padding';
    $wpc->add_setting($setting_id, ['default' => 2]);
    $wpc->add_control(new WP_Customize_Control(
        $wpc, $setting_id, [
            'section' => 'nav',
            'label' => __('Navigation Menu Size'),
            'settings' => $setting_id,
            'type' => 'number',
    ]));

    add_color_control($wpc, 'nav', 'nav-main-bg', 'Main Nav Background Color');
    add_color_control($wpc, 'nav', 'nav-main-fg', 'Main Nav Foreground Color');
    add_color_control($wpc, 'nav', 'nav-secondary-bg', 'Secondary Nav Background Color');
    add_color_control($wpc, 'nav', 'nav-secondary-fg', 'Secondary Nav Foreground Color');

    /*
     * Footer
     */

    add_color_control($wpc, 'footer', 'contact-bg', 'Contact Background Color');
    add_color_control($wpc, 'footer', 'contact-fg', 'Contact Foreground Color');
    add_color_control($wpc, 'footer', 'contact-action', 'Contact Action Color');
    add_color_control($wpc, 'footer', 'contact-env-bg', 'Contact Envelope Background Color');
    add_color_control($wpc, 'footer', 'contact-env-fg', 'Contact Envelope Foreground Color');

    add_color_control($wpc, 'footer', 'footer-bg', 'Footer Background Color');
    add_color_control($wpc, 'footer', 'footer-fg', 'Footer Foreground Color');

    /*
     * Home Page
     */

    $setting_id = 'home-header-img';
    $wpc->add_setting($setting_id);
    $wpc->add_control(new WP_Customize_Image_Control(
        $wpc, $setting_id, [
            'section' => 'home',
            'label' => __('Header Image'),
            'settings' => $setting_id,
    ]));
    add_color_control($wpc, 'home', 'home-header-fg', 'Header Foreground Color');
});

if (class_exists('WPLessPlugin')) {
    $less = WPLessPlugin::getInstance();

    theme_mod_to_less_var($less, 'action-bg');
    theme_mod_to_less_var($less, 'action-fg');
    theme_mod_to_less_var($less, 'title-fg');

    $less->addVariable('header-img-width',
        get_theme_mod('header-img-width', 100) . '%');

    $less->addVariable('nav-padding',
        get_theme_mod('nav-padding', 2) . 'em');

    theme_mod_to_less_var($less, 'nav-main-bg');
    theme_mod_to_less_var($less, 'nav-main-fg');
    theme_mod_to_less_var($less, 'nav-secondary-bg');
    theme_mod_to_less_var($less, 'nav-secondary-fg');

    theme_mod_to_less_var($less, 'contact-bg');
    theme_mod_to_less_var($less, 'contact-fg');
    theme_mod_to_less_var($less, 'contact-action');
    theme_mod_to_less_var($less, 'contact-env-bg', 'lightgray');
    theme_mod_to_less_var($less, 'contact-env-fg', 'darkgray');

    theme_mod_to_less_var($less, 'footer-bg');
    theme_mod_to_less_var($less, 'footer-fg');

    theme_mod_to_less_var($less, 'home-header-img');
    theme_mod_to_less_var($less, 'home-header-fg');
}

function add_color_control($wpc, $section, $setting_name, $description) {
    $wpc->add_setting($setting_name);
    $wpc->add_control(new WP_Customize_Color_Control(
        $wpc, $setting_name, [
            'section' => $section,
            'label' => __($description),
            'settings' => $setting_name,
    ]));
}

function theme_mod_to_less_var($less, $setting_name, $default = '') {
    $setting = get_theme_mod($setting_name);
    if (empty($setting)) $setting = $default;
    if (filter_var($setting, FILTER_VALIDATE_URL)) $setting = "url('$setting')";
    if(!empty($setting))
        $less->addVariable($setting_name, $setting);
}
