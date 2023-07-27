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

?>
<div id="sticky-placeholder"></div>
<div class="header-menu header-top" id="header-middlebar">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-icon">
				<div class="site-branding">
					<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $docfi_light_logo, 'allow_link' ); ?></a>
				</div>
			</div>
			<?php if ( DocfiTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">				
				<?php if ( DocfiTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
			</div>
			<?php } ?>

			<?php if ( DocfiTheme::$options['search_icon'] ) { ?>
				<div class="tophead-search">
					<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) )  ?>" class="search-form">
						<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="<?php esc_attr_e( 'Enter a keyword to search products', 'docfi');?>" value="" name="s">
						<button class="search-button" aria-label="search button" type="submit"><i class="icon-docfi-search"></i></button>
					</form>
				</div>	
			<?php } ?>	

			<?php if ( DocfiTheme::$options['cart_icon'] || DocfiTheme::$options['login_icon'] ) { ?>
			<div class="header-icon-area header-top-icon">
				<?php if ( DocfiTheme::$options['login_icon'] ) { ?>
				<div class="header-login"><i class="icon-docfi-user"></i><span class="login-text"><a target="_self" href="<?php echo esc_url( DocfiTheme::$options['login_link']  );?>"><?php echo esc_html( DocfiTheme::$options['login_text'] );?></a></span></div>
				<?php } if ( DocfiTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>		
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="header-menu header-bottom" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap header-dark">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php if ( DocfiTheme::$options['phone_icon'] || DocfiTheme::$options['offer_icon'] ) { ?>
				<div class="header-info header-phone">
					<?php if ( DocfiTheme::$options['offer_icon'] ) { ?>
					<div class="special-offer"><img width="22" height="22" loading='lazy' src="<?php echo DOCFI_ASSETS_URL . 'img/special_offer.svg'; ?>" alt="<?php echo esc_attr('special offer', 'docfi'); ?>"> <a target="_self" href="<?php echo esc_url( DocfiTheme::$options['offer_link']  );?>"><?php echo esc_html( DocfiTheme::$options['offer_text'] );?></a></div>
					<?php } if ( DocfiTheme::$options['phone_icon'] ) { ?>
					<div class="info-icon phone-icon">
						<i class="icon-docfi-phone"></i>
					</div>
					<div class="info-text phone-no">
						<span><?php echo wp_kses( DocfiTheme::$options['phone_label'] , 'alltext_allow' );?></span><a href="tel:<?php echo esc_attr( DocfiTheme::$options['phone'] );?>"><?php echo wp_kses( DocfiTheme::$options['phone'] , 'alltext_allow' );?></a>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>