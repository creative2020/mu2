<?php
	// pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $permalink = get_permalink( $id );

	// post thumbnail or default
        $image = get_the_post_thumbnail( $post_id, 'medium' );
        $col = '9';
        $icon = '';
        $img = 'y';
            
?>

    <a href="<?php echo $permalink ?>">
	    <div id="tt-list" class="row">
		    
		    <?php if (empty( $image ) || $img == "n") {
			    
			    $col = '12';
			    $icon = '<i class="fa fa-external-link-square pull-left"></i> ';
			    
			    } else { ?>
                               
                <div id="tt-list-img" class="col-sm-3">
	            	<img src="<?php echo $post_thumbnail_url[0]; ?>" class="img-responsive">
	        	</div>
            <?php } ?>
		    
		    
	        
	        <div id="<?php echo the_title() ?>" class="col-sm-<?php echo $col; ?>">
                <?php echo $icon; ?><h2><?php echo the_title(); ?></h2>
	        </div>
	        
	    </div>
    </a>
