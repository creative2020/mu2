<?php
	// pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'square' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $post_thumbnail_url_large = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
        $permalink = get_permalink( $id );
        $gallery_item_link = '#';
        $title = get_the_title($post_id);
        $style = '';
               
        
    // post thumbnail or default
        $image = get_the_post_thumbnail( $post_id, 'medium' );
            if (empty( $image )) {
                $image = '<img src="'.get_template_directory_uri().'/images/img-fpo.png">';
            }
?>

<dt class="row gallery-item-wrap">
    <a data-attachment-id="<?php echo $post_thumbnail_id; ?>" href="/<?php echo $gallery_item_link.'/#'.$title; ?>" class="fbx-link">
        <img src="<?php echo $post_thumbnail_url[0]; ?>" class="img-responsive" aria-describedby="gallery-1-<?php echo the_title(); ?>">
        <div class="gallery-desc">
            
                <h2><?php echo the_title(); ?></h2>
                
            <h3><?php echo ''; ?></h3>
            <p><?php echo ''; ?></p>
        </div>
    </a>
</dt>
<dd class="gallery-caption" id="gallery-1-<?php echo $post_thumbnail_id; ?>">
    <?php echo 'title'; ?>
</dd>