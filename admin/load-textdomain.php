<?php

namespace Core\PostTypes;

/**
 * Define the locale for this plugin for internationalization.
 *
 * @since    1.0.0
 */

function load_textdomain() {

    load_plugin_textdomain(
        'post-types',
        'post-types/languages/'
    );

}

add_action( 'plugins_loaded', 'Core\PostTypes\load_textdomain' );
