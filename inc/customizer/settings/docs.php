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
use radiustheme\docfi\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Docs_Post_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_docs_post_controls' ) );
	}

    /**
     * Docs Post Controls
     */
    public function register_docs_post_controls( $wp_customize ) {


        // Archive Docs Post
        $wp_customize->add_setting('docs_archive_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'docs_archive_heading', array(
            'label' => __( 'Docs Archive Option', 'docfi' ),
            'section' => 'rttheme_docs_settings',
        )));

        // Docs Archive Group
        $wp_customize->add_setting( 'docs_group_number',
            array(
                'default' => $this->defaults['docs_group_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'docs_group_number',
            array(
                'label' => __( 'Docs Archive Group Limit', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'number',
            )
        );

        // Docs Archive option
        $wp_customize->add_setting( 'docs_post_number',
            array(
                'default' => $this->defaults['docs_post_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'docs_post_number',
            array(
                'label' => __( 'Docs Archive Post Limit', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'number',
            )
        );
        
        $wp_customize->add_setting( 'docs_arexcerpt_limit',
            array(
                'default' => $this->defaults['docs_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'docs_arexcerpt_limit',
            array(
                'label' => __( 'Docs Archive Excerpt Limit', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'number',
            )
        );


        // Single docs
        $wp_customize->add_setting('docs_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'docs_related_heading', array(
            'label' => __( 'Single Docs Option', 'docfi' ),
            'section' => 'rttheme_docs_settings',
        )));        

        $wp_customize->add_setting( 'show_related_docs',
            array(
                'default' => $this->defaults['show_related_docs'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_docs',
            array(
                'label' => __( 'Show Related docs', 'docfi' ),
                'section' => 'rttheme_docs_settings',
            )
        ));
        
        $wp_customize->add_setting( 'docs_related_title',
            array(
                'default' => $this->defaults['docs_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'docs_related_title',
            array(
                'label' => __( 'Related Title', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_docs_enabled',
            )
        );
        
        $wp_customize->add_setting( 'related_docs_number',
            array(
                'default' => $this->defaults['related_docs_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_docs_number',
            array(
                'label' => __( 'Team Post', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_docs_enabled',
            )
        );
        
        $wp_customize->add_setting( 'related_docs_title_limit',
            array(
                'default' => $this->defaults['related_docs_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_docs_title_limit',
            array(
                'label' => __( 'Title Limit', 'docfi' ),
                'section' => 'rttheme_docs_settings',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_docs_enabled',
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Docs_Post_Settings();
}
