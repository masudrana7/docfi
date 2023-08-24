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
class DocfiTheme_Register_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_register_controls' ) );
	}

    public function register_register_controls( $wp_customize ) {

        // Logo
        $wp_customize->add_setting( 'register_logo',
            array(
                'default' => $this->defaults['register_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'register_logo',
            array(
                'label' => __( 'Register Logo', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'register_layout_section',
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

        // Register Title 
        $wp_customize->add_setting( 'register_title',
            array(
                'default' => $this->defaults['register_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'register_title',
            array(
                'label' => __( 'Left Title', 'docfi' ),
                'section' => 'register_layout_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'register_description',
            array(
                'default' => $this->defaults['register_description'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'register_description',
            array(
                'label' => __( 'Left Description', 'docfi' ),
                'section' => 'register_layout_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'rg_right_title',
            array(
                'default' => $this->defaults['rg_right_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'rg_right_title',
            array(
                'label' => __( 'Right Title', 'docfi' ),
                'section' => 'register_layout_section',
                'type' => 'text',
            )
        );
        
        $wp_customize->add_setting( 'rg_sign_up_text',
            array(
                'default' => $this->defaults['rg_sign_up_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'rg_sign_up_text',
            array(
                'label' => __( 'Sign_text', 'docfi' ),
                'section' => 'register_layout_section',
                'type' => 'textarea',
            )
        );
    
        // Banner background color
        $wp_customize->add_setting('register_left_bgcolor', 
            array(
                'default' => $this->defaults['register_left_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'register_left_bgcolor',
            array(
                'label' => esc_html__('Left Background Color', 'docfi'),
                'settings' => 'register_left_bgcolor', 
                'priority' => 10, 
                'section' => 'register_layout_section',
            )
        ));
        
        $wp_customize->add_setting( 'rg_left_bgimage',
            array(
                'default' => $this->defaults['rg_left_bgimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'rg_left_bgimage',
            array(
                'label' => __( 'Banner Background Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'register_layout_section',
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
	new DocfiTheme_Register_Settings();
}
