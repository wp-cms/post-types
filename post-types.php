<?php

/*
Plugin Name: Post Types
Description: Allow users to create custom post types in the WP Admin Area.
Version: 1.0.0
Text Domain: post-types
Domain Path: /languages/
*/

namespace plugin\post_types;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

// Register the CPT for Post Types and all defined Post Types
require_once plugin_dir_path( __FILE__ ) . 'general/register-post-types-cpt.php';
require_once plugin_dir_path( __FILE__ ) . 'general/register-post-types.php';

// Setup admin area
if ( is_admin() ) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-functions.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/plugin-activation.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/plugin-deactivation.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/load-textdomain.php';
}
