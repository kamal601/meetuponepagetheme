<?php 

add_shortcode('meetup_section_one','meetup_section_one_shortcode');
function meetup_section_one_shortcode($service){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'tag_header_group'	 =>'',
		'tab_content_group'	 =>'',
	),$service);
	extract($result);
	ob_start();
	?>
      <!-- Start: Schedule -->
      <div class="container">
        <div class="row me-row schedule" id="schedule">
          <h2 class="row-title content-ct"><?php echo esc_html($section_title); ?></h2>
          <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
			<?php 
			
				$meetup_bar=vc_param_group_parse_atts($tag_header_group);

				foreach ($meetup_bar as $meetup):
				 ?>
              <li role="presentation" class="<?php echo esc_html($meetup['tab_act']); ?>"><a href="<?php echo esc_html($meetup['tab_id']); ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo esc_html($meetup['tab_menu']); ?></a></li>

             <?php endforeach; ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
			<?php
              $meetup_bar=vc_param_group_parse_atts($tab_content_group);

				foreach ($meetup_bar as $meetup):
				 ?>
              <div role="tabpanel" class="tab-pane fade in active" id="<?php echo esc_html($meetup['tab_id_text']); ?>">
                <div class="row">
				<?php                
                 $meetup_event=vc_param_group_parse_atts($meetup['tag_field_group']);

				foreach ($meetup_event as $meetup):
				 ?>
                  <div class="col-md-6" style="padding-top:50px">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                        	<?php $src = wp_get_attachment_url($meetup['image']) ?>
                          <img class="media-object" src="<?php echo esc_url($src);?>" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo esc_html($meetup['she_time']); ?></h4>
                        <h5><?php echo esc_html($meetup['shed_title']); ?></h5>
                        <p><?php echo esc_html($meetup['shed_content']); ?> </p>
                      </div>
                    </div>
                  </div>
				<?php endforeach; ?>
                  </div>
                </div>
               <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Schedule -->


<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'meetup_section_one_el' );
function meetup_section_one_el() {
 vc_map( array(
  "name" => __( "Tab Section One", "meetup" ), 
  "base" => "meetup_section_one",
  "category" => __( "meetup", "meetup"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "meetup" ),
			"param_name" => "section_title",
		 ),

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'Tab Section One Group',
			 'param_name'	=>'tag_header_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Tab Header Menu", "meetup" ),
					  "param_name" 	=> "tab_menu",
					 ), 
		  		  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Tab Active class", "meetup" ),
					  "param_name" 	=> "tab_act",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Tab id", "meetup" ),
					  "param_name" 	=> "tab_id",
					 ),
				 )	
			 ),
  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'Tab Section One Group',
			 'param_name'	=>'tab_content_group',
			 'group' 		=> 'Tab Content',
			 'params'		=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Tab ID", "meetup" ),
					  "param_name" 	=> "tab_id_text",
					 ),
		  		  array(
					 'type'=>'param_group',
					 'heading'=>'Tab text field Group',
					 'param_name'=>'tag_field_group',
					 'group' 		=> 'Tab Content',
					 'params'=>array(
				  		 array(
							  "type" => "attach_image",
							  "heading" => __( "Upload your image", "meetup" ),
							  "param_name" => "image",
							 ),
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "shedule duration", "meetup" ),
							  "param_name" => "she_time",
							 ),
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Shedule Title", "meetup" ),
							  "param_name" => "shed_title",
							 ),
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Shedule content", "meetup" ),
							  "param_name" => "shed_content",
							 ),
						 )	
					 )
				 )	
			 ), 

  		)
		
  	
 	)

  );
}?>






