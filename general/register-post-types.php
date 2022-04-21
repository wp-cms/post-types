<?php

namespace Core\PostTypes;

add_action( 'init', 'Core\PostTypes\register_post_types' );

/**
 * Retrieve all post types definitions created by the user and set them up
 *
 * @since    1.0.0
 */
function register_post_types() {

    $post_types = array();

    // Query custom post types
    $post_types_query        = array(
        'numberposts'      => -1,
        'post_type'        => 'post_types',
        'post_status'      => 'publish',
        'suppress_filters' => false,
    );
    $post_types_definitions = get_posts( $post_types_query );

    // Create array of post meta
    if ( $post_types_definitions ) {
        foreach ( $post_types_definitions as $post_type ) {
            $post_type_meta = get_post_meta( $post_type->ID, '', true );

            // Text
            $post_type_name          = ( array_key_exists( 'post_type_name', $post_type_meta ) && $post_type_meta['post_type_name'][0] ? sanitize_title( $post_type_meta['post_type_name'][0] ) : 'no_name' );
            $post_type_label         = ( array_key_exists( 'post_type_label', $post_type_meta ) && $post_type_meta['post_type_label'][0] ? sanitize_text_field( $post_type_meta['post_type_label'][0] ) : $post_type_name );
            $post_type_singular_name = ( array_key_exists( 'post_type_singular_name', $post_type_meta ) && $post_type_meta['post_type_singular_name'][0] ? sanitize_text_field( $post_type_meta['post_type_singular_name'][0] ) : $post_type_label );
            $post_type_description   = ( array_key_exists( 'post_type_description', $post_type_meta ) && $post_type_meta['post_type_description'][0] ? sanitize_textarea_field($post_type_meta['post_type_description'][0]) : '' );

            // post icon (dashicons)
            $post_type_icon_name = ( array_key_exists( 'post_type_icon_slug', $post_type_meta ) && $post_type_meta['post_type_icon_slug'][0] ? sanitize_title($post_type_meta['post_type_icon_slug'][0]) : false );

            $post_type_custom_rewrite_slug = ( array_key_exists( 'post_type_custom_rewrite_slug', $post_type_meta ) && $post_type_meta['post_type_custom_rewrite_slug'][0] ? sanitize_title( $post_type_meta['post_type_custom_rewrite_slug'][0] ) : $post_type_name );
            $post_type_menu_position       = ( array_key_exists( 'post_type_menu_position', $post_type_meta ) && $post_type_meta['post_type_menu_position'][0] ? (int) $post_type_meta['post_type_menu_position'][0] : null );

            // dropdowns
            $post_type_public             = array_key_exists( 'post_type_public', $post_type_meta ) && $post_type_meta['post_type_public'][0] == '1';
            $post_type_show_ui             = array_key_exists( 'post_type_show_ui', $post_type_meta ) && $post_type_meta['post_type_show_ui'][0] == '1';
            $post_type_has_archive         = array_key_exists( 'post_type_has_archive', $post_type_meta ) && $post_type_meta['post_type_has_archive'][0] == '1';
            $post_type_exclude_from_search = array_key_exists( 'post_type_exclude_from_search', $post_type_meta ) && $post_type_meta['post_type_exclude_from_search'][0] == '1';
            $post_type_capability_type     = ( array_key_exists( 'post_type_capability_type', $post_type_meta ) && $post_type_meta['post_type_capability_type'][0] ? $post_type_meta['post_type_capability_type'][0] : 'post' );
            $post_type_hierarchical        = array_key_exists( 'post_type_hierarchical', $post_type_meta ) && $post_type_meta['post_type_hierarchical'][0] == '1';
            $post_type_rewrite             = array_key_exists( 'post_type_rewrite', $post_type_meta ) && $post_type_meta['post_type_rewrite'][0] == '1';
            $post_type_withfront           = array_key_exists( 'post_type_withfront', $post_type_meta ) && $post_type_meta['post_type_withfront'][0] == '1';
            $post_type_feeds               = array_key_exists( 'post_type_feeds', $post_type_meta ) && $post_type_meta['post_type_feeds'][0] == '1';
            $post_type_pages               = array_key_exists( 'post_type_pages', $post_type_meta ) && $post_type_meta['post_type_pages'][0] == '1';
            $post_type_query_var           = array_key_exists( 'post_type_query_var', $post_type_meta ) && $post_type_meta['post_type_query_var'][0] == '1';
            $post_type_show_in_rest        = array_key_exists( 'post_type_show_in_rest', $post_type_meta ) && $post_type_meta['post_type_show_in_rest'][0] == '1';

            // If it doesn't exist, it must be set to true ( fix for existing installs )
            if ( ! array_key_exists( 'post_type_publicly_queryable', $post_type_meta ) ) {
                $post_type_publicly_queryable = true;
            } elseif ( $post_type_meta['post_type_publicly_queryable'][0] == '1' ) {
                $post_type_publicly_queryable = true;
            } else {
                $post_type_publicly_queryable = false;
            }

            $post_type_show_in_menu = array_key_exists( 'post_type_show_in_menu', $post_type_meta ) && $post_type_meta['post_type_show_in_menu'][0] == '1';

            // checkboxes
            $post_type_supports    = ( array_key_exists( 'post_type_supports', $post_type_meta ) && $post_type_meta['post_type_supports'][0] ? $post_type_meta['post_type_supports'][0] : 'a:2:{i:0;s:5:"title";i:1;s:6:"editor";}' );
            $post_type_builtin_tax = ( array_key_exists( 'post_type_builtin_tax', $post_type_meta ) && $post_type_meta['post_type_builtin_tax'][0] ? $post_type_meta['post_type_builtin_tax'][0] : 'a:0:{}' );

            $post_type_rewrite_options = array();
            if ( $post_type_rewrite ) {
                $post_type_rewrite_options['slug'] = _x( $post_type_custom_rewrite_slug, 'URL Slug', 'post-types' );
            }

            $post_type_rewrite_options['with_front'] = $post_type_withfront;

            if ( $post_type_feeds ) {
                $post_type_rewrite_options['feeds'] = $post_type_feeds;
            }
            if ( $post_type_pages ) {
                $post_type_rewrite_options['pages'] = $post_type_pages;
            }

            $post_types[] = array(
                'post_type_id'                  => $post_type->ID,
                'post_type_name'                => $post_type_name,
                'post_type_label'               => $post_type_label,
                'post_type_singular_name'       => $post_type_singular_name,
                'post_type_description'         => $post_type_description,
                'post_type_icon_name'           => $post_type_icon_name,
                'post_type_custom_rewrite_slug' => $post_type_custom_rewrite_slug,
                'post_type_menu_position'       => $post_type_menu_position,
                'post_type_public'              => $post_type_public,
                'post_type_show_ui'             => $post_type_show_ui,
                'post_type_has_archive'         => $post_type_has_archive,
                'post_type_exclude_from_search' => $post_type_exclude_from_search,
                'post_type_capability_type'     => $post_type_capability_type,
                'post_type_hierarchical'        => $post_type_hierarchical,
                'post_type_rewrite'             => $post_type_rewrite_options,
                'post_type_query_var'           => $post_type_query_var,
                'post_type_show_in_rest'        => $post_type_show_in_rest,
                'post_type_publicly_queryable'  => $post_type_publicly_queryable,
                'post_type_show_in_menu'        => $post_type_show_in_menu,
                'post_type_supports'            => unserialize( $post_type_supports ),
                'post_type_builtin_taxonomies'  => unserialize( $post_type_builtin_tax ),
            );

            // register custom post types
            if ( is_array( $post_types ) ) {
                foreach ( $post_types as $post_type ) {

                    $labels = array(
                        'name'               => __( $post_type['post_type_label'], 'post-types' ),
                        'singular_name'      => __( $post_type['post_type_singular_name'], 'post-types' ),
                        'add_new'            => __( 'Add New', 'post-types' ),
                        'add_new_item'       => __( 'Add New ' . $post_type['post_type_singular_name'], 'post-types' ),
                        'edit_item'          => __( 'Edit ' . $post_type['post_type_singular_name'], 'post-types' ),
                        'new_item'           => __( 'New ' . $post_type['post_type_singular_name'], 'post-types' ),
                        'view_item'          => __( 'View ' . $post_type['post_type_singular_name'], 'post-types' ),
                        'search_items'       => __( 'Search ' . $post_type['post_type_label'], 'post-types' ),
                        'not_found'          => __( 'No ' . $post_type['post_type_label'] . ' found', 'post-types' ),
                        'not_found_in_trash' => __( 'No ' . $post_type['post_type_label'] . ' found in Trash', 'post-types' ),
                    );

                    $args = array(
                        'labels'              => $labels,
                        'description'         => $post_type['post_type_description'],
                        'menu_icon'           => $post_type['post_type_icon_name'],
                        'rewrite'             => $post_type['post_type_rewrite'],
                        'menu_position'       => $post_type['post_type_menu_position'],
                        'public'              => $post_type['post_type_public'],
                        'show_ui'             => $post_type['post_type_show_ui'],
                        'has_archive'         => $post_type['post_type_has_archive'],
                        'exclude_from_search' => $post_type['post_type_exclude_from_search'],
                        'capability_type'     => $post_type['post_type_capability_type'],
                        'hierarchical'        => $post_type['post_type_hierarchical'],
                        'show_in_menu'        => $post_type['post_type_show_in_menu'],
                        'query_var'           => $post_type['post_type_query_var'],
                        'show_in_rest'        => $post_type['post_type_show_in_rest'],
                        'publicly_queryable'  => $post_type['post_type_publicly_queryable'],
                        '_builtin'            => false,
                        'supports'            => $post_type['post_type_supports'],
                        'taxonomies'          => $post_type['post_type_builtin_taxonomies'],
                    );
                    if ( $post_type['post_type_name'] != 'no_name' ) {
                        register_post_type( $post_type['post_type_name'], $args );
                    }
                }
            }
        }
    }
}
