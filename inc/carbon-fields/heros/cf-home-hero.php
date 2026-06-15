<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Home Hero Custom Fields (page.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_home_hero_options' );
function crb_attach_home_hero_options() {
    Container::make( 'post_meta', __( 'Hero Options', 'crb' ) )
    ->where('post_template', '=', 'templates/page-front.php')
        ->add_tab( __('Text Options'), array(
            Field::make( 'text', 'heading', 'Heading' ),
            Field::make( 'rich_text', 'content', 'Content' ),
            Field::make( 'text', 'banner_button_text', 'Button Text' ),
            Field::make( 'text', 'banner_button_url', 'Button URL' ),
        ) )
        ->add_tab( __('Image Options'), array(
            Field::make( 'image', 'bg_image', 'Background Image' )
                ->set_value_type( 'url' ),   
        ) );
}