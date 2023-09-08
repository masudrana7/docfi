<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class Content_Toggle extends Custom_Widget_Base {
  public function __construct( $data = [], $args = null ){
    $this->rt_name = esc_html__( 'Content toggle', 'docfi-core' );
    $this->rt_base = 'rt-content-toggle';
    parent::__construct( $data, $args );
  }
  public function get_post_template( $type = 'page' ) {
    $posts = get_posts(
      array(
        'post_type'      => 'elementor_library',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => '-1',
        'tax_query'      => array(
          array(
            'taxonomy' => 'elementor_library_type',
            'field'    => 'slug',
            'terms'    => $type,
          ),
        ),
      )
    );
    $templates = array();
    foreach ( $posts as $post ) {
      $templates[] = array(
        'id'   => $post->ID,
        'name' => $post->post_title,
      );
    }

    return $templates;
  }
  public function get_saved_data( $type = 'section' ) {
    $saved_widgets = $this->get_post_template( $type );
    $options[-1]   = __( 'Select', 'docfi-core' );
    if ( count( $saved_widgets ) ) {
      foreach ( $saved_widgets as $saved_row ) {
        $options[ $saved_row['id'] ] = $saved_row['name'];
      }
    } else {
      $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'docfi-core' );
    }
    return $options;
  }
  public function get_content_type() {
    $content_type = array(
      'content'              => __( 'Content', 'docfi-core' ),
      'saved_rows'           => __( 'Saved Section', 'docfi-core' ),
      'saved_page_templates' => __( 'Saved Page', 'docfi-core' ),
    );
    return $content_type;
  }
  public function rt_fields(){

    $fields = array(
        array(
            'mode'    => 'section_start',
            'id'      => 'title_tabl',
            'label'   => esc_html__( 'Title', 'docfi-core' ),
        ),

        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'title_area',
            'label'   => esc_html__( 'Title', 'docfi-core' ),
        ),

        array(
            'mode' => 'section_end',
        ),

        /*Tab 1*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tabl',
            'label'   => esc_html__( 'Tab 1', 'docfi-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_1_heading',
            'label'   => esc_html__( 'Heading', 'docfi-core' ),
            'default' => 'Heading 1',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_1_content',
            'label'   => esc_html__( 'Select Template', 'docfi-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class1',
            'label'   => esc_html__( 'Icon', 'docfi-core' ), 
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 2*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab2',
            'label'   => esc_html__( 'Tab 2', 'docfi-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_2_heading',
            'label'   => esc_html__( 'Heading', 'docfi-core' ),
            'default' => 'Heading 2',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_2_content',
            'label'   => esc_html__( 'Select Template', 'docfi-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class2',
            'label'   => esc_html__( 'Icon', 'docfi-core' ), 
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 3*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab3',
            'label'   => esc_html__( 'Tab 3', 'docfi-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_3_heading',
            'label'   => esc_html__( 'Heading', 'docfi-core' ),
            'default' => 'Heading 3',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_3_content',
            'label'   => esc_html__( 'Select Template', 'docfi-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class3',
            'label'   => esc_html__( 'Icon', 'docfi-core' ), 
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 4*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab4',
            'label'   => esc_html__( 'Tab 4', 'docfi-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_4_heading',
            'label'   => esc_html__( 'Heading', 'docfi-core' ),
            'default' => 'Heading 4',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_4_content',
            'label'   => esc_html__( 'Select Template', 'docfi-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class4',
            'label'   => esc_html__( 'Icon', 'docfi-core' ), 
        ),    
        array(
            'mode' => 'section_end',
        ),

        /*Tab 5*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab5',
            'label'   => esc_html__( 'Tab 5', 'docfi-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_5_heading',
            'label'   => esc_html__( 'Heading', 'docfi-core' ),
            'default' => 'Heading 5',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_5_content',
            'label'   => esc_html__( 'Select Template', 'docfi-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class5',
            'label'   => esc_html__( 'Icon', 'docfi-core' ), 
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*title section*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_style',
            'label'   => esc_html__( 'Style', 'docfi-core' ),
            'tab'     => Controls_Manager::TAB_STYLE,
        ),

        array(
          'mode'    => 'group',
          'type'    => Group_Control_Typography::get_type(),
          'name'    => 'title_typo',
          'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
          'selector' => '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link',
        ),
        


      // Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_1',
				'label' => esc_html__( 'Normal', 'docfi-core' ),
			),
			
			array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'title_color',
        'label'   => esc_html__( 'Title Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link' => 'color: {{VALUE}}',
        ),
      ),
      array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'Dots_Color',
        'label'   => esc_html__( 'Dots Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link' => 'border-color: {{VALUE}}',
        ),
      ),
      array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'border_Color',
        'label'   => esc_html__( 'Border Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link:after' => 'border-color: {{VALUE}}',
        ),
      ),

			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_2',
				'label' => esc_html__( 'Active', 'docfi-core' ),
			),

			array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'title_active_color',
        'label'   => esc_html__( 'Title Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link.active' => 'color: {{VALUE}}',
        ),
      ),
      array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'Dots_active_Color',
        'label'   => esc_html__( 'Dots Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link.active:before' => 'color: {{VALUE}}',
        ),
      ),
      array(
        'type'    => Controls_Manager::COLOR,
        'id'      => 'border_active_Color',
        'label'   => esc_html__( 'Border Color', 'docfi-core' ),
        'default' => '',
        'selectors' => array(
          '{{WRAPPER}} .faq-nav-wrapper .nav .nav-link.active:after' => 'border-color: {{VALUE}}',
        ),
      ),
		
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
		

        
        array(
          'mode' => 'section_end',
        ),
      
    );
    return $fields;
  }
  protected function render() {
    $data = $this->get_settings();
    $template = 'content-toggle';
    return $this->rt_template( $template, $data );
  }
}
