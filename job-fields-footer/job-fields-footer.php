<?php
/**

Plugin name: Job Fields Footer
Description: Allows you to display all your custom fields on your single blog post.
Version: 1.0
Author: Udith Vic

*/
// Global variables

define('JFF_PLUGIN_DIR', plugin_dir_path(__FILE__));


if(!defined('ABSPATH')){

	exit;

}

require_once(JFF_PLUGIN_DIR.'includes/job-fields-footer-scripts.php');
require_once(JFF_PLUGIN_DIR.'includes/job-fields-footer-content.php');

