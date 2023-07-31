<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$docfi_theme_data = wp_get_theme();
	$action  = 'docfi_theme_init';
	do_action( $action );

	define( 'DOCFI_VERSION', ( WP_DEBUG ) ? time() : $docfi_theme_data->get( 'Version' ) );
	define( 'DOCFI_AUTHOR_URI', $docfi_theme_data->get( 'AuthorURI' ) );
	define( 'DOCFI_NAME', 'docfi' );

	// DIR
	define( 'DOCFI_BASE_DIR',    get_template_directory(). '/' );
	define( 'DOCFI_INC_DIR',     DOCFI_BASE_DIR . 'inc/' );
	define( 'DOCFI_ASSETS_DIR',  DOCFI_BASE_DIR . 'assets/' );
	define( 'DOCFI_WOO_DIR',     DOCFI_BASE_DIR . 'woocommerce/' );

	// URL
	define( 'DOCFI_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'DOCFI_ASSETS_URL',  DOCFI_BASE_URL . 'assets/' );
	
	// icon trait Plugin Activation
	require_once DOCFI_INC_DIR . 'icon-trait.php';
	// Includes
	require_once DOCFI_INC_DIR . 'helper-functions.php';
	require_once DOCFI_INC_DIR . 'docfi.php';
	require_once DOCFI_INC_DIR . 'general.php';
	require_once DOCFI_INC_DIR . 'ajax-tab.php'; 
	require_once DOCFI_INC_DIR . 'ajax-loadmore.php'; 
	require_once DOCFI_INC_DIR . 'scripts.php';
	require_once DOCFI_INC_DIR . 'template-vars.php';
	require_once DOCFI_INC_DIR . 'rt-archive-meta.php';
	require_once DOCFI_INC_DIR . 'includes.php';
	// require_once DOCFI_INC_DIR . 'lc-helper.php';
	// require_once DOCFI_INC_DIR . 'lc-utility.php';

	
	if( is_admin() ) {
		// TGM Plugin Activation
		require_once DOCFI_BASE_DIR . 'lib/class-tgm-plugin-activation.php';
		require_once DOCFI_INC_DIR . 'tgm-config.php';
	} else {
		// Includes Modules
		require_once DOCFI_INC_DIR . 'modules/rt-post-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-team-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-portfolio-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-breadcrumbs.php';
	}

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'docfi_hseparator_breadcrumb_trail', 1);
	function docfi_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> | </span>';
		return $object;
	}

	/*review comment most count*/
	add_filter('pre_wp_update_comment_count_now', function( $counts, $old, $post_id){ 
		global $wpdb;
		return (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_parent = 0 AND comment_approved = '1'", $post_id ) );

	}, 999, 3);

	/*post order*/
	add_action('admin_init', 'rt_add_page_attributes');
	function rt_add_page_attributes(){
		add_post_type_support( 'post', 'page-attributes' );
	}

	// function remove_custom_taxonomy_meta_box() {
	// 	// Replace 'custom_taxonomy' with the name of your custom taxonomy
	// 	remove_meta_box('tagsdiv-docfi_docs_group', 'docfi_docs', 'normal');
	// }
	// add_action('admin_menu', 'remove_custom_taxonomy_meta_box');