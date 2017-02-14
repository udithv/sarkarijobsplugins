<?php


$IMG_DIR = plugins_url().'/job-fields-footer/img';

function jff_add_footer($content){
	
	
	  $footer_content = '';

	  $vacancies = get_field( "vacancies");
	  $age_limit = get_field("eligibility");
	  $instruct = get_field("instructions_to_apply");
	  $table1 = get_field("table1");
	  $table2 = get_field("table2");
	  $dl = get_field("application_download_link");
	  $ao = get_field("apply_online");
	  $ison = get_field("can_apply_online");




    if ( $table1 ) {

	  	$tab1 = '<table border="3">';

	  	 if ( $table1['header'] ) {

	  	 	$tab1 .= '<thead>';
	  	 	$tab1 .= '<tr>';


	  	 	  foreach ( $table1['header'] as $th ) {

                        $tab1 .= '<th>';
                          $tab1 .= $th['c'];
                        $tab1 .= '</th>';
                    }
            $tab1 .= '</tr>';
            $tab1 .= '</thead>';      

	  	 }

	  	 $tab1 .= '<tbody>';
	  	    foreach ( $table1['body'] as $tr ) {

                $tab1 .=  '<tr>';

                    foreach ( $tr as $td ) {

                        $tab1 .=  '<td>';
                            $tab1 .=  $td['c'];
                        $tab1 .=  '</td>';
                    }

                $tab1 .=  '</tr>';
            }

        $tab1 .=  '</tbody>';

    $tab1 .=  '</table>';
}





//SECOND TABLE


    if ( $table2 ) {

	  	$tab2 = '<table border="3">';

	  	 if ( $table2['header'] ) {

	  	 	$tab2 .= '<thead>';
	  	 	$tab2 .= '<tr>';


	  	 	  foreach ( $table2['header'] as $th ) {

                        $tab2 .= '<th>';
                        $tab2 .= $th['c'];
                        $tab2 .= '</th>';
                    }
            $tab2 .= '</tr>';
            $tab2 .= '</thead>';      

	  	 }

	  	 $tab2 .= '<tbody>';
	  	    foreach ( $table2['body'] as $tr ) {

                $tab2 .=  '<tr>';

                    foreach ( $tr as $td ) {

                        $tab2 .=  '<td>';
                            $tab2 .=  $td['c'];
                        $tab2 .=  '</td>';
                    }

                $tab2 .=  '</tr>';
            }

        $tab2 .=  '</tbody>';

    $tab2 .=  '</table>';
}


	  





	  $footer_content .= '<div class="vacancy"><p><h5>Vacancy Details : </h5>'.$vacancies.'</p></div>';

	  $footer_content .= $tab1;
	  $footer_content .= '<h1>is it working</h1><br>';
	  $footer_content .= $tab2;

	  $footer_content .= '<div class="age-limit"><p><h5>Age Limit : </h5>The age limit for the posts are : <br> '.$age_limit.'</p></div>';
	  $footer_content .= '<div class="how-apply"><p><h5> Instructions To Apply  : </h5>The instructions to apply are : <br> '.$instruct.'</p></div>';
	
	  $footer_content .= '<div class="down-link"><a  target="_blank" href="'.$dl.'">Detailed Notification : <br><br><img id ="pdf" src="http://localhost/govt/wp-content/uploads/2016/09/pdf.ico" /><br>Click Here>>>>></a></div><br>';


     if($ison){

	  $footer_content .= '<div class="apply-online"><a  target="_blank" href="'.$ao.'"><img id ="apon" src="http://localhost/govt/wp-content/uploads/2016/09/apply-online.jpg" /></a></div><br>';

	}









      if(is_single()){
	  return $content.$footer_content;
	}

	return $content;
}
add_filter('the_content', 'jff_add_footer');



