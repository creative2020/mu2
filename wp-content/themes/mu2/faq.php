<?php /* Template Name: FAQ */ ?>

<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-9" style="padding-top: 2rem;">
        <main>
            <?php get_template_part('section', 'faq'); ?>
        </main>
    </div>
    <div class="col-xs-12 col-sm-3" style="padding-top: 2rem;">
        <?php dynamic_sidebar('tt-sidebar-post-sidebar'); ?>
    </div>
</div>

<?php get_footer(); ?>
