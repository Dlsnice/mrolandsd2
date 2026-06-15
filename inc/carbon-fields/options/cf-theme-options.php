<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/***
 *** Theme Options Page ***
 *** Usage: https://carbonfields.net/docs/fields-usage-2/ ***
 ***/

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('theme_options', __('Theme Options', 'crb'))
        ->add_tab(__('Site Header'), array(
            Field::make('text', 'phone_number', 'Phone Number'),
        ))


        ->add_tab(__('Site Social Icons'), array(
            // Social Links
            Field::make('complex', 'ftr_social_icons', 'Footer Social Icons')
                ->add_fields(array(
                    Field::make('image', 'ftr_social_icon', 'Social Icon Image')
                        ->set_value_type('url'),

                    Field::make('text', 'ftr_social_icon_name', 'Social Icon Name'),
                    Field::make('text', 'ftr_social_icon_link', 'Social Icon Link'),

                )),
        ))

        ->add_tab(__('Footer Top'), array(
            // CTA Section
            Field::make('text', 'footer_cta_heading', 'Foooter CTA Heading'),
            Field::make('rich_text', 'footer_cta_content', 'Foooter CTA Content'),
            Field::make('text', 'footer_cta_btn_text', 'Foooter CTA Button Text'),
            Field::make('text', 'footer_cta_btn_link', 'Foooter CTA Button Link'),
        ))

        ->add_tab(__('Site Footer'), array(

            // Footer Logo
            Field::make('image', 'ftr_logo', 'Footer Logo')->set_value_type('url'),
            Field::make('image', 'footer_background_image', 'Footer Background Image')->set_value_type('url'),

            // Contact Details
            Field::make('text', 'footer_phone', 'Phone Number'),
            Field::make('text', 'footer_fax', 'Fax Number'),

            Field::make('image', 'ftr_call_icon', 'Footer Call Icon')
                ->set_value_type('url'),
            Field::make('image', 'ftr_fax_icon', 'Footer Fax Icon')
                ->set_value_type('url'),

            Field::make('text', 'footer_address', 'Address'),
            Field::make('image', 'footer_address_icon', 'Footer Address Icon')
                ->set_value_type('url'),
            Field::make('text', 'footer_address_link', 'Google Maps Link'),

            Field::make('text', 'footer_email', 'Email Address'),
            Field::make('image', 'footer_email_icon', 'Footer Email Icon')
                ->set_value_type('url'),

        ))

        ->add_tab(__('Copyrights & Disclaimer'), array(

            // Disclaimer
            Field::make('rich_text', 'footer_disclaimer', 'Disclaimer'),

            // Copyright
            Field::make('text', 'privacy_policy_text', 'Privacy Policy Text'),
            Field::make('text', 'privacy_policy_link', 'Privacy Policy Link'),
        ))

        // sidebars

        ->add_tab(__('Sidebars'), array(
            Field::make('text', 'services_sb_title', 'Services Sidebar Title'),
            Field::make('separator', 'sb_form', 'Sidebar Form'),
            Field::make('text', 'sb_form_title', 'Sidebar Form Title'),
            Field::make('textarea', 'sb_form_desc', 'Sidebar FormDescription'),
            Field::make('gravity_form', 'sb_gravity_form', 'Select a Form'),
            Field::make('separator', 'sb_contact', 'Sidebar Contact'),
            Field::make('image', 'sb_contact_bg', 'Background Image')->set_value_type('url'),
        ));

}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once(__DIR__ . '../../../../vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}