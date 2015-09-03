<?php get_header(); ?>

<main>

<div class="row">
<?php 
    echo do_shortcode("[metaslider id=23]"); 
?>
    <!--<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/header.jpg" />-->
</div>

<div class="row home-headlines">
    <div class="col-xs-6 col-sm-3">
        <p class="head">Section Headline</p>
        <div class="content">
            <p class="headsub">Secondary Headline</p>
            <p>test</p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Section Headline</p>
        <div class="content">
            <p class="headsub">Secondary Headline</p>
            <p>test</p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Section Headline</p>
        <div class="content">
            <p class="headsub">Secondary Headline</p>
            <p>test</p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Newsletter Group</p>
        <div class="content">
            <p class="headsub">Secondary Headline</p>
            <p>test</p>
        </div>
    </div>
</div>

<div class="row" id="tt-sidebar-home-row2">
    <?php dynamic_sidebar('tt-sidebar-home-row2'); ?>
</div>

<div class="row" id="tt-sidebar-home-row3">
    <?php dynamic_sidebar('tt-sidebar-home-row3'); ?>
</div>

<div class="row" id="tt-sidebar-home-row4">
    <?php dynamic_sidebar('tt-sidebar-home-row4'); ?>
</div>


<?php //dynamic_sidebar('tt-sidebar-home-content'); ?>

</main>

<?php get_footer(); ?>
