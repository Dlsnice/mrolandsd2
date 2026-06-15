<?php /* Template Name: Page Template Name */

// use if you want to pull existing values from another page
$page_id = 6;

// Values pulled from Carbon Fields PHP files. In this case /inc/templates/cf-page-template.php
$pre_heading = carbon_get_the_post_meta('pre_heading');
$heading = carbon_get_the_post_meta('heading');
$header_content = carbon_get_the_post_meta('header_content');
$image = carbon_get_the_post_meta('image');
$repeater = carbon_get_the_post_meta('repeater');
$btn_text = carbon_get_the_post_meta('button_text');
$btn_url = carbon_get_the_post_meta('button_url');

get_header() ?>
<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>
<main>
    <section id="section-container" class="w-full">
        <div class="container-inner">
            <div id="section-header">
                <div class="section-pre-heading"><?php echo $pre_heading; ?></div>
                <h2 class="section-heading"><?php echo $heading; ?></h2>
                <div class="section-heading-content"><?php echo wpautop(wp_kses_post($header_content)); ?></div>
            </div>
            <div id="section-image"><img src="<?php echo $image; ?>" alt="Section Image"></div>
            <div id="repeater-wrapper">
                <?php foreach ($repeater as $item) { ?>
                    <div class="item-card">
                        <div class="item-image">
                            <img src="<?php echo $item['image']; ?>" alt="Repeater Card Image">
                        </div>
                        <div class="item-text">
                            <h3 class="item-heading"><?php echo $item['heading']; ?></h3>
                            <p class="item-content"><?php echo $item['content']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="section-buttons">
                <a href="<?php echo $btn_url; ?>" class="btn tertiary"><?php echo $btn_text; ?></a>
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();