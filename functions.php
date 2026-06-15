<?php
require_once(TEMPLATEPATH . '/inc/menus.php');
require_once(TEMPLATEPATH . '/inc/overrides.php');
require_once(TEMPLATEPATH . '/inc/styles_scripts.php');
require_once(TEMPLATEPATH . '/inc/blocks.php');
require_once(TEMPLATEPATH . '/inc/carbon-fields.php');
require_once(TEMPLATEPATH . '/inc/shortcodes.php');
require_once(TEMPLATEPATH . '/inc/comments.php');
require_once(TEMPLATEPATH . '/inc/login.php');

function remove_cssjs_ver($src)
{
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

add_action('init', 'reviews_init');
function reviews_init()
{
    $labels = array(
        'name' => 'Reviews',
        'singular_name' => 'Review',
        'add_new' => 'Add New',
        'mythings',
        'add_new_item' => 'Add New Review',
        'edit_item' => 'Edit Review',
        'new_item' => 'New Review',
        'view_item' => 'View Review',
        'search_items' => 'Search Review',
        'not_found' => 'No Reviews found',
        'not_found_in_trash' => 'No Reviews found in Trash',
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'review'),
        'menu_position' => null,
        'show_in_rest' => true,
        'rest_base' => 'review',
        'supports' => array(
            'title',
            'editor',
            //'thumbnail'
        ),
    );
    register_post_type('review', $args);
    flush_rewrite_rules();
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_review_fields');

function crb_review_fields()
{

    Container::make('post_meta', 'Review Details')
        ->where('post_type', '=', 'review')
        ->add_fields(array(

            Field::make('text', 'project_title', 'Project Title'),

            Field::make('text', 'author_bio', 'Author Bio'),

        ));
}


function normalize_phone($input)
{
    // Remove all non-numeric characters
    $digits = preg_replace('/\D+/', '', $input);

    // Check for 10 digits, reformat as 206-552-8823
    if (strlen($digits) === 10) {
        return substr($digits, 0, 3) . '-' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    // Return as is if formatting is not possible
    return $input;
}

function inner_cta_box($atts)
{

    $atts = shortcode_atts(array(
        'content' => 'We can help you navigate your legal needs and achieve your goals.',
        'button_text' => 'Contact Us',
        'button_link' => '/contact/',
    ), $atts);

    ob_start(); ?>

    <div class="in-cmn-blk">
        <div class="in-cmn-blk-hdg">
            <?php echo wp_kses_post($atts['content']); ?>
        </div>
        <div class="in-cmn-blk-btn">
            <a href="<?php echo esc_url($atts['button_link']); ?>"
                class="cmn-btn"><?php echo esc_html($atts['button_text']); ?></a>
        </div>
    </div>


    <?php
    return ob_get_clean();
}

add_shortcode('innercta', 'inner_cta_box');