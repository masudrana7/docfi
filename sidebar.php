<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( is_active_sidebar( 'sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}

?>
<div class="col-xl-4 mx-auto <?php echo esc_attr( $fixedbar ); ?>">
	<aside class="sidebar-widget-area">
		<?php
			if ( DocfiTheme::$sidebar ) {
				if ( is_active_sidebar( DocfiTheme::$sidebar ) ) dynamic_sidebar( DocfiTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>