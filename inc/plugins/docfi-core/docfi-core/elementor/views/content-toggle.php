<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

extract($data);
$content_1_id = "content_1_id_" . uniqid();
$content_2_id = "content_2_id_" . uniqid();
$content_3_id = "content_3_id_" . uniqid();
$content_4_id = "content_4_id_" . uniqid();
$content_5_id = "content_5_id_" . uniqid();
$content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_1_content ) ;
$content_2 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_2_content ) ;
$content_3 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_3_content ) ;
$content_4 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_4_content ) ;
$content_5 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_5_content ) ;

/*icon 1*/
$final_icon_class1       = " ";
if ( is_string( $icon_class1['value'] ) && $dynamic_icon_class =  $icon_class1['value']  ) {
  $final_icon_class1     = $dynamic_icon_class;
}

/*icon 2*/
$final_icon_class2       = " ";
if ( is_string( $icon_class2['value'] ) && $dynamic_icon_class =  $icon_class2['value']  ) {
  $final_icon_class2     = $dynamic_icon_class;
}

/*icon 3*/
$final_icon_class3       = " ";
if ( is_string( $icon_class3['value'] ) && $dynamic_icon_class =  $icon_class3['value']  ) {
  $final_icon_class3     = $dynamic_icon_class;
}

/*icon 4*/
$final_icon_class4       = " ";
if ( is_string( $icon_class4['value'] ) && $dynamic_icon_class =  $icon_class4['value']  ) {
  $final_icon_class4     = $dynamic_icon_class;
}

/*icon 5*/
$final_icon_class5       = " ";
if ( is_string( $icon_class5['value'] ) && $dynamic_icon_class =  $icon_class5['value']  ) {
  $final_icon_class5     = $dynamic_icon_class;
}

?>

<div class="faq-section">
	<div class="row faq-content-wrapper">
		<div class="col-lg-12 col-lg-4 col-xl-4 wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
			<div class="faq-nav-wrapper">
				<?php if(!empty($title_area)){?>
					<h3 class="top-title"><?php echo esc_html( $title_area ); ?></h3>	
				<?php } ?>
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<?php if(!empty($section_1_heading)){?>	
					<button class="nav-link active" id="al_<?php echo esc_attr( $content_1_id ); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr( $content_1_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $content_1_id ); ?>" aria-selected="true">
						<?php echo esc_html( $section_1_heading ); ?>
					</button>
					<?php } ?>
					<?php if(!empty($section_2_heading)){?>
					<button class="nav-link" id="al_<?php echo esc_attr( $content_2_id ); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr( $content_2_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $content_2_id ); ?>" aria-selected="false">
						<?php echo esc_html( $section_2_heading ); ?>
					</button>
					<?php } ?>

					<?php if(!empty($section_3_heading)){?>	
					<button class="nav-link" id="al_<?php echo esc_attr( $content_3_id ); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr( $content_3_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $content_3_id ); ?>" aria-selected="false">
						<?php echo esc_html( $section_3_heading ); ?>
					</button>
					<?php } ?>

					<?php if(!empty($section_4_heading)){?>	
					<button class="nav-link" id="al_<?php echo esc_attr( $content_4_id ); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr( $content_4_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $content_4_id ); ?>" aria-selected="false">
						<?php echo esc_html( $section_4_heading ); ?>
					</button>
					<?php } ?>

					<?php if(!empty($section_5_heading)){?>	
					<button class="nav-link" id="al_<?php echo esc_attr( $content_5_id ); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr( $content_5_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $content_5_id ); ?>" aria-selected="false"> 
						<?php echo esc_html( $section_5_heading ); ?>
					</button>
					<?php } ?>


				</div>
			</div>
		</div>
		<!-- col end -->
		<div class="col-lg-12 col-lg-8 col-xl-8 wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="500ms">
			<div class="faq-pane-wrapper">
				<div class="tab-content" data-id="v-pills-tabContent">
					<?php if(!empty($content_1_id)){?>	
					<div class="tab-pane fade active show" id="<?php echo esc_attr( $content_1_id ); ?>" role="tabpanel">
						<?php print( $content_1 ); ?>
					</div>
					<?php } ?>	
					<?php if(!empty($content_2_id)){?>	
					<div class="tab-pane fade" id="<?php echo esc_attr( $content_2_id ); ?>" role="tabpanel">
						<?php print( $content_2 ); ?>
					</div>
					<?php } ?>
					<?php if(!empty($content_3_id)){?>	
					<div class="tab-pane fade" id="<?php echo esc_attr( $content_3_id ); ?>" role="tabpanel">
						<?php print( $content_3 ); ?>
					</div>
					<?php } ?>
					<?php if(!empty($content_4_id)){?>	
					<div class="tab-pane fade" id="<?php echo esc_attr( $content_4_id ); ?>" role="tabpanel">
						<?php print( $content_4 ); ?>
					</div>
					<?php } ?>
					<?php if(!empty($content_5_id)){?>	
					<div class="tab-pane fade" id="<?php echo esc_attr( $content_5_id ); ?>" role="tabpanel">
						<?php print( $content_5 ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- col end -->
	</div>
	<!-- row end -->
</div>


