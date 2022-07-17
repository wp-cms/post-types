<?php

namespace plugin\post_types;

/**
 * Define the locale for this plugin for internationalization.
 *
 * @since    1.0.0
 */

function load_textdomain() {

    load_plugin_textdomain(
	    domain: 'post-types',
	    plugin_rel_path: 'post-types/languages/'
    );

}

add_action( 'plugins_loaded', 'plugin\post_types\load_textdomain' );
