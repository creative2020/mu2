<?php
/*
Template Name: Page
*/
?>
<?php get_header(); ?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-12">
            <h1 class="text-center"><?php the_title(); ?></h1>
          </div>
    </div>     
</div> <!--row-->

<div class="row">  
<div id="page-content" class="col-sm-12">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    <?php endwhile; endif; ?>
  </div>
      
  
  </div>

<div class="row">
    <div class="section-1 col-sm-12">
        <div class="col-sm-10 col-sm-offset-1">
                
                <p class="text-center">Gyms • Fitness Clubs • Cross Training Clubs • Athletic Clubs • Athletic Events • Spas • Weight Loss Programs</p>

                <p class="text-center">Corporate Health and Wellness Programs • High School or College Athletic Programs • Physique, Fitness, Body Building Shows and Competitions • Government Employee Programs: Police, Fire and other professionals with physically demanding jobs</p>

                
        </div>
    </div>
</div>


<div class="row">
    
</div><!--row-->




  <?php get_footer() ?>
