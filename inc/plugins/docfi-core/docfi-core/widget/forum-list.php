<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/**
* Font-Size controller for sidebar by DocfiTheme
**/
class DocfiTheme_ForumList_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_forum_list_widget',
			'description' => esc_html__( 'Forum List' , 'docfi-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-forum-list', esc_html__( 'Docfi : Forum List' , 'docfi-core' ), $widget_ops );
		$this->alt_option_name = 'docfi_forum_list_widget';
	}

	public function widget( $args, $instance ){
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="widget-forum">
			<ul>
				<?php 
				$args = array(
					'post_type' => 'forum',
					'posts_per_page' => 9,
				);
				$query = new WP_Query( $args );
				$page_id = get_the_ID();
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {  
						$query->the_post();
						?>
						<li>
							<a href="<?php bbp_forum_permalink( $query->post->ID ); ?>"><?php bbp_forum_title( $query->post->ID ); ?><span class="count"><?php bbp_forum_topic_count($query->post->ID); ?></span></a>
						
						</li> 
						<?php 
					}
				} wp_reset_postdata(); ?>
			</ul>
		</div>

		<?php 
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['text_label']   = ( ! empty( $new_instance['text_label'] ) ) ? wp_kses_post( $new_instance['text_label'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       => esc_html__( 'Font-Size: Controller' , 'docfi-core' ),
			'text_label'=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$fields = array(
			'title'        => array(
				'label'    => esc_html__( 'Title', 'docfi-core' ),
				'type'     => 'text',
			),		
			'text_label'  => array(
				'label'    => esc_html__( 'Label', 'docfi-core' ),
				'type'     => 'text',
				),
			);
		
		RT_Widget_Fields::display( $fields, $instance, $this );
	}	
}