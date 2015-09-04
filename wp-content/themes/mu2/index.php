<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main>

<div class="row">
    <div class="col-xs-12">
        <h1 style="text-align: center;"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>

</main>

<?php endwhile; ?>

<?php get_footer(); ?>
