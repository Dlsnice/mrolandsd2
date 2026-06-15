<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Single Post Hero Custom Fields (page.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_single_hero_options' );
function crb_attach_single_hero_options() {
    Container::make( 'post_meta', __( 'Hero Options', 'crb' ) )
    ->where( 'post_type', '=', 'post' )
        ->add_tab( __('Text Options'), array(
            Field::make( 'text', 'heading', 'Heading' ),
            Field::make( 'rich_text', 'content', 'Content' ),
        ) )
        ->add_tab( __('Image Options'), array(
            Field::make( 'image', 'bg_image', 'Background Image' )
                ->set_value_type( 'url' ),   
        ) );
}