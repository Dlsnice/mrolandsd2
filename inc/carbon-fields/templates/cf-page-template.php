<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Custom Fields (page-template.php)

add_action( 'carbon_fields_register_fields', 'page_template_options_template' );
function page_template_options_template() {
    Container::make( 'post_meta', __( 'Template Options', 'crb' ) )
        ->where( 'post_template', '=', 'templates/page-template.php')

        // Fields // Copy entire tab to create new tabs // All field names should be prefixed to be unique
        ->add_tab( __('Content'), array(
            Field::make( 'text', 'pre_heading', 'Pre Heading' ),
            Field::make( 'text', 'heading', 'Heading' ),
            Field::make( 'rich_text', 'header_content', 'Content' ),
            Field::make( 'image', 'image', 'Image' )
                        ->set_value_type( 'url' ),
            Field::make( 'complex', 'repeater', 'Repeater' )
                ->set_collapsed( true )
                ->add_fields( 'row', 'Row', array(
                    Field::make( 'image', 'image', 'Image' )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'heading', 'Heading' ),
                    Field::make( 'text', 'content', 'Content' ),
                ) )
                ->set_header_template('<%- heading %>'),
            Field::make( 'text', 'button_text', 'Button Text' ),
            Field::make( 'text', 'button_url', 'Button URL' ),
        ) );        
}