<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_about_page_fields');

function crb_about_page_fields()
{

    Container::make('post_meta', __('About Page', 'crb'))
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/about-page.php')

        ->add_fields(array(

            Field::make('complex', 'crb_about_content', 'About Content')

                ->add_fields('heading', 'Heading', array(
                    Field::make('text', 'title', 'Heading'),
                ))

                ->add_fields('paragraph', 'Paragraph', array(
                    Field::make('rich_text', 'content', 'Content'),
                ))

                ->add_fields('image', 'Image', array(
                    Field::make('image', 'image', 'Image')
                        ->set_value_type('url'),
                ))

        ));
}