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

class RT_Forum_List extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Forum List', 'docfi-core' );
		$this->rt_base = 'rt-forum-list';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$fields = array(
			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'PerView Options', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'docfi-core' ),
				'default' => 10,
				'description' => esc_html__( 'Write -1 to show all', 'docfi-core' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Global style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'global_style',
	            'label'   => esc_html__( 'Item Typo', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),

			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'item_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-card--style-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),

			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'item_border',				
				'label'   => esc_html__( 'Item Border Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'hover_item_border',				
				'label'   => esc_html__( 'Item Hover Border Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4:hover' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title & Topics Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-card--style-4 .card-title a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'title_color',				
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'title_hover_color',				
				'label'   => esc_html__( 'Title Hover Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-title a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Title Margin', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-card--style-4 .card-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'topics_count',				
				'label'   => esc_html__( 'Topics Count Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-info' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Icon style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_icon_style',
	            'label'   => esc_html__( 'Icon Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_color',				
				'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-btn fill' => 'svg: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_bg_color',				
				'label'   => esc_html__( 'Icon BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-btn' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_border_color',				
				'label'   => esc_html__( 'Border Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card .card-btn' => 'border-color: {{VALUE}}',
				),
			),
			
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_hover_color',				
				'label'   => esc_html__( 'Icon Hover Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-btn:hover svg' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_hover_bg_color',				
				'label'   => esc_html__( 'Icon Hover BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card--style-4 .card-btn:hover' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'icon_hover_border_color',				
				'label'   => esc_html__( 'Hover Border Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-card .card-btn:hover' => 'border-color: {{VALUE}}',
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
		$template = 'rt-forum-list';
		return $this->rt_template( $template, $data );
	}
}