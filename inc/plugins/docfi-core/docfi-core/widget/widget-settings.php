<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'docfi_widgets_init' );
function docfi_widgets_init() {
	//Register Custom Widgets
	register_widget( 'DocfiTheme_ForumList_Widget' );
	register_widget( 'DocfiTheme_FontSize_Controller_Widget' );
	register_widget( 'DocfiTheme_DocsList_Widget' );
	register_widget( 'DocfiTheme_Address_Widget' );
	register_widget( 'DocfiTheme_Social_Widget' );
	register_widget( 'DocfiTheme_Post_Box' );
	register_widget( 'DocfiTheme_Product_Box' );
	register_widget( 'DocfiTheme_Category_Widget' );
	register_widget( 'DocfiTheme_Contact_Widget' );
}