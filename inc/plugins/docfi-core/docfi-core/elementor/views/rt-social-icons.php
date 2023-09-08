<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Icons_Manager;
?>
<div class="rt_footer_social_widget">
	<div class="social-label"><?php echo wp_kses_post( $data['social_label'] ); ?></div>
	<div class="rt-about-widget rt-social-widget">		
		<?php foreach ( $data['social_icon_list'] as $social_icons ): 
			$attr = '';
	        if ( !empty( $social_icons['link']['url'] ) ) {
	            $attr  = 'href="' . $social_icons['link']['url'] . '"';
	            $attr .= !empty( $social_icons['link']['is_external'] ) ? ' target="_blank"' : '';
	            $attr .= !empty( $social_icons['link']['nofollow'] ) ? ' rel="nofollow"' : '';
	        }
		?>
		<div class="footer-social">
			<a <?php if( $social_icons['icon_color'] || $social_icons['icon_bg'] ) { ?> style="color: <?php echo esc_attr( $social_icons['icon_color'] ); ?>; background:<?php echo esc_attr( $social_icons['icon_bg'] ); ?>" <?php } ?> aria-label="Social Link" class="<?php echo wp_kses_post( $social_icons['title'] ); ?>" <?php echo $attr; ?> ><?php Icons_Manager::render_icon( $social_icons['social_icon'] ); ?></a>
		</div>
		<?php endforeach; ?> 
	</div>
</div>