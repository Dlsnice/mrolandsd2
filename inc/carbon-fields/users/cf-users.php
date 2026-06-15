<?php 

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'theme_user_meta' );
function theme_user_meta() {
Container::make( 'user_meta', 'User Bio' )
    ->add_fields( array(
        Field::make( 'image', 'headshot', 'Headshot' )
            ->set_value_type( 'url' ),
        Field::make( 'text', 'display_name', 'Name' ),
        Field::make( 'rich_text', 'bio_content', 'Bio content' ),
    ) );
}