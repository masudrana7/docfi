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
use Elementor\Group_Control_Box_Shadow;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Forum_Status extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Forum Status', 'docfi-core' );
		$this->rt_base = 'rt-forum-status';
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
				'type'        => Controls_Manager::ICONS,
				'id'        => 'icon',
				'label'       => esc_html__( 'Icon', 'medimall-core' ),
				'description' => esc_html__( 'Select icon', 'medimall-core' ),
				'default'     => [
					'value'   => 'fas  fa-angle-right icon',
					'library' => 'fa-solid',
				],
			),	
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Forum Stats', 'docfi-core' ),
			),

			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
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
				'mode' => 'section_end',
			),			
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_box',
				'label'   => esc_html__( 'Box Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Box Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-forum-status' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                       
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Box Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-forum-status' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                       
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),

			/*Title Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-forum-status .title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status .title' => 'color: {{VALUE}}',
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
						'min' => 0,
						'max' => 100,
					),
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-forum-status .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			
			// Content style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_text_title',
				'label'   => esc_html__( 'Content Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-forum-status .para-text',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'conent_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status .para-text' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),			
			// Icon style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon',
				'label'   => esc_html__( 'Icon Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status i' => 'font-size: {{VALUE}}px',
				),
			),
			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Icon BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status i' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-forum-status svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-forum-status i' => 'color: {{VALUE}}',
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
		$template = 'rt-forum-status';
		return $this->rt_template( $template, $data );
	}
}