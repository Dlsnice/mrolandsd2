<?php

/***
*** Theme support ***
*** Usage: https://developer.wordpress.org/reference/functions/add_theme_support/ ***
***/

function jdxstarter_setup() {
	add_theme_support( 'title-tag' ); // HTML <title> tag
	add_theme_support( 'custom-logo' ); // Customize "Site Settings" Logo
	add_theme_support( 'post-thumbnails' ); // Page/Post Featured image support
	add_theme_support( 'responsive-embeds'); // Adds responsive support to image and video embeds
	add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'jdxstarter_setup' );

/***
*** Limit length of the_excerpt ***
*** --------------------------- ***
*** Ex: <?php echo '<p class="blog-excerpt">' . excerpt(60) . '</p>' ?> ***
*** --------------------------- ***
***/

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	  array_pop($excerpt);
	  $excerpt = implode(" ",$excerpt).'...';
	} else {
	  $excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
  }

/***
*** Enable SVG Support ***
***/

function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );

/***
*** Disable Gutenberg Stylesheet ***
***/

if (!is_front_page()) :
	function remove_block_css(){
	wp_dequeue_style( 'wp-block-library' );
	}
	add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
endif;

/***
*** Add the duplicate link to action list for POSTS ***
***/

// Add the duplicate link to action list for POSTS ***

function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}

	// Nonce verification
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;

	// Get the original post id

	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );

	// and all the original post data then

	$post = get_post( $post_id );

	// If you don't want current user to be the new post author, 
	// then change next couple of lines to this: $new_post_author = $post->post_author;

	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	// If post data exists, create the post duplicate

	if (isset( $post ) && $post != null) {

		
		// New post data array

		$args = array(
		'comment_status' => $post->comment_status,
		'ping_status'    => $post->ping_status,
		'post_author'    => $new_post_author,
		'post_content'   => $post->post_content,
		'post_excerpt'   => $post->post_excerpt,
		'post_name'      => $post->post_name,
		'post_parent'    => $post->post_parent,
		'post_password'  => $post->post_password,
		'post_status'    => 'draft',
		'post_title'     => $post->post_title,
		'post_type'      => $post->post_type,
		'to_ping'        => $post->to_ping,
		'menu_order'     => $post->menu_order
		);

		// Insert the post by wp_insert_post() function

		$new_post_id = wp_insert_post( $args );

		// Get all current post terms ad set them to the new post draft

		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
		$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
		wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		// Uplicate all post meta just in two SQL queries

		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
		$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
		foreach ($post_meta_infos as $meta_info) {
			$meta_key = $meta_info->meta_key;
			if( $meta_key == '_wp_old_slug' ) continue;
			$meta_value = addslashes($meta_info->meta_value);
			$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
		}
		$sql_query.= implode(" UNION ALL ", $sql_query_sel);
		$wpdb->query($sql_query);
		}

		// Finally, redirect to the edit post screen for the new draft

		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
   
// Add the duplicate link to action list for post_row_actions

function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

// Add the duplicate link to action list for PAGES

function rg_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts') && get_post_type() != 'acf-field-group') {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
add_filter('page_row_actions', 'rg_duplicate_post_link', 10, 2);

/***
*** Remove Admin Bar margin-top: 32px!important  ***
***/

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

/***
*** Remove <p> and <br/> from Contact Form 7 ***
***/

add_filter('wpcf7_autop_or_not', '__return_false');

/***
 * Disable img srcset
 */

function remove_max_srcset_image_width( $max_width ) {
	return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );
	function wdo_disable_srcset( $sources ) {
	return false;
}
add_filter( 'wp_calculate_image_srcset', 'wdo_disable_srcset' );

/***
 * Disable Gutenberg on Pages
 */

function disable_gutenberg_for_pages($use_block_editor, $post) {
    if ($post && $post->post_type === 'page') {
        return false; // Disable Gutenberg for pages
    }
    return $use_block_editor; // Keep Gutenberg for other post types
}
add_filter('use_block_editor_for_post', 'disable_gutenberg_for_pages', 10, 2);

/***
 * Disable meta boxes on pages with Gutenberg disabled
 */

function disable_unused_metaboxes() {
    remove_meta_box('postcustom', 'page', 'normal'); // Custom Fields (Pages)
    remove_meta_box('commentstatusdiv', 'page', 'normal'); // Discussion (Allow Comments - Pages)
    remove_meta_box('commentsdiv', 'page', 'normal'); // Comments
	remove_meta_box('trackbacksdiv', 'page', 'normal'); // Trackbacks
    remove_meta_box('revisionsdiv', 'page', 'normal'); // Revisions
	remove_meta_box('slugdiv', 'page', 'normal'); // Slug
    remove_meta_box('authordiv', 'page', 'normal'); // Remove from main editor
    add_meta_box('authordiv', __('Author'), 'post_author_meta_box', 'page', 'side', 'default'); // Add to sidebar
}
add_action('admin_menu', 'disable_unused_metaboxes');
