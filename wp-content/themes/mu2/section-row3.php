<?php
    $q = [ 'category_name' => 'featured-article', 'numberposts' => 1, 'orderby' => 'rand' ];
    $p = get_posts($q)[0];
    $excerpt = tt_get_excerpt($p);
    $link = get_permalink($p->ID);
    $url = wp_get_attachment_url( get_post_thumbnail_id($p->ID) );
?>
<div class="col-xs-12 col-sm-6">
    <div class="tt-post">
	<a href="<?php echo $link; ?>"><span class="title"><?php echo $p->post_title; ?></span></a>
        <p><?php echo $excerpt; ?></p>
    </div>
</div>
<div class="col-xs-12 col-sm-6">
    <img src="<?php echo $url; ?>" class="img-responsive pull-right" style="max-height: 24rem;">
</div>
