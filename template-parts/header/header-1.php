<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = DocfiTheme_Helper::nav_menu_args();

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

$logo_settings = get_post_meta( get_the_ID(), 'docfi_layout_settings', true );

if( !empty( $logo_settings['docfi_cutom_logo'] ) ) {
	$attch_url      = wp_get_attachment_image_src( $logo_settings['docfi_cutom_logo'], 'full', true );
	$customlogo = $attch_url[0];
}

if( !empty( $logo_settings['docfi_cutom_sticky_logo'] ) ) {
	$attch_url      = wp_get_attachment_image_src( $logo_settings['docfi_cutom_sticky_logo'], 'full', true );
	$ctstickylogo = $attch_url[0];
}
$class_width = ( DocfiTheme::$header_width === "on" || DocfiTheme::$header_width === 1 ) ? "container-fluid" : "container"; ?>


<div id="sticky-placeholder"></div>

<div class="header-menu" id="header-menu">
	<div class="<?php echo esc_attr($class_width); ?>">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<?php if(!empty($customlogo)){ ?>
					<?php if(!empty($customlogo)){ ?>		
						<a class="custom-logo custom-norlam-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>">	
							<img src="<?php echo esc_attr($customlogo); ?>" alt="Custom Image">
						</a>
					<?php } ?>
					<?php if(!empty($ctstickylogo)){ ?>	
					<a class="custom-logo custom-sticky-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>">	
						<img src="<?php echo esc_attr($ctstickylogo); ?>" alt="Custom Image">
					</a>
					<?php } ?>
				<?php } else { ?>
					<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_light_logo, 'allow_link' ); ?></a>
				<?php } ?>
			</div>

			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php if ( has_nav_menu( 'primary' ) ) { 
		             	wp_nav_menu( $nav_menu_args );
		            } else {
		              	if ( is_user_logged_in() ) {
		                	echo '<ul id="menu" class="nav fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'docfi' ) . '</a></li></ul>';
		              	}
		            } ?>
				</div>
			</div>
			<?php if ( DocfiTheme::$options['online_button'] ) { ?>
			<div class="header-icon-area">				
				<?php if ( DocfiTheme::$options['online_button'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'button' );?>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>