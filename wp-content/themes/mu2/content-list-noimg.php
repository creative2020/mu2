<?php
    // pull meta for each post
    $post_id = get_the_ID();
    $permalink = get_permalink( $id );
    $icon = '<i class="fa fa-external-link-square pull-left"></i> ';
?>

<a href="<?php echo $permalink ?>">
    <div id="tt-list" class="row">
        <div id="<?php echo the_title() ?>" class="col-xs-12">
            <i class="fa fa-external-link-square pull-left"></i><h2><?php echo the_title(); ?></h2>
        </div>
    </div>
</a>
