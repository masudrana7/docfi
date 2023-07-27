<?php
$docfi_footer_column = DocfiTheme::$options['footer_column_3'];
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
$docfi_socials = DocfiTheme_Helper::socials();

if( !empty( DocfiTheme::$options['fbgimg3'] ) ) {
	$f1_bg = wp_get_attachment_image_src( DocfiTheme::$options['fbgimg3'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = DOCFI_ASSETS_URL . 'img/footer_bg.jpg';
}

if ( DocfiTheme::$options['footer_bgtype3'] == 'fbgcolor3' ) {
	$docfi_bg = DocfiTheme::$options['fbgcolor3'];
} else {
	$docfi_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = $menu_on = $copyright_on = '';
if ( DocfiTheme::$options['footer_bgtype3'] == 'fbgimg3' ) {
	$bgc = 'footer-bg-opacity';
}

$menu_on = ( DocfiTheme::$options['copyright_menu'] ) ? "menu-on" : "menu-off";
$copyright_on = ( DocfiTheme::$options['copyright_text'] ) ? "copyright-on" : "copyright-off";

?>
<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $docfi_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-3-1' ) && DocfiTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $docfi_footer_column; $i++ ) {
					echo '<div class="' . $docfi_footer_class . '">';
					dynamic_sidebar( 'footer-style-3-'. $i );
					echo '</div>';
				}
				?>
			</div>			
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
</div>

