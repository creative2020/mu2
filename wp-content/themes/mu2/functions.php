<?php

function tt_get_excerpt($local_post) {
    global $post;
    $temp = $post;
    $post = $local_post;
    setup_postdata( $post );
    $excerpt = get_the_excerpt();
    wp_reset_postdata();
    $post = $temp;
    return $excerpt;
}

require_once( 'lib/wp_bootstrap_navwalker.php' );

require_once( 'lib/shortcodes.php' );
add_filter( 'widget_text', 'do_shortcode' );

require_once( 'lib/cpt.php' );

add_action('after_setup_theme', function() {
    require_once('lib/after-setup-theme.php');
});

require_once('lib/widgets.php');
add_action('widgets_init', function() {
    register_sidebar([
        'name' => 'Home - Row 2',
        'id' => 'tt-sidebar-home-row2',
        'before_widget' => '<div class="col-xs-6 col-sm-3">',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Home - Row 3',
        'id' => 'tt-sidebar-home-row3',
        'before_widget' => '<div class="col-xs-12 col-sm-6">',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Home - Row 4',
        'id' => 'tt-sidebar-home-row4',
        'before_widget' => '<div class="col-xs-6 col-sm-3">',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Home - Content',
        'id' => 'tt-sidebar-home-content',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Footer C',
        'id' => 'tt-sidebar-footer-c',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Footer B',
        'id' => 'tt-sidebar-footer-b',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Footer A - Left',
        'id' => 'tt-sidebar-footer-left',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Footer A - Center',
        'id' => 'tt-sidebar-footer-center',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Footer A - Right',
        'id' => 'tt-sidebar-footer-right',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Post Header',
        'id' => 'tt-sidebar-post-header',
        'before_widget' => '',
        'after_widget' => '',
    ]);
    register_sidebar([
        'name' => 'Post Sidebar',
        'id' => 'tt-sidebar-post-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
});

require_once('lib/customizer.php');

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('bootstrap',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        ['jquery'], false, true);

    wp_enqueue_style('fontawesome',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

    wp_enqueue_style('theme-main',
        get_stylesheet_directory_uri().'/main.less');

    wp_enqueue_style('google-fonts',
        '//fonts.googleapis.com/css?family=Oswald:400,700');

    $setting = get_theme_mod('content-max-width');
    if(!empty($setting)) {
        wp_enqueue_script('mm',
            get_stylesheet_directory_uri().'/mm.js',
            ['jquery'], false, false);
    }
});
