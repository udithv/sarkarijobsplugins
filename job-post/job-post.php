<?php

/**

Plugin name: Job Post Plugin
Description: Allows you to create job posts and display them using plugins.
Version: 1.0
Author: Udith Vic

*/
// Global variables

define('JP_PLUGIN_DIR', plugin_dir_path(__FILE__));


if(!defined('ABSPATH')){

	exit;

}

require_once(JP_PLUGIN_DIR.'includes/job-post-scripts.php');



require_once(JP_PLUGIN_DIR.'includes/job-post-shortcode.php');

