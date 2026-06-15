<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Custom Fields (contact-page.php)

add_action('carbon_fields_register_fields', 'contact_page_options');
function contact_page_options()
{

    // Gravity Forms list collect cheyyadam
    $gravity_forms = array('' => '— Select Gravity Form —');

    if (class_exists('GFAPI')) {
        $forms = GFAPI::get_forms();

        foreach ($forms as $form) {
            $gravity_forms[$form['id']] = $form['title'];
        }
    }

    Container::make('post_meta', __('Contact Page Options', 'crb'))
        ->where('post_template', '=', 'templates/contact-page.php')

        // Fields // Copy entire tab to create new tabs // All field names should be prefixed to be unique

        ->add_fields(array(
            Field::make('rich_text', 'contact_pg_content', 'Contact Page Content'),
            Field::make('text', 'contact_pg_form_title', 'Contact Page Form Title'),
            Field::make('rich_text', 'contact_form_top_para', 'Contact Form Top Para'),
            Field::make('select', 'contact_pg_form', 'Contact Page Form')
                ->set_options($gravity_forms)
                ->set_help_text('Choose a Gravity Form to display on contact page'),
            Field::make('rich_text', 'contact_form_bottom_para', 'Contact Form Bottom Para'),

        ));
}