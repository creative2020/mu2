<?php get_header(); ?>

<main>

<div class="row main-slider-row">
<?php 
    echo do_shortcode("[metaslider id=23]"); 
?>
    <!--<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/header.jpg" />-->
</div>

<div class="row home-headlines">
    <div class="col-xs-6 col-sm-3">
        <p class="head">News</p>
        <div class="content">
            <p class="headsub">Muscle and BodPod articles:</p>
            <?php echo do_shortcode('[tt_posts limit="3" cat="-7" cat_name="" layout="list"]'); ?>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Next Event Location</p>
        <div class="content">
            <p class="headsub">Come check us out.</p>
            <?php echo do_shortcode('[tt_posts limit="1" cat_name="event" layout="list-event"]'); ?>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Videos</p>
        <div class="content">
            <p class="headsub">Watch more about the BodPod</p>
            <?php echo do_shortcode('[tt_posts limit="1" cat_name="video" layout="list-video"]'); ?>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3">
        <p class="head">Newsletter Signup</p>
        <div class="content">
            <p class="headsub">Muscle Matters 1x per month</p>
            <div class="nl-form"><?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="88"]'); ?></div>
            <div class="nl-bg">
	            <?php echo do_shortcode('[tt_img id="68"]'); ?>
            </div>
        </div>
    </div>
</div>

<div class="row" id="tt-sidebar-home-row2">
    <?php dynamic_sidebar('tt-sidebar-home-row2'); ?>
</div>


<?php //dynamic_sidebar('tt-sidebar-home-content'); ?>

</main>

<?php get_footer(); ?>
