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

class RT_Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'docfi-core' );
		$this->rt_base = 'rt-counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-counter-box .rt-item' => 'text-align: {{VALUE}};',
				),
			),

			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'default' => array(
					'value' => 'fas fa-award',
					'library' => 'fa-solid',
				),
				'condition'   => array( 'showhide' =>'yes' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Experiences', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'docfi-core' ),
				'default' => 25,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'after_text',
				'label'   => esc_html__( 'Counter Unit', 'docfi-core' ),
				'default' => esc_html__( '+', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'docfi-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'docfi-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'docfi-core' ),
			),

			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'item_angle',
				'label'       => esc_html__( 'Item Angle', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'mode' => 'section_end',
			),
			// Box Style
			array(
				'mode'    => 'section_start',
				'id'      => 'bg_style',
				'label'   => esc_html__( 'Box background', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'bg_showhide',
				'label'   => esc_html__( 'Box Background Color', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'box_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Box Height', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box' => 'height: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg',
				'label'   => esc_html__( 'Box Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'bg_showhide' =>'yes' ),
			),	
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),
			// Title Style
			array(
				'mode'    => 'section_start',
				'id'      => 'title_style',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-counter-box .rt-item .rt-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Counter Style
			array(
				'mode'    => 'section_start',
				'id'      => 'counter_style',
				'label'   => esc_html__( 'Counter', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'counter_typo',
				'label'   => esc_html__( 'Counter Style', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-counter-box .rt-item .counter-number',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .counter-number' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'counter_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Counter Space', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-counter-box .rt-item .counter-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Icon Style
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media i' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Font Size', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media i' => 'font-size: {{VALUE}}px',
				),
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
		$this->rt_load_scripts();
		$template = 'rt-counter-1';
		return $this->rt_template( $template, $data );
	}

}