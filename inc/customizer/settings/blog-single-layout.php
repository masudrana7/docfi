<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use radiustheme\docfi\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Blog_Single_Layout_Settings extends DocfiTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_layout_controls' ) );
	}

    public function register_blog_single_layout_controls( $wp_customize ) {        

        $wp_customize->add_setting( 'single_post_layout',
            array(
                'default' => $this->defaults['single_post_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'single_post_layout',
            array(
                'label' => __( 'Sidebar Layout', 'docfi' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'docfi' ),
                'section' => 'post_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'docfi' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'docfi' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'docfi' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'post_single_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'single_post_padding_top',
            array(
                'default' => $this->defaults['single_post_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'docfi' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'single_post_padding_bottom',
            array(
                'default' => $this->defaults['single_post_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'docfi' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'single_post_banner',
            array(
                'default' => $this->defaults['single_post_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_banner',
            array(
                'label' => __( 'Banner', 'docfi' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'single_post_breadcrumb',
            array(
                'default' => $this->defaults['single_post_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'docfi' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'single_post_bgtype',
            array(
                'default' => $this->defaults['single_post_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'single_post_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'docfi' ),
                'section' => 'post_single_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'docfi' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'docfi' ),
                    'bgcolor' => esc_html__( 'BG Color', 'docfi' ),
                ),
            )
        );

        $wp_customize->add_setting( 'single_post_bgimg',
            array(
                'default' => $this->defaults['single_post_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'post_single_layout_section',
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

        // Banner background color
        $wp_customize->add_setting('single_post_bgcolor', 
            array(
                'default' => $this->defaults['single_post_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'docfi'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'post_single_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'single_post_page_bgimg',
            array(
                'default' => $this->defaults['single_post_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'docfi' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'docfi' ),
                'section' => 'post_single_layout_section',
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
		
		$wp_customize->add_setting('single_post_page_bgcolor', 
            array(
                'default' => $this->defaults['single_post_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'docfi'),
                'settings' => 'single_post_page_bgcolor', 
                'section' => 'post_single_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Blog_Single_Layout_Settings();
}
