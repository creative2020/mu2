<?php
namespace com_2020creative;

class Post_Widget extends \WP_Widget {

	function __construct() {
		parent::__construct(
			'post_widget', // Base ID
			__( '2020 Post', 'text_domain' ), // Name
			array( 'description' => __( 'Displays the title and excerpt of a single post, the most recent from the specified type and category.', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
        $q = [ 'numberposts' => 1, 'orderby' => 'rand' ];
        if ( !empty( $instance['type'] ) )
            $q['post_type'] = $instance['type'];
        if ( !empty( $instance['category'] ) )
            $q['category'] = $instance['category'];

        $p = get_posts($q)[0];
        $excerpt = tt_get_excerpt($p);
        $link = get_permalink($p->ID);

		echo $args['before_widget'];

		echo '<div class="tt-post">';

		echo '<span class="title">' . $p->post_title . '</span><br>';

        echo $excerpt;

		echo '</div>';

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Post Type:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'type' ); ?>"
            name="<?php echo $this->get_field_name( 'type' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['type'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>"
            name="<?php echo $this->get_field_name( 'category' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['category'] ); ?>">
		</p>
		<?php 
	}

} // class Post_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\Post_Widget' );
});


class Text_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'text_widget', // Base ID
			__( '2020 Text', 'text_domain' ), // Name
			array( 'description' => __( 'Text widget with a heading, three content lines, and a linkable footer', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		echo '<span class="header">' . $instance['title'] . '</span><br>';

		echo $instance['line1'] . '<br>';
		echo $instance['line2'] . '<br>';
		echo $instance['line3'] . '<br>';

		echo '<span class="footer">';
        if ( ! empty($instance['footer-ref'] ) ) {
            echo '<a href="' . $instance['footer-ref'] . '">';
        }
		echo $instance['footer'];
        if ( ! empty($instance['footer-ref'] ) ) {
            echo '</a>';
        }
		echo '</span><br>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Heading:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
            name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
		<label><?php _e( 'Details:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'line1' ); ?>"
            name="<?php echo $this->get_field_name( 'line1' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['line1'] ); ?>"><br>
		<input class="widefat" id="<?php echo $this->get_field_id( 'line2' ); ?>"
            name="<?php echo $this->get_field_name( 'line2' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['line2'] ); ?>"><br>
		<input class="widefat" id="<?php echo $this->get_field_id( 'line3' ); ?>"
            name="<?php echo $this->get_field_name( 'line3' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['line3'] ); ?>"><br>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'footer' ); ?>"><?php _e( 'Footer:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'footer' ); ?>"
            name="<?php echo $this->get_field_name( 'footer' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['footer'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'footer-ref' ); ?>"><?php _e( 'Footer Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'footer-ref' ); ?>"
            name="<?php echo $this->get_field_name( 'footer-ref' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['footer-ref'] ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['line1'] = strip_tags( $new_instance['line1'] );
		$instance['line2'] = strip_tags( $new_instance['line2'] );
		$instance['line3'] = $new_instance['line3'];
		$instance['footer'] = strip_tags( $new_instance['footer'] );
		$instance['footer-ref'] = strip_tags( $new_instance['footer-ref'] );

		return $instance;
	}

} // class Text_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\Text_Widget' );
});

class NewsBlog_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'newsblog_widget', // Base ID
			__( '2020 News/Blog', 'text_domain' ), // Name
			array( 'description' => __( 'News and Blog widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        $rowcount = $instance['rowcount'];
        $news = get_posts([
            'numberposts' => $rowcount * 2,
            'category_name' => $instance['category'],
            'post_type' => 'news',
        ]);
        $blogs = get_posts([
            'numberposts' => $rowcount,
            'category_name' => $instance['category'],
            'post_type' => 'post',
        ]);
		echo $args['before_widget'];
        ?>
        <div class="row tt-newsblog-widget">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="row">
                    <div class="col-sm-8">
                        <span class="header">News</span>
                        <div class="row">
                            <div class="col-sm-5">
                                <?php
                                    $i = 0;
                                    foreach ($news as $p) {
                                        if ($i > 0 && $i % $rowcount == 0)
                                            echo '</div><div class="col-sm-5">';
                                        $datestr = date_format(date_create($p->post_date), 'm.d.y');
                                        $link = get_permalink($p->ID);
                                        ?>
                                            <time><?php echo $datestr; ?></time>
                                            <a href="<?php echo $link; ?>"><?php echo $p->post_title; ?></a>
                                            <br>
                                        <?php
                                        $i++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div><!--/.col-sm-8-->
                    <div class="col-sm-4">
                        <span class="header">Blog</span><br>
                        <?php
                            foreach ($blogs as $p) {
                                $datestr = date_format(date_create($p->post_date), 'm.d.y');
                                $link = get_permalink($p->ID);
                                ?>
                                    <time><?php echo $datestr; ?></time>
                                    <a href="<?php echo $link; ?>"><?php echo $p->post_title; ?></a>
                                    <br>
                                <?php
                            }
                        ?>
                    </div><!--/.col-sm-4-->
                </div>
            </div>
        </div>
        <?php

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'rowcount' ); ?>"><?php _e( 'Number of Rows:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'rowcount' ); ?>"
            name="<?php echo $this->get_field_name( 'rowcount' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['rowcount'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>"
            name="<?php echo $this->get_field_name( 'category' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['category'] ); ?>">
		</p>
		<?php 
	}
} // class NavBlog_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\NewsBlog_Widget' );
});

class Testimonial_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'testimonial_widget', // Base ID
			__( '2020 Testimonial', 'text_domain' ), // Name
			array( 'description' => __( 'Testimonial widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        $testimonials = get_posts([
            'numberposts' => 1,
            'post_type' => $instance['post-type'],
            'orderby' => 'rand',
        ]);
        $p = $testimonials[0];
        $excerpt = tt_get_excerpt($p);
        $link = get_permalink($p->ID);
        $fi_url = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), 'hard512' )[0];
        $display_style = isset($instance['display-style']) ? $instance['display-style'] : 'wide';
		echo $args['before_widget'];
        ?>
        <?php if($display_style=='wide') { ?>
        <div class="row tt-headline-widget" style="background-color: <?php echo $instance['background-color']; ?>">
            <div class="col-xs-1 col-xs-offset-1 symbol"><i class="fa fa-quote-left" style="color: <?php echo $instance['quote-color']; ?>;"></i></div>
            <div class="col-xs-7 content">
                <a href="<?php echo $link; ?>">
                    <span class="title"><?php echo $p->post_title; ?></span>
                    <?php echo $excerpt; ?>
                </a>
            </div>
            <div class="col-xs-2 image">
                <a href="<?php echo $link; ?>">
                    <img class="img-responsive img-circle" src="<?php echo $fi_url; ?>" />
                </a>
            </div>
        </div>
        <?php } else { ?>
        <div class="row tt-headline-widget-narrow">
            <div class="col-xs-6 col-xs-offset-3 image">
                <a href="<?php echo $link; ?>">
                    <img class="img-responsive img-circle" src="<?php echo $fi_url; ?>" />
                </a>
            </div>
            <div class="col-xs-12 content">
                <a href="<?php echo $link; ?>">
                    <span class="title"><?php echo $p->post_title; ?></span>
                    <?php //echo $excerpt; ?>
                </a>
            </div>
        </div>
        <?php } ?>
        <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'post-type' ); ?>"><?php _e( 'Post Type:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'post-type' ); ?>"
            name="<?php echo $this->get_field_name( 'post-type' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['post-type'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'background-color' ); ?>"><?php _e( 'Background Color:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'background-color' ); ?>"
            name="<?php echo $this->get_field_name( 'background-color' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['background-color'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'quote-color' ); ?>"><?php _e( 'Quote Mark Color:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'quote-color' ); ?>"
            name="<?php echo $this->get_field_name( 'quote-color' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['quote-color'] ); ?>">
		</p>
        <?php
            $display_style = isset($instance['display-style']) ? $instance['display-style'] : 'wide';
        ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'display-style' ); ?>"><?php _e( 'Display Style:' ); ?></label> 
		<input type="radio" name="<?php echo $this->get_field_name( 'display-style' ); ?>"
            value="wide" <?php if ($display_style=='wide') echo 'checked'; ?>>Wide
		<input type="radio" name="<?php echo $this->get_field_name( 'display-style' ); ?>"
            value="narrow" <?php if ($display_style=='narrow') echo 'checked'; ?>>Narrow
		</p>
		<?php 
	}
} // class Testimonial_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\Testimonial_Widget' );
});

class Headline_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'headline_widget', // Base ID
			__( '2020 Headline', 'text_domain' ), // Name
			array( 'description' => __( 'Headline widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        $testimonials = get_posts([
            'numberposts' => 1,
            'post_type' => $instance['post-type'],
            'orderby' => 'rand',
        ]);
        $p = $testimonials[0];
        $excerpt = tt_get_excerpt($p);
        $link = get_permalink($p->ID);
        $fi_url = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), 'hard512' )[0];
		echo $args['before_widget'];
        ?>
        <div class="row tt-headline-widget" style="background-color: <?php echo $instance['background-color']; ?>">
            <div class="col-xs-2 col-xs-offset-1 image">
                <a href="<?php echo $link; ?>">
                    <img class="img-responsive img-circle" src="<?php echo $fi_url; ?>" />
                </a>
            </div>
            <div class="col-xs-8 content">
                <a href="<?php echo $link; ?>">
                    <span class="title"><?php echo $p->post_title; ?></span>
                    <?php echo $excerpt; ?>
                </a>
            </div>
        </div>
        <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'post-type' ); ?>"><?php _e( 'Post Type:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'post-type' ); ?>"
            name="<?php echo $this->get_field_name( 'post-type' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['post-type'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'background-color' ); ?>"><?php _e( 'Background Color:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'background-color' ); ?>"
            name="<?php echo $this->get_field_name( 'background-color' ); ?>" type="text"
            value="<?php echo esc_attr( $instance['background-color'] ); ?>">
		</p>
		<?php 
	}
} // class Headline_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\Headline_Widget' );
});

class ThreeBox_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'threebox_widget', // Base ID
			__( '2020 Three Box', 'text_domain' ), // Name
			array( 'description' => __( 'Three general content boxes', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        ?>
        <div class="row tt-threebox-widget">
            <div class="col-sm-4"><div>
                <?php echo apply_filters('widget_text', $instance['a-content']); ?>
            </div>
            </div>
            <div class="col-sm-4 middle"><div>
                <?php echo apply_filters('widget_text', $instance['b-content']); ?>
            </div>
            </div>
            <div class="col-sm-4"><div>
                <?php echo apply_filters('widget_text', $instance['c-content']); ?>
            </div>
            </div>
        </div>
        <?php

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'a-content' ); ?>"><?php _e( 'Box A Content' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'a-content' ); ?>"
            name="<?php echo $this->get_field_name( 'a-content' ); ?>" rows="8"
            ><?php echo esc_attr( $instance['a-content'] ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'b-content' ); ?>"><?php _e( 'Box B Content' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'b-content' ); ?>"
            name="<?php echo $this->get_field_name( 'b-content' ); ?>" rows="8"
            ><?php echo esc_attr( $instance['b-content'] ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'c-content' ); ?>"><?php _e( 'Box C Content' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'c-content' ); ?>"
            name="<?php echo $this->get_field_name( 'c-content' ); ?>" rows="8"
            ><?php echo esc_attr( $instance['c-content'] ); ?></textarea>
		</p>
		<?php 
	}
} // class ThreeBox_Widget

add_action( 'widgets_init', function() {
	register_widget( 'com_2020creative\ThreeBox_Widget' );
});

