<?php /* Template Name: FAQ */ ?>

<?php
get_header();
query_posts( [ 'posts_per_page' => -1, 'post_type' => 'faq', 'orderby' => 'title', 'order' => 'ASC' ] );
?>

<main style="padding-top: 2rem; padding-bottom: 4rem;">
    <?php
        $post_seq_num = 0;
        while ( have_posts() ) : the_post();
        $post_seq_num++;
        $answer_id = 'faq_' . $post_seq_num;
    ?>
        <div class="row faq-button" data-toggle="collapse" data-target="#<?php echo $answer_id; ?>">
            <!--
            <div class="col-xs-2">
                <h3 style="text-align: right;">Q:</h3>
            </div>
            -->
            <div class="col-xs-12">
                <h3><?php the_title(); ?></h3>
            </div>
        </div>
        <div id="<?php echo $answer_id; ?>" class="row collapse">
            <!--
            <div class="col-xs-2">
                <h3 style="text-align: right; margin-top: initial;">A:</h3>
            </div>
            -->
            <div class="col-xs-12">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
