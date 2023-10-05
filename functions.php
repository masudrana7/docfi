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

	// URL
	define( 'DOCFI_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'DOCFI_ASSETS_URL',  DOCFI_BASE_URL . 'assets/' );
	
	// icon trait Plugin Activation
	require_once DOCFI_INC_DIR . 'icon-trait.php';
	// Includes
	require_once DOCFI_INC_DIR . 'helper-functions.php';
	require_once DOCFI_INC_DIR . 'docfi.php';
	require_once DOCFI_INC_DIR . 'general.php';
	require_once DOCFI_INC_DIR . 'ajax-search.php'; 
	require_once DOCFI_INC_DIR . 'ajax-tab.php'; 
	require_once DOCFI_INC_DIR . 'ajax-loadmore.php'; 
	require_once DOCFI_INC_DIR . 'scripts.php';
	require_once DOCFI_INC_DIR . 'template-vars.php';
	require_once DOCFI_INC_DIR . 'rt-archive-meta.php';
	require_once DOCFI_INC_DIR . 'includes.php';
	
	if( is_admin() ) {
		// TGM Plugin Activation
		require_once DOCFI_BASE_DIR . 'lib/class-tgm-plugin-activation.php';
		require_once DOCFI_INC_DIR . 'tgm-config.php';
	} else {
		// Includes Modules
		require_once DOCFI_INC_DIR . 'modules/rt-post-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-team-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-docs-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-breadcrumbs.php';
	}
	add_editor_style( 'style-editor.css' );