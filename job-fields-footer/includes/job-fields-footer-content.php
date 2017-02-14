<?php


$IMG_DIR = plugins_url().'/job-fields-footer/img';

function jff_add_footer($content){
	
	
	  $footer_content = '';

	  $vacancies = get_field( "vacancies");
	  $elli = get_field("eligibility");
	  $instruct = get_field("instructions_to_apply");
	  $table1 = get_field("table1");
	  $table2 = get_field("table2");
	  $table3 = get_field("table3");
	  $dl = get_field("application_download_link");
	  $ao = get_field("apply_online");
	  $ison = get_field("can_apply_online");



      $tab1 = jp_gentable($table1);
      $tab2 = jp_gentable($table2);
      $tab3 = jp_gentable($table3);









	  





	  $footer_content .= '<div class="vacancy"><br><p><h5>Vacancy Details : </h5>'.$vacancies.'</p></div>';

	  $footer_content .= $tab1;
	  $footer_content .= '<br>';
	  $footer_content .= $tab2;
	  $footer_content .= '<br>';
	  $footer_content .= $tab3;


	  $footer_content .= '<div class="age-limit"><p><h5>Elligibility : </h5>The elligibility for the posts are : <br><br>'.$elli.'</p></div>';
	  $footer_content .= '<div class="how-apply"><p><h5> Instructions To Apply  : </h5>The instructions to apply are : <br> '.$instruct.'</p></div>';
	
	  $footer_content .= '<div class="down-link"><a  target="_blank" href="'.$dl.'"><strong>Detailed Notification : </strong><br><br><img id ="pdf" src="http://localhost/govt/wp-content/uploads/2016/09/pdf.ico" /><br>Click Here>>>>></a></div>';


     if($ison){

	  $footer_content .= '<div class="apply-online"><a  target="_blank" href="'.$ao.'"><img id ="apon" src="http://localhost/govt/wp-content/uploads/2016/09/apply-online.jpg" /></a></div><br>';

	}









      if(is_single()){
	  return $content.$footer_content;
	}

	return $content;
}
add_filter('the_content', 'jff_add_footer');



  function jp_gentable($table){

    if ( $table ) {

	  	$tab = '<table border="3">';

	  	 if ( $table['header'] ) {

	  	 	$tab .= '<thead>';
	  	 	$tab .= '<tr>';


	  	 	  foreach ( $table['header'] as $th ) {

                        $tab .= '<th>';
                          $tab .= $th['c'];
                        $tab .= '</th>';
                    }
            $tab .= '</tr>';
            $tab .= '</thead>';      

	  	 }

	  	 $tab .= '<tbody>';
	  	    foreach ( $table['body'] as $tr ) {

                $tab .=  '<tr>';

                    foreach ( $tr as $td ) {

                        $tab .=  '<td>';
                            $tab .=  $td['c'];
                        $tab .=  '</td>';
                    }

                $tab .=  '</tr>';
            }

        $tab .=  '</tbody>';

    $tab .=  '</table>';
    }

    return $tab;

}