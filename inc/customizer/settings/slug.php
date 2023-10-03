<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Slug_Settings extends DocfiTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_slug_controls' ) );
	}

    public function register_slug_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'docs_slug',
            array(
                'default' => $this->defaults['docs_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'docs_slug',
            array(
                'label' => __( 'Docs Slug', 'docfi' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'docs_cat_slug',
            array(
                'default' => $this->defaults['docs_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'docs_cat_slug',
            array(
                'label' => __( 'Docs Category Slug', 'docfi' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        ); 

		$wp_customize->add_setting( 'docs_group_slug',
            array(
                'default' => $this->defaults['docs_group_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'docs_group_slug',
            array(
                'label' => __( 'Docs Group Slug', 'docfi' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Slug_Settings();
}
