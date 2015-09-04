<?php
	// pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $permalink = get_permalink( $id );
        
        
        

	// post thumbnail or default
        $image = get_the_post_thumbnail( $post_id, 'medium' );
            if (empty( $image )) {
                $image = '<img src="'.get_template_directory_uri().'/images/img-fpo.png">';
            }
?>

    <div id="speaker" class="row">
        <div class="col-sm-2">
            <img src="<?php echo $post_thumbnail_url[0]; ?>" class="img-responsive grayscale">
            
        </div>
        <div id="<?php echo the_title() ?>" class="col-sm-10">
        <div>
            <h2><?php echo the_title(); ?></h2>
            
        </div>
            <?php echo the_content(); ?>
            <?php echo do_shortcode('[tt_rule top="y"]'); ?>
        </div>
        
    </div>