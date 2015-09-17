<?php
/*
 * Template Name: Full Width Page
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="row">
    <div class="col-xs-12">
        <main>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </main>
    </div>
    
</div>

<?php endwhile; ?>

<?php get_footer(); ?>
