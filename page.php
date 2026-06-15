<?php // Default Template 

get_header() ?>

<?php

$services_sb_title = carbon_get_theme_option('services_sb_title');
$sb_form_title = carbon_get_theme_option('sb_form_title');
$sb_form_desc = carbon_get_theme_option('sb_form_desc');
$sb_gravity_form = carbon_get_theme_option('sb_gravity_form');
$sb_contact_bg = carbon_get_theme_option('sb_contact_bg');
$phone_number = carbon_get_theme_option('phone_number');

?>
<div class="page_bnr">
    <div class="container">
        <div class="page_title">
            <h1><?php the_title(); ?></h1>
            <div class="inrpg-breadcrumbs">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb();
                } ?>
            </div>
        </div>
    </div>
</div>

<section class="page_default">  
    <div class="container">
        <div class="page_content">

            <div class="genpg-lft">

                <div class="widget widget-nav-menu services-menu">
                    <?php if (!empty($services_sb_title)): ?>
                        <div class="widget-title">
                            <?php echo $services_sb_title; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    wp_nav_menu(array(
                        'menu' => 57,
                        'menu_class' => 'sidebar-menu-class',
                        'container' => false,
                    ));
                    ?>
                </div>

                <div class="in-sidebar-form">
                    <?php if (!empty($sb_form_title)): ?>
                        <div class="form-hdg">
                            <?php echo $sb_form_title; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($sb_form_desc)): ?>
                        <?php echo apply_filters('the_content', $sb_form_desc); ?>
                    <?php endif; ?>
                    <?php echo do_shortcode('[gravityform id="' . $sb_gravity_form . '" title="false" description="false" ajax="true"]'); ?>
                </div>


                <div class="in-sidebar-contact" style="background-image: url('<?php echo $sb_contact_bg; ?>');">
                    <div class="in-sb-testi-list">
                        <div class="in-sb-testi-blk owl-carousel">

                            <?php
                            $testimonial = new WP_Query(array(
                                'post_type' => 'review',
                                'posts_per_page' => -1,
                                'order' => 'DESC',
                            ));

                            if ($testimonial->have_posts()):
                                while ($testimonial->have_posts()):
                                    $testimonial->the_post();
                                    ?>

                                    <div class="in-sb-testi-item">

                                        <?php if (get_the_content()): ?>
                                            <div class="in-sb-testi-para">
                                                <?php echo apply_filters('the_content', get_the_content()); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (get_the_title()): ?>
                                            <div class="in-sb-testi-author">
                                                — <?php echo esc_html(get_the_title()); ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    <?php
                                endwhile;
                                wp_reset_postdata();

                            endif;
                            ?>

                        </div>
                    </div>

                    <div class="in-sb-cont-call">
                        <a href="tel:<?php echo normalize_phone(carbon_get_theme_option('phone_number')); ?>"
                            class="in-sb-cont-call-btn">
                            <?php echo $phone_number; ?>
                        </a>
                    </div>
                </div>

            </div>

            <div class="genpg-rite">
                <?php $img_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full_blog_img') : get_stylesheet_directory_uri() . '/assets/images/default-img.webp'; ?>
                <div class="single-page-thumbnail">
                    <img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title(); ?>" width="1020" height="430">
                </div>
                <?php while (have_posts()):
                    the_post();
                    the_content();
                endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();