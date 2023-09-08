<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Docfi_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Testimonials extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){

		$this->rt_name = esc_html__( 'RT Testimonials', 'docfi-core' );
		$this->rt_base = 'rt-testimonials';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'docfi-core' ),
				'6'  => esc_html__( '2 Col', 'docfi-core' ),
				'4'  => esc_html__( '3 Col', 'docfi-core' ),
				'3'  => esc_html__( '4 Col', 'docfi-core' ),
				'2'  => esc_html__( '6 Col', 'docfi-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'image',[
                'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Author', 'docfi-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'description' => esc_html__( 'Image size should be 90x90px', 'docfi-core' ),
            ]
        );
		$repeater->add_control(
            'title',[
                'type' => Controls_Manager::TEXT,
                'label'   => esc_html__( 'Title', 'docfi-core' ),
            ]
        );
		$repeater->add_control(
            'designation',[
                'type' => Controls_Manager::TEXT,
                'label'   => esc_html__( 'Designation', 'docfi-core' ),
            ]
        );
		$repeater->add_control(
            'content',[
                'type' => Controls_Manager::WYSIWYG,
                'label'   => esc_html__( 'Testimonials Content', 'docfi-core' ),
            ]
        );
		$repeater->add_control(
			'item_color', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Item Bg Color', 'techkit-core' ),
				'default'  => '',
				'label_block' => true,
			]
		);

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),

			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'docfi-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Slider Layout 1', 'docfi-core' ),
					'layout2' => esc_html__( 'Slider Layout 2', 'docfi-core' ),
				),
				'default' => 'layout1',
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
					'{{WRAPPER}} .rt-testimonial-default .item-content' => 'text-align: {{VALUE}};',
				),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'selected_icon',
				'label'   => esc_html__( 'Icon', 'docfi-core' ),
				'separator' => 'before',
				'default' => array(
					'value' => 'fas fa-quote-right',
					'library' => 'fa-solid',
				),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'testimonials',
				'label'   => esc_html__( 'Add as many testimonials as you want', 'docfi-core' ),
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array('title' => 'Mr. Karime Jackerty', 'designation' => 'CEO, Marketing', 'content' => '“ When an unknown printer took a galley of type and scrambled make a type specimen book It has survived not only five centuries, but the leap into electronic remaining essentially unchanged “'),
					array('title' => 'Lisa K. Berg', 'designation' => 'CEO, Marketing', 'content' => '“ When an unknown printer took a galley of type and scrambled make a type specimen book It has survived not only five centuries, but the leap into electronic remaining essentially unchanged “'),
					array('title' => 'Richard A. Whalen', 'designation' => 'CEO, Marketing', 'content' => '“ When an unknown printer took a galley of type and scrambled make a type specimen book It has survived not only five centuries, but the leap into electronic remaining essentially unchanged “'),
					array('title' => 'Neel Eonathon', 'designation' => 'CEO, Marketing', 'content' => '“ When an unknown printer took a galley of type and scrambled make a type specimen book It has survived not only five centuries, but the leap into electronic remaining essentially unchanged “' ),
				),
				'separator' => 'before',
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'item_padding',
	            'label'   => esc_html__( 'Item Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-testimonial-default .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),	        
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_gutter',
				'label'   => esc_html__( 'Item Gutter', 'docfi-core' ),
				'options' => array(
					'g-0' => esc_html__( 'Gutters 0', 'docfi-core' ),
					'g-1' => esc_html__( 'Gutters 1', 'docfi-core' ),
					'g-2' => esc_html__( 'Gutters 2', 'docfi-core' ),
					'g-3' => esc_html__( 'Gutters 3', 'docfi-core' ),
					'g-4' => esc_html__( 'Gutters 4', 'docfi-core' ),
					'g-5' => esc_html__( 'Gutters 5', 'docfi-core' ),
				),
				'default' => 'g-4',
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),

			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'quote_display',
				'label'       => esc_html__( 'Quote Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Quote. Default: On', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bag',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .testimonial-item--style-2' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-testimonial-default .item-content' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .testimonial-item--style-2, {{WRAPPER}} .rt-testimonial-default .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
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
	                '{{WRAPPER}} .testimonial-item--style-2, {{WRAPPER}} .rt-testimonial-default .item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'docfi-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} .rt-testimonial-default .rt-thumnail-area .item-img img',
			),
			array(
				'mode' => 'section_end',
			),
			// Title style
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
				'selector' => '{{WRAPPER}} .author-info .name, {{WRAPPER}} .rt-testimonial-default .item-content .item-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .author-info .name, {{WRAPPER}} .rt-testimonial-default .item-content .item-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .author-info .name, {{WRAPPER}} .rt-testimonial-default .item-content .item-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Sub Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'designation_style',
	            'label'   => esc_html__( 'Designation Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'designation_typo',
				'label'   => esc_html__( 'Designation Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .author-info .designation, {{WRAPPER}} .rt-testimonial-default .item-content .item-designation',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'designation_color',
				'label'   => esc_html__( 'Designation Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .author-info .designation, {{WRAPPER}} .rt-testimonial-default .item-content .item-designation' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'designation_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Designation Space', 'docfi-core' ),
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
					'{{WRAPPER}} .author-info .designation, {{WRAPPER}} .rt-testimonial-default .item-content .item-designation' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .testimonial-comment, {{WRAPPER}} .rt-testimonial-default .item-content .tcontent',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .testimonial-comment, {{WRAPPER}} .rt-testimonial-default .item-content .tcontent' => 'color: {{VALUE}}',
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
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .testimonial-comment, {{WRAPPER}} .rt-testimonial-default .item-content .tcontent' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Quote style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_quote_style',
	            'label'   => esc_html__( 'Quote Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'quote_typo',
				'label'   => esc_html__( 'Quote Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-testimonial-default .item-content .tquote',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'quote_color',
				'label'   => esc_html__( 'Quote Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content .tquote' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial-slider-layout2 .tquote' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'quote_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Quote Space', 'docfi-core' ),
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
					'{{WRAPPER}} .quotation-icon, {{WRAPPER}} .rt-testimonial-default .item-content .tquote' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Thumb style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_thumb_style',
	            'label'   => esc_html__( 'Thumb Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout2') ),
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'circle_color',
				'label'   => esc_html__( 'Circle Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .testimonial-img-area:before' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'circle_hover_color',
				'label'   => esc_html__( 'Circle Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .testimonial-img-area:hover:before' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'thumb_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Thumb Area', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
					'px' => array(
						'min' => 200,
						'max' => 1296,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .testimonial-img-area img, {{WRAPPER}} .rt-testimonial-default .rt-thumnail-area' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'thumb_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Thumb Space', 'docfi-core' ),
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
					'{{WRAPPER}} .testimonial-img-area img, {{WRAPPER}} .rt-testimonial-default .rt-thumnail-area' => 'margin-top: {{SIZE}}{{UNIT}};',
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
				'default' => 'wow',
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
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'docfi-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_perview',
				'label'       => esc_html__( 'Per View Options', 'docfi-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2') ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'docfi-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'docfi-core' ),
					'2' => esc_html__( '2', 'docfi-core' ),
					'3' => esc_html__( '3',  'docfi-core' ),
					'4' => esc_html__( '4',  'docfi-core' ),
					'5' => esc_html__( '5',  'docfi-core' ),
					'6' => esc_html__( '6',  'docfi-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'docfi-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'docfi-core' ),
					'2' => esc_html__( '2', 'docfi-core' ),
					'3' => esc_html__( '3',  'docfi-core' ),
					'4' => esc_html__( '4',  'docfi-core' ),
					'5' => esc_html__( '5',  'docfi-core' ),
					'6' => esc_html__( '6',  'docfi-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'docfi-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'docfi-core' ),
					'2' => esc_html__( '2', 'docfi-core' ),
					'3' => esc_html__( '3',  'docfi-core' ),
					'4' => esc_html__( '4',  'docfi-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'docfi-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'docfi-core' ),
					'2' => esc_html__( '2', 'docfi-core' ),
					'3' => esc_html__( '3',  'docfi-core' ),
					'4' => esc_html__( '4',  'docfi-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'docfi-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'docfi-core' ),
					'2' => esc_html__( '2', 'docfi-core' ),
					'3' => esc_html__( '3',  'docfi-core' ),
					'4' => esc_html__( '4',  'docfi-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'docfi-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2') ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'slides Per Group', 'docfi-core' ),
				'default' => array(
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'docfi-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__( 'Centered Slides', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: Off', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_space',
				'label'   => esc_html__( 'Slides Space', 'docfi-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'docfi-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'docfi-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'docfi-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'docfi-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'docfi-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			// Nav Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_nav_option',
				'label'   => esc_html__( 'Nav Option', 'docfi-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_position',
				'label'   => esc_html__( 'Nav Position', 'docfi-core' ),				
				'options' => array(
					'default' 		=> esc_html__( 'Default', 'docfi-core' ),
					'top-right' 	=> esc_html__( 'Top Right', 'docfi-core' ),
				),
				'default' => 'default',
				'condition'   => array( 'display_arrow' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'nav_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Nav Space', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .top-right .rt-swiper-slider .swiper-navigation' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ), 'nav_position' => array( 'top-right' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'prev_arrow',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Prev Arrow', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-slider .swiper-navigation .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'next_arrow',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Next Arrow', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-slider .swiper-navigation .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_buttet',
				'label'       => esc_html__( 'Pagination', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'docfi-core' ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_color',
				'label'   => esc_html__( 'Nav Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'color: {{VALUE}}',
				),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_hover_color',
				'label'   => esc_html__( 'Nav Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation div:hover svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div:hover' => 'color: {{VALUE}}',
				),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_bg_color',
				'label'   => esc_html__( 'Nav Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'background-color: {{VALUE}}',
				),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_bg_hover_color',
				'label'   => esc_html__( 'Nav Background Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'nav_width',
				'label'   => esc_html__( 'Nav Width', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'width: {{SIZE}}px;',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'nav_height',
				'label'   => esc_html__( 'Nav Height', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'width: {{SIZE}}px;',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'nav_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Nav Radius', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'after',
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'pag_bg_color',
				'label'   => esc_html__( 'Pagination BG Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
				),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'pag_bg_active_color',
				'label'   => esc_html__( 'Pagination BG Active Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'pagination_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Pagination Space', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 500,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination-bullets' => 'margin-top: {{SIZE}}{{UNIT}};',
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

		if($data['slider_autoplay']=='yes'){
			$data['slider_autoplay']=true;
		}
		else{
			$data['slider_autoplay']=false;
		}

		$swiper_data = array(
			'slidesPerView' 	=>2,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
			'auto'   =>$data['slider_autoplay']
		);
		
		switch ( $data['layout'] ) {
			case 'layout2':
			$data['swiper_data'] = json_encode( $swiper_data ); 
			$template = 'rt-testimonial-slider-2';
			break;

			case 'layout1':
			$data['swiper_data'] = json_encode( $swiper_data ); 
			$template = 'rt-testimonial-slider-1';
			break;

			default:
			$template = 'rt-testimonial-slider-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}

}