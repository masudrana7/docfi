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

class RT_Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Info Box', 'docfi-core' );
		$this->rt_base = 'rt-info-box';
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
				'label'   => esc_html__( 'Style', 'docfi-core' ),
				'options' => array(
					'style1' => esc_html__( 'Info Style 1', 'docfi-core' ),
					'style2' => esc_html__( 'Info Style 2', 'docfi-core' ),
					'style3' => esc_html__( 'Info Style 3', 'docfi-core' ),
					'style4' => esc_html__( 'Info Style 4', 'docfi-core' ),
					'style5' => esc_html__( 'Info Style 5', 'docfi-core' ),
				),
				'default' => 'style1',
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
					'{{WRAPPER}} .rt-card, {{WRAPPER}} .rt-info-box' => 'text-align: {{VALUE}};',
				),
			),
			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Left', 'docfi-core' ),
			       'icon' => 'fa fa-smile',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Center', 'docfi-core' ),
			       'icon' => 'fa fa-image',
			     ),		     
			   ),
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'docfi-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
				),	
			  	'condition'   => array('icontype' => array( 'icon' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'docfi-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'docfi-core' ),
				'condition'   => array('icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'docfi-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ) ),
			),			
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Web Development', 'docfi-core' ),
			),
			
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'psum is simply dummy text the pritypesetting industry Lorem Ipsum has been the industry’s standard many more.', 'docfi-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'docfi-core' ),
				'default' => esc_html__( 'Explore Topics', 'docfi-core' ),
			),

			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'buttonurl',
				'label' => esc_html__( 'Button Link', 'docfi-core' ),
				'placeholder' => 'https://your-link.com',
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
					'{{WRAPPER}} .rt-card' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-info-box' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	                '{{WRAPPER}} .rt-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
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
	                '{{WRAPPER}} .rt-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	                '{{WRAPPER}} .rt-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'      => 'item_boxshadow',
				'label'   => esc_html__( 'Box Shadow', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-card, {{WRAPPER}} .rt-info-box'

			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'      => 'item_hover_boxshadow',
				'label'   => esc_html__( ' Hover Box Shadow', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-card:hover, {{WRAPPER}} .rt-info-box:hover'

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
				'selector' => '{{WRAPPER}} .rt-title, {{WRAPPER}} .card-title a, {{WRAPPER}} .card-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-title, {{WRAPPER}} .card-title a, {{WRAPPER}} .card-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_hover_color',
				'label'   => esc_html__( 'Title Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .card-title:hover a, {{WRAPPER}} .card-title:hover' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
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
					'{{WRAPPER}} .rt-title, {{WRAPPER}} .card-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .card-info',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'conent_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .card-info' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'content_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Content Space', 'docfi-core' ),
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
					'{{WRAPPER}} .card-info' => 'margin-top: {{SIZE}}{{UNIT}};',
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
				'condition'   => array( 'style' => array( 'style1', 'style5' ) ),
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-icon i' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array('icontype' => array( 'icon' ) ),
			),
			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Icon BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-card .icon' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array('icontype' => array( 'icon' ) ),
			),	
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_width',
				'label'   => esc_html__( 'Icon Box Width', 'docfi-core' ),
				'range' => [
					'px' => [
						'max' => 1500,
						'min' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-card--style-1 .icon' => 'max-width: {{SIZE}}px',
				],
				
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_height',
				'label'   => esc_html__( 'Icon Box Height', 'docfi-core' ),
				'range' => [
					'px' => [
						'max' => 1500,
						'min' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-card--style-1 .icon' => 'height: {{SIZE}}px',
				],
				
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'line_height',
				'label'   => esc_html__( 'Line Box Height', 'docfi-core' ),
				'range' => [
					'px' => [
						'max' => 1500,
						'min' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-card--style-1 .icon' => 'line-height: {{SIZE}}px',
				],
				
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_img_width',
				'label'   => esc_html__( 'SVG & Image icon Width', 'docfi-core' ),
				'range' => [
					'px' => [
						'max' => 1500,
						'min' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-card--style-1 .icon svg' => 'width: {{SIZE}}px',
					'{{WRAPPER}} .rt-card--style-1 .icon img' => 'width: {{SIZE}}px',
				],
				
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Space', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-card--style-1 .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_icon',
				'label'   => esc_html__( 'Button Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),	
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'btn_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-button .text-link, {{WRAPPER}} .card-btn',
			),		
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'btn_padding',
	            'label'   => __( 'Button Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-button .text-link, {{WRAPPER}} .card-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	            'separator' => 'before',
	        ),

			// Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_1',
				'label' => esc_html__( 'Normal', 'docfi-core' ),
			),
			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Button Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link, {{WRAPPER}} .card-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn2_bg_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link, {{WRAPPER}} .card-btn' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn2_bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .card-btn:hover:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__( 'Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link, {{WRAPPER}} .card-btn' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_2',
				'label' => esc_html__( 'Hover', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Button Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link:hover, {{WRAPPER}} .card-btn:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link:hover, {{WRAPPER}} .card-btn:hover' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_hover_color',
				'label'   => esc_html__( 'Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .text-link:hover, {{WRAPPER}} .card-btn:hover' => 'border-color: {{VALUE}}',
				),
			),
		
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
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

		switch ( $data['style'] ) {
			case 'style5':
			$template = 'rt-info-box-5';
			break;
			case 'style4':
			$template = 'rt-info-box-4';
			break;
			case 'style3':
			$template = 'rt-info-box-3';
			break;
			case 'style2':
			$template = 'rt-info-box-2';
			break;
			default:
			$template = 'rt-info-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}