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

add_shortcode( 'tt_sponsor', function($args) {
    $post = get_posts([
        'numberposts' => 1,
        'post_type' => 'sponsor',
        'orderby' => 'rand',
        'tax_query' => [ [ 'taxonomy' => 'sponsor_level', 'field' => 'slug', 'terms' => $args['level'] ] ],
    ])[0];

    $retval = "Sponsor: {$post->post_title}<br>";
    $retval .= "Description: {$post->post_content}<br>";
    $retval .= "URL: " . get_field('url', $post->ID) . '<br>';
    $retval .= get_the_post_thumbnail($post->ID, 'full', [ 'class' => 'img-responsive']) . '<br>';

    return $retval;
});

add_shortcode( 'page_title', function() {
    return the_title(null, null, false);
});

//////////////////////////////////////////////////////// TT rule

add_shortcode( 'tt_rule', 'tt_rule' ); //line
function tt_rule($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1px',
        'color'  => '#ccc',
        'classes'  => 'col-sm-12 rule',
        'id' => '',
        'top' => 'n',
    ), $atts ) );

    if ($top == 'n') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"></div>';
    
    } else {
        
        // nothing
    }
     
    if ($top == 'y') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"> <a href="#top" class="top"><i class="fa fa-arrow-circle-up pull-right"></i></a></div>';
        
    } else {
        
        // nothing
    }
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Button

// [tt_btn size="lg" link="#" color="#003764" fcolor="#ffffff" float="none" target="" class=""]Button Name[/tt_btn], homes_for_sale_btn

add_shortcode( 'tt_btn', 'tt_btn' );
function tt_btn($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '',
        'color'  => '#418FC1',
        'fcolor'  => '#ffffff', //#ffffff
        'link'    => '#',
        'float'    => 'none',
        'target'    => '_blank',
        'class' => '',
        'block' => 'n',
    ), $atts ) );
    
    $classes = 'btn btn-default ' . $class . ' btn-' . $size;
    
    if ($block == 'y') {
    	$classes .= ' btn-block';
    }

    return '<a type="button" class="' . $classes . '" href="' . $link . '" style="background:' . $color . ';color:'. $fcolor . ';float:' . $float . ';" target="' . $target . '">' . $content . '</a>';
}
////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Image
add_shortcode( 'tt_img', 'tt_img' ); //line
function tt_img($atts, $content = null) {
    extract(shortcode_atts(array(
        'name'   => '',
        'id' => '',
        'size' => 'full',
        'link' => '',
        'class' => '',
        'responsive' => false,
    ), $atts ) );
    
    $image_path = get_template_directory_uri();
    $attachment_id = $id; // attachment ID
	$image_attributes = wp_get_attachment_image_src( $attachment_id, $size ); // returns an array

    if ( !empty($name) )
        $responsive = true;
    if ($responsive)
        $class .= ' img-responsive';

    $retval = '<img';
    
    if ( !empty($id) ) {
		$retval .= ' src="'.$image_attributes[0].'"'; 
        if ( !$responsive ) {
            $retval .= ' width="'.$image_attributes[1].'" height="'.$image_attributes[2].'"'; 
        }
    } else if ( !empty($name)) {
        $retval .= ' src="'.$image_path.'/images/'.$name.'"'; 
    }

    $retval .= ' class="' . $class . '"';

    $retval .= '>';

    if ( !empty($link) ) {
        $retval = '<a href="'.$link.'">' . $retval . '</a>';
    }

    return $retval;
}
////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Post Feed

add_shortcode( 'tt_posts', 'tt_posts' ); // echo do_shortcode('[tt_posts limit="-1" cat_name="home"]');
function tt_posts ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'post',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '10',
            'type' => 'post',
            'layout' => 'norm',
            'style' => 'col-sm-offset-4',
            'orderby' => '',
            'order' => 'DSC',
            'term' => '',
            'taxonomy' => 'Type',
		), $atts )
	);
    
/////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {
	// The Query

	

	if ( !empty($term) ) {
	    $args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $limit,
	    'cat' => $cat,
	    'category_name' => $cat_name,
	    'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $term,
			),
		),
	);
	} else {
		$args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'order' => 'post_date',
		'orderby' => 'rand',
		'posts_per_page' => $limit,
	    'cat' => $cat,
	    'category_name' => $cat_name,
	);
}
}
remove_all_filters('posts_orderby');
$the_query = new WP_Query( $args );

    
global $post;

// pre loop
//$output = '<ul>';    

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		// pull meta for each post
		$post_id = get_the_ID();
		$permalink = get_permalink( $id );
        $post = get_post();
        $size = '250,125';
        $image = get_the_post_thumbnail( $post_id, $size, $attr );
        if (empty( $image )) {
            $image = '<img src="' . get_template_directory_uri() . '/images/img-fpo.png">';
        }
         
		
//HTML


            
if ($layout == 'list' ) {
    //get section html
    ob_start();
        get_template_part('content', 'list');
        $output .= ob_get_contents();
    ob_end_clean();
} 
else if ($layout == 'list-event' ) {
    //get section html
    ob_start();
        get_template_part('content', 'list-event');
        $output .= ob_get_contents();
    ob_end_clean();
}
else if ( !empty($layout) ) {
    //get section html
    ob_start();
        get_template_part('content', $layout);
        $output .= ob_get_contents();
    ob_end_clean();
} else {	
    //get section html
    ob_start();
        get_template_part('content', 'default');
        $output .= ob_get_contents();
    ob_end_clean();
}
}    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}}


////////////////////////////////////////////////////////
