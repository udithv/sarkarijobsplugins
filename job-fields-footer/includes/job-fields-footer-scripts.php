<?php

function jff_add_scripts(){
	
	
	wp_enqueue_script('jff-main-script', plugins_url().'/job-fields-footer/js/main.js');
	wp_enqueue_style('jff-main-style', plugins_url().'/job-fields-footer/css/style.css');
	
	
}
add_action('wp_enqueue_scripts', 'jff_add_scripts');



