<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$docfi_socials = DocfiTheme_Helper::socials();

// Logo
if( !empty( DocfiTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( DocfiTheme::$options['logo'], 'full' );
	$docfi_dark_logo = $logo_dark;
}else {
	$docfi_dark_logo = get_bloginfo( 'name' ); 
}

if( !empty( DocfiTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( DocfiTheme::$options['logo_light'], 'full' );
	$docfi_light_logo = $logo_lights;
}else {
	$docfi_light_logo = get_bloginfo( 'name' );
}

?>

<div class="additional-menu-area header-offcanvus">
	<div class="sidenav sidecanvas">
		<div class="canvas-content">
			<a href="#" class="closebtn" aria-label="Close btn"><i class="fas fa-times"></i></a>
			<div class="additional-logo">
				<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_light_logo, 'allow_link' ); ?></a>
			</div>

			<div class="sidenav-address">
				<?php if ( !empty ( DocfiTheme::$options['sidetext_label'] ) ) { ?>
				<label><?php echo wp_kses( DocfiTheme::$options['sidetext_label'] , 'alltext_allow' );?></label>
				<?php } ?>
				<?php if ( !empty ( DocfiTheme::$options['sidetext'] ) ) { ?>
				<p><?php echo wp_kses( DocfiTheme::$options['sidetext'] , 'alltext_allow' );?></p>
				<?php } ?>
				<?php if( is_active_sidebar('offcanvas') ) { dynamic_sidebar('offcanvas'); } ?>

				<?php if ( !empty ( DocfiTheme::$options['address_label'] ) ) { ?>
				<label><?php echo wp_kses( DocfiTheme::$options['address_label'] , 'alltext_allow' );?></label>
				<?php } ?>
				<?php if ( DocfiTheme::$options['address'] ) { ?>
				<span><i class="icon-docfi-location"></i><?php echo wp_kses( DocfiTheme::$options['address'] , 'alltext_allow' );?></span>
				<?php } ?>
				<?php if ( DocfiTheme::$options['email'] ) { ?>
				<span><i class="icon-docfi-message"></i><a href="mailto:<?php echo esc_attr( DocfiTheme::$options['email'] );?>"><?php echo esc_html( DocfiTheme::$options['email'] );?></a></span>
				<?php } ?>			
				<?php if ( DocfiTheme::$options['phone'] ) { ?>
				<span><i class="icon-docfi-phone"></i><a href="tel:<?php echo esc_attr( DocfiTheme::$options['phone'] );?>"><?php echo esc_html( DocfiTheme::$options['phone'] );?></a></span>
				<?php } ?>

			<?php if ( !empty ( $docfi_socials ) ) { ?>
				<?php if ( !empty ( DocfiTheme::$options['social_label'] ) ) { ?>
				<label class="social-title"><?php echo wp_kses( DocfiTheme::$options['social_label'] , 'alltext_allow' );?></label>
			<?php } } ?>
				<?php if ( $docfi_socials ) { ?>
					<div class="sidenav-social">
						<?php foreach ( $docfi_socials as $docfi_social ): ?>
							<span><a target="_blank" aria-label="Social Link" href="<?php echo esc_url( $docfi_social['url'] );?>"><i class="fab <?php echo esc_attr( $docfi_social['icon'] );?>"></i></a></span>
						<?php endforeach; ?>
					</div>						
				<?php } ?>
			</div>
		</div>
	</div>
    <button type="button" aria-label="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
      </button>
</div>