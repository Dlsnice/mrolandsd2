<?php /* Template Name: Testimonials Page */

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

<section class="page_default testimonials_pg">
    <div class="container">
        <div class="page_content">

            <div class="genpg-rite full-width">
                <div class="inr-testi-blk">

                    <?php
                    $testimonial = new WP_Query(array(
                        'post_type' => 'review',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    ));

                    if ($testimonial->have_posts()):
                        while ($testimonial->have_posts()):
                            $testimonial->the_post();

                            $project_title = carbon_get_post_meta(get_the_ID(), 'project_title');
                            $author_bio = carbon_get_post_meta(get_the_ID(), 'author_bio');
                            ?>
                            <div class="test-item para-txt">
                                <?php if (!empty($project_title)): ?>
                                    <div class="testi-hdg"><?php echo esc_html($project_title); ?></div>
                                <?php endif; ?>
                                <?php if (get_the_content()): ?>
                                    <div class="testi-cont">
                                        <?php echo apply_filters('the_content', get_the_content()); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_the_title()): ?>
                                    <div class="author">
                                        — <?php echo esc_html(get_the_title()); ?>; <?php echo esc_html($author_bio); ?>
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

        </div>
    </div>
</section>

<?php

get_footer();