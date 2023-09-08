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


<div class="rt-testimonial-default testimonial-section--style-2 testimonial-slider-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['nav_position'] ) ?>">
	<div class="rt-swiper-slider rt-swiper-nav" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
		<div class="swiper-wrapper">
        <?php foreach ( $data['testimonials'] as $testimonial ) { ?>
            <div class="swiper-slide">
                <div class="row">
                    <?php if ( !empty( $testimonial['image']['id'] ) ) { ?>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="testimonial-img-area d-none d-lg-block wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="400ms">
                            <?php echo wp_get_attachment_image($testimonial['image']['id'],'full');?>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- col end -->
                    <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInRight" data-wow-duration="1200ms" data-wow-delay="400ms">
                        <div class="testimonial-item testimonial-item--style-2 text-center">

                            <?php if( $data['quote_display'] == 'yes' ) { ?>
                                <div class="quotation-icon"><?php Icons_Manager::render_icon( $data['selected_icon'] ); ?></div>
                            <?php } ?>
                            <?php if( $testimonial['content']) { ?>   
                            <div class="testimonial-comment">
                                <p class="para-text">
                                    <?php echo wp_kses_post( $testimonial['content'] );?> 
                                </p>
                            </div>
                            <?php } ?>
                            <div class="author-info">
                                <h3 class="name"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
                                <p class="designation"><?php echo wp_kses_post( $testimonial['designation'] );?></p>
                            </div>
                        </div>
                    </div>
                    <!-- col end -->
                </div>
            </div>
        <?php } ?>
        </div>

        <?php if ( $data['display_arrow'] == 'yes' ) { ?>
        <div class="swiper-navigation slider-navigation-btn-wrapper">
            <div class="swiper-button-prev circle-radius swiper-arrow prev">
                <svg width="8" height="13" viewBox="0 0 8 13" fill="#191D27" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.625 12.2952C6.36133 12.2952 6.12695 12.2073 5.95117 12.0316L1.26367 7.34406C0.882812 6.99249 0.882812 6.37726 1.26367 6.0257L5.95117 1.3382C6.30273 0.957336 6.91797 0.957336 7.26953 1.3382C7.65039 1.68976 7.65039 2.30499 7.26953 2.65656L3.25586 6.67023L7.26953 10.7132C7.65039 11.0648 7.65039 11.68 7.26953 12.0316C7.09375 12.2073 6.85938 12.2952 6.625 12.2952Z" fill=""/>
                </svg>
            </div>
            <div class="swiper-button-next circle-radius swiper-arrow next">
                <svg width="8" height="13" viewBox="0 0 8 13" fill="#191D27" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.375 12.2952C1.63867 12.2952 1.87305 12.2073 2.04883 12.0316L6.73633 7.34406C7.11719 6.99249 7.11719 6.37726 6.73633 6.0257L2.04883 1.3382C1.69727 0.957336 1.08203 0.957336 0.730469 1.3382C0.349609 1.68976 0.349609 2.30499 0.730469 2.65656L4.74414 6.67023L0.730469 10.7132C0.349609 11.0648 0.349609 11.68 0.730469 12.0316C0.90625 12.2073 1.14062 12.2952 1.375 12.2952Z" fill=""/>
                </svg>
            </div>
        </div>
	    <?php } ?>

        <?php if ( $data['display_buttet'] == 'yes' ) { ?>
		    <div class="swiper-pagination"></div>
		<?php } ?>

    </div>
    <!-- end video-slider-style-1 -->
    
    

</div>