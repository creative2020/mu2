<?php        
        $post_id = get_the_ID();
        $permalink = get_permalink( $id );
        $post = get_post();
        $post_type = get_post_type( $post_id );
        //$image = the_post_thumbnail( 'thumbnail' );
        $size = '250,125';
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );
        $tt_excerpt = $post->post_excerpt;
        $tt_pre_title = '';
        $tt_icon = '';
        $category = get_the_category(); 
        $cat_name = $category[0]->category_nicename;
        $post_bg = 'white';
        $icon_size = '6.0em';
        $font_color = 'white';

        if ( in_category( 'uncategorized' )) {
                $tt_icon = '';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                }
        if ( $post_type == 'page') {
                $tt_icon = 'file-text';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                $post_bg = '#D0CEC0';
                }
        if ( in_category( 'news' )) {
                $tt_icon = 'newspaper-o';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                $tt_pre_title = 'NEWS: ';
                $post_bg = '#D0CEC0';
                }
        if ( in_category( 'faq' )) {
                $tt_icon = 'question-circle';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                $post_bg = '#e3e3e2';
                $tt_pre_title = 'FAQ: ';
                }
        if ( in_category( 'features' )) {
                $tt_icon = 'rocket';
                $font_color = '#F6B02E';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                $post_bg = '#e3e3e2';
                $tt_pre_title = 'Feature: ';
                }
        if ( in_category( 'testimonial' )) {
                $tt_icon = 'quote-left';
                $font_color = 'white';
                $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:'.$icon_size.';"></i>';
                $post_bg = '#f8b673';
                $tt_pre_title = 'Testimonial: ';
                $testimonial_author_name = get_post_meta( $post_id, 'testimonial_author_name' );
                $testimonial_author_company = get_post_meta( $post_id, 'testimonial_author_company' );
                $testimonial_author_cityst = get_post_meta( $post_id, 'testimonial_author_cityst' );
                $testimonial_author_title = get_post_meta( $post_id, 'testimonial_author_title' );
                $testimonial_author_company_logo = get_post_meta( $post_id, 'testimonial_author_company_logo' );
                    if ( $testimonial_author_company_logo == null ) {
                        $testimonial_author_company_logo_alt = '<i class="fa fa-quote-right" style="color:'.$post_bg.';font-size:3.0em;"></i>';
                    }
                $closer =   '<div class="col-xs-12">'.
                                do_shortcode('[tt_rule]').
                                '<a class="btn btn-primary btn-lg pull-right" href="/our-clients"><i class="fa fa-arrow-circle-right"></i> Read more testimonials</a>'.    
                            '</div>';
            }
        ?>

<a href="<?php echo get_the_permalink() ?>">
                    
    <div class="row tt-search excerpt-<?php echo $cat_name ?>" style="background:<?php echo $post_bg; ?>;">
        <div class="col-sm-2">
            <?php if ( has_post_thumbnail() ) { ?>
                <img src="<?php echo $image_info[0]; ?>" class="img-responsive"> 
            <?php } else { ?> 
                <i class="fa fa-<?php echo $tt_icon; ?>" style="color:<?php echo $font_color; ?>;font-size:<?php echo $icon_size; ?>;"></i>
            <?php } ?>
        </div>

        <div class="col-sm-10">
            <h2><?php echo $tt_pre_title; ?> <?php the_title(); ?></h2>
            <div class="clearfix"><p><?php echo get_the_category_list(); ?></p></div>
            <p><?php the_excerpt(); ?></p>

        </div>

    </div>
</a>    
        
