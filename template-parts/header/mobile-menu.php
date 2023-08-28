<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = DocfiTheme_Helper::nav_menu_args();

// Logo
$logo_settings = get_post_meta( get_the_ID(), 'docfi_layout_settings', true );
if( !empty( $logo_settings['docfi_cutom_logo'] ) ) {
	$attch_url      = wp_get_attachment_image_src( $logo_settings['docfi_cutom_logo'], 'full', true );
	$customlogo = $attch_url[0];
}

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
<div id="mobile-sticky-placeholder"></div>
<div class="rt-header-menu mean-container" id="meanmenu"> 
    <div class="mobile-mene-bar">
        <div class="mean-bar">

            <?php if(!empty($customlogo)){ ?>
                <a class="custom-logo mobile-logo dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>">	
                    <img src="<?php echo $customlogo; ?>" alt="Custom Image">
                </a>
            <?php } else { ?>
                <a class="mobile-logo dark-logo" aria-label="Mobile Logo" href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $docfi_dark_logo, 'alltext_allow' ); ?></a>
            <?php } ?>
            <div class="mean-bar-search">
                <span class="sidebarBtn ">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </div>
        </div>    
        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <?php wp_nav_menu( $nav_menu_args );?>
            </div>
        </div>
    </div>
</div>
