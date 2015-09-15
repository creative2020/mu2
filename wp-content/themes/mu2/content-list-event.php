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

    <a href="<?php echo $permalink ?>">
	    <div id="tt-list-event" class="row">
	        <div id="tt-list-img" class="col-sm-3">
	            <img src="<?php echo $post_thumbnail_url[0]; ?>" class="img-responsive">
	            
	        </div>
	        <div id="<?php echo the_title() ?>" class="col-sm-9">
		        <div>
		            <h2><?php echo the_title(); ?></h2>
		            <p><?php echo the_excerpt(); ?></p>
					
		        </div>
	        </div>
			<div id="tt-event-btn" class="col-sm-12">
				<?php echo do_shortcode('[tt_btn link="'.$permalink.'" block="y"]Register[/tt_btn]'); ?>
			</div>
	        
	    </div>
    </a>
