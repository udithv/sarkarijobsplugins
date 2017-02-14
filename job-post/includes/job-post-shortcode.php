<?php

   //List Todos

   function jp_list_jobs($atts, $content = null){

          global $post;

   	     //Create attributes and defaults

   	    $atts = shortcode_atts(array(
                   
                   'title' => 'All Jobs',
                   'count' => -1,
                   'category'=> 'all' 
             
   	    	),$atts);

   	   //Check Category Attribute

   	   if($atts['category'] == 'all'){
                   $terms = '';

   	   }
   	   else{

   	   	        $terms = array(
                           array(

                           	'taxonomy' => 'category',
                           	'field'    => 'slug',
                           	'terms'    => $atts['category']

                           	)

   	   	        	);
   	   }

   	   //Set the args 


   	   $args = array(
                 'post_type'      => 'post',
                 'post_status'    => 'publish',
                 'orderby'        => 'last_date',
                 'order'          => 'ASC',
                 'posts_per_page' => $atts['count'],
                 'tax_query'      => $terms 

   	   );

      //Fetch Todos

   	   $jobs = new WP_Query($args);

   	   //Check if there are any todos

   	  if($jobs->have_posts()){

   	  	//Get category Slug

   	  	$category = str_replace('-',' ',$atts[category]);
   	  	$category = strtolower($category);

        $header = array("Service/Organization","Types of Posts","Number of Posts","Last Date","Details");

   	  	// build Output

   	  	$output  = '';

   	  	$output  .= '<div class ="job-list">';
        $output  .= '<table border="3">';
        $output  .= '<thead>';
        $output  .= '<tr>';

        foreach ( $header as $th ){

                  $output .= '<th>';
                    $output .= $th;
                  $output .= '</th>';
        }



        $output  .= '</tr>';
        $output  .= '</thead>';
        $output .= '<tbody>';
        



        while($jobs->have_posts()){
   	  	$jobs->the_post();


   	  	// get the post metas

   	  	$vacancies = get_post_meta($post->ID,'number_of_vaccancies',true);
   	  	$table_tag = get_post_meta($post->ID,'table_tag',true);
   	  	$last_date = get_post_meta($post->ID,'last_date',true);
        $post_types = get_post_meta($post->ID,'type_of_posts',true);
        $perma = get_permalink($post->ID);
        $clickhere = '<a href="'.$perma.'" target="_blank">Click Here>>></a>';

        $body = array($table_tag,$post_types,$vacancies,$last_date,$clickhere);

          

                $output .=  '<tr>';

                    foreach ( $body as $td ) {

                        $output .=  '<td>';
                            $output .=  $td;
                        $output .=  '</td>';
                    }

                $output .=  '</tr>';
            

       
       } 

        $output .=  '</tbody>';
        $output .= '</table>';
        $output .= '</div>';


        wp_reset_postdata();
        return $output;

     }else{

    	        return '<p> No jobs </p>';
           }

}
   
   //Todo list Shortcode

   

    add_shortcode('jobs','jp_list_jobs');


   
