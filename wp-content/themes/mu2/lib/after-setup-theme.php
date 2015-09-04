<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
register_nav_menu( 'main', 'Main' );
register_nav_menu( 'secondary', 'Secondary' );
add_image_size( 'hard512', 512, 512, true );
add_theme_support( 'post-formats', [ 'link', 'video' ] );
