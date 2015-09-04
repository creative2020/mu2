<div class="row" id="logo-row">
    <div class="col-xs-12 col-sm-5 logo-col">
        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
    </div>
    <div class="col-xs-12 col-sm-1">
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="row">
            <div class="col-xs-12">
                <p style="background-color: #003556; font-size: 200%; color: #c79f27; text-align: center;">LEADERBOARD</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-xs-6 col-xs-offset-4">
                <p style="text-align: right; font-size: 200%; font-family: oswald; color: #003556;">The <span style="color: #8E734E;">GOLD Standard</span> in Body Composition</p>
            </div>
        </div>
    </div>
</div>

<?php

$i = get_theme_mod( 'header-img' );
if ( ! empty( $i ) ) {
    ?><img class="center-block" src="<?php echo $i; ?>"><?php
}
