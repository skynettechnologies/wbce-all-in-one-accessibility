<?php
// install.php

// Register frontend script
$insert_code = '<script src="' . WB_URL . '/modules/all_in_one_accessibility/frontend.js"></script>';
$page_include_id = 'all_in_one_accessibility_frontend_js';

require_once WB_PATH . '/framework/class.admin.php';

// Define the function to register the frontend script if it doesn't already exist
if (!function_exists('register_frontend_script')) {
      /**
     * Registers a script to be inserted into the frontend output
     *
     * @param string $id   Unique ID for the script
     * @param string $code Script tag or code to insert
     */
    function register_frontend_script($id, $code) {
        global $database;
         // Use REPLACE to insert or update the script registration in the output filter table
        $database->query("REPLACE INTO `".TABLE_PREFIX."mod_output_filter` (`id`, `name`, `value`) VALUES ('".addslashes($id)."', 'insert_frontend', '".addslashes($code)."')");
    }
}
// Register the frontend JavaScript file using the defined ID and code
register_frontend_script($page_include_id, $insert_code);
?>
