<?php /* Template Name: About Us Page */

get_header() ?>

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

<section class="page_default about_pg">
    <div class="container">
        <div class="page_content">

            <div class="genpg-rite full-width">

                <div class="about-main-blk">

                    <?php

                    $blocks = carbon_get_post_meta(get_the_ID(), 'crb_about_content');

                    if ($blocks):

                        foreach ($blocks as $block):

                            switch ($block['_type']) {

                                case 'heading':
                                    echo '<h2>' . esc_html($block['title']) . '</h2>';
                                    break;

                                case 'paragraph':
                                    echo apply_filters('the_content', $block['content']);
                                    break;

                                case 'image':
                                    $attachment_id = attachment_url_to_postid($block['image']);

                                    $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                                    $image = wp_get_attachment_image_src($attachment_id, 'full');

                                    echo '<div class="in-about-image">';
                                    echo '<img
                                        src="' . esc_url($image[0]) . '"
                                        width="' . esc_attr($image[1]) . '"
                                        height="' . esc_attr($image[2]) . '"
                                        alt="' . esc_attr($alt) . '"
                                        >';
                                    echo '</div>';
                                    break;
                            }

                        endforeach;

                    endif;
                    ?>

                </div>

            </div>

        </div>
    </div>
</section>

<?php

get_footer();