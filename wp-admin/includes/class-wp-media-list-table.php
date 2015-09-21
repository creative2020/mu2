<?php
/**
 * Media Library List Table class.
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 3.1.0
 * @access private
 */
class WP_Media_List_Table extends WP_List_Table {

	private $detached;

	private $is_trash;

	/**
	 * Constructor.
	 *
	 * @since 3.1.0
	 * @access public
	 *
	 * @see WP_List_Table::__construct() for more information on default arguments.
	 *
	 * @param array $args An associative array of arguments.
	 */
	public function __construct( $args = array() ) {
		$this->detached = ( isset( $_REQUEST['attachment-filter'] ) && 'detached' === $_REQUEST['attachment-filter'] );

		$this->modes = array(
			'list' => __( 'List View' ),
			'grid' => __( 'Grid View' )
		);

		parent::__construct( array(
			'plural' => 'media',
			'screen' => isset( $args['screen'] ) ? $args['screen'] : null,
		) );
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @return bool
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	public function ajax_user_can() {
		return current_user_can('upload_files');
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @global WP_Query $wp_query
	 * @global array    $post_mime_types
	 * @global array    $avail_post_mime_types
	 * @global string   $mode
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	public function prepare_items() {
		global $wp_query, $post_mime_types, $avail_post_mime_types, $mode;

		list( $post_mime_types, $avail_post_mime_types ) = wp_edit_attachments_query( $_REQUEST );

 		$this->is_trash = isset( $_REQUEST['attachment-filter'] ) && 'trash' == $_REQUEST['attachment-filter'];

 		$mode = empty( $_REQUEST['mode'] ) ? 'list' : $_REQUEST['mode'];

		$this->set_pagination_args( array(
			'total_items' => $wp_query->found_posts,
			'total_pages' => $wp_query->max_num_pages,
			'per_page' => $wp_query->query_vars['posts_per_page'],
		) );
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @global wpdb  $wpdb
	 * @global array $post_mime_types
	 * @global array $avail_post_mime_types
	 * @return array
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	protected function get_views() {
		global $wpdb, $post_mime_types, $avail_post_mime_types;

		$type_links = array();
		$_num_posts = (array) wp_count_attachments();
		$_total_posts = array_sum($_num_posts) - $_num_posts['trash'];
		$total_orphans = $wpdb->get_var( "SELECT COUNT( * ) FROM $wpdb->posts WHERE post_type = 'attachment' AND post_status != 'trash' AND post_parent < 1" );
		$matches = wp_match_mime_types(array_keys($post_mime_types), array_keys($_num_posts));
<<<<<<< HEAD
		foreach ( $matches as $type => $reals )
			foreach ( $reals as $real )
				$num_posts[$type] = ( isset( $num_posts[$type] ) ) ? $num_posts[$type] + $_num_posts[$real] : $_num_posts[$real];

=======
		$num_posts = array();
		foreach ( $matches as $type => $reals ) {
			foreach ( $reals as $real ) {
				$num_posts[$type] = ( isset( $num_posts[$type] ) ) ? $num_posts[$type] + $_num_posts[$real] : $_num_posts[$real];
			}
		}
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		$selected = empty( $_GET['attachment-filter'] ) ? ' selected="selected"' : '';
		$type_links['all'] = "<option value=''$selected>" . sprintf( _nx( 'All (%s)', 'All (%s)', $_total_posts, 'uploaded files' ), number_format_i18n( $_total_posts ) ) . '</option>';
		foreach ( $post_mime_types as $mime_type => $label ) {
			if ( !wp_match_mime_types($mime_type, $avail_post_mime_types) )
				continue;

			$selected = '';
			if ( !empty( $_GET['attachment-filter'] ) && strpos( $_GET['attachment-filter'], 'post_mime_type:' ) === 0 && wp_match_mime_types( $mime_type, str_replace( 'post_mime_type:', '', $_GET['attachment-filter'] ) ) )
				$selected = ' selected="selected"';
			if ( !empty( $num_posts[$mime_type] ) )
				$type_links[$mime_type] = '<option value="post_mime_type:' . esc_attr( $mime_type ) . '"' . $selected . '>' . sprintf( translate_nooped_plural( $label[2], $num_posts[$mime_type] ), number_format_i18n( $num_posts[$mime_type] )) . '</option>';
		}
		$type_links['detached'] = '<option value="detached"' . ( $this->detached ? ' selected="selected"' : '' ) . '>' . sprintf( _nx( 'Unattached (%s)', 'Unattached (%s)', $total_orphans, 'detached files' ), number_format_i18n( $total_orphans ) ) . '</option>';

		if ( !empty($_num_posts['trash']) )
			$type_links['trash'] = '<option value="trash"' . ( (isset($_GET['attachment-filter']) && $_GET['attachment-filter'] == 'trash' ) ? ' selected="selected"' : '') . '>' . sprintf( _nx( 'Trash (%s)', 'Trash (%s)', $_num_posts['trash'], 'uploaded files' ), number_format_i18n( $_num_posts['trash'] ) ) . '</option>';

		return $type_links;
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @return array
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	protected function get_bulk_actions() {
		$actions = array();
		if ( MEDIA_TRASH ) {
			if ( $this->is_trash ) {
				$actions['untrash'] = __( 'Restore' );
				$actions['delete'] = __( 'Delete Permanently' );
			} else {
				$actions['trash'] = __( 'Trash' );
			}
		} else {
			$actions['delete'] = __( 'Delete Permanently' );
		}

		if ( $this->detached )
			$actions['attach'] = __( 'Attach to a post' );

		return $actions;
	}

	/**
	 * @param string $which
	 */
	protected function extra_tablenav( $which ) {
		if ( 'bar' !== $which ) {
			return;
		}
?>
		<div class="actions">
<?php
		if ( ! is_singular() ) {
			if ( ! $this->is_trash ) {
				$this->months_dropdown( 'attachment' );
			}

			/** This action is documented in wp-admin/includes/class-wp-posts-list-table.php */
			do_action( 'restrict_manage_posts' );
			submit_button( __( 'Filter' ), 'button', 'filter_action', false, array( 'id' => 'post-query-submit' ) );
		}

		if ( $this->is_trash && current_user_can( 'edit_others_posts' ) ) {
			submit_button( __( 'Empty Trash' ), 'apply', 'delete_all', false );
		} ?>
		</div>
<?php
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @return string
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	public function current_action() {
		if ( isset( $_REQUEST['found_post_id'] ) && isset( $_REQUEST['media'] ) )
			return 'attach';

		if ( isset( $_REQUEST['parent_post_id'] ) && isset( $_REQUEST['media'] ) )
			return 'detach';

		if ( isset( $_REQUEST['delete_all'] ) || isset( $_REQUEST['delete_all2'] ) )
			return 'delete_all';

		return parent::current_action();
	}

<<<<<<< HEAD
=======
	/**
	 *
	 * @return bool
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	public function has_items() {
		return have_posts();
	}

<<<<<<< HEAD
=======
	/**
	 * @access public
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	public function no_items() {
		_e( 'No media attachments found.' );
	}

	/**
	 * Override parent views so we can use the filter bar display.
<<<<<<< HEAD
=======
	 *
	 * @global string $mode
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	 */
	public function views() {
		global $mode;

		$views = $this->get_views();
?>
<div class="wp-filter">
	<div class="filter-items">
		<?php $this->view_switcher( $mode ); ?>

		<label for="attachment-filter" class="screen-reader-text"><?php _e( 'Filter by type' ); ?></label>
		<select class="attachment-filters" name="attachment-filter" id="attachment-filter">
			<?php
			if ( ! empty( $views ) ) {
				foreach ( $views as $class => $view ) {
					echo "\t$view\n";
				}
			}
			?>
		</select>

<?php
		$this->extra_tablenav( 'bar' );

		/** This filter is documented in wp-admin/inclues/class-wp-list-table.php */
		$views = apply_filters( "views_{$this->screen->id}", array() );

		// Back compat for pre-4.0 view links.
		if ( ! empty( $views ) ) {
			echo '<ul class="filter-links">';
			foreach ( $views as $class => $view ) {
				echo "<li class='$class'>$view</li>";
			}
			echo '</ul>';
		}
?>
	</div>

	<div class="search-form">
		<label for="media-search-input" class="screen-reader-text"><?php esc_html_e( 'Search Media' ); ?></label>
		<input type="search" placeholder="<?php esc_attr_e( 'Search' ) ?>" id="media-search-input" class="search" name="s" value="<?php _admin_search_query(); ?>"></div>
	</div>
	<?php
	}

<<<<<<< HEAD
	public function get_columns() {
		$posts_columns = array();
		$posts_columns['cb'] = '<input type="checkbox" />';
		$posts_columns['icon'] = '';
=======
	/**
	 *
	 * @return array
	 */
	public function get_columns() {
		$posts_columns = array();
		$posts_columns['cb'] = '<input type="checkbox" />';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		/* translators: column name */
		$posts_columns['title'] = _x( 'File', 'column name' );
		$posts_columns['author'] = __( 'Author' );

		$taxonomies = get_taxonomies_for_attachments( 'objects' );
		$taxonomies = wp_filter_object_list( $taxonomies, array( 'show_admin_column' => true ), 'and', 'name' );

		/**
		 * Filter the taxonomy columns for attachments in the Media list table.
		 *
		 * @since 3.5.0
		 *
		 * @param array  $taxonomies An array of registered taxonomies to show for attachments.
		 * @param string $post_type  The post type. Default 'attachment'.
		 */
		$taxonomies = apply_filters( 'manage_taxonomies_for_attachment_columns', $taxonomies, 'attachment' );
		$taxonomies = array_filter( $taxonomies, 'taxonomy_exists' );

		foreach ( $taxonomies as $taxonomy ) {
			if ( 'category' == $taxonomy )
				$column_key = 'categories';
			elseif ( 'post_tag' == $taxonomy )
				$column_key = 'tags';
			else
				$column_key = 'taxonomy-' . $taxonomy;

			$posts_columns[ $column_key ] = get_taxonomy( $taxonomy )->labels->name;
		}

		/* translators: column name */
		if ( !$this->detached ) {
			$posts_columns['parent'] = _x( 'Uploaded to', 'column name' );
			if ( post_type_supports( 'attachment', 'comments' ) )
<<<<<<< HEAD
				$posts_columns['comments'] = '<span class="vers"><span title="' . esc_attr__( 'Comments' ) . '" class="comment-grey-bubble"></span></span>';
=======
				$posts_columns['comments'] = '<span class="vers comment-grey-bubble" title="' . esc_attr__( 'Comments' ) . '"><span class="screen-reader-text">' . __( 'Comments' ) . '</span></span>';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
		/* translators: column name */
		$posts_columns['date'] = _x( 'Date', 'column name' );
		/**
		 * Filter the Media list table columns.
		 *
		 * @since 2.5.0
		 *
		 * @param array $posts_columns An array of columns displayed in the Media list table.
		 * @param bool  $detached      Whether the list table contains media not attached
		 *                             to any posts. Default true.
		 */
<<<<<<< HEAD
		$posts_columns = apply_filters( 'manage_media_columns', $posts_columns, $this->detached );

		return $posts_columns;
	}

=======
		return apply_filters( 'manage_media_columns', $posts_columns, $this->detached );
	}

	/**
	 *
	 * @return array
	 */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	protected function get_sortable_columns() {
		return array(
			'title'    => 'title',
			'author'   => 'author',
			'parent'   => 'parent',
			'comments' => 'comment_count',
			'date'     => array( 'date', true ),
		);
	}

<<<<<<< HEAD
	public function display_rows() {
		global $post;

		add_filter( 'the_title','esc_html' );

		while ( have_posts() ) : the_post();
			$user_can_edit = current_user_can( 'edit_post', $post->ID );

			if ( $this->is_trash && $post->post_status != 'trash'
			||  !$this->is_trash && $post->post_status == 'trash' )
				continue;

			$post_owner = ( get_current_user_id() == $post->post_author ) ? 'self' : 'other';
			$att_title = _draft_or_post_title();
?>
	<tr id="post-<?php echo $post->ID; ?>" class="<?php echo trim( ' author-' . $post_owner . ' status-' . $post->post_status ); ?>">
<?php

list( $columns, $hidden ) = $this->get_column_info();
foreach ( $columns as $column_name => $column_display_name ) {
	$class = "class='$column_name column-$column_name'";

	$style = '';
	if ( in_array( $column_name, $hidden ) )
		$style = ' style="display:none;"';

	$attributes = $class . $style;

	switch ( $column_name ) {

	case 'cb':
?>
		<th scope="row" class="check-column">
			<?php if ( $user_can_edit ) { ?>
				<label class="screen-reader-text" for="cb-select-<?php the_ID(); ?>"><?php echo sprintf( __( 'Select %s' ), $att_title );?></label>
				<input type="checkbox" name="media[]" id="cb-select-<?php the_ID(); ?>" value="<?php the_ID(); ?>" />
			<?php } ?>
		</th>
<?php
		break;

	case 'icon':
		list( $mime ) = explode( '/', $post->post_mime_type );
		$attributes = 'class="column-icon media-icon ' . $mime . '-icon"' . $style;
?>
		<td <?php echo $attributes ?>><?php
			if ( $thumb = wp_get_attachment_image( $post->ID, array( 80, 60 ), true ) ) {
				if ( $this->is_trash || ! $user_can_edit ) {
					echo $thumb;
				} else {
?>
				<a href="<?php echo get_edit_post_link( $post->ID ); ?>" title="<?php echo esc_attr( sprintf( __( 'Edit &#8220;%s&#8221;' ), $att_title ) ); ?>">
					<?php echo $thumb; ?>
				</a>

<?php			}
			}
?>
		</td>
<?php
		break;

	case 'title':
?>
		<td <?php echo $attributes ?>><strong>
			<?php if ( $this->is_trash || ! $user_can_edit ) {
				echo $att_title;
			} else { ?>
			<a href="<?php echo get_edit_post_link( $post->ID ); ?>"
				title="<?php echo esc_attr( sprintf( __( 'Edit &#8220;%s&#8221;' ), $att_title ) ); ?>">
				<?php echo $att_title; ?></a>
			<?php };
			_media_states( $post ); ?></strong>
			<p class="filename"><?php echo wp_basename( $post->guid ); ?></p>
<?php
		echo $this->row_actions( $this->_get_row_actions( $post, $att_title ) );
?>
		</td>
<?php
		break;

	case 'author':
?>
		<td <?php echo $attributes ?>><?php
			printf( '<a href="%s">%s</a>',
				esc_url( add_query_arg( array( 'author' => get_the_author_meta('ID') ), 'upload.php' ) ),
				get_the_author()
			);
		?></td>
<?php
		break;

	case 'desc':
?>
		<td <?php echo $attributes ?>><?php echo has_excerpt() ? $post->post_excerpt : ''; ?></td>
<?php
		break;

	case 'date':
=======
	/**
	 * Handles the checkbox column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_cb( $post ) {
		if ( current_user_can( 'edit_post', $post->ID ) ) { ?>
			<label class="screen-reader-text" for="cb-select-<?php echo $post->ID; ?>"><?php
				echo sprintf( __( 'Select %s' ), _draft_or_post_title() );
			?></label>
			<input type="checkbox" name="media[]" id="cb-select-<?php echo $post->ID; ?>" value="<?php echo $post->ID; ?>" />
		<?php }
	}

	/**
	 * Handles the title column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_title( $post ) {
		list( $mime ) = explode( '/', $post->post_mime_type );

		$title = _draft_or_post_title();
		$thumb = wp_get_attachment_image( $post->ID, array( 60, 60 ), true, array( 'alt' => '' ) );
		$link_start = $link_end = '';

		if ( current_user_can( 'edit_post', $post->ID ) && ! $this->is_trash ) {
			$link_start = '<a href="' . get_edit_post_link( $post->ID ) . '">';
			$link_end = '</a>';
		}

		$class = $thumb ? ' class="has-media-icon"' : '';

		?>
		<strong<?php echo $class; ?>>
			<?php echo $link_start; ?>
				<?php if ( $thumb ) : ?>
				<span class="media-icon <?php echo sanitize_html_class( $mime . '-icon' ); ?>"><?php echo $thumb; ?></span>
				<?php endif; ?>

				<span aria-hidden="true"><?php echo $title; ?></span>
				<span class="screen-reader-text"><?php printf( __( 'Edit &#8220;%s&#8221;' ), $title ); ?></span>
			<?php echo $link_end; ?>
			<?php _media_states( $post ); ?>
		</strong>
		<p class="filename"><span class="screen-reader-text"><?php _e( 'File name:' ); ?> </span><?php echo wp_basename( $post->guid ); ?></p>
		<?php
	}

	/**
	 * Handles the author column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_author( $post ) {
		printf( '<a href="%s">%s</a>',
			esc_url( add_query_arg( array( 'author' => get_the_author_meta('ID') ), 'upload.php' ) ),
			get_the_author()
		);
	}

	/**
	 * Handles the description column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_desc( $post ) {
		echo has_excerpt() ? $post->post_excerpt : '';
	}

	/**
	 * Handles the date column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_date( $post ) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		if ( '0000-00-00 00:00:00' == $post->post_date ) {
			$h_time = __( 'Unpublished' );
		} else {
			$m_time = $post->post_date;
			$time = get_post_time( 'G', true, $post, false );
			if ( ( abs( $t_diff = time() - $time ) ) < DAY_IN_SECONDS ) {
<<<<<<< HEAD
				if ( $t_diff < 0 )
					$h_time = sprintf( __( '%s from now' ), human_time_diff( $time ) );
				else
					$h_time = sprintf( __( '%s ago' ), human_time_diff( $time ) );
=======
				if ( $t_diff < 0 ) {
					$h_time = sprintf( __( '%s from now' ), human_time_diff( $time ) );
				} else {
					$h_time = sprintf( __( '%s ago' ), human_time_diff( $time ) );
				}
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			} else {
				$h_time = mysql2date( __( 'Y/m/d' ), $m_time );
			}
		}
<<<<<<< HEAD
?>
		<td <?php echo $attributes ?>><?php echo $h_time ?></td>
<?php
		break;

	case 'parent':
		if ( $post->post_parent > 0 )
			$parent = get_post( $post->post_parent );
		else
			$parent = false;
=======

		echo $h_time;
	}

	/**
	 * Handles the parent column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_parent( $post ) {
		$user_can_edit = current_user_can( 'edit_post', $post->ID );

		if ( $post->post_parent > 0 ) {
			$parent = get_post( $post->post_parent );
		} else {
			$parent = false;
		}
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		if ( $parent ) {
			$title = _draft_or_post_title( $post->post_parent );
			$parent_type = get_post_type_object( $parent->post_type );
?>
<<<<<<< HEAD
			<td <?php echo $attributes ?>><strong>
				<?php if ( $parent_type && $parent_type->show_ui && current_user_can( 'edit_post', $post->post_parent ) ) { ?>
					<a href="<?php echo get_edit_post_link( $post->post_parent ); ?>">
						<?php echo $title ?></a><?php
				} else {
					echo $title;
				} ?></strong>,
				<?php echo get_the_time( __( 'Y/m/d' ) ); ?><br />
				<?php
				if ( $user_can_edit ):
					$detach_url = add_query_arg( array(
						'parent_post_id' => $post->post_parent,
						'media[]' => $post->ID,
						'_wpnonce' => wp_create_nonce( 'bulk-' . $this->_args['plural'] )
					), 'upload.php' ); ?>
				<a class="hide-if-no-js detach-from-parent" href="<?php echo $detach_url ?>"><?php _e( 'Detach' ); ?></a>
				<?php endif; ?>
			</td>
<?php
		} else {
?>
			<td <?php echo $attributes ?>><?php _e( '(Unattached)' ); ?><br />
=======
			<strong>
			<?php if ( $parent_type && $parent_type->show_ui && current_user_can( 'edit_post', $post->post_parent ) ) { ?>
				<a href="<?php echo get_edit_post_link( $post->post_parent ); ?>">
					<?php echo $title ?></a><?php
			} else {
				echo $title;
			} ?></strong>,
			<?php echo get_the_time( __( 'Y/m/d' ) ); ?><br />
			<?php
			if ( $user_can_edit ):
				$detach_url = add_query_arg( array(
					'parent_post_id' => $post->post_parent,
					'media[]' => $post->ID,
					'_wpnonce' => wp_create_nonce( 'bulk-' . $this->_args['plural'] )
				), 'upload.php' ); ?>
			<a class="hide-if-no-js detach-from-parent" href="<?php echo $detach_url ?>"><?php _e( 'Detach' ); ?></a>
			<?php endif;
		} else {
			_e( '(Unattached)' ); ?><br />
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			<?php if ( $user_can_edit ) { ?>
				<a class="hide-if-no-js"
					onclick="findPosts.open( 'media[]','<?php echo $post->ID ?>' ); return false;"
					href="#the-list">
					<?php _e( 'Attach' ); ?></a>
<<<<<<< HEAD
			<?php } ?></td>
<?php
		}
		break;

	case 'comments':
		$attributes = 'class="comments column-comments num"' . $style;
?>
		<td <?php echo $attributes ?>>
			<div class="post-com-count-wrapper">
<?php
		$pending_comments = get_pending_comments_num( $post->ID );

		$this->comments_bubble( $post->ID, $pending_comments );
?>
			</div>
		</td>
<?php
		break;

	default:
		if ( 'categories' == $column_name )
			$taxonomy = 'category';
		elseif ( 'tags' == $column_name )
			$taxonomy = 'post_tag';
		elseif ( 0 === strpos( $column_name, 'taxonomy-' ) )
			$taxonomy = substr( $column_name, 9 );
		else
			$taxonomy = false;

		if ( $taxonomy ) {
			echo '<td ' . $attributes . '>';
			if ( $terms = get_the_terms( $post->ID, $taxonomy ) ) {
=======
			<?php }
		}
	}

	/**
	 * Handles the comments column output.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post The current WP_Post object.
	 */
	public function column_comments( $post ) {
		echo '<div class="post-com-count-wrapper">';

		$pending_comments = get_pending_comments_num( $post->ID );
		$this->comments_bubble( $post->ID, $pending_comments );

		echo '</div>';
	}

	/**
	 * Handles output for the default column.
	 *
	 * @since 4.3.0
	 * @access public
	 *
	 * @param WP_Post $post        The current WP_Post object.
	 * @param string  $column_name Current column name.
	 */
	public function column_default( $post, $column_name ) {
		if ( 'categories' == $column_name ) {
			$taxonomy = 'category';
		} elseif ( 'tags' == $column_name ) {
			$taxonomy = 'post_tag';
		} elseif ( 0 === strpos( $column_name, 'taxonomy-' ) ) {
			$taxonomy = substr( $column_name, 9 );
		} else {
			$taxonomy = false;
		}

		if ( $taxonomy ) {
			$terms = get_the_terms( $post->ID, $taxonomy );
			if ( is_array( $terms ) ) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				$out = array();
				foreach ( $terms as $t ) {
					$posts_in_term_qv = array();
					$posts_in_term_qv['taxonomy'] = $taxonomy;
					$posts_in_term_qv['term'] = $t->slug;

					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( $posts_in_term_qv, 'upload.php' ) ),
						esc_html( sanitize_term_field( 'name', $t->name, $t->term_id, $taxonomy, 'display' ) )
					);
				}
				/* translators: used between list items, there is a space after the comma */
				echo join( __( ', ' ), $out );
			} else {
<<<<<<< HEAD
				echo '&#8212;';
			}
			echo '</td>';
			break;
		}
?>
		<td <?php echo $attributes ?>><?php
			/**
			 * Fires for each custom column in the Media list table.
			 *
			 * Custom columns are registered using the 'manage_media_columns' filter.
			 *
			 * @since 2.5.0
			 *
			 * @param string $column_name Name of the custom column.
			 * @param int    $post_id     Attachment ID.
			 */
			do_action( 'manage_media_custom_column', $column_name, $post->ID );
		?></td>
<?php
		break;
	}
}
?>
	</tr>
<?php endwhile;
=======
				echo '<span aria-hidden="true">&#8212;</span><span class="screen-reader-text">' . get_taxonomy( $taxonomy )->labels->no_terms . '</span>';
			}

			return;
		}

		/**
		 * Fires for each custom column in the Media list table.
		 *
		 * Custom columns are registered using the {@see 'manage_media_columns'} filter.
		 *
		 * @since 2.5.0
		 *
		 * @param string $column_name Name of the custom column.
		 * @param int    $post_id     Attachment ID.
		 */
		do_action( 'manage_media_custom_column', $column_name, $post->ID );
	}

	/**
	 *
	 * @global WP_Post $post
	 */
	public function display_rows() {
		global $post;

		add_filter( 'the_title','esc_html' );

		while ( have_posts() ) : the_post();
			if (
				( $this->is_trash && $post->post_status != 'trash' )
				|| ( ! $this->is_trash && $post->post_status == 'trash' )
			) {
				continue;
			}
			$post_owner = ( get_current_user_id() == $post->post_author ) ? 'self' : 'other';
		?>
			<tr id="post-<?php echo $post->ID; ?>" class="<?php echo trim( ' author-' . $post_owner . ' status-' . $post->post_status ); ?>">
				<?php $this->single_row_columns( $post ); ?>
			</tr>
		<?php
		endwhile;
	}

	/**
	 * Gets the name of the default primary column.
	 *
	 * @since 4.3.0
	 * @access protected
	 *
	 * @return string Name of the default primary column, in this case, 'title'.
	 */
	protected function get_default_primary_column_name() {
		return 'title';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	/**
	 * @param WP_Post $post
	 * @param string  $att_title
<<<<<<< HEAD
=======
	 *
	 * @return array
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	 */
	private function _get_row_actions( $post, $att_title ) {
		$actions = array();

		if ( $this->detached ) {
			if ( current_user_can( 'edit_post', $post->ID ) )
				$actions['edit'] = '<a href="' . get_edit_post_link( $post->ID ) . '">' . __( 'Edit' ) . '</a>';
			if ( current_user_can( 'delete_post', $post->ID ) )
				if ( EMPTY_TRASH_DAYS && MEDIA_TRASH ) {
					$actions['trash'] = "<a class='submitdelete' href='" . wp_nonce_url( "post.php?action=trash&amp;post=$post->ID", 'trash-post_' . $post->ID ) . "'>" . __( 'Trash' ) . "</a>";
				} else {
					$delete_ays = !MEDIA_TRASH ? " onclick='return showNotice.warn();'" : '';
					$actions['delete'] = "<a class='submitdelete'$delete_ays href='" . wp_nonce_url( "post.php?action=delete&amp;post=$post->ID", 'delete-post_' . $post->ID ) . "'>" . __( 'Delete Permanently' ) . "</a>";
				}
			$actions['view'] = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $att_title ) ) . '" rel="permalink">' . __( 'View' ) . '</a>';
			if ( current_user_can( 'edit_post', $post->ID ) )
				$actions['attach'] = '<a href="#the-list" onclick="findPosts.open( \'media[]\',\''.$post->ID.'\' );return false;" class="hide-if-no-js">'.__( 'Attach' ).'</a>';
		}
		else {
			if ( current_user_can( 'edit_post', $post->ID ) && !$this->is_trash )
				$actions['edit'] = '<a href="' . get_edit_post_link( $post->ID ) . '">' . __( 'Edit' ) . '</a>';
			if ( current_user_can( 'delete_post', $post->ID ) ) {
				if ( $this->is_trash )
					$actions['untrash'] = "<a class='submitdelete' href='" . wp_nonce_url( "post.php?action=untrash&amp;post=$post->ID", 'untrash-post_' . $post->ID ) . "'>" . __( 'Restore' ) . "</a>";
				elseif ( EMPTY_TRASH_DAYS && MEDIA_TRASH )
					$actions['trash'] = "<a class='submitdelete' href='" . wp_nonce_url( "post.php?action=trash&amp;post=$post->ID", 'trash-post_' . $post->ID ) . "'>" . __( 'Trash' ) . "</a>";
				if ( $this->is_trash || !EMPTY_TRASH_DAYS || !MEDIA_TRASH ) {
					$delete_ays = ( !$this->is_trash && !MEDIA_TRASH ) ? " onclick='return showNotice.warn();'" : '';
					$actions['delete'] = "<a class='submitdelete'$delete_ays href='" . wp_nonce_url( "post.php?action=delete&amp;post=$post->ID", 'delete-post_' . $post->ID ) . "'>" . __( 'Delete Permanently' ) . "</a>";
				}
			}
			if ( !$this->is_trash ) {
				$title =_draft_or_post_title( $post->post_parent );
				$actions['view'] = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $title ) ) . '" rel="permalink">' . __( 'View' ) . '</a>';
			}
		}

		/**
		 * Filter the action links for each attachment in the Media list table.
		 *
		 * @since 2.8.0
		 *
		 * @param array   $actions  An array of action links for each attachment.
		 *                          Default 'Edit', 'Delete Permanently', 'View'.
		 * @param WP_Post $post     WP_Post object for the current attachment.
		 * @param bool    $detached Whether the list table contains media not attached
		 *                          to any posts. Default true.
		 */
<<<<<<< HEAD
		$actions = apply_filters( 'media_row_actions', $actions, $post, $this->detached );

		return $actions;
=======
		return apply_filters( 'media_row_actions', $actions, $post, $this->detached );
	}

	/**
	 * Generates and displays row action links.
	 *
	 * @since 4.3.0
	 * @access protected
	 *
	 * @param object $post        Attachment being acted upon.
	 * @param string $column_name Current column name.
	 * @param string $primary     Primary column name.
	 * @return string Row actions output for media attachments.
	 */
	protected function handle_row_actions( $post, $column_name, $primary ) {
		if ( $primary !== $column_name ) {
			return '';
		}

		$att_title = _draft_or_post_title();
		return $this->row_actions( $this->_get_row_actions( $post, $att_title ) );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}
}
