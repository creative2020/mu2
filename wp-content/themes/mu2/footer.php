<footer id="footer">

<div class="row" id="tt-sidebar-home-row3">
    <?php get_template_part('section', 'row3'); ?>
</div>

<div class="row" id="tt-sidebar-home-row4">
    <?php dynamic_sidebar('tt-sidebar-home-row4'); ?>
</div>

<?php
    dynamic_sidebar('tt-sidebar-footer-c');

    dynamic_sidebar('tt-sidebar-footer-b');

    get_template_part('section', 'footer-contact');
?>

    <div id="footer-bloginfo" class="row">
        <span id="footer-bloginfo-name">
            &copy;<?php echo date('Y'); ?>
            <?php echo bloginfo('name'); ?>
        </span>
        <?php echo bloginfo('description'); ?>
    </div>

</footer>

</div><!-- /.container -->

<?php wp_footer(); ?>

</body>
</html>
