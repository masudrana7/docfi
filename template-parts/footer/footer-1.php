<?php
$docfi_footer_column = DocfiTheme::$options['footer_column_1'];
switch ( $docfi_footer_column ) {
	case '1':
	$docfi_footer_class = 'col-12';
	break;
	case '2':
	$docfi_footer_class = 'col-xl-6 col-md-6';
	break;
	case '3':
	$docfi_footer_class = 'col-xl-4 col-md-6';
	break;		
	default:
	$docfi_footer_class = 'col-xl-3 col-md-6';
	break;
}



if( !empty( DocfiTheme::$options['fbgimg'] ) ) {
	$f1_bg = wp_get_attachment_image_src( DocfiTheme::$options['fbgimg'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = DOCFI_ASSETS_URL . 'img/footer_bg.jpg';
}

if ( DocfiTheme::$options['footer_bgtype'] == 'fbgcolor' ) {
  $docfi_bg = DocfiTheme::$options['fbgcolor'];
} else {
  $docfi_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}

$bgc = $menu_on = $copyright_on = '';
if ( DocfiTheme::$options['footer_bgtype'] == 'fbgimg' ) {
	$bgc = 'footer-bg-opacity';
}
$menu_on = ( DocfiTheme::$options['copyright_menu'] ) ? "menu-on" : "menu-off";
$copyright_on = ( DocfiTheme::$options['copyright_text'] ) ? "copyright-on" : "copyright-off";


if( !empty( DocfiTheme::$options['footer_shape1'] ) ) {
	$footer_shape1 = wp_get_attachment_image_src( DocfiTheme::$options['footer_shape1'], 'full', true );
	$footer_bg_img1 = $footer_shape1[0];
}else {
	$footer_bg_img1 = DOCFI_ASSETS_URL . 'img/footer_shape1.png';
}
if( !empty( DocfiTheme::$options['footer_shape2'] ) ) {
	$footer_shape2 = wp_get_attachment_image_src( DocfiTheme::$options['footer_shape2'], 'full', true );
	$footer_bg_img2 = $footer_shape2[0];
}else {
	$footer_bg_img2 = DOCFI_ASSETS_URL . 'img/footer_shape2.svg';
}?>
<?php

if( !empty( DocfiTheme::$options['footer_newsletter_image'] ) ) {
	$footer_newsletter_image = wp_get_attachment_image_src( DocfiTheme::$options['footer_newsletter_image'], 'full', true );
	$footer_news_img = $footer_newsletter_image[0];
}else {
	$footer_news_img = DOCFI_ASSETS_URL . 'img/cta.jpg';
} 

if (!empty( DocfiTheme::$options['newsletter_title'] || DocfiTheme::$options['nws_shortcode'] )) {
	if ( DocfiTheme::$footer_newsletter == 1 || DocfiTheme::$footer_newsletter != 'off' ) { ?>
	<!-- start call-to-action-section -->
	<div class="call-to-action-section" style="background-image:url(<?php echo esc_url( $footer_news_img ); ?>);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-11">
					<div class="row justify-content-between align-items-center">

						<?php if (!empty(DocfiTheme::$options['newsletter_title'])) { ?>
							<div class="col-xl-5">
								<div class="section-text-content">
									<h2 class="section-heading wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
										<?php echo esc_html( DocfiTheme::$options['newsletter_title'] ); ?>
									</h2>
								</div>
							</div>
						<?php }  if (!empty(DocfiTheme::$options['nws_shortcode'])) { ?>
							<div class="col-xl-6 wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="500ms">
								<div class="call-to-cation-form-wrapper">
									<?php echo do_shortcode( DocfiTheme::$options['nws_shortcode'] ); ?>
								</div>
							</div>
							<div class="newsletter-form"></div> 
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		<!-- container end -->
	</div>
	<!-- end call-to-action-section -->
<?php } } ?>
<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $docfi_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-1-1' ) && DocfiTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $docfi_footer_column; $i++ ) {
					echo '<div class="rt-widget-list ' . $docfi_footer_class . ' wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">';
					dynamic_sidebar( 'footer-style-1-'. $i );
					echo '</div>';
				}
				?>
			</div>	
			<div class="rt-footer-line"></div>		
		</div>
	</div>
	<?php } ?>

	<?php if ( DocfiTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright-area <?php echo esc_attr( $copyright_on ); ?> <?php echo esc_attr( $menu_on ); ?>">
				<div class="copyright-menu-wrap">
					<?php if ( DocfiTheme::$options['copyright_text'] ) { ?>
					<div class="copyright"><?php echo wp_kses( DocfiTheme::$options['copyright_text'] , 'allow_link' );?></div>
					<?php } ?>
				</div>
				<?php if ( DocfiTheme::$options['copyright_menu'] ) { ?>	
					<div class="copyright-menu"><?php dynamic_sidebar('copyright-menu'); ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	

	<?php if ( DocfiTheme::$footer_shape == 1 || DocfiTheme::$footer_shape == 'on' ) { ?>				
	<div class="shapes">
		<ul>
			<?php if(!empty($footer_bg_img1)) { ?>
			<li class="">
				<img src="<?php echo esc_url( $footer_bg_img1 ); ?>" alt="" class="wow animate__fadeInLeft animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
			</li>
			<?php } ?>

		    <?php if(!empty($footer_bg_img2)) { ?>
			<li class="rt-mouse-parallax">
				<div data-depth="5.00">
					<img src="<?php echo esc_url( $footer_bg_img2 ); ?>" alt="" class="wow animate__fadeInRight animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
				</div>
			</li>
			<?php } ?>

		</ul>
	</div>	
	<?php } ?>
	
	


</div>

