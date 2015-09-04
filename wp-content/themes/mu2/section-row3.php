<?php
    $q = [ 'numberposts' => 1, 'orderby' => 'rand' ];
    $p = get_posts($q)[0];
    $excerpt = tt_get_excerpt($p);
    $link = get_permalink($p->ID);
?>
<div class="col-xs-12 col-sm-6">
    <div class="tt-post">
        <span class="title"><?php echo $p->post_title; ?></span><br>
        <?php echo $excerpt; ?>
    </div>
</div>
<div class="col-xs-12 col-sm-6">
    <?php echo get_the_post_thumbnail($p->ID, 'full', [ 'class' => 'img-responsive center-block' ]); ?>
</div>
