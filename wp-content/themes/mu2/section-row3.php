<?php
    $q = [ 'category_name' => 'featured-article', 'numberposts' => 1, 'orderby' => 'rand' ];
    $p = get_posts($q)[0];
    $excerpt = tt_get_excerpt($p);
    $link = get_permalink($p->ID);
    $url = wp_get_attachment_url( get_post_thumbnail_id($p->ID) );
?>
<div class="col-xs-12 col-sm-6">
    <div class="tt-post">
        <span class="title"><?php echo $p->post_title; ?></span><br>
        <?php echo $excerpt; ?>
    </div>
</div>
<div class="col-xs-12 col-sm-6">
    <img src="<?php echo $url; ?>" class="img-responsive center-block" style="max-height: 24rem;">
</div>
