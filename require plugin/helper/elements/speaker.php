<?php 

add_shortcode('speaker_section','speaker_shortcode');
function speaker_shortcode($section){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'speaker_first_group'	 =>'',
		'm_title'				 =>'',
		'speaker_social_group' 	 =>'',
		'speaker_second_group' 	 =>'',
	),$section);
	extract($result);
	ob_start();
	?>
	<div class="container">
		<!-- Start: Desc -->
		<div class="row me-row content-ct">
			<h2 class="row-title"><?php echo esc_html($section_title); ?></h2>
			<?php 
			$speaker=vc_param_group_parse_atts($speaker_first_group);

			foreach ($speaker as $spk_class): 
				?>
				<div class="col-md-4 feature">
					<span class="<?php echo esc_attr($spk_class['tiket']); ?>"></span>
					<h3><?php echo esc_html($spk_class['sect_tit']); ?></h3>
					<p><?php echo esc_html($spk_class['sect_text']); ?></p>
				</div>
			<?php	endforeach;?>

		</div>
		<!-- End: Desc -->

		<!-- Start: Speakers -->

		<div class="row me-row content-ct speaker" id="speakers">
			<h2 class="row-title"><?php echo esc_html($m_title); ?></h2>
			<?php 
			$speaker_secon=vc_param_group_parse_atts($speaker_second_group);

			foreach ($speaker_secon as $btn_class): 
				?>
				<div class="col-md-4 col-sm-6 feature">
					<?php $src = wp_get_attachment_url($btn_class['image']); ?>
					<img src="<?php echo esc_url($src);?>">
					<h3><?php echo esc_html($btn_class['name']); ?></h3>
					<p><?php echo esc_html($btn_class['cont']); ?></p>
					<ul class="speaker-social">
						<?php 
						$speker_soc=vc_param_group_parse_atts($btn_class['speaker_social_group']);

						foreach ($speker_soc as $btn_class): 
							?>
							<li><a href="#"><span class="<?php echo esc_attr($btn_class['social_name']); ?>"></span></a></li>
						<?php	endforeach;?>
						</ul>
				</div>
			<?php	endforeach;?>
		</div>

		<!-- End: Speakers -->
	</div>	


	<?php  
	return ob_get_clean();
} 

add_action( 'vc_before_init', 'speaker_el' );
function speaker_el() {
	vc_map( array(
		"name" => __( "Speaker Section", "meetup" ), 
		"base" => "speaker_section",
		"category" => __( "meetup", "meetup"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "Section Title", "meetup" ),
				"param_name" => "section_title", 
			),
			array(
				'type'=>'param_group',
				'heading'=>'Team Social Icon Items',
				'param_name'=>'speaker_first_group',
				'params'=>array(
					array(
						"type" => "textfield",
						"heading" => __( "Tiket Class Name", "meetup" ),
						"param_name" => "tiket",
					),
					array(
						"type" => "textfield",
						"heading" => __( "Title", "meetup" ),
						"param_name" => "sect_tit",
						"value" => __( "Write your Section Text here", "meetup" ),
						"description" => __( "Description for section-text param.", "meetup" )
					), 
					array(
						"type" => "textfield",
						"heading" => __( "section Content", "meetup" ),
						"param_name" => "sect_text",
					),
				),
			),
			array(
				"type" => "textfield",
				"heading" => __( "Main Title", "meetup" ),
				"param_name" => "m_title",
				'group' => 'Speaker'
				), 
			array(
				'type'=>'param_group',
				'heading'=>'Team Social Icon Items',
				'param_name'=>'speaker_second_group',
				'group'=>'Speaker',
				'params'=>array(
					array(
						"type" => "attach_image",
						"heading" => __( "Upload speaker image", "meetup" ),
						"param_name" => "image",
					), 
					array(
						"type" => "textfield",
						"heading" => __( "Speaker Name", "meetup" ),
						"param_name" => "name",
					),  
					array(
						"type" => "textfield",
						"heading" => __( "Content ", "meetup" ),
						"param_name" => "cont",
					), 
					array(
						'type'=>'param_group',
						'heading'=>'Team Social Icon Items',
						'param_name'=>'speaker_social_group',
						'params'=>array(
							array(
								"type" => "textarea",
								"heading" => __( "Social Icon Class Name", "meetup" ),
								"param_name" => "social_name",
							),
						),
					),  
				),
			),


		)
	) );
}