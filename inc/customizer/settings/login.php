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
class DocfiTheme_Login_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_login_controls' ) );
	}

    public function register_login_controls( $wp_customize ) {

        // Logo
        $wp_customize->add_setting( 'login_logo',
            array(
                'default' => $this->defaults['login_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'login_logo',
            array(
                'label' => __( 'Login Logo', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'login_layout_section',
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

        // Login Title 
        $wp_customize->add_setting( 'login_title',
            array(
                'default' => $this->defaults['login_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'login_title',
            array(
                'label' => __( 'Left Title', 'docfi' ),
                'section' => 'login_layout_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'login_description',
            array(
                'default' => $this->defaults['login_description'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'login_description',
            array(
                'label' => __( 'Left Description', 'docfi' ),
                'section' => 'login_layout_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'right_title',
            array(
                'default' => $this->defaults['right_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'right_title',
            array(
                'label' => __( 'Right Title', 'docfi' ),
                'section' => 'login_layout_section',
                'type' => 'text',
            )
        );
        
        $wp_customize->add_setting( 'sign_up_text',
            array(
                'default' => $this->defaults['sign_up_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'sign_up_text',
            array(
                'label' => __( 'Sign_text', 'docfi' ),
                'section' => 'login_layout_section',
                'type' => 'textarea',
            )
        );
    
        // Banner background color
        $wp_customize->add_setting('login_left_bgcolor', 
            array(
                'default' => $this->defaults['login_left_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'login_left_bgcolor',
            array(
                'label' => esc_html__('Left Background Color', 'docfi'),
                'settings' => 'login_left_bgcolor', 
                'priority' => 10, 
                'section' => 'login_layout_section',
            )
        ));
        
        $wp_customize->add_setting( 'left_bgimage',
            array(
                'default' => $this->defaults['left_bgimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'left_bgimage',
            array(
                'label' => __( 'Banner Background Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'login_layout_section',
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
	new DocfiTheme_Login_Settings();
}
