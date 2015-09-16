<footer id="footer">

<div class="row" id="tt-sidebar-home-row3">
    <?php get_template_part('section', 'row3'); ?>
</div>

<div class="row" id="tt-sidebar-home-row4">
		<div class="col-sm-3">
			<?php echo do_shortcode('[tt_img id="58" link="#" responsive=true]'); ?>
		</div>
		<div class="col-sm-3">
			<?php echo do_shortcode('[tt_img id="57" link="#" responsive=true]'); ?>
		</div>
		<div id="review-list" class="col-sm-3">
			<h2>Review</h2>
			<?php echo do_shortcode('[tt_posts limit="5" cat="-7" cat_name="research" layout="list-noimg"]'); ?>
			<a href="/category/research/"><p>View all</p></a>
		</div>
		<div id="review-list" class="col-sm-3">
			<h2>Research</h2>
			<?php echo do_shortcode('[tt_posts limit="5" cat="-7" cat_name="research" layout="list-noimg"]'); ?>
			<a href="/category/research/"><p>View all</p></a>
		</div>
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
