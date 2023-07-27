<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use radiustheme\docfi\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_General_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        
        /*Theme Logo Information*/
        $wp_customize->add_setting('logo_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'logo_heading', array(
            'label' => __( 'Site Logo', 'docfi' ),
            'section' => 'logo_section',
        )));

        $wp_customize->add_setting( 'logo',
            array(
                'default' => $this->defaults['logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
            array(
                'label' => __( 'Main Logo', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'logo_section',
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

        $wp_customize->add_setting( 'logo_light',
            array(
                'default' => $this->defaults['logo_light'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light',
            array(
                'label' => __( 'Light Logo', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'logo_section',
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

        $wp_customize->add_setting( 'logo_width',
            array(
                'default' => $this->defaults['logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'logo_width',
            array(
                'label' => __( 'Logo Width', 'docfi' ),
                'section' => 'logo_section',
                'description' => esc_html__( 'Default logo size 162x52px ( Input logo size only number widthout px )', 'docfi' ),
                'type' => 'number',
            )
        );

        $wp_customize->add_setting( 'mobile_logo_width',
            array(
                'default' => $this->defaults['mobile_logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'mobile_logo_width',
            array(
                'label' => __( 'Mobile Logo Width', 'docfi' ),
                'section' => 'logo_section',
                'description' => esc_html__( 'Default logo size 110x35px ( Input logo size only number widthout px )', 'docfi' ),
                'type' => 'number',
            )
        );

        /*Theme Control Information*/
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => __( 'Theme Control', 'docfi' ),
            'section' => 'control_section',
        )));

        $wp_customize->add_setting( 'image_blend',
            array(
                'default' => $this->defaults['image_blend'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'image_blend',
            array(
                'label' => __( 'Image Blend', 'docfi' ),
                'section' => 'control_section',
                'type' => 'select',
                'choices' => array(
                    'normal' => esc_html__( 'Normal Mode', 'docfi' ),
                    'blend' => esc_html__( 'Blend Mode', 'docfi' ),
                ),
            )
        );
		
		$wp_customize->add_setting( 'container_width',
            array(
                'default' => $this->defaults['container_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'container_width',
            array(
                'label' => __( 'Container width( Bootstrap Grid )', 'docfi' ),
                'section' => 'control_section',
                'type' => 'select',
                'choices' => array(
                    '1320' => esc_html__( '1320px', 'docfi' ),
					'1290' => esc_html__( '1290px', 'docfi' ),
					'1200' => esc_html__( '1200px', 'docfi' ),
					'1140' => esc_html__( '1140px', 'docfi' ),
                ),
            )
        );
		
        $wp_customize->add_setting( 'display_no_preview_image',
            array(
                'default' => $this->defaults['display_no_preview_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'display_no_preview_image',
            array(
                'label' => __( 'Display Preview Image on Blog', 'docfi' ),
                'section' => 'control_section',
            )
        ) );
		
        $wp_customize->add_setting( 'back_to_top',
            array(
                'default' => $this->defaults['back_to_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'back_to_top',
            array(
                'label' => __( 'Back to Top Arrow', 'docfi' ),
                'section' => 'control_section',
            )
        ) );

        $wp_customize->add_setting('preloader',
			array(
			 'default'           => $this->defaults['preloader'],
			 'transport'         => 'refresh',
			 'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new Customizer_Switch_Control($wp_customize, 'preloader',
            array(
                'label'   => esc_html__('Preloader', 'docfi'),
                'section' => 'control_section',
            )
        ));

        $wp_customize->add_setting('preloader_image',
			array(
			  'default'           => $this->defaults['preloader_image'],
			  'transport'         => 'refresh',
			  'sanitize_callback' => 'absint',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'preloader_image',
			array(
				'label'         => esc_html__('Preloader Image', 'docfi'),
				'description'   => esc_html__('This is the description for the Media Control', 'docfi'),
				'section'       => 'control_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'docfi'),
					'change'       => esc_html__('Change File', 'docfi'),
					'default'      => esc_html__('Default', 'docfi'),
					'remove'       => esc_html__('Remove', 'docfi'),
					'placeholder'  => esc_html__('No file selected', 'docfi'),
					'frame_title'  => esc_html__('Select File', 'docfi'),
					'frame_button' => esc_html__('Choose File', 'docfi'),
				)
			)
        ));

        $wp_customize->add_setting('preloader_bg_color',
			array(
				'default'           => $this->defaults['preloader_bg_color'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rttheme_hex_rgba_sanitization',
			)
        );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_bg_color',
			array(
				'label'   => esc_html__('Preloader Background color', 'docfi'),
				'section' => 'control_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
			)
		));	

        

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_General_Settings();
}
