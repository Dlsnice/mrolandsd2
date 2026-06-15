<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <style>


          @font-face {
    font-family: 'Century Gothic';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/CenturyGothic-Bold.woff2') format('woff2'),
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/CenturyGothic-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}
 
@font-face {
    font-family: 'Century Gothic';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/CenturyGothic.woff2') format('woff2'),
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/CenturyGothic.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Fieldwork';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-Hum-DemiBold.woff2') format('woff2'),
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-Hum-DemiBold.woff') format('woff');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}
 
@font-face {
    font-family: 'Fieldwork';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-Geo-Bold.woff2') format('woff2'),
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-Geo-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}
 
@font-face {
    font-family: 'Fieldwork';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-HumBold.woff2') format('woff2'),
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-HumBold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}
 
    </style>
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>
    var gtmHeader = {
        gtmHeadDelay: function() {
            setTimeout(function(){

            // (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            // new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            // j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            // 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            // })(window,document,'script','dataLayer','GTM-M424LCP');
            // 
			}, 3000);
        }
    }
    gtmHeader.gtmHeadDelay.call();
    </script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class( 'bg-white antialiased' ); ?>>
<?php if(is_page_template('templates/page-front.php')) : $wrapper_class='homepage'; else : $wrapper_class='internal'; endif; ?>

    <?php
    $phone_number = carbon_get_theme_option('phone_number');
    ?>

<div id="wrapper" class="flex flex-col overflow-hidden <?= $wrapper_class; ?>">
    <header id="header" class="fixed z-10 w-full 2xl:py-4 py-3 3xl:pl-[250px] 2xl:pl-[200px] xl:pl-[150px] lg:pl-[110px] md:pl-[140px] pl-[100px] 2xl:pr-[45px] md:pr-[25px] pr-[15px] bg-transparent border-0">
            <div class="flex items-center justify-between w-full md:gap-7 gap-3">
                <div class="logo"><?php the_custom_logo(); ?></div> 
                <div class="top-menu"> 
                    <nav id="main-nav">
                        <input class="side-menu" type="checkbox" id="side-menu"/>
                        <label class="hamb" for="side-menu">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hamburger-menu.svg" alt="<?php bloginfo('name'); ?>" class="block w-[100%]">
                        </label>
                        <?php
                        wp_nav_menu(
                            array(
                                    'container_id' => 'primary-menu',
                                    'container_class' => '',
                                    'menu_class' => '',
                                    'theme_location' => 'header-menu',
                                    'li_class' => 'lg:inline-block 3xl:ml-[55px] 2xl:ml-[40px] xl:ml-[30px] lg:ml-[15px] relative',
                                    'fallback_cb' => false,
                            ) 
                        );
                        ?>
                    </nav>
                </div>
                <div class="header-btn"><a href="tel:<?php echo normalize_phone(carbon_get_theme_option( 'phone_number' )); ?>" class="hdr-btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hm-hdr-call-icon.webp" alt="header call icon" width="20" height="20"><span><?php echo $phone_number; ?></span></a> </div>
            </div>
	</header> 
