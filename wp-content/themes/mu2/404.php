<?php
/**
 * The template for displaying 404 pages (not found)
*/

get_header(); ?>

<div id="page" class="row">
    <div class="visible-xs-block">
        <?php get_template_part( 'section', 'logo' ); ?>
    </div>
    
    <div class="col-xs-12"> <!-- col RIGHT -->
        <div id="page-header" class="row">
            <div class="col-xs-12 col-sm-8"> 
                <h1>404 - Sorry, page not found</h1>
            </div>
            <div class="hidden-xs col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><i class="fa fa-question-circle pull-right" style="margin-top:0.5em;font-size:3.5em;color:#79A99C;"></i></div>
            </div>
        </div>
    
      
<div class="row"> <!--row-->
    <div class="section clearfix">
        
<!--
        <div class="col-md-10 col-md-offset-1">
            <h2>Maybe try a search below</h2>
            <?php echo do_shortcode('[tt_search]'); ?>
            <h3>Or contact us here, we would love to help you.</h3>
            
            <?php echo do_shortcode('[tt_rule]'); ?>

            <h4>Support requests please visit the <a class="btn btn-danger btn-md" href="/support">support page</a></h4>

            <?php echo do_shortcode('[tt_rule]'); ?>

            <h4>All other requests please fill out the following form</h4>

            <?php echo do_shortcode('[gravityform id="4" name="Contact" title="false" description="false"]'); ?>

            <?php echo do_shortcode('[tt_rule]'); ?>
            
        </div>
-->
    </div>
</div> <!--row-->

</div> <!-- col RIGHT -->
    
    
    
    <div id="page-sidebar" class="col-xs-12 col-sm-3 col-sm-pull-9"> <!-- sidebar col left-->
        
    <div class="hidden-xs">
        <?php get_template_part( 'section', 'logo' ); ?>
    </div>
        <?php get_template_part( 'sidebar', 'main' ); ?>
            
    </div> <!-- Sidebar col LEFT -->


</div><!--page row-->


<?php get_footer(); ?>
