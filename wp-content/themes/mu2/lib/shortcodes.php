<?php

add_shortcode( 'post', function($args) {
    $post = get_page_by_path($args['slug'], OBJECT, $args['type']);
    $link = get_permalink($post->ID);
    $excerpt = tt_get_excerpt($post);
    return "<a href=\"$link\">" .
        '<span class="title">' . $post->post_title . '</span><br>' .
        $excerpt . '</a>';
});

add_shortcode( 'events', function($args) {
    $posts = get_posts([
        'numberposts' => $args['count'],
        'post_type' => $args['type'],
    ]);
    foreach($posts as $post) {
        $link = get_permalink($post->ID);
        $retval .= "<a href=\"$link\">$post->post_title</a><br>";
    }
    return $retval;
});

add_shortcode( 'page_title', function() {
    return the_title(null, null, false);
});
