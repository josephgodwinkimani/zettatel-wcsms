<?php

$include_dir = trailingslashit( WP_PLUGIN_DIR ) . 'zettatel-wcsms/inc';

// Load any classes
require_once $include_dir . '/classes/class-zettatel-wcsms.php';

if ( is_admin() ) {
    require_once $include_dir .  '/classes/class-zettatel-wcsms-admin.php';
}

?>