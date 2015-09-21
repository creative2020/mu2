<?php
	// pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $permalink = get_permalink( $id );
?>

<p class="headsub"><?php the_title(); ?></p>

<a href="<?php echo $permalink ?>">
    <div style="position: relative;">
        <img src="<?php echo $post_thumbnail_url[0]; ?>" style="max-width: 100%;">
        <div style="position: absolute; top: 0; width: 100%; height: 100%;">
            <div style="width: 100%; height: 100%; display: table;">
                <div style="height: 100%; text-align: center; display: table-cell; vertical-align: middle;">
                    <span class="video-icon"><i class="fa fa-play-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</a>
