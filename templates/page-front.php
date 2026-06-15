<?php
/*
Template Name: Front Page
*/
 get_header(); ?>



<?php
while (have_posts()):
    the_post();
    $homesections = carbon_get_the_post_meta('crbh_sections');
    if ($homesections):
        foreach ($homesections as $hs) {
            if ($hs['_type'] == 'home-banner'):
                $banner_heading     = $hs['banner_heading'];
                $banner_button_text = $hs['banner_button_text'];
                $banner_button_link = $hs['banner_button_link'];
                $banner_slides      = $hs['banner_slides'];
                ?>
                <section id="banner-section">
                    <div class="container">

                        <div class="banner-slider owl-carousel">

                            <?php if (!empty($banner_slides)) : ?>
                                <?php foreach ($banner_slides as $slide) : ?>
                                    <div class="bnr-slide-item">
                                        <img src="<?php echo esc_url($slide['banner_slide_image']); ?>" alt="<?php echo esc_attr($banner_heading); ?>" width="1920" height="1020">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>

                        <div class="banner-cnt">

                           <?php if (!empty($banner_heading)) : ?>
                                <h1><?php echo wp_kses_post($banner_heading); ?></h1>
                            <?php endif; ?>

                            <?php if (!empty($banner_button_text) && !empty($banner_button_link)) : ?>
                                <div class="bnr-btn">
                                    <a href="<?php echo esc_url($banner_button_link); ?>" class="cmn-btn">
                                        <?php echo esc_html($banner_button_text); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </section>
            <?php endif;



            if ($hs['_type'] == 'home-coordinate-section'):
                $coordinate_sec_heading = $hs['coordinate_sec_heading'];
                $coordinate_sec_content = $hs['coordinate_sec_content'];
                ?>
               
             <section id="coordinate-sec">
                <div class="container">
                    <div class="coordinate-blk para-txt">

                        <?php if (!empty($coordinate_sec_heading)) : ?>
                            <div class="text-heading"><?php echo esc_html($coordinate_sec_heading); ?></div>
                        <?php endif; ?>

                        <?php if (!empty($coordinate_sec_content)) : ?>
                            <?php echo apply_filters('the_content', $coordinate_sec_content); ?>
                         <?php endif; ?>
                        
                    </div>
                </div>
            </section>

            <?php endif;

        
              if ($hs['_type'] == 'home-offer-section'):
                $offer_sec_heading = $hs['offer_sec_heading'];
                $offer_sec_content = $hs['offer_sec_content'];
                $offer_sec_whychoose_txt = $hs['offer_sec_whychoose_txt'];
                ?>
               
             <section id="offer-sec">
                    <div class="container">
                    <div class="offer-blk para-txt">
                        <?php if (!empty($offer_sec_heading)) : ?>
                            <div class="text-heading color"><?php echo esc_html($offer_sec_heading); ?></div>
                        <?php endif; ?>

                        <?php if (!empty($offer_sec_content)) : ?>
                            <?php echo apply_filters('the_content', $offer_sec_content); ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
                <div class="why-choose-txt"><?php echo esc_html($offer_sec_whychoose_txt); ?></div>
            </section>

            <?php endif;


            if ($hs['_type'] == 'home-different-section'):
                $different_sec_heading = $hs['different_sec_heading'];
                $different_sec_content = $hs['different_sec_content'];
                $different_sec_bg_image = $hs['different_sec_bg_image'];
                ?>
               
             <section id="different-sec" style="background-image: url('<?php echo $different_sec_bg_image; ?>');">
                <div class="container">
                    <div class="different-blk para-txt">

                        <?php if (!empty($different_sec_heading)) : ?>
                            <div class="text-heading"><?php echo esc_html($different_sec_heading); ?></div>
                        <?php endif; ?>
    
                         <?php if (!empty($different_sec_content)) : ?>
                            <?php echo apply_filters('the_content', $different_sec_content); ?>
                         <?php endif; ?>

                    </div>
                </div>
            </section>

            <?php endif;




if ($hs['_type'] == 'home-association-section'):
    $association_heading = $hs['association_heading'];
    $association_curve_image = $hs['association_curve_image'];
    $association_sec_count = $hs['association_sec_count'];
    $association_sec_subtitle = $hs['association_sec_subtitle'];
    $association_sec_content = $hs['association_sec_content'];
    $hm_association_items = $hs['hm_association_items'];
    ?>
    <section class="wrks-fr-developers-sec association-sec">
        <div class="container">
            <div class="text-heading"><?php echo $association_heading; ?></div>

             <div class="associations-blk-lst">

                    <?php if (!empty($association_curve_image)) : ?>
                            <div class="curve-line">
                                <img src="<?php echo $association_curve_image; ?>" alt="<?php echo $association_heading; ?>" width="1920" height="145" >
                            </div>
                        <?php endif; ?>


                    <div class="associations-blk blk-top">
                        <div class="item-blk itm-top">
                            <?php if (!empty($association_sec_count)) : ?>
                            <div class="count"><?php echo esc_html($association_sec_count); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($association_sec_subtitle)) : ?>
                            <div class="sub-hdg"><?php echo esc_html($association_sec_subtitle); ?></div>
                            <?php endif; ?>
                             <?php if (!empty($association_sec_content)) : ?>
                                <?php echo apply_filters('the_content', $association_sec_content); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="associations-blk blk-btm para-txt">
                <?php if ($hm_association_items):
                    foreach ($hm_association_items as $item): ?>
                    
                        <div class="item-blk itm-btm">
                            <?php if ($item['hm_association_count']): ?>
                                <div class="count"><?php echo esc_html($item['hm_association_count']); ?></div>
                            <?php endif; ?>
                            <?php if ($item['hm_association_subtitle']): ?>
                               <div class="sub-hdg"><?php echo esc_html($item['hm_association_subtitle']); ?></div>
                            <?php endif; ?>
                            <?php if ($item['hm_association_content']): ?>
                                    <?php echo apply_filters('the_content', esc_html($item['hm_association_content'])); ?>
                            <?php endif; ?>
                        </div>
                    
                    <?php endforeach; endif; ?>
                    </div>
            </div>
        </div>
    </section>

<?php endif;



if ($hs['_type'] == 'home-developers-section'):
    $developers_heading = $hs['developers_heading'];
    $developers_curve_image = $hs['developers_curve_image'];
    $developers_sec_count = $hs['developers_sec_count'];
    $developers_sec_subtitle = $hs['developers_sec_subtitle'];
    $developers_sec_content = $hs['developers_sec_content'];
    $developers_bg_image = $hs['developers_bg_image'];
    $hm_developers_items = $hs['hm_developers_items'];
    ?>
    <section class="wrks-fr-developers-sec" style="background-image: url('<?php echo $developers_bg_image; ?>');">
        <div class="container">
            <div class="text-heading"><?php echo $developers_heading; ?></div>

             <div class="associations-blk-lst">

                    <?php if (!empty($developers_curve_image)) : ?>
                            <div class="curve-line">
                                <img src="<?php echo $developers_curve_image; ?>" alt="<?php echo $developers_heading; ?>" width="1920" height="145" >
                            </div>
                        <?php endif; ?>


                    <div class="associations-blk blk-top ">
                        <div class="item-blk itm-top para-txt">
                            <?php if (!empty($developers_sec_count)) : ?>
                            <div class="count"><?php echo esc_html($developers_sec_count); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($developers_sec_subtitle)) : ?>
                            <div class="sub-hdg"><?php echo esc_html($developers_sec_subtitle); ?></div>
                            <?php endif; ?>
                             <?php if (!empty($developers_sec_content)) : ?>
                                <?php echo apply_filters('the_content', $developers_sec_content); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="associations-blk blk-btm para-txt">
                <?php if ($hm_developers_items):
                    foreach ($hm_developers_items as $item): ?>
                    
                        <div class="item-blk itm-btm">
                            <?php if ($item['hm_developers_count']): ?>
                                <div class="count"><?php echo esc_html($item['hm_developers_count']); ?></div>
                            <?php endif; ?>
                            <?php if ($item['hm_developers_subtitle']): ?>
                               <div class="sub-hdg"><?php echo esc_html($item['hm_developers_subtitle']); ?></div>
                            <?php endif; ?>
                            <?php if ($item['hm_developers_content']): ?>
                                    <?php echo apply_filters('the_content', esc_html($item['hm_developers_content'])); ?>
                            <?php endif; ?>
                        </div>
                    
                    <?php endforeach; endif; ?>
                    </div>
            </div>
        </div>
    </section>

<?php endif;


if ($hs['_type'] == 'home-unique-expertise'):
                $hm_unique_heading = $hs['hm_unique_heading'];
                $hm_unique_services_text = $hs['hm_unique_services_text'];
                $hm_unique_items = $hs['hm_unique_items'];
                ?>
                <div class="unique-sec">
                    <div class="container">
                        <div class="unique-text-heading"><?php echo $hm_unique_heading; ?></div>

                        <div class="unique-blk owl-carousel">
                            <?php if ($hm_unique_items):
                                foreach ($hm_unique_items as $item): ?>
                                    <div class="unique-itm para-txt">
                                        <?php if ($item['hm_unique_image']): ?>
                                            <div class="unique-itm-img">
                                                <img src="<?php echo esc_url($item['hm_unique_image']); ?>"
                                                    alt="<?php echo esc_html($item['hm_unique_title']); ?>" width="100" height="76">
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($item['hm_unique_title']): ?>
                                            <div class="unique-itm-title"><?php echo esc_html($item['hm_unique_title']); ?></div>
                                        <?php endif; ?>
                                        <?php if ($item['hm_unique_content']): ?>
                                            <div class="unique-itm-cont">
                                                <?php echo apply_filters('the_content', esc_html($item['hm_unique_content'])); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; endif; ?>
                        </div>

                        <div class="service-title-blk">
                            <div class="service-title"><?php echo $hm_unique_services_text; ?></div>
                        </div>
                    </div>
                </div>
            <?php endif;

            if ($hs['_type'] == 'home-business'):
                $hm_business_heading = $hs['hm_business_heading'];
                $hm_business_content = wp_kses_post($hs['hm_business_content']);
                $hm_business_image = $hs['hm_business_image'];
                $hm_business_bg_image = $hs['hm_business_bg_image'];
                ?>
                <div class="business-section">
                    <div class="container">
                        <div class="business-blk" style="background-image: url('<?php echo $hm_business_bg_image; ?>');">
                            <div class="business-lft-blk">
                                <div class="business-title"><?php echo $hm_business_heading; ?></div>
                                <div class="business-cont"><?php echo apply_filters('the_content', $hm_business_content); ?></div>
                            </div>
                            <div class="business-rgt-blk">
                                <img src="<?php echo $hm_business_image; ?>" alt="<?php echo $hm_business_heading; ?>" width="669"
                                    height="631">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;

            if ($hs['_type'] == 'home-testimonials-section'):
                $testi_heading = $hs['testi_heading'];
                $testi_button_text = $hs['testi_button_text'];
                $testi_button_url = $hs['testi_button_url'];
                $project_title = carbon_get_post_meta(get_the_ID(), 'project_title');
                $author_bio = carbon_get_post_meta(get_the_ID(), 'author_bio');
                ?>
                <section class="testimonials-sec">
                    <div class="container">
                        <div class="testi-list">

                            <?php if (!empty($testi_heading)): ?>
                                <h2 class="testi-text-heading">
                                    <?php echo esc_html($testi_heading); ?>
                                </h2>
                            <?php endif; ?>

                            <div class="testi-blk owl-carousel">

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

                                        <div class="hm-testi-item para-txt">

                                            <div class="hm-testi-cont">
                                                <?php if (!empty($project_title)): ?>
                                                    <div class="project-title">
                                                        <?php echo esc_html($project_title); ?>
                                                    </div>
                                                <?php endif; ?>
                                               <?php if (get_the_content()): ?>
                                                    <div class="testi-para">
                                                        <?php echo apply_filters('the_content', get_the_content()); ?>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="star-rat">
                                                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/star-img.webp'); ?>"
                                                        alt="testimonial rating" width="175" height="35">
                                                </div>
                                            </div>

                                            <div class="hm-testi-author">

                                                <?php if (get_the_title()): ?>
                                                    <div class="testi-author">
                                                        <?php echo esc_html(get_the_title()); ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($author_bio)): ?>
                                                    <div class="author-bio">
                                                        <?php echo esc_html($author_bio); ?>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>

                                        <?php
                                    endwhile;
                                    wp_reset_postdata();

                                  endif;
                                  ?>

                            </div>

                            <?php if (!empty($testi_button_text) && !empty($testi_button_url)): ?>
                                <div class="testi-btn">
                                    <a href="<?php echo esc_url($testi_button_url); ?>" class="testi-cmn-btn cmn-btn">
                                        <?php echo esc_html($testi_button_text); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </section>
            <?php endif;

        
        }
    endif; ?>
<?php endwhile; ?>

<?php get_footer(); ?>