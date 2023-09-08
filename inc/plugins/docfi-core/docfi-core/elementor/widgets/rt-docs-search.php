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
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit;
class RT_Docs_Search extends Custom_Widget_Base {
	
    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'RT Search Ajax', 'docfi-core' );
        $this->rt_base  = 'rt-docs-search';
        parent::__construct( $data, $args );
    }
    public function rt_fields(){
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'searches_word', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Searches Word', 'docfi-core' ),
				'default' => esc_html__( 'WordPress' , 'docfi-core' ),
				'label_block' => true,
			)
		);
		$fields = array(
			array(
				'mode'  => 'section_start',
				'id'    => 'section_general',
				'label' => __( 'General', 'docfi-core' )
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'popular_text',
				'label'   => esc_html__( 'Popular Text', 'docfi-core' ),
				'default' => 'Popular:',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'word_repeat',
				'label'   => esc_html__( 'Words', 'docfi-core' ),
				'title_field' => '{{{ searches_word }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'January', ],
				),
			),
			array(
				'mode'  => 'section_end'
			),
			/*style*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Style', 'docfi-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-searchbox-container .current',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => __( 'Category Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-searchbox-container .current' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo_drop',
				'label'   => esc_html__( 'Dropdown Category Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-searchbox-container .list li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color_drop',
				'label'   => __( 'Dropdown Category Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-searchbox-container .list li' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .searchbox-submit .rt-searchbox-btn',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => __( 'Button Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => __( 'Button BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey',
				'label'   => __( 'Search Key Title Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-hero-section-content-wrapper .search-text span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey_text',
				'label'   => __( 'Search Key Text Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-search-key li:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-key li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey_text_hover',
				'label'   => __( 'Search Key Text Hover Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-search-key li:hover:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-key li a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'      => 'item_boxshadow',
				'label'   => esc_html__( 'Box Shadow', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-searchbox-container'

			),
			
			array(
				'mode'  => 'section_end'
			),
		);
		return $fields;
       
    }
	protected function render() {
		$data = $this->get_settings();
		$template = 'rt-docs-search';
		return $this->rt_template( $template, $data );
	}

}
