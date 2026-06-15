<?php

/**
 * Customize Login Page
 */
add_action( 'login_enqueue_scripts', 'custom_login_logo' );
function custom_login_logo() {
    $custom_logo_id  = get_theme_mod( 'custom_logo' );
    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
    ?>    
    
    <style type="text/css">        
    
    #login h1 a,
    .login h1 a {
        background-image: url(<?php echo $custom_logo_url ?>);
        width: 320px;
        height: 160px;
        max-width: 100%;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        padding-bottom: 0;
        outline: none;
    }
    #lostpasswordform,
    #loginform {
        box-shadow: none;
        border: none;
        background: transparent;
    }
    </style>    
    <?php 
}
add_filter( 'login_headerurl', 'custom_login_url' );
function custom_login_url() {
    return home_url();
}
add_filter( 'login_headertext', 'custom_login_title' );
function custom_login_title() {
    return get_bloginfo( 'name' );
}