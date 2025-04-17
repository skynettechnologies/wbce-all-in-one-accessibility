<?php
// install.php

// Register frontend script
$insert_code = '<script src="' . WB_URL . '/modules/all_in_one_accessibility/frontend.js"></script>';
$page_include_id = 'all_in_one_accessibility_frontend_js';

require_once WB_PATH . '/framework/class.admin.php';

// Add frontend output filter
if (!function_exists('register_frontend_script')) {
    function register_frontend_script($id, $code) {
        global $database;
        $database->query("REPLACE INTO `".TABLE_PREFIX."mod_output_filter` (`id`, `name`, `value`) VALUES ('".addslashes($id)."', 'insert_frontend', '".addslashes($code)."')");
    }
}

register_frontend_script($page_include_id, $insert_code);
?>
