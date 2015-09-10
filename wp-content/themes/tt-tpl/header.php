<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<title>
<?php wp_title(); ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<?php wp_head(); ?>
</head>
<body>
<div class="container-fluid maxpg">

<div class="row">
    <div id="top" class="col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="logo col-xs-12 col-sm-6">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-fpo.png" class="" width="100%">
            <a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>"></a>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div id="social" class="col-xs-12 col-sm-12 hidden-xs">
                <div class="google pull-right"><a href="#" title="google +" target="_blank"></a></div>
                <div class="facebook pull-right"><a href="#" title="Facebook" target="_blank"></a></div>
                <div class="in pull-right"><a href="#" title="Linked In" target="_blank"></a></div>
                <div class="twitter pull-right"><a href="#" title="Twitter" target="_blank"></a></div>
            </div>
            <div class="phone col-xs-12 hidden-xs"><i class="fa fa-phone"></i> 123-456-7890</div>
            <h2 class="phone-m col-xs-12 visible-xs-block text-center"><i class="fa fa-phone"></i> 123-456-7890</h2>
        </div>
    </div>
</div>         
    
<div class="row">
    <div id="navbar" class="col-sm-10 col-sm-offset-1">
        
                        
                       
						<?php wp_nav_menu( array(
                'menu'              => 'navigation',
                'theme_location'    => 'tt-main',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            ); ?>
            
                        
    </div>
</div>
    
<!--    nav-->

<div class="row">
					
					</div>
    
    
    
    
<!--header-->
