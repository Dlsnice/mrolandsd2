<?php /* Template Name: Attorney Individual 1 */

// Profile
$headshot = carbon_get_the_post_meta('headshot');
$attorney_name = carbon_get_the_post_meta('attorney_name');
$attorney_title = carbon_get_the_post_meta('attorney_title');
$bio = carbon_get_the_post_meta('bio');
$email = carbon_get_the_post_meta('email');
$phone = carbon_get_the_post_meta('phone');
$social_linkedin = carbon_get_the_post_meta('social_linkedin');
$social_facebook = carbon_get_the_post_meta('social_facebook');
$social_twitter = carbon_get_the_post_meta('social_twitter');

// Sections
$practice_areas_heading = carbon_get_the_post_meta('practice_areas_heading');
$practice_areas = carbon_get_the_post_meta('practice_areas');
$experience_heading = carbon_get_the_post_meta('experience_heading');
$experience_content = carbon_get_the_post_meta('experience_content');
$skills_heading = carbon_get_the_post_meta('skills_heading');
$skills_list = carbon_get_the_post_meta('skills_list');

get_header(); ?>
<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>
<main id="attorney-ind-1">
    <section class="attorney-grid">
        <div class="container-inner">

            <div class="attorney-sidebar">
                <?php if ($headshot): ?>
                    <div class="profile-headshot">
                        <img src="<?php echo esc_url($headshot); ?>" alt="<?php echo esc_attr($attorney_name); ?>">
                    </div>
                <?php endif; ?>
                <?php if ($attorney_name): ?>
                    <h1 class="profile-name"><?php echo esc_html($attorney_name); ?></h1>
                <?php endif; ?>
                <?php if ($attorney_title): ?>
                    <p class="profile-title"><?php echo esc_html($attorney_title); ?></p>
                <?php endif; ?>
            </div>

            <div class="attorney-content">

                <section id="attorney-intro" class="attorney-section">
                    <?php if ($attorney_name): ?>
                        <h2 class="section-heading-script"><?php echo esc_html($attorney_name); ?></h2>
                    <?php endif; ?>
                    <?php if ($bio): ?>
                        <div class="profile-bio">
                            <?php echo wp_kses_post($bio); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($email): ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="profile-contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <span><?php echo esc_html($email); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ($phone): ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="profile-contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_linkedin || $social_facebook || $social_twitter || $email): ?>
                        <div class="profile-social">
                            <?php if ($social_linkedin): ?>
                                <a href="<?php echo esc_url($social_linkedin); ?>" target="_blank" rel="noopener" class="social-icon" aria-label="LinkedIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($social_facebook): ?>
                                <a href="<?php echo esc_url($social_facebook); ?>" target="_blank" rel="noopener" class="social-icon" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($social_twitter): ?>
                                <a href="<?php echo esc_url($social_twitter); ?>" target="_blank" rel="noopener" class="social-icon" aria-label="X (Twitter)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($email): ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="social-icon" aria-label="Email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </section>

                <?php if ($practice_areas): ?>
                <section id="practice-areas" class="attorney-section">
                    <?php if ($practice_areas_heading): ?>
                        <h2 class="section-heading-script"><?php echo esc_html($practice_areas_heading); ?></h2>
                    <?php endif; ?>
                    <div class="practice-areas-grid">
                        <?php foreach ($practice_areas as $area): ?>
                            <div class="practice-area-item">
                                <?php if ($area['icon']): ?>
                                    <div class="practice-area-icon">
                                        <img src="<?php echo esc_url($area['icon']); ?>" alt="<?php echo esc_attr($area['title']); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($area['title']): ?>
                                    <span class="practice-area-title"><?php echo esc_html($area['title']); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($experience_content): ?>
                <section id="personal-experience" class="attorney-section">
                    <?php if ($experience_heading): ?>
                        <h2 class="section-heading-script"><?php echo esc_html($experience_heading); ?></h2>
                    <?php endif; ?>
                    <div class="experience-content">
                        <?php echo wp_kses_post($experience_content); ?>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($skills_list): ?>
                <section id="activities-skills" class="attorney-section">
                    <?php if ($skills_heading): ?>
                        <h2 class="section-heading-script"><?php echo esc_html($skills_heading); ?></h2>
                    <?php endif; ?>
                    <ul class="skills-list">
                        <?php foreach ($skills_list as $skill): ?>
                            <?php if ($skill['item']): ?>
                                <li><?php echo esc_html($skill['item']); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </section>
                <?php endif; ?>

            </div>

        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();
