<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/

function tt_register_cpt($single, $args = []) {
    $plural = isset($args['plural']) ? $args['plural'] : $single.'s';

    $supports = isset($args['supports']) ? $args['supports'] :
        [ 'title', 'editor', 'thumbnail' ];

    register_post_type(
        strtolower($single),
        array(
            'label' => $plural,
            'labels' => array(
                'add_new_item' => "Add New $single",
                'edit_item' => "Edit $single",
                'new_item' => "New $single",
                'view_item' => "View $single",
                'search_items' => "Search $plural",
                'not_found' => "No $plural found",
                'not_found_in_trash' => "No $plural found in Trash",
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => $supports,
            'taxonomies' => array('category'),
        )
    );
}

add_action('init', function() {
    tt_register_cpt('Location');
    tt_register_cpt('News', ['plural' => 'News']);
    add_post_type_support( 'news', 'post-formats' );
    tt_register_cpt('Testimonial');
    tt_register_cpt('FAQ', ['supports' => [ 'title', 'editor' ] ]);
});
