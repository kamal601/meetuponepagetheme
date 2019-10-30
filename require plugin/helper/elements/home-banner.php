<?php 

add_shortcode('main_slider','main_slider_shortcode');
function main_slider_shortcode($slider){
	$result = shortcode_atts(array(
		'logo' 			 =>'',
		'slider_image'	 =>'',
		'slider_title' 	 =>'',
		'slider_text' 	 =>'',
		'html' 			 =>'',
		'btn'			 =>'',
		'btn_link' 		 =>'',
	),$slider);
	extract($result);
	ob_start();
	?>

	<div class="container-fluid">
		<!-- Start: Header -->
		<div class="row hero-header" id="home">
			<div class="col-md-7">
				<?php $src = wp_get_attachment_url($logo); ?>
				<img src="<?php echo esc_url($src);?>" class="logo">
				<h1><?php echo esc_html($slider_title);?></h1>
				<h3><?php echo esc_html($slider_text);?></h3>
				<?php echo esc_html($html);?>
				<a href="<?php echo esc_url($btn_link);?>" class="btn btn-lg btn-red"><?php echo esc_html($btn);?> <span class="ti-arrow-right"></span></a>

			</div>
			<div class="col-md-5 hidden-xs">
				<?php $src_slider_img = wp_get_attachment_url($slider_image); ?>
				<img src="<?php echo esc_url($src_slider_img);?>" class="rocket animated bounce">
			</div>
		</div>
		<!-- End: Header -->
	</div>
	

	<?php 
	return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'main_slider_el' );
function main_slider_el() {
	vc_map( array(
		"name" => __( "Main Slider", "meetup" ), 
		"base" => "main_slider",
		"category" => __( "meetup", "meetup"),
		"params" => array(

			array(
				"type" => "attach_image",
				"heading" => __( "Upload Logo image", "meetup" ),
				"param_name" => "logo",
			),  
			array(
				"type" => "attach_image",
				"heading" => __( "Upload Slider image", "meetup" ),
				"param_name" => "slider_image",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Give Title", "meetup" ),
				"param_name" => "slider_title",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Sub Title", "meetup" ),
				"param_name" => "slider_text",
			), 
			array(
				"type" => "textarea_html",
				"heading" => __( "HTML TEXT Code", "meetup" ),
				"param_name" => "html",
			),  
			array(
				"type" => "textfield",
				"heading" => __( "Button name", "meetup" ),
				"param_name" => "btn",
			),  
			array(
				"type" => "textfield",
				"heading" => __( "Button link", "meetup" ),
				"param_name" => "btn_link",
			), 

		),

	) );
}
