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
	    <div id="tt-list-video" class="row">
	        
	        <div id="tt-list-img" class="col-sm-12">
		        <span class="video-tn">
	            	<img src="<?php echo $post_thumbnail_url[0]; ?>" class="img-responsive">
	            </span>
	            <span class="video-title"><h2><?php echo the_title(); ?></h2></span>
		        <span class="video-icon text-center"><i class="fa fa-play-circle"></i></span>
	            
	            
	        </div>	        
	    </div>
    </a>