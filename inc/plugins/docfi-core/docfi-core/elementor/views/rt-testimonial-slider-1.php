<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Icons_Manager;
extract($data);

if ( ! isset( $data['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
    $data['icon'] = 'fa fa-plus';
    $data['icon_align'] = $this->get_settings( 'icon_align' );
}
$is_new = empty( $data['icon'] ) && Icons_Manager::is_migration_allowed();
$has_icon = ( ! $is_new || ! empty( $testimonial['selected_icon']['value'] ) );

?>

<div class="rt-testimonial-default testimonial-multi-layout-1 testimonial-slider-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['nav_position'] ) ?>">
	<div class="rt-swiper-slider rt-swiper-nav" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
		<div class="swiper-wrapper">
			<?php $m = $data['delay']; $n = $data['duration']; 
				foreach ( $data['testimonials'] as $testimonial ) { ?>
				<div class="swiper-slide">
					<div class="rt-item has-animation">
						<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $m );?>s" data-wow-duration="<?php echo esc_attr( $n );?>s">			
							<div class="item-content" <?php if( $testimonial['item_color'] ) { ?> style="background-color: <?php echo esc_attr( $testimonial['item_color'] ); ?>" <?php } ?>>

								<?php if( $data['quote_display'] == 'yes' ) { ?>
								<span class="tquote"><?php Icons_Manager::render_icon( $data['selected_icon'] ); ?></span>
								<?php } ?>
								<h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
								<div class="item-designation"><?php echo wp_kses_post( $testimonial['designation'] );?></div>	

								<div class="tcontent"><?php echo wp_kses_post( $testimonial['content'] );?></div>

								<?php if ( !empty( $testimonial['image']['id'] ) ) { ?>
								<div class="item-img">
									<?php echo wp_get_attachment_image($testimonial['image']['id'],'full');?>
								</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			<?php $m = $m + 0.2; $n = $n + 0.1; } ?>
		</div>
		<?php if ( $data['display_arrow'] == 'yes' ) { ?>
		<div class="swiper-navigation">
            <div class="swiper-button-prev">
				<svg width="8" height="13" viewBox="0 0 8 13" fill="#191D27" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.625 12.2952C6.36133 12.2952 6.12695 12.2073 5.95117 12.0316L1.26367 7.34406C0.882812 6.99249 0.882812 6.37726 1.26367 6.0257L5.95117 1.3382C6.30273 0.957336 6.91797 0.957336 7.26953 1.3382C7.65039 1.68976 7.65039 2.30499 7.26953 2.65656L3.25586 6.67023L7.26953 10.7132C7.65039 11.0648 7.65039 11.68 7.26953 12.0316C7.09375 12.2073 6.85938 12.2952 6.625 12.2952Z" fill=""></path>
				</svg>
			</div>
		    <div class="swiper-button-next">
				<svg width="8" height="13" viewBox="0 0 8 13" fill="#191D27" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.375 12.2952C1.63867 12.2952 1.87305 12.2073 2.04883 12.0316L6.73633 7.34406C7.11719 6.99249 7.11719 6.37726 6.73633 6.0257L2.04883 1.3382C1.69727 0.957336 1.08203 0.957336 0.730469 1.3382C0.349609 1.68976 0.349609 2.30499 0.730469 2.65656L4.74414 6.67023L0.730469 10.7132C0.349609 11.0648 0.349609 11.68 0.730469 12.0316C0.90625 12.2073 1.14062 12.2952 1.375 12.2952Z" fill=""></path>
				</svg>
			</div>
        </div>
    	<?php } ?>
    	<?php if ( $data['display_buttet'] == 'yes' ) { ?>
		<div class="swiper-pagination"></div>
		<?php } ?>
	</div>
</div>