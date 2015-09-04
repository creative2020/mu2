<!--Special content item-->

<?php
    $post_id = get_the_ID();
    $tt_pre_title = 'Testimonial: ';
    $tt_icon_name = get_post_meta( $post_id, 'tt_icon' );
        if ( $tt_icon_name[0] != null ) {
            $tt_icon = $tt_icon_name[0];
        } else {
            $tt_icon = 'quote-left';
        }
    $icon_size = '6.0em';
    $font_color = '#79A99C';
    $bg_color = '#D0CEC0';
    $more_btn_text = 'Read more testimonials';
    $more_btn_link = '/category/testimonial/';
    $image = '<i class="fa fa-'.$tt_icon.'" style="color:'.$font_color.';font-size:4.0em;"></i>';
    $size = 'thumbnail';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );

    $testimonial_author_name = get_post_meta( $post_id, 'testimonial_author_name' );
    $testimonial_author_company = get_post_meta( $post_id, 'testimonial_author_company' );
    $testimonial_author_cityst = get_post_meta( $post_id, 'testimonial_author_cityst' );
    $testimonial_author_title = get_post_meta( $post_id, 'testimonial_author_title' );
    $testimonial_author_company_logo_id = get_post_meta( $post_id, 'testimonial_author_company_logo_id' );
        if ( empty($testimonial_author_company_logo_id[0]) ) {
            $testimonial_author_company_logo_alt = '<i class="fa fa-quote-right" style="color:red;font-size:3.0em;"></i>';
        } else {
            $testimonial_author_company_logo_url = wp_get_attachment_image_src( $testimonial_author_company_logo_id[0], 'thumbnail', $icon );
        }
?> 

<!--Single-->
    <?php if ( is_single() ) { ?> 
        <div id="page-header" class="row" style="background:<?php echo $bg_color; ?>">
            <div class="col-sm-8"> 
                <h1 style="color:<?php echo $font_color; ?>;"><?php echo $tt_pre_title; ?> <?php echo $post->post_title; ?></h1>
            </div>
            <div class="col-sm-4"> 
                <div class="col-sm-12 tt-feature-image"><?php echo $image; ?></div>
            </div>
        </div>

<div class="row"> <!--row-->
    <div class="section clearfix">
        
        <div class="col-md-10 col-md-offset-1">
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
               <div class=""><p><?php echo get_the_category_list(); ?></p></div>
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
                <?php the_content(); ?>
            
                <div class="row"> <!--testimonial author-->
                <div class="col-sm-2">
                    <span class="author-company-logo">
                        
                        <?php if ( empty( $testimonial_author_company_logo_url[0] ) ) { ?>
                            <i class="fa fa-quote-right" style="color:<?php echo $font_color; ?>;font-size:2.5em;"></i>
                        <?php } else { ?>
                            <img src="<?php echo $testimonial_author_company_logo_url[0]; ?>" class="img-responsive"></span>
                    <?php } ?><!--end else-->
                </div>
                <div class="col-sm-10">
                    <span class="author-name"><?php echo $testimonial_author_name[0]; ?></span>
                    <span class="author-title"><?php echo $testimonial_author_title[0]; ?></span>
                    <span class="author-company"><?php echo $testimonial_author_company[0]; ?></span>
                    <span class="author-cityst"><?php echo $testimonial_author_cityst[0]; ?></span>
                </div>
                
            </div>
            
            <?php echo do_shortcode('[tt_rule]'); ?>
            
            <div class="col-sm-12">
                <a class="btn btn-primary btn-md pull-right" href="<?php echo $more_btn_link; ?>"><i class="fa fa-arrow-circle-right"></i> <?php echo $more_btn_text; ?></a>
            </div>
            
        </div>
    </div>
</div> <!--row-->

        
    </div>

        <?php } else { ?>
            
<!--Single-->            

            
<!--post-->
<a href="<?php echo get_the_permalink() ?>">
                    
    <div class="row tt-search excerpt-<?php echo $cat_name ?>" style="background:<?php echo $bg_color; ?>;">
        <div class="col-sm-2">
            <?php if ( has_post_thumbnail() ) { ?>
            
                <img src="<?php echo $image_info[0]; ?>" class="img-responsive">
            
            <?php } else { ?><!--end else-->
            
                <i class="fa fa-<?php echo $tt_icon; ?>" style="color:<?php echo $font_color; ?>;font-size:<?php echo $icon_size; ?>;"></i>
            
            
            <?php } ?>
        </div>

        <div class="col-sm-10">
            <h2><?php echo $tt_pre_title; ?> <?php the_title(); ?></h2>
            <div class="clearfix"><p><?php echo get_the_category_list(); ?></p></div>
            
                <p><?php the_excerpt(); ?></p>
            
            <div class="row"> <!--testimonial author-->
                <div class="col-sm-3">
                    <span class="author-company-logo">
                        
                        <?php if ( empty( $testimonial_author_company_logo_url[0] ) ) { ?>
                            <i class="fa fa-quote-right" style="color:<?php echo $font_color; ?>;font-size:2.5em;"></i>
                        <?php } else { ?>
                            <img src="<?php echo $testimonial_author_company_logo_url[0]; ?>" class="img-responsive"></span>
                    <?php } ?><!--end else-->
                </div>
                <div class="col-sm-9">
                    <span class="author-name"><?php echo $testimonial_author_name[0]; ?></span>
                    <span class="author-title"><?php echo $testimonial_author_title[0]; ?></span></br>
                    <span class="author-company"><?php echo $testimonial_author_company[0]; ?></span></br>
                    <span class="author-cityst"><?php echo $testimonial_author_cityst[0]; ?></span>
                </div>
                
            </div>
            
     
        </div>
        <div class="col-sm-12">
                <?php if ( is_page('our-clients') ) { ?>
                        
                    <div class="col-sm-12">
                        <a class="btn btn-primary btn-md pull-right" href="<?php echo get_the_permalink() ?>"><i class="fa fa-arrow-circle-right"></i> Read full testimonial</a>
                    </div>
            
                    <?php } else { ?>
                            
                <a class="btn btn-primary btn-md pull-right" href="<?php echo get_the_permalink() ?>"><i class="fa fa-arrow-circle-right"></i> Read full testimonial</a>
                
                <?php } ?><!--end else-->
            </div>
    </div>
</a>

<?php } ?> <!--post-->