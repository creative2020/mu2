<?php get_header(); ?>

<?php
    $category = get_the_category();
    $cat_name = $category[0]->category_nicename;
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-9" style="padding-top: 2rem;">
        <main>
            <?php
	            //check for custom content style    
	            if ( in_category( 'testimonial' ) ) {
	                    get_template_part( 'content', 'testimonial' );
	                }
	            else if ( in_category( 'features' ) ) {
	                    get_template_part( 'content', 'features' );
	                }
	            else if ( in_category( 'people' ) ) {
	                    get_template_part( 'content', 'people' );
	                }
	
	            else {
	                    get_template_part( 'content', 'norm' );
	
	                    }
			?>
        </main>
    </div>
    <div class="col-xs-12 col-sm-3" style="padding-top: 2rem;">
        <?php dynamic_sidebar('tt-sidebar-post-sidebar'); ?>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer() ?>