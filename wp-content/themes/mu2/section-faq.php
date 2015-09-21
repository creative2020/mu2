<?php /* Template Name: FAQ */ ?>

<?php
query_posts( [ 'posts_per_page' => -1, 'post_type' => 'faq', 'orderby' => 'title', 'order' => 'ASC' ] );

$post_seq_num = 0;
while ( have_posts() ) : the_post();
    $post_seq_num++;
    $answer_id = 'faq_' . $post_seq_num;
?>

<div class="faq-button" data-toggle="collapse" data-target="#<?php echo $answer_id; ?>">
    <!--<div class="col-xs-12">-->
        <h3><?php the_title(); ?></h3>
    <!--</div>-->
</div>
<div id="<?php echo $answer_id; ?>" class="collapse">
    <!--<div class="col-xs-12">-->
        <?php the_content(); ?>
    <!--</div>-->
</div>

<?php endwhile; ?>
