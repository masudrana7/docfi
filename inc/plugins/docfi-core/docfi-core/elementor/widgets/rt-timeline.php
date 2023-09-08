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

class RT_TimeLine extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Timeline', 'docfi-core' );
		$this->rt_base = 'rt-timeline';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'timeline_month', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Timeline Month', 'docfi-core' ),
				'default' => esc_html__( 'January' , 'docfi-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'timeline_text', array(
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Content', 'docfi-core' ),
				'show_label' => false,
            )
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Docs Title', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'timeline_repeat',
				'label'   => esc_html__( 'Address', 'docfi-core' ),
				'title_field' => '{{{ timeline_month }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'January', ],
				),
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
				'selector' => '{{WRAPPER}} .rt-timeline .content-container .content h3',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-timeline .content-container .content h3' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .rt-timeline .content-container .content h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			/*sub title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_subtitle_style',
	            'label'   => esc_html__( 'Content Title', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Content Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-timeline .content-container .content li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Content Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-timeline .content-container .content li' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .rt-timeline .content-container .content li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
		$template = 'rt-timeline';
		return $this->rt_template( $template, $data );
	}
}