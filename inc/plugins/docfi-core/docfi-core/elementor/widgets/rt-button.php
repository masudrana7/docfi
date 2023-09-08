<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Button', 'docfi-core' );
		$this->rt_base = 'rt-button';
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'docfi-core' ),
					'style-2' => esc_html__( 'Style 2', 'docfi-core' ),
					'style-3' => esc_html__( 'Style 3', 'docfi-core' ),
					'style-4' => esc_html__( 'Style 4', 'docfi-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'	  => 'responsive',
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
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'docfi-core' ),
				'default' 	  => esc_html__( 'Contact Us', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'docfi-core' ),
				'placeholder' => 'https://your-link.com',
			),
			/*icon*/
			array(	
				'id'      => 'selected_icon',
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-plus',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
			),
			array(
				'mode' => 'section_end',
			),

			// Button style 1
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style-1' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_normal_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .button-link' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_color',
				'label'   => esc_html__( 'Hover Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1::before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_color',
				'label'   => esc_html__( 'Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_hover_color',
				'label'   => esc_html__( 'Border Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1:hover' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),

			// Button style 2
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style2',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style-2' ) ),
			),	
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo2',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag2_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-2' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag2_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-2::before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-2' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-2:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin2',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Margin', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding2',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius2',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'mode' => 'section_end',
			),

			// Button style 3
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style3',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style-3' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo3',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text3_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-3' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text3_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-3:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag3_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-3' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag3_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-3::before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin3',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Margin', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding3',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius3',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'mode' => 'section_end',
			),

			// Button style 4
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style4',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style-4' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo4',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text4_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-4' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text4_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-4:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag4_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-4' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag4_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-4::before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin4',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Margin', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding4',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius4',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-style-4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'mode' => 'section_end',
			),

			// Icon style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'id'      => 'icon_align',
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle' => false,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_typo',
				'label'   => esc_html__( 'Icon Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .icon',
			),			
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link .icon svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .rt-button .button-link .icon' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_active_color',
				'label'   => esc_html__( 'Hover  Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link:hover .icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .button-link:hover .icon svg' => 'fill: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'line_color',
				'label'   => esc_html__( 'Line  Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .icon i' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'id'      => 'icon_space',
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-text-left' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-button .button-text-right' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),

			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'docfi-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'docfi-core' ),
					'hide'        => esc_html__( 'Off', 'docfi-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'docfi-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'docfi-core' ),
					'bounce' => esc_html__( 'bounce', 'docfi-core' ),
					'flash' => esc_html__( 'flash', 'docfi-core' ),
					'pulse' => esc_html__( 'pulse', 'docfi-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'docfi-core' ),
					'shakeX' => esc_html__( 'shakeX', 'docfi-core' ),
					'shakeY' => esc_html__( 'shakeY', 'docfi-core' ),
					'headShake' => esc_html__( 'headShake', 'docfi-core' ),
					'swing' => esc_html__( 'swing', 'docfi-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'docfi-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'docfi-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'docfi-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'docfi-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'docfi-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'docfi-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'docfi-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'docfi-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'docfi-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'docfi-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'docfi-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'docfi-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'docfi-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'docfi-core' ), 
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'docfi-core' ),
				'default' => '0.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'docfi-core' ),
				'default' => '1.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),	
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$template = 'rt-button';
		return $this->rt_template( $template, $data );
	}
}