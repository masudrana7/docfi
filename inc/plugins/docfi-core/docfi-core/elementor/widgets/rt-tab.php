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

class RT_Tab extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Tab', 'docfi-core' );
		$this->rt_base = 'rt-tab';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Tab Title' , 'docfi-core' ),
				'label_block' => true,
            )
		);

		$repeater->add_control(
			'content', array(
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus error sittery voluptatem accusantium doloremque lauda awrntiu totam rem aperiam, eaque ipsa quaed ieawr nven tore veritatis et quasi architecto' , 'docfi-core' ),
				'label_block' => true,
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'docfi-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Tab Layout 1', 'docfi-core' ),
					'layout2' => esc_html__( 'Tab Layout 2', 'docfi-core' ),
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'tab_items',
				'label'   => esc_html__( 'Address', 'docfi-core' ),
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'Conclusions', ],
					['title' => 'Forum', ],
					['title' => 'Reporting', ],
				),
			),
			array(
				'mode' => 'section_end',
			),
			
			//Number  style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'number_style',
	            'label'   => esc_html__( 'Number Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'layout' => array( 'layout2' ) ),

	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'number_color',
				'label'   => esc_html__( 'Number Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-link span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'numbeer_bg',
				'label'   => esc_html__( 'Number Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-item .nav-link span' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'number_active_color',
				'label'   => esc_html__( 'Number Active Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-link.active span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'numbeer_active_bg',
				'label'   => esc_html__( 'Number Active Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-link.active span' => 'background: {{VALUE}}',
				),
			),

			array(
				'mode' => 'section_end',
			),
			
			// Section title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'section_title_style',
	            'label'   => esc_html__( 'Tab Button', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sec_title_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-tab-style .nav-item .nav-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sec_title_color',
				'label'   => esc_html__( 'Button Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-item .nav-link' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bg',
				'label'   => esc_html__( 'Button Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-item .nav-link' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_active_color',
				'label'   => esc_html__( 'Button Active Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-item .nav-link.active' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bg_active',
				'label'   => esc_html__( 'Button Active Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .nav-item .nav-link.active' => 'background: {{VALUE}}',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-tab-style .tab-content .tab-pane',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .tab-content .tab-pane' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_border_color',
				'label'   => esc_html__( 'Content Border Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-tab-style .tab-content' => 'border-color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	            'label'   => __( 'Content Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-tab-style .tab-content .tab-pane' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'rt-tab-2';
			break;
			default:
			$template = 'rt-tab-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}