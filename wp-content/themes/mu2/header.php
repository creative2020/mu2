<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        <?php $setting = get_theme_mod('content-max-width'); if(!empty($setting)) { ?>
            var content_width = <?php echo $setting; ?>;
        <?php } ?>
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container-fluid">

<header>

<?php get_template_part('section', 'header-logo'); ?>

<?php get_template_part('section', 'navbar'); ?>

</header>
