<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="row">
    <div id="callout" class="col-sm-12">
        <h2 class="hp-message">Coming Soon to a fitness club, company or athletic event near you…</h2>
    </div>
</div> <!--row-->

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h4 class="text-center">A mobile fitness testing unit using the world famous Bod Pod The Gold Standard in Body Composition Measurement</p>

        <h3 class="text-center">Test Results tell you…</h3>

        <h3 class="text-center">Your body fat percentage • Your muscle mass percentage</h3> 
        <h3 class="text-center">Your base metabolic rate to help you plan your daily caloric intake</h3>

            
    <!--show form-->    
<p class="text-center">        
<button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Contact us TODAY
</button>
    </p>
        
<div class="collapse" id="collapseExample">
  <div class="well col-sm-8 col-sm-offset-2">
      <h3>Tell us just a little about yourself.</h3>
    <?php echo do_shortcode('[gravityform id="1" name="Contact" title="false" description="false"]'); ?>
  </div>
</div>
<!--show form-->
        
        <div class="collapse" id="thanks">
  <div class="well col-sm-8 col-sm-offset-2">
      <h3>Thank You</h3>
  </div>
</div>
        
        <h2 class="col-sm-12 text-center">For pricing and to schedule a day of testing. We come to you!</h2>
</div> <!--row-->

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
