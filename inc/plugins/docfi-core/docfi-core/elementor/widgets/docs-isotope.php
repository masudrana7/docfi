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

class Docs_Isotope extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ){
        $this->rt_name = esc_html__( 'RT Docs Isotope', 'docfi-core' );
        $this->rt_base = 'rt-docs-isotope';
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
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'column_no_gutters',
                'label'   => esc_html__( 'Display column gap', 'docfi-core' ),
                'options' => array(
                    'show'        => esc_html__( 'Gap', 'docfi-core' ),
                    'hide'        => esc_html__( 'No Gap', 'docfi-core' ),
                ),
                'default' => 'show',
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'itemnumber',
                'label'   => esc_html__( 'Item Number', 'docfi-core' ),
                'default' => -1,
                'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'docfi-core' ),
            ),
        
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'all_button',
                'label'   => esc_html__( 'Show/Hide Category', 'docfi-core' ),
                'options' => array(
                    'show'        => esc_html__( 'Show', 'docfi-core' ),
                    'hide'        => esc_html__( 'Hide', 'docfi-core' ),
                ),
                'default' => 'show',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'more_button',
                'label'   => esc_html__( 'More Button', 'docfi-core' ),
                'options' => array(
                    'show'        => esc_html__( 'Show', 'docfi-core' ),
                    'hide'        => esc_html__( 'Hide', 'docfi-core' ),
                ),
                'default' => 'show',                
            ),
            array (
                'type'    => Controls_Manager::TEXT,
                'id'      => 'see_button_text',
                'label'   => esc_html__( 'View All Text', 'docfi-core' ),
                'condition'   => array( 'more_button' => array( 'show' ) ),
                'default' => esc_html__( 'View All', 'docfi-core' ),
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
                'id'      => 'col_lg',
                'label'   => esc_html__( 'Desktops: > 1199px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '4',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_md',
                'label'   => esc_html__( 'Desktops: > 991px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '4',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_sm',
                'label'   => esc_html__( 'Tablets: > 767px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_xs',
                'label'   => esc_html__( 'Phones: < 768px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '12',
            ),
            array(
                'mode' => 'section_end',
            ),
            // Box Style
			array(
				'mode'    => 'section_start',
				'id'      => 'style_area',
				'label'   => esc_html__( 'Post List Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo2',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .title-area .title a',
			),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__( 'Title Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .title-area .title a' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'articles_color',
                'label'   => esc_html__( 'Articles  Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .explore-topics-header .number-of-article' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'post_list_color',
                'label'   => esc_html__( 'Post List Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .explore-topics-list li a' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'post_list_hover_color',
                'label'   => esc_html__( 'Post List Hover Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .explore-topics-list li a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'list_icon_color',
                'label'   => esc_html__( 'Post Icon Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .explore-topics-body ul.explore-topics-list li svg path' => 'stroke: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_border_color',
                'label'   => esc_html__( 'Item Border Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .explore-topics-card' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'item_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .explore-topics-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$template = 'docs-isotope-1';
		return $this->rt_template( $template, $data );
	}
}