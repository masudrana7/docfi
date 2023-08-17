<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use radiustheme\docfi\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Switch_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Forum_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_forum_controls' ) );
	}

    public function register_forum_controls( $wp_customize ) {

        // Banner Text 
        $wp_customize->add_setting( 'banner_popular_text',
            array(
                'default' => $this->defaults['banner_popular_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'banner_popular_text',
            array(
                'label' => __( 'Search Popular Text', 'docfi' ),
                'section' => 'forum_section',
                'type' => 'text',
            )
        );

        // Banner Text 1
        $wp_customize->add_setting( 'banner_popular_tag1',
            array(
                'default' => $this->defaults['banner_popular_tag1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'banner_popular_tag1',
            array(
                'label' => __( 'Search Text 1', 'docfi' ),
                'section' => 'forum_section',
                'type' => 'text',
            )
        );
        // Banner Text 2
        $wp_customize->add_setting( 'banner_popular_tag2',
            array(
                'default' => $this->defaults['banner_popular_tag2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'banner_popular_tag2',
            array(
                'label' => __( 'Search Text 2', 'docfi' ),
                'section' => 'forum_section',
                'type' => 'text',
            )
        );
        // Banner Text 3
        $wp_customize->add_setting( 'banner_popular_tag3',
            array(
                'default' => $this->defaults['banner_popular_tag3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'banner_popular_tag3',
            array(
                'label' => __( 'Search Text 3', 'docfi' ),
                'section' => 'forum_section',
                'type' => 'text',
            )
        );

        // Banner Text 4
        $wp_customize->add_setting( 'banner_popular_tag4',
            array(
                'default' => $this->defaults['banner_popular_tag4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'banner_popular_tag4',
            array(
                'label' => __( 'Search Text 4', 'docfi' ),
                'section' => 'forum_section',
                'type' => 'text',
            )
        );

        // Banner background color
        $wp_customize->add_setting('forum_bgcolor', 
            array(
                'default' => $this->defaults['forum_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forum_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'docfi'),
                'settings' => 'forum_bgcolor', 
                'priority' => 10, 
                'section' => 'forum_section',
            )
        ));
        
        // Banner background Image
        $wp_customize->add_setting( 'forum_bgimage',
            array(
                'default' => $this->defaults['forum_bgimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'forum_bgimage',
            array(
                'label' => __( 'Banner Background Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'forum_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'docfi' ),
                    'change' => __( 'Change File', 'docfi' ),
                    'default' => __( 'Default', 'docfi' ),
                    'remove' => __( 'Remove', 'docfi' ),
                    'placeholder' => __( 'No file selected', 'docfi' ),
                    'frame_title' => __( 'Select File', 'docfi' ),
                    'frame_button' => __( 'Choose File', 'docfi' ),
                ),
            )
        ) );
    }
    

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Forum_Settings();
}
