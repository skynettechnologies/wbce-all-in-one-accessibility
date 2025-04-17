<?php
// uninstall.php

$page_include_id = 'all_in_one_accessibility_frontend_js';

require_once WB_PATH . '/framework/class.admin.php';

if (!function_exists('unregister_frontend_script')) {
    function unregister_frontend_script($id) {
        global $database;
        $database->query("DELETE FROM `".TABLE_PREFIX."mod_output_filter` WHERE `id`='".addslashes($id)."'");
    }
}

unregister_frontend_script($page_include_id);
?>
