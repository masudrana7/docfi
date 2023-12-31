<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'docfi_register_required_plugins' );
function docfi_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Docfi Core',
			'slug'         => 'docfi-core',
			'source'       => 'docfi-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.0'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.4'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '6.0.1'
		),

		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'bbPress',
			'slug'     => 'bbpress',
			'required' => false,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'docfi',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => DOCFI_INC_DIR. '/plugins/', // Default absolute path to bundled plugins.
		'menu'         => 'docfi-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}