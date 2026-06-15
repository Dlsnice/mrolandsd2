<?php /* Template Name: Contact Page */



$contact_pg_content = carbon_get_post_meta(get_the_ID(), 'contact_pg_content');
$contact_pg_form_title = carbon_get_post_meta(get_the_ID(), 'contact_pg_form_title');
$contact_form_top_para = carbon_get_post_meta(get_the_ID(), 'contact_form_top_para');
$contact_pg_form = carbon_get_post_meta(get_the_ID(), 'contact_pg_form');
$contact_form_bottom_para = carbon_get_post_meta(get_the_ID(), 'contact_form_bottom_para');

get_header() ?>

<div class="page_bnr">
    <div class="container1">
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

        <div class="genpg-rite full-width">

            <div class="contact-page">
                <div class="contact-para">
                    <?php if (!empty($contact_pg_content)): ?>
                        <p><?php echo $contact_pg_content ?></p>
                    <?php endif ?>
                </div>
                <div class="contact-blk">

                    <?php if (!empty($contact_pg_form_title)): ?>
                        <h2><?php echo esc_html($contact_pg_form_title); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($contact_form_top_para)): ?>
                        <div class="form-top-para">
                            <?php echo apply_filters('the_content', $contact_form_top_para); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_pg_form)): ?>
                        <div class="contact-form">
                            <?php gravity_form(absint($contact_pg_form), false, false, false, null, true); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_form_bottom_para)): ?>
                        <div class="form-bottom-para">
                            <?php echo apply_filters('the_content', $contact_form_bottom_para); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
</section>

<?php

get_footer();