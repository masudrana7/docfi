<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\docfi\Customizer\Settings;

use radiustheme\docfi\Customizer\DocfiTheme_Customizer;
use radiustheme\docfi\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\docfi\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class DocfiTheme_Woo_Product_Settings extends DocfiTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_woo_product_controls' ) );
	}

    public function register_woo_product_controls( $wp_customize ) {
		
        // Meta
        $wp_customize->add_setting( 'wc_product_meta',
            array(
                'default' => $this->defaults['wc_product_meta'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_meta',
            array(
                'label' => __( 'Meta', 'docfi' ),
                'section' => 'product_layout_section',
            )
        ) );

        // Whishlist
        $wp_customize->add_setting( 'wc_product_wishlist_icon',
            array(
                'default' => $this->defaults['wc_product_wishlist_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_wishlist_icon',
            array(
                'label' => __( 'Whishlist', 'docfi' ),
                'section' => 'product_layout_section',
            )
        ) );

        // Compare
        $wp_customize->add_setting( 'wc_product_compare_icon',
            array(
                'default' => $this->defaults['wc_product_compare_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_compare_icon',
            array(
                'label' => __( 'Compare', 'docfi' ),
                'section' => 'product_layout_section',
            )
        ) );

        /*Related product*/
        $wp_customize->add_setting( 'related_woo_product',
            array(
                'default' => $this->defaults['related_woo_product'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_woo_product',
            array(
                'label' => __( 'Related Product', 'docfi' ),
                'section' => 'product_layout_section',
            )
        ));

        $wp_customize->add_setting( 'related_product_title',
            array(
                'default' => $this->defaults['related_product_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_product_title',
            array(
                'label' => __( 'Related Product', 'docfi' ),
                'section' => 'product_layout_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_related_woo_enabled', 
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new DocfiTheme_Woo_Product_Settings();
}
