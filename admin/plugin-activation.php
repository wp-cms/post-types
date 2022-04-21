<?php

namespace Core\PostTypes;


register_activation_hook( __FILE__, 'post_types_plugin_activate_flush_rewrite' );

/**
 * Flush rewrite rules on plugin activation
 *
 * @since    1.0.0
 */
function post_types_plugin_activate_flush_rewrite() {
    register_post_types();
    flush_rewrite_rules();
}