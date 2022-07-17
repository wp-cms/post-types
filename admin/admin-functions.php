<?php

namespace plugin\post_types;

// Enqueue admin CSS
add_action( 'admin_enqueue_scripts', 'plugin\post_types\enqueue_styles' );

// admin setup
add_action( 'admin_init', 'plugin\post_types\post_types_settings_flush_rewrite' );
add_action( 'add_meta_boxes', 'plugin\post_types\post_types_metabox' );
add_action( 'save_post', 'plugin\post_types\post_types_save_metabox' );
add_filter( 'post_updated_messages', 'plugin\post_types\post_types_update_messages' );

// table columns
add_filter( 'manage_post_types_posts_columns', 'plugin\post_types\post_types_posts_columns' );
add_action( 'manage_post_types_posts_custom_column', 'plugin\post_types\post_types_posts_custom_columns', 10, 2 );

/**
 * Register the stylesheets for the admin area.
 *
 * @since    1.0.0
 */
function enqueue_styles() {
	wp_enqueue_style( 'post-types', plugin_dir_url( __FILE__ ) . 'css/post-types-admin.css', array() );
}

/**
 * Register the metabox for the custom fields.
 *
 * @since    1.0.0
 */
function post_types_metabox() {

	add_meta_box(
		'post_types_meta_box',
		__( 'Post Type Options', 'post-types' ),
		'plugin\post_types\post_types_metabox_content',
		array( 'post_types' ),
		'advanced',
		'high'
	);

	add_meta_box(
		'post_types_meta_box_side',
		__( 'Documentation', 'post-types' ),
		'plugin\post_types\post_types_metabox_side',
		array( 'post_types' ),
		'side',
		'low'
	);

}

/**
 * Render the side metabox for the Custom Post Types.
 *
 * @since    1.0.0
 */
function post_types_metabox_side( $post ) {
	?>
    <p><?php esc_html_e( 'For more info about each field please check the online documentation for ClassicPress.', 'post-types' ); ?></p>
	<?php
}


/**
 * Render the metabox for the Custom Post Types.
 *
 * @since    1.0.0
 */
function post_types_metabox_content( $post ) {
	global $pagenow;
	$meta = get_post_custom( $post->ID );

	$post_type_name                     = isset( $meta['post_type_name'] ) ? sanitize_title( $meta['post_type_name'][0] ) : '';
	$post_type_label                    = isset( $meta['post_type_label'] ) ? sanitize_text_field( $meta['post_type_label'][0] ) : '';
	$post_type_singular_name            = isset( $meta['post_type_singular_name'] ) ? sanitize_text_field( $meta['post_type_singular_name'][0] ) : '';
	$post_type_description              = isset( $meta['post_type_description'] ) ? sanitize_textarea_field( $meta['post_type_description'][0] ) : '';
	$post_type_icon_slug                = isset( $meta['post_type_icon_slug'] ) ? sanitize_title( $meta['post_type_icon_slug'][0] ) : '';
	$post_type_custom_rewrite_slug      = isset( $meta['post_type_custom_rewrite_slug'] ) ? sanitize_title( $meta['post_type_custom_rewrite_slug'][0] ) : '';
	$post_type_menu_position            = isset( $meta['post_type_menu_position'] ) ? sanitize_text_field( $meta['post_type_menu_position'][0] ) : '';
	$post_type_                         = isset( $meta['post_type_public'] ) ? sanitize_text_field( $meta['post_type_public'][0] ) : '';
	$post_type_show_ui                  = isset( $meta['post_type_show_ui'] ) ? sanitize_text_field( $meta['post_type_show_ui'][0] ) : '';
	$post_type_public                   = isset( $meta['post_type_public'] ) ? sanitize_text_field( $meta['post_type_public'][0] ) : '';
	$post_type_has_archive              = isset( $meta['post_type_has_archive'] ) ? sanitize_text_field( $meta['post_type_has_archive'][0] ) : '';
	$post_type_exclude_from_search      = isset( $meta['post_type_exclude_from_search'] ) ? sanitize_text_field( $meta['post_type_exclude_from_search'][0] ) : '';
	$post_type_capability_type          = isset( $meta['post_type_capability_type'] ) ? sanitize_text_field( $meta['post_type_capability_type'][0] ) : '';
	$post_type_hierarchical             = isset( $meta['post_type_hierarchical'] ) ? sanitize_text_field( $meta['post_type_hierarchical'][0] ) : '';
	$post_type_rewrite                  = isset( $meta['post_type_rewrite'] ) ? sanitize_text_field( $meta['post_type_rewrite'][0] ) : '';
	$post_type_withfront                = isset( $meta['post_type_withfront'] ) ? sanitize_text_field( $meta['post_type_withfront'][0] ) : '';
	$post_type_feeds                    = isset( $meta['post_type_feeds'] ) ? sanitize_text_field( $meta['post_type_feeds'][0] ) : '';
	$post_type_pages                    = isset( $meta['post_type_pages'] ) ? sanitize_text_field( $meta['post_type_pages'][0] ) : '';
	$post_type_query_var                = isset( $meta['post_type_query_var'] ) ? sanitize_text_field( $meta['post_type_query_var'][0] ) : '';
	$post_type_show_in_rest             = isset( $meta['post_type_show_in_rest'] ) ? sanitize_text_field( $meta['post_type_show_in_rest'][0] ) : '';
	$post_type_publicly_queryable       = isset( $meta['post_type_publicly_queryable'] ) ? sanitize_text_field( $meta['post_type_publicly_queryable'][0] ) : '';
	$post_type_show_in_menu             = isset( $meta['post_type_show_in_menu'] ) ? sanitize_text_field( $meta['post_type_show_in_menu'][0] ) : '';
	$post_type_supports                 = isset( $meta['post_type_supports'] ) ? unserialize( $meta['post_type_supports'][0] ) : array();
	$post_type_supports_title           = ( isset( $meta['post_type_supports'] ) && in_array( 'title', $post_type_supports ) ? 'title' : '' );
	$post_type_supports_editor          = ( isset( $meta['post_type_supports'] ) && in_array( 'editor', $post_type_supports ) ? 'editor' : '' );
	$post_type_supports_excerpt         = ( isset( $meta['post_type_supports'] ) && in_array( 'excerpt', $post_type_supports ) ? 'excerpt' : '' );
	$post_type_supports_custom_fields   = ( isset( $meta['post_type_supports'] ) && in_array( 'custom-fields', $post_type_supports ) ? 'custom-fields' : '' );
	$post_type_supports_revisions       = ( isset( $meta['post_type_supports'] ) && in_array( 'revisions', $post_type_supports ) ? 'revisions' : '' );
	$post_type_supports_featured_image  = ( isset( $meta['post_type_supports'] ) && in_array( 'thumbnail', $post_type_supports ) ? 'thumbnail' : '' );
	$post_type_supports_author          = ( isset( $meta['post_type_supports'] ) && in_array( 'author', $post_type_supports ) ? 'author' : '' );
	$post_type_supports_page_attributes = ( isset( $meta['post_type_supports'] ) && in_array( 'page-attributes', $post_type_supports ) ? 'page-attributes' : '' );
	$post_type_supports_post_formats    = ( isset( $meta['post_type_supports'] ) && in_array( 'post-formats', $post_type_supports ) ? 'post-formats' : '' );
	$post_type_builtin_tax              = isset( $meta['post_type_builtin_tax'] ) ? unserialize( $meta['post_type_builtin_tax'][0] ) : array();
	$post_type_builtin_tax_categories   = ( isset( $meta['post_type_builtin_tax'] ) && in_array( 'category', $post_type_builtin_tax ) ? 'category' : '' );
	$post_type_builtin_tax_tags         = ( isset( $meta['post_type_builtin_tax'] ) && in_array( 'post_tag', $post_type_builtin_tax ) ? 'post_tag' : '' );

	// set default support options when creating new CPT
	$post_type_supports_title   = $pagenow === 'post-new.php' ? 'title' : $post_type_supports_title;
	$post_type_supports_editor  = $pagenow === 'post-new.php' ? 'editor' : $post_type_supports_editor;
	$post_type_supports_excerpt = $pagenow === 'post-new.php' ? 'excerpt' : $post_type_supports_excerpt;

	include_once 'partials/post-types-metabox.php';
}


/**
 * Save the fields in the custom metaboxes
 *
 * @since    1.0.0
 */
function post_types_save_metabox( $post_id ) {

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['post_type_meta_box_nonce_field'] ) || ! wp_verify_nonce( $_POST['post_type_meta_box_nonce_field'], 'post_type_meta_box_nonce_action' ) ) {
		return;
	}

	// CPTs fields
	if ( isset( $_POST['post_type_name'] ) ) {
		update_post_meta( $post_id, 'post_type_name', sanitize_title( strtolower( str_replace( ' ', '', $_POST['post_type_name'] ) ) ) );
	}

	if ( isset( $_POST['post_type_label'] ) ) {
		update_post_meta( $post_id, 'post_type_label', sanitize_text_field( $_POST['post_type_label'] ) );
	}

	if ( isset( $_POST['post_type_singular_name'] ) ) {
		update_post_meta( $post_id, 'post_type_singular_name', sanitize_text_field( $_POST['post_type_singular_name'] ) );
	}

	if ( isset( $_POST['post_type_description'] ) ) {
		update_post_meta( $post_id, 'post_type_description', sanitize_textarea_field( $_POST['post_type_description'] ) );
	}

	if ( isset( $_POST['post_type_icon_slug'] ) ) {
		update_post_meta( $post_id, 'post_type_icon_slug', sanitize_title( $_POST['post_type_icon_slug'] ) );
	}

	if ( isset( $_POST['post_type_public'] ) ) {
		update_post_meta( $post_id, 'post_type_public', sanitize_text_field( $_POST['post_type_public'] ) );
	}

	if ( isset( $_POST['post_type_show_ui'] ) ) {
		update_post_meta( $post_id, 'post_type_show_ui', sanitize_text_field( $_POST['post_type_show_ui'] ) );
	}

	if ( isset( $_POST['post_type_has_archive'] ) ) {
		update_post_meta( $post_id, 'post_type_has_archive', sanitize_text_field( $_POST['post_type_has_archive'] ) );
	}

	if ( isset( $_POST['post_type_exclude_from_search'] ) ) {
		update_post_meta( $post_id, 'post_type_exclude_from_search', sanitize_text_field( $_POST['post_type_exclude_from_search'] ) );
	}

	if ( isset( $_POST['post_type_capability_type'] ) ) {
		update_post_meta( $post_id, 'post_type_capability_type', sanitize_text_field( $_POST['post_type_capability_type'] ) );
	}

	if ( isset( $_POST['post_type_hierarchical'] ) ) {
		update_post_meta( $post_id, 'post_type_hierarchical', sanitize_text_field( $_POST['post_type_hierarchical'] ) );
	}

	if ( isset( $_POST['post_type_rewrite'] ) ) {
		update_post_meta( $post_id, 'post_type_rewrite', sanitize_text_field( $_POST['post_type_rewrite'] ) );
	}

	if ( isset( $_POST['post_type_withfront'] ) ) {
		update_post_meta( $post_id, 'post_type_withfront', sanitize_text_field( $_POST['post_type_withfront'] ) );
	}

	if ( isset( $_POST['post_type_feeds'] ) ) {
		update_post_meta( $post_id, 'post_type_feeds', sanitize_text_field( $_POST['post_type_feeds'] ) );
	}

	if ( isset( $_POST['post_type_pages'] ) ) {
		update_post_meta( $post_id, 'post_type_pages', sanitize_text_field( $_POST['post_type_pages'] ) );
	}

	if ( isset( $_POST['post_type_custom_rewrite_slug'] ) ) {
		update_post_meta( $post_id, 'post_type_custom_rewrite_slug', sanitize_title( $_POST['post_type_custom_rewrite_slug'] ) );
	}

	if ( isset( $_POST['post_type_query_var'] ) ) {
		update_post_meta( $post_id, 'post_type_query_var', sanitize_text_field( $_POST['post_type_query_var'] ) );
	}

	if ( isset( $_POST['post_type_show_in_rest'] ) ) {
		update_post_meta( $post_id, 'post_type_show_in_rest', sanitize_text_field( $_POST['post_type_show_in_rest'] ) );
	}

	if ( isset( $_POST['post_type_publicly_queryable'] ) ) {
		update_post_meta( $post_id, 'post_type_publicly_queryable', sanitize_text_field( $_POST['post_type_publicly_queryable'] ) );
	}

	if ( isset( $_POST['post_type_menu_position'] ) ) {
		update_post_meta( $post_id, 'post_type_menu_position', sanitize_text_field( $_POST['post_type_menu_position'] ) );
	}

	if ( isset( $_POST['post_type_show_in_menu'] ) ) {
		update_post_meta( $post_id, 'post_type_show_in_menu', sanitize_text_field( $_POST['post_type_show_in_menu'] ) );
	}

	$post_type_supports = isset( $_POST['post_type_supports'] ) ? sanitize_text_field_array( $_POST['post_type_supports'] ) : array();
	update_post_meta( $post_id, 'post_type_supports', $post_type_supports );

	$post_type_builtin_tax = isset( $_POST['post_type_builtin_tax'] ) ? sanitize_text_field_array( $_POST['post_type_builtin_tax'] ) : array();
	update_post_meta( $post_id, 'post_type_builtin_tax', $post_type_builtin_tax );

	update_option( 'post_types_flush_needed', true );

}

/**
 * Flush rewrite rules if CPT was saved/updated
 *
 * @since    1.0.0
 */
function post_types_settings_flush_rewrite() {
	if ( get_option( 'post_types_flush_needed' ) === true ) {
		flush_rewrite_rules();
		update_option( 'post_types_flush_needed', false );
	}
}


/**
 * Define custom columns for CPT admin table
 *
 * @since  1.0.0
 */
function post_types_posts_columns( $columns ) {

	return array(
		'cb'          => $columns['cb'],
		'title'       => __( 'Title', 'post-types' ),
		'slug'        => __( 'Slug', 'post-types' ),
		'description' => __( 'Description', 'post-types' ),
		'author'      => __( 'Author', 'post-types' ),
		'date'        => __( 'Date', 'post-types' ),
	);

}

/**
 * Render custom columns for CPT admin table
 *
 * @since  1.0.0
 */
function post_types_posts_custom_columns( $column_name, $id ) {

	if ( $column_name === 'slug' ) {
		echo esc_html( get_post_meta( get_the_ID(), 'post_type_name', true ) );
	}
	if ( $column_name === 'description' ) {
		echo esc_html( get_post_meta( get_the_ID(), 'post_type_description', true ) );
	}
}


/**
 * Post Update messages
 *
 * @param $msg
 *
 * @return array           Update messages
 * @since    1.0.0
 */
function post_types_update_messages( $msg ) {

	$msg['post_types'] = array(
		0  => '',
		1  => __( 'Custom Post Type updated.', 'post-types' ),
		2  => __( 'Custom Post Type updated.', 'post-types' ),
		3  => __( 'Custom Post Type deleted.', 'post-types' ),
		4  => __( 'Custom Post Type updated.', 'post-types' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Custom Post Type restored to revision from %s', 'post-types' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'Custom Post Type published.', 'post-types' ),
		7  => __( 'Custom Post Type saved.', 'post-types' ),
		8  => __( 'Custom Post Type submitted.', 'post-types' ),
		9  => __( 'Custom Post Type scheduled for.', 'post-types' ),
		10 => __( 'Custom Post Type draft updated.', 'post-types' ),
	);

	return $msg;
}


