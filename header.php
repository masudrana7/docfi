<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( DocfiTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader	
		if ( DocfiTheme::$options['preloader'] ) {	
			if( !empty( DocfiTheme::$options['preloader_image'] ) ) {
				$pre_bg = wp_get_attachment_image_src( DocfiTheme::$options['preloader_image'], 'full', true );
				$preloader_img = $pre_bg[0];
				echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
			}else { ?>	
			<div class="pre-loader" id="preloader">
				<div class="loading-wrapper">
					<div class="loading-circle circle"></div>
					<div class="loading-circle-small circle">
						<div class="doc-icon">
							<div class="line fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="200ms"></div>
							<div class="line fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="400ms"></div>
							<div class="line fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="600ms"></div>
							<div class="line fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="800ms"></div>
						</div>
					</div>
				</div>
			</div>
			<?php }	            
		}
	?>
	<div class="rt-focus"></div>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'docfi' ); ?></a>		
		<header id="masthead" class="site-header">
			<div id="rt-header-header" class="header-area rt-header-style<?php echo esc_attr( DocfiTheme::$header_style ); ?>">
				
				
				<?php
				
				if ( DocfiTheme::$header_opt == 1 || DocfiTheme::$header_opt === "on" ){ ?>

					<?php get_template_part( 'template-parts/header/header', DocfiTheme::$header_style ); ?>
					
					
				<?php } ?>		


			</div>
		</header>		
		<?php get_template_part('template-parts/header/mobile', 'menu');?>
		<div id="header-search" class="header-search">
			<div class="header-search-wrap">
            <button type="button" aria-label="close button" class="close"><i class="fa-solid fa-xmark"></i></button>
            <form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Type your search...', 'docfi' ); ?>">
                <button type="submit" aria-label="submit button" class="search-btn"><i class="icon-docfi-search"></i></button>
            </form>
            </div>
        </div>


		<div id="content" class="site-content <?php echo esc_attr($blend); ?>">			
			<?php

				if ( DocfiTheme::$has_banner === 1 || DocfiTheme::$has_banner === "on") { 
					get_template_part('template-parts/content', 'banner');
				}

			?>
			