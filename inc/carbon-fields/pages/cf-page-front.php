<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options' );

function crb_attach_post_options() {

    Container::make( 'post_meta', __( 'Home Page Sections', 'crbh' ) )
        ->where( 'post_template', '=', 'templates/page-front.php' )

        ->add_fields( array(

            Field::make( 'complex', 'crbh_sections', 'Sections' )
                ->set_collapsed( true )

                ->add_fields('home-banner', 'Home Banner Section', array(
                    Field::make('text', 'banner_heading', 'Banner Heading'),
                    Field::make('text', 'banner_button_text', 'Banner Button Text'),
                    Field::make('text', 'banner_button_link', 'Banner Button URL'),

                    Field::make('complex', 'banner_slides', 'Banner Slides')
                        ->set_collapsed(true)
                        ->add_fields('slide', 'Slide', array(
                            Field::make('image', 'banner_slide_image', 'Banner Slide Image')->set_value_type('url'),
                        ))
                ))

                ->add_fields('home-coordinate-section', 'Home Coordinate Section', array(
                   Field::make('text', 'coordinate_sec_heading', 'Coordinate Heading'),
                   Field::make('rich_text', 'coordinate_sec_content', 'Coordinate Content'),
               ))
               ->add_fields('home-offer-section', 'Home Offer Section', array(
                   Field::make('text', 'offer_sec_heading', 'Offer Heading'),
                   Field::make('rich_text', 'offer_sec_content', 'Offer Content'),
                   Field::make('text', 'offer_sec_whychoose_txt', 'Offer Why choose Text'),
               ))
                ->add_fields('home-different-section', 'Home Different Section', array(
                   Field::make('text', 'different_sec_heading', 'Different Heading'),
                   Field::make('rich_text', 'different_sec_content', 'Different Content'),
                   Field::make('image', 'different_sec_bg_image', 'Different Section Background Image')->set_value_type('url'),
               ))
               ->add_fields('home-association-section', 'Home Association Section', array(
                 Field::make('text', 'association_heading', 'Association Heading'),
                 Field::make('image', 'association_curve_image', 'Association Curve Image')->set_value_type('url'),
                 Field::make('text', 'association_sec_count', 'Association Step Count'),
                 Field::make('text', 'association_sec_subtitle', 'Association Sub Title'),
                 Field::make('rich_text', 'association_sec_content', 'Association Content'),
                 
                 Field::make('complex', 'hm_association_items', 'Association Steps')
                    ->set_collapsed(true)
                    ->add_fields('item', 'Item', array(
                    Field::make('text', 'hm_association_count', 'Association Step Number'),
                    Field::make('text', 'hm_association_subtitle', 'Association Sub Title'),
                    Field::make('rich_text', 'hm_association_content', 'Association Step Content'),
                        ))
                ))

                ->add_fields('home-developers-section', 'Home Developers Section', array(
                 Field::make('text', 'developers_heading', 'Developers Heading'),
                 Field::make('image', 'developers_curve_image', 'Developers Curve Image')->set_value_type('url'),
                 Field::make('image', 'developers_bg_image', 'Developers Background Image')->set_value_type('url'),
                 Field::make('text', 'developers_sec_count', 'Developers Step Count'),
                 Field::make('text', 'developers_sec_subtitle', 'Developers Sub Title'),
                 Field::make('rich_text', 'developers_sec_content', 'Developers Content'),
                 
                 Field::make('complex', 'hm_developers_items', 'Developers Steps')
                    ->set_collapsed(true)
                    ->add_fields('item', 'Item', array(
                    Field::make('text', 'hm_developers_count', 'Developers Step Number'),
                    Field::make('text', 'hm_developers_subtitle', 'Developers Sub Title'),
                    Field::make('rich_text', 'hm_developers_content', 'Developers Step Content'),
                        ))
                ))

                 ->add_fields('home-unique-expertise', 'Home Unique Expertise Section', array(
                    Field::make('text', 'hm_unique_heading', 'Heading'),
                    Field::make('text', 'hm_unique_services_text', 'Services Text'),

                    Field::make('complex', 'hm_unique_items', 'Unique Expertise Items')
                        ->add_fields(array(
                            Field::make('image', 'hm_unique_image', 'Image') ->set_value_type('url'),
                            Field::make('text', 'hm_unique_title', 'Title'),
                            Field::make('rich_text', 'hm_unique_content', 'Content'),
                        )),
                ))

                ->add_fields('home-business', 'Home Business Section', array(
                    Field::make('text', 'hm_business_heading', 'Heading'),
                    Field::make('rich_text', 'hm_business_content', 'Heading Content'),
                    Field::make('image', 'hm_business_image', 'Business Image')->set_value_type('url'),
                    Field::make('image', 'hm_business_bg_image', 'Business Bg Image')->set_value_type('url'),
                ))

                ->add_fields('home-testimonials-section', 'Home Testimonials Section', array(
                    Field::make('text', 'testi_heading', 'Testi Heading'),
                    Field::make('text', 'testi_button_text', 'Testimonials Button Text'),
                    Field::make('text', 'testi_button_url', 'Testimonials Button URL'),
                ))
                
                

        ) );
}