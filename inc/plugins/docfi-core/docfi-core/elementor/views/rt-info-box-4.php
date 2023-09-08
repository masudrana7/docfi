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



<div class="rt-card rt-card--style-8 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<div class="card-title d-flex align-items-center">

		<div class="icon">
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
		<span class="title"><?php echo wp_kses_post( $data['title'] );?></span>
	</div>
	<?php if ( !empty( $data['content'] ) ) { ?>
	<p class="card-info"><?php echo wp_kses_post( $data['content'] );?></p>
	<?php } ?>

	<?php if(!empty($buttontext)){?>
		<a <?php echo $attr; ?> class="card-btn d-inline-flex align-items-center"><?php echo wp_kses_post( $data['buttontext'] );?>
			<svg width="7" height="11" viewBox="0 0 7 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.25 10.75C1.03906 10.75 0.851562 10.6797 0.710938 10.5391C0.40625 10.2578 0.40625 9.76562 0.710938 9.48438L4.67188 5.5L0.710938 1.53906C0.40625 1.25781 0.40625 0.765625 0.710938 0.484375C0.992188 0.179688 1.48438 0.179688 1.76562 0.484375L6.26562 4.98438C6.57031 5.26562 6.57031 5.75781 6.26562 6.03906L1.76562 10.5391C1.625 10.6797 1.4375 10.75 1.25 10.75Z" fill=""/>
			</svg>
		</a>
	<?php } ?>
</div>
