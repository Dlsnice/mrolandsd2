<?php /*

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Blog Hero Custom Fields (index.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_blog_hero_options' );
$blog_page_id = get_option('page_for_posts');
function crb_attach_blog_hero_options() {
    if ($blog_page_id) {
    Container::make( 'post_meta', __( 'Hero Options', 'crb' ) )
    ->where('post_id', '=', $blog_page_id)
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
}
    */ ?>