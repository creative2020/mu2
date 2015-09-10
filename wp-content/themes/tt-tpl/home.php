<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="row">
    <div id="callout" class="col-sm-10 col-sm-offset-1 flush">
        <h3 class="hp-message">Callout home page message goes here.</h3>
    </div>
</div> <!--row-->

<div id="slider-wrap" class="row">
    <div id="slider" class="col-sm-10 col-sm-offset-1 flush">
        
        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider-fpo.png"/>
	</div>
</div> <!--row-->

<div class="row">
    <div id="quicklink-wrap" class="col-sm-10 col-sm-offset-1">
        <div class="row">
            
            <a href="#">
                
                <div class="quicklink col-sm-4">
                    
                    <i class="now fa fa-calendar-o"></i><i class="go fa fa-external-link"></i>
                    <h2>Heading one</h2>
                    <p class="bucket-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                </div>
            </a>
            <a href="#">
                <div class="quicklink col-sm-4">
                    <i class="now fa fa-bullhorn"></i><i class="go fa fa-external-link"></i>
                    <h2>Heading two</h2>
                    <p class="bucket-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                
                </div>
            </a>
            <a href="#">
                <div class="quicklink col-sm-4">
                    <i class="now fa fa-cloud"></i><i class="go fa fa-external-link"></i>
                    <h2>Heading three</h2>
                    <p class="bucket-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                
                </div>
            </a>
    </div>
    </div>



</div>


<div class="row">
    <div id="main" class="col-sm-6 col-sm-offset-1">
        <div id="content" class="row col-sm-12">
            <?php echo do_shortcode('[tt_posts limit="3" cat_name="home"]'); ?>
        </div>
        </div>    
   
        <div id="sidebar" class="col-xs-12 col-sm-4">
            <?php dynamic_sidebar( 'tt-sidebar' ); ?>
        </div>
        
    </div><!--row-->

<div class="row">
    <div id="section-name" class="row col-sm-10 col-sm-offset-1">
        <div class="col-xs-12 col-sm-2  col-sm-offset-1">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
        </div>    
        <div class="col-xs-12 col-sm-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
        </div>
        <div class="col-xs-12 col-sm-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
        </div>
        <div class="col-xs-12 col-sm-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
        </div>
        <div class="col-xs-12 col-sm-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
        </div>
      </div>  
</div><!--row-->




  <?php get_footer() ?>
