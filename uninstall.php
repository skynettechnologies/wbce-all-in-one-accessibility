<?php
// uninstall.php
// Unique ID for the frontend JavaScript to be removed
$page_include_id = 'all_in_one_accessibility_frontend_js';

require_once WB_PATH . '/framework/class.admin.php';

// Check if the function doesn't already exist to avoid redeclaration

if (!function_exists('unregister_frontend_script')) {
    /**
     * Removes a frontend script entry from the mod_output_filter table using its ID
     *
     * @param string $id The unique identifier of the frontend script to remove
     */
    function unregister_frontend_script($id) {
        global $database;
         // Execute SQL query to delete the script entry based on its ID
        $database->query("DELETE FROM `".TABLE_PREFIX."mod_output_filter` WHERE `id`='".addslashes($id)."'");
    }
}
// Call the function to unregister the script with the specified ID
unregister_frontend_script($page_include_id);
?>
