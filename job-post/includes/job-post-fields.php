<?php

function jp_add_fields_metabox(){

         add_meta_box(
              'jp_todo_fields',
               __('Job Fields'),
              'jp_job_fields_callback',
              'job',
              'normal',
              'default'
         	);



}

add_action('add_meta_boxes','jp_add_fields_metabox');

function jp_job_fields_callback($post){

          wp_nonce_field(basename(__FILE__),'wp_jobs_nonce');
          $jp_job_stored_meta = get_post_meta($post->ID);
          ?>


           <div class="wrap  job-form">
              <div class="form-group">
                 <label for="vacancies"><?php esc_html_e('Number of Vacancies :','jp_domain'); ?></label>

                 <input type="text" name="vacancies" id="vacancies" value="<?php if(!empty($jp_job_stored_meta['vacancies'])) {
                  echo esc_attr($jp_job_stored_meta['vacancies'][0]);
                }
                ?>">
              </div>
              
           
               


               <div class="form-group">
               	 <label for="details"><?php esc_html_e('Details','jp_domain');?></label>
               	 <?php
               	 $content  = get_post_meta($post->ID,'details',true);
               	 $editor   = 'details';
               	 $settings = array(
               	 	  'textarea_rows' => 8,
               	 	  'media_buttons' => true,

               	 	);
                        wp_editor($content,$editor,$settings);

                     ?>

               </div>



              <div class="form-group">
                 <label for="due_date"><?php esc_html_e('Due Date : ','jp_domain'); ?></label>

                 <input type="date" name="due_date" id="due_date" value="<?php if(!empty($jp_job_stored_meta['due_date'])) {
                  echo esc_attr($jp_job_stored_meta['due_date'][0]);
                }
                ?>">
              </div>

          </div>
     <?php         

}

function jp_job_save($post_id){
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);

        $is_valid_nonce  = (isset($_POST['wp_jobs_nonce']) && wp_verify_nonce($_POST['wp_jobs_nonce'],basename(__FILE__)) )?'true':'false';


        if($is_revision || $is_autosave || !$is_valid_nonce){
          return;

        }

    if(isset($_POST['vacancies'])){
      update_post_meta($post_id,'vacancies',sanitize_text_field($_POST['vacancies']));
    }

     if(isset($_POST['details'])){
      update_post_meta($post_id,'details',sanitize_text_field($_POST['details']));
    }

     if(isset($_POST['due_date'])){
      update_post_meta($post_id,'due_date',sanitize_text_field($_POST['due_date']));
    }
}

add_action('save_post','jp_job_save');