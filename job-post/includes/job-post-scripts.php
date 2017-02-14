<?php 

// Check if admin

if(is_admin()){

// Adding admin scripts
function jp_add_admin_scripts(){

	wp_enqueue_style('jp-admin-main-style', plugins_url().'/job-post/css/style-admin.css');
}

add_action('admin_init','jp_add_admin_scripts');

}

function jp_add_scripts(){

    wp_enqueue_style('jp-main-style', plugins_url().'/job-post/css/style.css');

    wp_enqueue_script('jp-main-script', plugins_url().'/job-post/js/main.js');



}

add_action('wp_enqueue_scripts','jp_add_scripts');

