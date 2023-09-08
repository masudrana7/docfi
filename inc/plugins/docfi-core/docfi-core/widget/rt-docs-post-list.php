<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/**
* Docs List widget for sidebar by DocfiTheme
**/
class DocfiTheme_DocsList_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_post_list_widget',
			'description' => esc_html__( 'Docs Post List' , 'docfi-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-docs-post-list', esc_html__( 'Docfi : Docs Post List' , 'docfi-core' ), $widget_ops );
		$this->alt_option_name = 'docfi_docs_post_list_widget';
	}

	public function widget( $args, $instance ){

		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="rt-about-widget">
			<?php if( !empty( $instance['text_label'] ) ) { ?>
				<h3 class="social-label"><?php echo wp_kses_post( $instance['text_label'] ); ?></h3>
			<?php } ?>


			<div class="rt-group-single-list rt-group-lists">

				<?php 
				$args = array(
					'taxonomy'   => 'docfi_docs_group',
					'hide_empty' => false, 
				);
				$docs_groups = get_categories($args);
				if ($docs_groups) {
					foreach ($docs_groups as $docs_group) {
						$get_item_bg  = get_term_meta( $docs_group->term_id, 'rt_item_bg', true ); 
						$get_color    = get_term_meta( $docs_group->term_id, 'rt_group_color', true ); 
						$hexcolor     = DocfiTheme_Helper::hex2rgb( $get_item_bg );
						$r = hexdec(substr($get_item_bg,0,2));
						$g = hexdec(substr($get_item_bg,2,2));
						$b = hexdec(substr($get_item_bg,4,2));
						$get_image = get_term_meta( $docs_group->term_id, 'rt_term_image', true );
						$image_id = wp_get_attachment_image_src( $get_image, 'full' );
						$term_name = get_term( $docs_group, 'docfi_docs_group' ); 
						$tl = $term_name->name;
						$uid = strtolower(str_replace(array('%', ':', '\\', '/', '*', '?', '.', ';', ' '), '', $tl));
						$current_inner_posts = [];
					ob_start();
					?>
					<ul class="explore-topics-list">
						<?php 
						$args = array(
							'post_type' => 'docfi_docs',
							'posts_per_page' => -1,
							'meta_query' => array(
								array(
									'key'     => 'group_post_select', 
									'value'   => $docs_group->term_id, 
									'compare' => 'LIKE', 
									'type'    => 'CHAR', 
								),
							),
						);
						$query = new WP_Query( $args );
						$page_id = get_the_ID();
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {  
								$query->the_post();
								$postid = get_the_ID();
								$current_inner_posts[] = $postid;
								$add_active = ($page_id === $postid) ? " active": ""; ?>
								<li class="post-list<?php echo esc_attr( $add_active );?>">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li> 
								<?php 
							}
						} wp_reset_postdata(); ?>
					</ul>
					<?php 
					$post_list = ob_get_clean();
					$classes = in_array( $page_id, $current_inner_posts ) ? 'active' : '';?>

					<div class="rt-single-sidebar-list rs-docs-click <?php echo esc_attr( $classes );?>" style="--docfi-red2: <?php echo absint( $r ); ?>;--docfi-green2: <?php echo absint( $g ); ?>;--docfi-blue2: <?php echo absint( $b ); ?>">
						<div class="explore-topics-header">
							<a href="#rt-<?php echo esc_attr($uid); ?>">
								<div class="title-area d-flex align-items-center">
									<div style="background:#<?php echo esc_attr( $get_color ); ?>" class="icon d-flex justify-content-center align-items-center rt-color-shade12-bg">
										<?php 
											if ( $image_id ) { ?>
											<img src="<?php echo esc_attr($image_id[0]); ?>" />
											<?php } else { ?>
												<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9.68998 1.69513L14.5725 4.32763C15.1425 4.63513 15.1425 5.51263 14.5725 5.82013L9.68998 8.45263C9.25498 8.68513 8.74498 8.68513 8.30998 8.45263L3.42748 5.82013C2.85748 5.51263 2.85748 4.63513 3.42748 4.32763L8.30998 1.69513C8.74498 1.46263 9.25498 1.46263 9.68998 1.69513Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M2.70752 7.59848L7.24502 9.87098C7.80752 10.156 8.16752 10.7335 8.16752 11.3635V15.6535C8.16752 16.276 7.51502 16.6735 6.96002 16.396L2.42252 14.1235C1.86002 13.8385 1.50002 13.261 1.50002 12.631V8.34098C1.50002 7.71848 2.15252 7.32098 2.70752 7.59848Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M15.2925 7.59848L10.755 9.87098C10.1925 10.156 9.8325 10.7335 9.8325 11.3635V15.6535C9.8325 16.276 10.485 16.6735 11.04 16.396L15.5775 14.1235C16.14 13.8385 16.5 13.261 16.5 12.631V8.34098C16.5 7.71848 15.8475 7.32098 15.2925 7.59848Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
											<?php }
										?>
									</div>
									<span class="title">
										<?php echo esc_html( $docs_group->name );?>
									</span>
								</div>
							</a>
						</div>

						<div class="explore-topics-body">
							<?php echo wp_kses_post($post_list); ?>
						</div>
					</div>
					<?php  }
				}
				?> 
			</div>	

			
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
			'title'       => esc_html__( 'Docs Post List' , 'docfi-core' ),
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