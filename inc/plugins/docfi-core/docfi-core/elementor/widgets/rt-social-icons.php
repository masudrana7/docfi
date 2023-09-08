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

class RT_Social_Icons extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Social Icons', 'docfi-core' );
		$this->rt_base = 'rt-social-icons';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater(); 


		$repeater->add_control(
			'social_icon',
			[
				'label' => esc_html__( 'Icon', 'docfi-core' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'default' => [
					'value' => 'fab fa-wordpress',
					'library' => 'fa-brands',
				],
			]
		);
		
		$repeater->add_control(
			'link', [
				'type'  => Controls_Manager::URL,
				'label' => esc_html__( 'URL(optional)', 'docfi-core' ),
				'label_block' => true,
				'placeholder' => esc_html__( 'https://your-link.com', 'docfi-core' ),
			]
		);
		$repeater->add_control(
			'title', array(
				'type' => Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Social' , 'docfi-core' ),
				'label_block' => true,
            )
		);
		$repeater->add_control(
			'icon_color', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default'  => '',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon_bg', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Icon BG Color', 'techkit-core' ),
				'default'  => '',
				'label_block' => true,
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Social Icons', 'docfi-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'social_label',
				'label'   => esc_html__( 'Social Label', 'docfi-core' ),
				'default' => esc_html__( 'Share', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'social_icon_list',
				'label'   => esc_html__( 'Social Icons', 'docfi-core' ),
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					[
						'title' => 'Facebook',
						'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
					],
					[
						'title' => 'Twitter',
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
					],
					[
						'title' => 'Pinterest',
						'social_icon' => [
							'value' => 'fab fa-pinterest',
							'library' => 'fa-brands',
						],
					],
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

		$template = 'rt-social-icons';
		
		return $this->rt_template( $template, $data );
	}
}