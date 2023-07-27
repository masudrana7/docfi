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
class DocfiTheme_Team_Post_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_team_post_controls' ) );
	}

    /**
     * Team Post Controls
     */
    public function register_team_post_controls( $wp_customize ) {
		
        // Single Team Post
        $wp_customize->add_setting('team_archive_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_archive_heading', array(
            'label' => __( 'Team Archive Option', 'docfi' ),
            'section' => 'rttheme_team_settings',
        )));

		$wp_customize->add_setting( 'team_archive_style',
            array(
                'default' => $this->defaults['team_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'team_archive_style',
            array(
                'label' => __( 'Team Archive Layout', 'docfi' ),
                'description' => esc_html__( 'Select the gallery layout for gallery page', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'docfi' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 2', 'docfi' )
                    ),
                )
            )
        ) );

        // Team option
        $wp_customize->add_setting( 'team_post_number',
            array(
                'default' => $this->defaults['team_post_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_post_number',
            array(
                'label' => __( 'Team Archive Post Limit', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
            )
        );

        $wp_customize->add_setting( 'team_ar_excerpt',
            array(
                'default' => $this->defaults['team_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));

        $wp_customize->add_setting( 'team_arexcerpt_limit',
            array(
                'default' => $this->defaults['team_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_arexcerpt_limit',
            array(
                'label' => __( 'Team Archive Excerpt Limit', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'team_ar_position',
            array(
                'default' => $this->defaults['team_ar_position'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_position',
            array(
                'label' => __( 'Show Position', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_ar_social',
            array(
                'default' => $this->defaults['team_ar_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_social',
            array(
                'label' => __( 'Show Social', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		// Single Team Post
		$wp_customize->add_setting('team_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_single_heading', array(
            'label' => __( 'Single Team Option', 'docfi' ),
            'section' => 'rttheme_team_settings',
        )));
		
		$wp_customize->add_setting( 'team_info',
            array(
                'default' => $this->defaults['team_info'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_info',
            array(
                'label' => __( 'Show Info', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_skill',
            array(
                'default' => $this->defaults['team_skill'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_skill',
            array(
                'label' => __( 'Show Skill', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));

        $wp_customize->add_setting( 'team_contact',
            array(
                'default' => $this->defaults['team_contact'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_contact',
            array(
                'label' => __( 'Show Contact', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));

        $wp_customize->add_setting( 'team_contact_title',
            array(
                'default' => $this->defaults['team_contact_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_contact_title',
            array(
                'label' => __( 'Contact Title', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
		
		// Related Gallery Post
		$wp_customize->add_setting('team_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_related_heading', array(
            'label' => __( 'Single Related Team Option', 'docfi' ),
            'section' => 'rttheme_team_settings',
        )));
		
		$wp_customize->add_setting( 'show_related_team',
            array(
                'default' => $this->defaults['show_related_team'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_team',
            array(
                'label' => __( 'Show Related Team', 'docfi' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_related_title',
            array(
                'default' => $this->defaults['team_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'team_related_title',
            array(
                'label' => __( 'Related Title', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'textarea',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_number',
            array(
                'default' => $this->defaults['related_team_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_number',
            array(
                'label' => __( 'Team Post', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_title_limit',
            array(
                'default' => $this->defaults['related_team_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_title_limit',
            array(
                'label' => __( 'Title Limit', 'docfi' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Team_Post_Settings();
}
