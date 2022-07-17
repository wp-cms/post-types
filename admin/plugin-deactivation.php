<?php

namespace plugin\post_types;

function deactivate() {
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'deactivate' );
