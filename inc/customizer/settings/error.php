<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Error_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
		
		$wp_customize->add_setting('error_bodybg_color', 
            array(
                'default' => $this->defaults['error_bodybg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bodybg_color',
            array(
                'label' => esc_html__('Body Background Color', 'docfi'),
                'section' => 'error_section', 
            )
        ));
		// Error image
        $wp_customize->add_setting( 'error_image',
            array(
                'default' => $this->defaults['error_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image',
            array(
                'label' => __( 'Error Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'docfi' ),
                    'change' => __( 'Change File', 'docfi' ),
                    'default' => __( 'Default', 'docfi' ),
                    'remove' => __( 'Remove', 'docfi' ),
                    'placeholder' => __( 'No file selected', 'docfi' ),
                    'frame_title' => __( 'Select File', 'docfi' ),
                    'frame_button' => __( 'Choose File', 'docfi' ),
                )
            )
        ) );
		// Error image 2
        $wp_customize->add_setting( 'error_image2',
            array(
                'default' => $this->defaults['error_image2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image2',
            array(
                'label' => __( 'Error Image Two', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'docfi' ),
                    'change' => __( 'Change File', 'docfi' ),
                    'default' => __( 'Default', 'docfi' ),
                    'remove' => __( 'Remove', 'docfi' ),
                    'placeholder' => __( 'No file selected', 'docfi' ),
                    'frame_title' => __( 'Select File', 'docfi' ),
                    'frame_button' => __( 'Choose File', 'docfi' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Heading', 'docfi' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text', 'docfi' ),
                'section' => 'error_section',
                'type' => 'textarea',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'docfi' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Heading Color', 'docfi'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text Color', 'docfi'),
                'section' => 'error_section', 
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'error_animation',
            array(
                'default' => $this->defaults['error_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation',
            array(
                'label' => __( 'Animation On/Off', 'docfi' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'docfi' ),
                    'hide' => esc_html__( 'Animation Off', 'docfi' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_animation_effect',
            array(
                'default' => $this->defaults['error_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'docfi' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'docfi' ),
                    'bounce' => esc_html__( 'bounce', 'docfi' ),
                    'flash' => esc_html__( 'flash', 'docfi' ),
                    'pulse' => esc_html__( 'pulse', 'docfi' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'docfi' ),
                    'shakeX' => esc_html__( 'shakeX', 'docfi' ),
                    'shakeY' => esc_html__( 'shakeY', 'docfi' ),
                    'headShake' => esc_html__( 'headShake', 'docfi' ),
                    'swing' => esc_html__( 'swing', 'docfi' ),                 
                    'fadeIn' => esc_html__( 'fadeIn', 'docfi' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'docfi' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'docfi' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'docfi' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'docfi' ),                   
                    'bounceIn' => esc_html__( 'bounceIn', 'docfi' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'docfi' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'docfi' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'docfi' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'docfi' ),           
                    'slideInDown' => esc_html__( 'slideInDown', 'docfi' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'docfi' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'docfi' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'docfi' ), 
                ),
            )
        );
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Error_Settings();
}
