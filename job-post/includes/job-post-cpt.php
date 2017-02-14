<?php

//Create Custom Post Type

function jp_register_todo(){
   
    $singular_name = apply_filters('jp_label_single','Job');
    $plural_name   = apply_filters('jp_label_plural','Jobs');
    
    $label = array(
              
              'name'              => $plural_name,
              'singular_name'     => $singular_name,
              'add_new'           => 'Add New Job',
              'add_new_item'      => 'Add New '. $singular_name,
              'edit'              => 'Edit',
              'edit_item'         => 'Edit '.$singular_name,
              'new_item'          =>  'New '.$singular_name,
              'view'              => 'View ',
              'view_item'         => 'View '.$singular_name,
              'search_items'      => 'Search '.$plural_name,
              'not_found'         => 'No '.$plural_name.'Found',
              'not_found_in_trash'=> 'No '.$plural_name.'Found in Trash',
              'menu_name'         =>  $plural_name





    	);

    $args = apply_filters('jp_todo_args', array(

              'labels'             => $label,
              'description'        => 'Jobs by category',
              'taxonomies'         => array('category'),
              'public'             => true,
              'show_in_menu'       => true,
              'menu_position'      => 5,
              'menu_icon'          => 'dashicons-edit',
              'show_in_nav_menus'  => true,
              'query_var'          => true,
              'can_export'         => true,
              'rewrite'            => array('slug' => 'job'),
              'capability_type'    => 'post',
              'supports'           => array('title')
 
    	));


   register_post_type('job',$args);



}

add_action('init','jp_register_todo');