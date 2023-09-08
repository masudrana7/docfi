<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Call_Action extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT CTA', 'docfi-core' );
		$this->rt_base = 'rt-call-action';
		parent::__construct( $data, $args );
	}	

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'You will love our solutions', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'desc',
				'label'   => esc_html__( 'Description Text', 'docfi-core' ),
				'default' => esc_html__( 'Take a look at our highly rated 20+ premium and free plugins.', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'cta_image',
				'label'   => esc_html__( 'Image', 'docfi-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'docfi-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'docfi-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'docfi-core' ),
				'default' 	  => esc_html__( 'Join the community', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'docfi-core' ),
				'placeholder' => 'https://your-link.com',
			),

			array(
				'mode' => 'section_end',
			),

			/* Style */
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_style',
	            'label'   => esc_html__( 'CTA Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Box BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper' => 'background: linear-gradient(59.5deg, transparent 10%, {{VALUE}} 10%)',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_bg',
				'label'   => esc_html__( 'Shape Background color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper::before' => 'background: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .join-community-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_margin',
	            'label'   => __( 'Box Margin', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .join-community-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),

			// Title Style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'title_style',
	            'label'   => esc_html__( 'Title & Description', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .join-community-text-content .title-area .title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-text-content .title-area .title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'desc_typo',
				'label'   => esc_html__( 'Description Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .join-community-text-content .title-area .para-text',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'desc_color',
				'label'   => esc_html__( 'Description Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-text-content .title-area .para-text' => 'color: {{VALUE}}',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			// Button Style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'btn_style',
	            'label'   => esc_html__( 'Button Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_color',
				'label'   => esc_html__( 'Button Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper .join-community-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_color',
				'label'   => esc_html__( 'Button Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper .join-community-btn:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__( 'Button Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper .join-community-btn' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_border_color',
				'label'   => esc_html__( 'Button Hover Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper .join-community-btn:hover' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_bg_color',
				'label'   => esc_html__( 'Button Hover BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .join-community-wrapper .join-community-btn:hover:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-cta';

		return $this->rt_template( $template, $data );
	}
}