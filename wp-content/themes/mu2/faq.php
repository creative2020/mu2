<?php /* Template Name: FAQ */ ?>

<?php
get_header();
query_posts( [ 'posts_per_page' => -1, 'post_type' => 'faq', 'orderby' => 'title', 'order' => 'ASC' ] );
?>

<main>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <div class="col-xs-2">
                <h3 style="text-align: right;">Q:</h3>
            </div>
            <div class="col-xs-10">
                <h3><?php the_title(); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2">
                <h3 style="text-align: right; margin-top: initial;">A:</h3>
            </div>
            <div class="col-xs-10">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
