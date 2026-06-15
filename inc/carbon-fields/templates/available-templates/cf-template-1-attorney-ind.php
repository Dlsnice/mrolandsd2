<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'template_1_attorney_ind_options');
function template_1_attorney_ind_options() {
    Container::make('post_meta', __('Attorney Individual Options', 'jdxstarter'))
        ->where('post_template', '=', 'templates/template-1-attorney-ind.php')

        // Profile Tab
        ->add_tab(__('Profile'), array(
            Field::make('image', 'headshot', 'Headshot Image')
                ->set_value_type('url'),
            Field::make('text', 'attorney_name', 'Name'),
            Field::make('text', 'attorney_title', 'Title/Position'),
            Field::make('rich_text', 'bio', 'Bio'),
            Field::make('text', 'email', 'Email'),
            Field::make('text', 'phone', 'Phone'),
            Field::make('text', 'social_linkedin', 'LinkedIn URL'),
            Field::make('text', 'social_facebook', 'Facebook URL'),
            Field::make('text', 'social_twitter', 'X (Twitter) URL'),
        ))

        // Practice Areas Tab
        ->add_tab(__('Practice Areas'), array(
            Field::make('text', 'practice_areas_heading', 'Section Heading')
                ->set_default_value('Practice Areas'),
            Field::make('complex', 'practice_areas', 'Practice Areas')
                ->set_collapsed(true)
                ->add_fields('area', 'Area', array(
                    Field::make('image', 'icon', 'Icon')
                        ->set_value_type('url'),
                    Field::make('text', 'title', 'Title'),
                ))
                ->set_header_template('<%- title %>'),
        ))

        // Personal Experience Tab
        ->add_tab(__('Personal Experience'), array(
            Field::make('text', 'experience_heading', 'Section Heading')
                ->set_default_value('Personal Experience'),
            Field::make('rich_text', 'experience_content', 'Content'),
        ))

        // Activities & Skills Tab
        ->add_tab(__('Activities & Skills'), array(
            Field::make('text', 'skills_heading', 'Section Heading')
                ->set_default_value('Activities Skills'),
            Field::make('complex', 'skills_list', 'Skills')
                ->set_collapsed(true)
                ->add_fields('skill', 'Skill', array(
                    Field::make('text', 'item', 'Skill Item'),
                ))
                ->set_header_template('<%- item %>'),
        ));
}
