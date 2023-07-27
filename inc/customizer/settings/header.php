<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use radiustheme\docfi\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Header_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		
        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'docfi' ),
            'section' => 'header_section',
        )));
        
        $wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'docfi' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'docfi' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'tr_header',
            array(
                'default' => $this->defaults['tr_header'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'tr_header',
            array(
                'label' => __( 'Transparent Header', 'docfi' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting('header_bg_color', 
            array(
                'default' => $this->defaults['header_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => esc_html__('Header Background Color', 'docfi'),
                'section' => 'header_section', 
            )
        ));

        
        /*header button*/
        $wp_customize->add_setting( 'online_button',
            array(
                'default' => $this->defaults['online_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'online_button',
            array(
                'label' => __( 'Make a Button', 'docfi' ),
                'section' => 'header_section',
            )
        ) );
        
        $wp_customize->add_setting( 'online_button_text',
            array(
                'default' => $this->defaults['online_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'online_button_text',
            array(
                'label' => __( 'Button Text', 'docfi' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );
        
        $wp_customize->add_setting( 'online_button_link',
            array(
                'default' => $this->defaults['online_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'online_button_link',
            array(
                'label' => __( 'Button Link', 'docfi' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );
       
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Header_Settings();
}
