<?php
$docfi_footer_column = DocfiTheme::$options['footer_column_2'];
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
// Logo
if( !empty( DocfiTheme::$options['footer_logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( DocfiTheme::$options['footer_logo_light'], 'full' );
	$docfi_light_logo = $logo_lights;
}else {
	$docfi_light_logo = "<img width='162' height='52' src='" . DOCFI_ASSETS_URL . 'img/logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

if( !empty( DocfiTheme::$options['fbgimg2'] ) ) {
	$f1_bg = wp_get_attachment_image_src( DocfiTheme::$options['fbgimg2'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = DOCFI_ASSETS_URL . 'img/footer_bg.jpg';
}

if ( DocfiTheme::$options['footer_bgtype2'] == 'fbgcolor2' ) {
	$docfi_bg = DocfiTheme::$options['fbgcolor2'];
} else {
	$docfi_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}


$bgc = $menu_on = $copyright_on = '';
if ( DocfiTheme::$options['footer_bgtype2'] == 'fbgimg2' ) {
	$bgc = 'footer-bg-opacity';
}

$menu_on = ( DocfiTheme::$options['copyright_menu'] ) ? "menu-on" : "menu-off";
$copyright_on = ( DocfiTheme::$options['copyright_text'] ) ? "copyright-on" : "copyright-off";
$logo_on = ( DocfiTheme::$options['logo_display'] ) ? "logo-on" : "logo-off";

if( !empty( DocfiTheme::$options['footer_logo2'] ) ) {
	$footer_logo = wp_get_attachment_image( DocfiTheme::$options['footer_logo2'], 'full' );
	$docfi_footer_logo = $footer_logo;
}else {
	$docfi_footer_logo = get_bloginfo( 'name' ); 
}

?>
<?php get_template_part( 'template-parts/footer/news', 'letter' );?>
<div class="rt-footer-style2 footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $docfi_bg ); ?>">
	<?php if ( DocfiTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">				
			<div class="row">
				<?php
				for ( $i = 1; $i <= $docfi_footer_column; $i++ ) {
					echo '<div class="rt-widget-list ' . $docfi_footer_class . '">';
					dynamic_sidebar( 'footer-style-2-'. $i );
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
			<div class="copyright-area <?php echo esc_attr( $copyright_on ); ?>">

				<div class="copyright-menu-wrap">
					<?php if ( DocfiTheme::$options['copyright_text'] ) { ?>
					<div class="copyright"><?php echo wp_kses( DocfiTheme::$options['copyright_text'] , 'allow_link' );?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>	
	<?php } ?>
</div>	

