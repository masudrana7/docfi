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

class RT_Table extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Table', 'docfi-core' );
		$this->rt_base = 'rt-table';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'serial_id', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Serial ID: 1', 'docfi-core' ),
				'default' => esc_html__( '1' , 'docfi-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'reading_number1', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Reading Number 1', 'docfi-core' ),
				'default' => esc_html__( '475' , 'docfi-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'reading_number2', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Reading Number 2', 'docfi-core' ),
				'default' => esc_html__( '854' , 'docfi-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'reading_number3', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Reading Number 3', 'docfi-core' ),
				'default' => esc_html__( '1457' , 'docfi-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'reading_number4', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Reading Number 4', 'docfi-core' ),
				'default' => esc_html__( '985' , 'docfi-core' ),
				'label_block' => true,
            )
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'RT Table', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'thead_id',
				'label'   => esc_html__( 'ID', 'docfi-core' ),
				'default' => esc_html__( 'ID', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'reading_1',
				'label'   => esc_html__( 'Reading #1', 'docfi-core' ),
				'default' => esc_html__( 'Reading #1', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'reading_2',
				'label'   => esc_html__( 'Reading #2', 'docfi-core' ),
				'default' => esc_html__( 'Reading #2', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'reading_3',
				'label'   => esc_html__( 'Reading #3', 'docfi-core' ),
				'default' => esc_html__( 'Reading #3', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'reading_4',
				'label'   => esc_html__( 'Reading #4', 'docfi-core' ),
				'default' => esc_html__( 'Reading #4', 'docfi-core' ),
			),

			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'table_repeat',
				'label'   => esc_html__( 'Address', 'docfi-core' ),
				'title_field' => '{{{ serial_id }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => '01', ],
					['title' => '02', ],
				),
			),

			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'docfi-core' ),
				'default' => 'Welcome To Docfi',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title_content',
				'label'   => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'Estimated reading:', 'docfi-core' ),
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'heading_size',
				'label'   => esc_html__( 'HTML Tag', 'docfi-core' ),
				'options' => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				),
				'default' => 'h3',
			),
			array(
				'mode' => 'section_end',
			),

			/*Table Head section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_thead_style',
	            'label'   => esc_html__( 'Table Head', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Text Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-table-area th',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-table-area th' => 'color: {{VALUE}}',
				),
			),								
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bg',
				'label'   => esc_html__( 'Text Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-table-area thead' => 'background: {{VALUE}}',
				),
			),								
	        array(
				'mode' => 'section_end',
			),
			/*Table Body section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_tbody_style',
	            'label'   => esc_html__( 'Table Body', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'ttext_typo',
				'label'   => esc_html__( 'Text Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-table-area td',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ttext_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-table-area tbody .para-text' => 'color: {{VALUE}}',
				),
			),								
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ttext_bg',
				'label'   => esc_html__( 'Text Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-table-area .table-hover>tbody>tr' => 'background: {{VALUE}}',
				),
			),								
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ttext_bg_hover',
				'label'   => esc_html__( 'Text Hover Background', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-table-area .table-hover>tbody>tr:hover>*' => 'background: {{VALUE}}',
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
		$template = 'rt-table';
		return $this->rt_template( $template, $data );
	}
}