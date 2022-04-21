<?php

/**
 * Register the post type where we will store all custom post types
 */

register_post_type(
    'post_types',
    array(
        'labels'          => array(
            'name'               => __( 'Post Types', 'post-types' ),
            'singular_name'      => __( 'Custom Post Type', 'post-types' ),
            'add_new'            => __( 'Add New', 'post-types' ),
            'add_new_item'       => __( 'Add New Custom Post Type', 'post-types' ),
            'edit_item'          => __( 'Edit Custom Post Type', 'post-types' ),
            'new_item'           => __( 'New Custom Post Type', 'post-types' ),
            'view_item'          => __( 'View Custom Post Type', 'post-types' ),
            'search_items'       => __( 'Search Custom Post Types', 'post-types' ),
            'not_found'          => __( 'No Custom Post Types found', 'post-types' ),
            'not_found_in_trash' => __( 'No Custom Post Types found in Trash', 'post-types' ),
        ),
        'public'          => false,
        'show_ui'         => true,
        '_builtin'        => false,
        'capability_type' => 'page',
        'hierarchical'    => false,
        'rewrite'         => false,
        'query_var'       => 'post_types',
        'supports'        => array( 'title', 'author'),
        'show_in_menu'    => 'options-general.php',
    )
);