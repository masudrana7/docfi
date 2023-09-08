<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Info', 'docfi-core' );
		$this->rt_base = 'rt-contact-info';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
	        'list_type', [
	            'type'    	  => Controls_Manager::SELECT2,
				'label'   	  => esc_html__( 'List Type', 'docfi-core' ),
				'options' 	  => array(
					'default'    => esc_html__( 'Default List', 'docfi-core' ),
					'title_list' => esc_html__( 'Title List', 'docfi-core' ),
					'icon_list'  => esc_html__( 'Icon List', 'docfi-core' ),
				),
				'default' 	  => 'default',
				'description' => esc_html__( '2 list type available here. (default list is normal text list)', 'docfi-core' ),
	        ]
	    );
	    $repeater->add_control(
	        'list_title', [
	            'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => 'List title put here',
				'condition' => [
					'list_type' => 'title_list',
				],
	        ]
	    );
	    $repeater->add_control(
	        'list_icon', [
	            'type'    => Controls_Manager::ICONS,
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'default' => array(
			      'value' => 'fas fa-map-marker-alt',
			      'library' => 'fa-solid',
				),	
				'condition' => [
					'list_type' => 'icon_list',
				],
	        ]
	    );
	    $repeater->add_control(
	        'list_text', [
	            'type'    => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'List Text', 'docfi-core' ),
				'default' => 'Lists text put here',
	        ]
	    );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'item_title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Address', 'docfi-core' ),
			),

			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Icon', 'docfi-core' ),
			       'icon' => 'fa fa-smile',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Image', 'docfi-core' ),
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
			      'value' => 'fas fa-map-marker-alt',
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
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'rt_lists',
				'label'   => esc_html__( 'Add Image', 'docfi-core' ),
				'fields' => $repeater->get_controls(),				
				'default' => array(
					array( 'list_text' => 'Lists text put here' ),
					array( 'list_text' => 'Lists text put here' ),
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Box style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'box_style',
	            'label'   => esc_html__( 'Box Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .rt-item' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .rt-item:hover' => 'background-color: {{VALUE}}',
				),
			),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-contact-info .rt-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-contact-info .rt-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'content_style',
	            'label'   => esc_html__( 'Content Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-contact-info .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .rt-item .entry-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'title_spacing',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Title Spacing', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-contact-info .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-contact-info .contact-list',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'label_color',
				'label'   => esc_html__( 'Label Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .contact-list span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .contact-list' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-contact-info .contact-list a' => 'color: {{VALUE}}',
				),
			),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_list_typo',
				'label'   => esc_html__( 'Icon Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-contact-info .contact-list li i',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_list_color',
				'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .contact-list li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_list_spacing',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Spacing', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-contact-info .contact-list li i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-contact-info .contact-list li svg' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Icon style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'icon_style',
	            'label'   => esc_html__( 'Icon Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_typo',
				'label'   => esc_html__( 'Icon Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-contact-info .rt-item-icon i',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .rt-item-icon i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info:hover .rt-item-icon i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Icon BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info .rt-item-icon' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_hover_color',
				'label'   => esc_html__( 'Icon BG Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-contact-info:hover .rt-item-icon' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_spacing',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Spacing', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-contact-info .rt-item' => 'column-gap: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'id'      => 'icon_width',
				'label' => esc_html__( 'Icon Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-contact-info .rt-item-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'id'      => 'icon_height',
				'label' => esc_html__( 'Icon Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-contact-info .rt-item-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'id'      => 'icon_line_height',
				'label' => esc_html__( 'Icon Line Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-contact-info .rt-item-icon' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'icon_radius',
	            'label'   => __( 'Icon Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-contact-info .rt-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	            'separator' => 'before',
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

		$template = 'rt-contact-info';

		return $this->rt_template( $template, $data );
	}
}