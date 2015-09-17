<div class="col-xs-12 col-sm-3">
    <?php
        $q = [ 'numberposts' => 4 ];
        $q['type'] = 'tribe_events';

        echo '<span class="title">Upcoming Locations</span><br>';

        foreach(get_posts($q) as $loc) {
            $categories = get_the_category($loc->ID);
            foreach($categories as $category) {
                if ($category->category_parent == 6) {
                    $display_cat_name = $category->name;
                }
            }
            echo '<a href="' . get_permalink($loc->ID) . '">' .
                $loc->post_title . ' | ' .
                $display_cat_name .
                '</a><br>';
        }
    ?>
</div>

<?php

    $q = [ 'numberposts' => 1, 'orderby' => 'rand', 'category_name' => 'featured-article' ];
    $p = get_posts($q)[0];
    $excerpt = tt_get_excerpt($p);
    $link = get_permalink($p->ID);
    $url = wp_get_attachment_url( get_post_thumbnail_id($p->ID) );
    $url_sq = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), square );
?>
<div class="col-xs-12 col-sm-3">
    <div class="tt-post">
        <a href="<?php echo $link; ?>"><span class="title"><?php echo $p->post_title; ?></span><br></a>
        <?php echo $excerpt; ?>
    </div>
</div>
<div class="col-xs-12 col-sm-3">
    <img src="<?php echo $url_sq[0]; ?>" class="img-circle img-responsive center-block" style="max-width:225px;max-height:225px;">
</div>

<div class="col-xs-12 col-sm-3">
    <?php echo do_shortcode('[tt_img id="55" link="#" responsive=true]'); ?>
</div>
