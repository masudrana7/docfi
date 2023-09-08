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

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Post_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Grid', 'docfi-core' );
		$this->rt_base = 'rt-post-grid';
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
			'post_not_in', array(
				'type'    => Controls_Manager::NUMBER,
				'label'   => __( 'Post ID', 'docfi-core' ),
				'default' => '0',
			)
		);
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
					'style1' => esc_html__( 'Grid Layout 1', 'docfi-core' ),
					'style2' => esc_html__( 'Grid Layout 2', 'docfi-core' ),
				),
				'default' => 'style1',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'video_layout',
				'label'   => esc_html__( 'Play Button', 'docfi-core' ),				
				'options' => array(
					'play-btn-primary' 		=> esc_html__( 'Play Primary', 'docfi-core' ),
					'play-btn-white' 	 	=> esc_html__( 'Play White', 'docfi-core' ),
					'play-btn-white-lg' 	=> esc_html__( 'Play White-lg', 'docfi-core' ),
					'play-btn-transparent' 	=> esc_html__( 'Play transparent', 'docfi-core' ),
				),
				'default' => 'play-btn-white',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'read_more_layout',
				'label'   => esc_html__( 'Readmore Button', 'docfi-core' ),				
				'options' => array(
					'button-style-1' 	=> esc_html__( 'Button 01', 'docfi-core' ),
					'button-style-2' 	=> esc_html__( 'Button 02', 'docfi-core' ),
					'button-style-3' 	=> esc_html__( 'Button 03', 'docfi-core' ),
					'button-style-4' 	=> esc_html__( 'Button 04', 'docfi-core' ),
					'button-style-5' 	=> esc_html__( 'Button 05', 'docfi-core' ),
				),
				'default' => 'button-style-1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'grid_maso_layout',
				'label'   => esc_html__( 'Grid Layout', 'docfi-core' ),				
				'options' => array(
					'grid_layout' 		=> esc_html__( 'Default Layout', 'docfi-core' ),
					'masonry_layout' 	=> esc_html__( 'Masonry Layout', 'docfi-core' ),
				),
				'default' => 'grid_layout',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'docfi-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 12,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item', 'docfi-core' ),
				'condition'   => array( 'style!' => array( 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'itemspace',
				'label'   => esc_html__( 'Item Spacing', 'docfi-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'docfi-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'docfi-core' ),
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
			),
			array(
				'mode' => 'section_end',
			),
			/*query option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_query',
				'label'   => esc_html__( 'Query Settings', 'docfi-core' ),
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'docfi-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'docfi-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'docfi-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_orderby',
				'label'   => esc_html__( 'Post Sorting', 'docfi-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'docfi-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'docfi-core' ),
					'title' 		=> esc_html__( 'By Name', 'docfi-core' ),
				),
				'default' => 'recent',
			),
			/*Start category*/
			array(
				'id'      => 'query_type',
				'label' => esc_html__( 'Query type', 'docfi-core' ),
            	'type' => Controls_Manager::SELECT,
            	'default' => 'category',
            	'options' => array(
					'category'  => esc_html__( 'Category', 'docfi-core' ),
                	'posts' => esc_html__( 'Posts', 'docfi-core' ),
				),
			),
			array(
				'id'      => 'postid',
				'label' => esc_html__( 'Selects posts', 'docfi-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_all_posts('post'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'posts',
				),
			),
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'docfi-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'category',
				),
			),
			/*post offset*/
	        array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_of_post_offset',
				'label'   => __( 'Offset ( No of Posts )', 'docfi-core' ),
				'default' => '0',
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => __( 'Exclude Post by ID', 'docfi-core' ),
				'fields' => $repeater->get_controls(),
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
				'id'          => 'post_author',
				'label'       => esc_html__( 'Show Author', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__( 'Show Date', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__( 'Show Categories', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__( 'Show Comment', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__( 'Show Lenght', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__( 'Show View', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__( 'Show Video', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'docfi-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_radius',
	            'label'   => __( 'Box Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-grid-default .rt-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                 
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Box Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_border_color',
				'label'   => esc_html__( 'Box Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item' => 'border-color: {{VALUE}}',
				),
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
				'selector' => '{{WRAPPER}} .rt-post-grid-default .rt-item .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item .entry-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_hover_color',
				'label'   => esc_html__( 'Title Hover Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item .entry-title a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-grid-default .rt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
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
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'docfi-core' ),
				'default' => 20,
				'condition' => array( 'content_display' => array( 'yes' ) ),
				'description' => esc_html__( 'Maximum number of words', 'docfi-core' ),
			),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Style', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-post-grid-default .rt-item .post_excerpt p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item .post_excerpt' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	            'label'   => __( 'Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-item .entry-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Margin', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-grid-default .rt-item .post_excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Meta style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_meta_style',
	            'label'   => esc_html__( 'Meta Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-post-grid-default ul.entry-meta li a, {{WRAPPER}} .rt-post-grid-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-grid-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_icon',
				'label'   => esc_html__( 'Meta Icon Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-grid-default .rt-item .post-author a' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'docfi-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-grid-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Image style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-post-grid-default .rt-item .rt-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'docfi-core' ),
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
					'{{WRAPPER}} .rt-post-grid-default .rt-item .rt-image img' => 'height: {{SIZE}}{{UNIT}};',
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
				'label'   => esc_html__( 'Phones: < 768px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Small Phones: < 480px', 'docfi-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
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
			case 'style2':
			$template = 'rt-post-grid-2';
			break;
			default:
			$template = 'rt-post-grid-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}