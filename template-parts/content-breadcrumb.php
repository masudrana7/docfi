<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$class_width = ( DocfiTheme::$header_width === "on" || DocfiTheme::$header_width === 1 ) ? "container-fluid" : "container"; 
if( function_exists( 'bcn_display') ){
	echo '<div class="breadcrumb-area"><div class="'.$class_width.'"><div class="entry-breadcrumb">';
	if ( is_rtl() ) { //@rtl
		bcn_display( false, true, true );
	}
	else {
		bcn_display();
	}	
	echo '</div></div></div>';
} else {	
	echo '<div class="breadcrumb-area"><div class="'.$class_width.'"><div class="entry-breadcrumb">';	
	echo docfi_breadcrumbs();
	echo '</div></div></div>';
}