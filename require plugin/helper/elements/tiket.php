<?php 

add_shortcode('tiket_section','tiket_shortcode');
function tiket_shortcode($section){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'tiket_first_group'	 	 =>'',
	),$section);
	extract($result);
	ob_start();
	?>


      <!-- Start: Tickets -->
      <div class="container-fluid tickets" id="tickets">
        <div class="row me-row content-ct">
          <h2 class="row-title"><?php echo esc_attr($section_title); ?></h2>
          <?php 
			$tiket=vc_param_group_parse_atts($tiket_first_group);

			foreach ($tiket as $spk_class): 
			?>
          <div class="col-md-4 col-sm-6 <?php echo esc_attr($spk_class['offset']); ?>">
            <h3><?php echo esc_attr($spk_class['package']); ?></h3>
            <p class="price">$<?php echo esc_attr($spk_class['price']); ?></p>
            <p><?php echo esc_attr($spk_class['text']); ?></p>
            <a href="<?php echo esc_attr($spk_class['btn_link']); ?>" class="btn btn-lg btn-red"><?php echo esc_attr($spk_class['btn']); ?></a>
          </div>
          <?php	endforeach;?>

      </div>
      <!-- End: Tickets -->

	<
	<?php  
	return ob_get_clean();
} 

add_action( 'vc_before_init', 'tiket_el' );
function tiket_el() {
	vc_map( array(
		"name" => __( "Tiket Section", "meetup" ), 
		"base" => "tiket_section",
		"category" => __( "meetup", "meetup"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "Section Title", "meetup" ),
				"param_name" => "section_title", 
			),
			array(
				'type'=>'param_group',
				'heading'=>'Tiket group',
				'param_name'=>'tiket_first_group',
				'params'=>array(
					array(
						"type" => "textfield",
						"heading" => __( "Off-set number", "meetup" ),
						"param_name" => "offset",
					),

					array(
						"type" => "textfield",
						"heading" => __( "Package Name", "meetup" ),
						"param_name" => "package",
					),
					array(
						"type" => "textfield",
						"heading" => __( "Price in dollar", "meetup" ),
						"param_name" => "price",
					),

					array(
						"type" => "textfield",
						"heading" => __( "Content", "meetup" ),
						"param_name" => "text",
					),
					array(
						"type" => "textfield",
						"heading" => __( "Button Link", "meetup" ),
						"param_name" => "btn_link",
					),
					 array(
						"type" => "textfield",
						"heading" => __( "Button Text", "meetup" ),
						"param_name" => "btn",
						), 
					),
				),
			
			)
		) 
	);
}