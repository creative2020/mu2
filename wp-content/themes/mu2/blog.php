<?php
/*
 * Template Name: Blog
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-9" style="padding-top: 2rem;">
        <main>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </main>
    </div>
    <div class="col-xs-12 col-sm-3" style="padding-top: 2rem;">
        <?php dynamic_sidebar('tt-sidebar-post-sidebar'); ?>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>
