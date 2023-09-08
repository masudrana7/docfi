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

class Docs_Featured_Post extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ){
        $this->rt_name = esc_html__( 'RT Docs Featured Post', 'docfi-core' );
        $this->rt_base = 'rt-docs-tabs';
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

    private function rt_load_scripts(){
        wp_enqueue_script( 'isotope-pkgd' );
    }

    public function rt_fields(){
        
        $terms  = get_terms( array( 'taxonomy' => 'docfi_docs_category', 'fields' => 'id=>name' ) );
        $category_dropdown = array( '0' => __( 'Please Selecet category', 'docfi-core' ) );

        foreach ( $terms as $id => $name ) {
            $category_dropdown[$id] = $name;
        }
        
        $fields = array(
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general',
                'label'   => esc_html__( 'General', 'docfi-core' ),
            ),
            
            /*category select( box Multi )*/
            array (
                'type'    => Controls_Manager::REPEATER,
                'id'      => 'category_list',
                'label'   => esc_html__( 'Add as many Categories as you want', 'docfi-core' ),
                'fields'  => array(
                    array(
                        'type'    => Controls_Manager::SELECT2,
                        'name'    => 'cat_multi_box',
                        'label'   => esc_html__( 'Categories', 'docfi-core' ),
                        'options' => $category_dropdown,
                        'multiple'=> false,
                        'default' => '1',
                    ),
                ),
            ),  

            array (
                'type'    => Controls_Manager::TEXT,
                'id'      => 'cat_text',
                'label'   => esc_html__( 'Category Title', 'docfi-core' ),
                'default' => esc_html__( 'Featured Products New', 'docfi-core' ),
            ),

            /*Post Order*/
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'post_ordering',
                'label'   => esc_html__( 'Post Ordering', 'docfi-core' ),
                'options' => array(
                    'DESC'  => esc_html__( 'Desecending', 'docfi-core' ),
                    'ASC'   => esc_html__( 'Ascending', 'docfi-core' ),
                ),
                'default' => 'DESC',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'orderby',
                'label'   => esc_html__( 'Post Sorting', 'docfi-core' ),                
                'options' => array(
                    'recent'        => esc_html__( 'Recent Post', 'docfi-core' ),
                    'rand'          => esc_html__( 'Random Post', 'docfi-core' ),
                    'menu_order'    => esc_html__( 'Custom Order', 'docfi-core' ),
                    'title'         => esc_html__( 'By Name', 'docfi-core' ),
                ),
                'default' => 'recent',
            ),          
            array(
                'type'    => Controls_Manager::REPEATER,
                'id'      => 'posts_not_in',
                'label'   => esc_html__( 'Enter Post ID that will not display', 'docfi-core' ),
                'fields'  => array(
                    array(
                        'type'    => Controls_Manager::NUMBER,
                        'name'    => 'post_not_in',
                        'label'   => esc_html__( 'Post ID', 'docfi-core' ),
                        'default' => '0',
                    ),
                ),
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'itemnumber',
                'label'   => esc_html__( 'Item Number', 'docfi-core' ),
                'default' => -1,
                'description' => esc_html__( 'Use -1 for showing all items( Showing items per Group )', 'docfi-core' ),
            ),
            array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'consulty-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'consulty-core' ),
			),
            array(
                'mode' => 'section_end',
            ),


            // Box Style
			array(
				'mode'    => 'section_start',
				'id'      => 'style_area',
				'label'   => esc_html__( 'Logo Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo2',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .logo-card .logo .text',
			),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__( 'Title Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .logo-card .logo .text' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_color',
                'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .nav .nav-link .logo-card-btn svg' => 'fill: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_active_color',
                'label'   => esc_html__( 'Icon Active Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .nav .nav-link.active .logo-card-btn svg' => 'fill: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_bg_color',
                'label'   => esc_html__( 'Item Background Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'background: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_bg_hover_color',
                'label'   => esc_html__( 'Item Hover Background Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link:hover' => 'background: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_border_color',
                'label'   => esc_html__( 'Item Border Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'item_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
                'mode' => 'section_end',
            ),

            // Content Style
			array(
				'mode'    => 'section_start',
				'id'      => 'content_style_area',
				'label'   => esc_html__( 'Content Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'box_title_typ',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-card .card-title a',
			),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_title_color',
                'label'   => esc_html__( 'Title Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .rt-card .card-title a' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_bg_color',
                'label'   => esc_html__( 'Item Background Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-documentation-info-wrapper' => 'background: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_border_color',
                'label'   => esc_html__( 'Item Border Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-documentation-info-wrapper' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'box_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .best-online-documentation-section .best-documentation-info-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
                'mode' => 'section_end',
            ),
            
        );
        return $fields;
    }

    protected function render() {
		$data = $this->get_settings();
		$template = 'docs-featured-tab';
		return $this->rt_template( $template, $data );
	}
}