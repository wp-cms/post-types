<?php

namespace Core\PostTypes;

function deactivate() {
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'deactivate' );