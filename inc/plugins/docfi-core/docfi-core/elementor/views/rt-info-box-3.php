<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

// icon , image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
} ?>

<div class="rt-card rt-card--style-6 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<div class="icon d-flex align-items-center">
		<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
			<span class="rt-img"><?php echo wp_kses_post($getimg);?></span>  
		<?php }else{?> 	
		<?php if ( $final_icon_image_url ): ?>
			<span class="rt-icon"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
		<?php else: ?>
			<span class="rt-icon"><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i></span>
		<?php endif ?>
		<?php }  ?>	
	</div>

	<?php if ( !empty( $data['title'] ) ) { ?>
	<h3 class="card-title"><?php echo wp_kses_post( $title );?></h3>
	<?php } if ( !empty( $data['content'] ) ) { ?>
	<p class="card-info"><?php echo wp_kses_post( $data['content'] );?></p>
	<?php } ?>

	<?php if(!empty($buttontext)){?>
		<a <?php echo $attr; ?> class="coolBeans card-btn"><?php echo wp_kses_post( $data['buttontext'] );?></a>
	<?php } ?>
</div>

