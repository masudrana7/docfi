<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Docs Title', 'docfi-core' );
		$this->rt_base = 'rt-docs-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Docs Title', 'docfi-core' ),
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'docfi-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => 'Welcome To Docfi',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title_content',
				'label'   => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'Estimated reading:', 'docfi-core' ),
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'heading_size',
				'label'   => esc_html__( 'HTML Tag', 'docfi-core' ),
				'options' => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				),
				'default' => 'h3',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'minutes_display',
				'label'       => esc_html__( 'Public Minutes Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Public Minutes. Default: On', 'docfi-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'views_display',
				'label'       => esc_html__( 'views Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Views. Default: On', 'docfi-core' ),
			),
			array(
				'mode' => 'section_end',
			),

			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-docs-title .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-title .entry-title' => 'color: {{VALUE}}',
				),
			),								
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'title_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Title Space', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-docs-title .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			/*sub title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_subtitle_style',
	            'label'   => esc_html__( 'Content', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-docs-title .sub-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-title .sub-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'sub_title_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Content Space', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-docs-title .sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			/*Cotent highlight Sytyle*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_highlight_style',
	            'label'   => esc_html__( 'Text High-Light', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'highlight_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-docs-title .sub-title span',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'highlight_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-title .sub-title span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'highlight_color_bg',
				'label'   => esc_html__( 'Content Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-title .sub-title span' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'highlight_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-docs-title .sub-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'highlight_radius2',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-docs-title .sub-title span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
	        array(
				'mode' => 'section_end',
			),

		);
		return $fields;
	}
	protected function render() {
		$data = $this->get_settings();
		$template = 'title-1';
		return $this->rt_template( $template, $data );
	}
}