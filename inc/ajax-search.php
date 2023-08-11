<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * Ajax Search
 */

class RTsearchAjax{
	// the ajax function __construct
	function __construct(){
		add_action('wp_ajax_data_fetch', [$this, 'data_fetch']);
		add_action('wp_ajax_nopriv_data_fetch', [$this, 'data_fetch']); 
	}
	public function data_fetch(){
		$args = array(
			'post_type' => 'docfi_docs',
			'posts_per_page' => 4,
			's' => esc_attr( $_POST['keyword'] ?? '' ),
			'searchkey' => esc_attr( $_POST['searchkey'] ?? '' ),
		);

		$meta_value = $_POST['meta'] ?? '' ;
		if( ( $meta_value ) ){
			$args['meta_query'] = array(
				array(
					'key'     => 'group_post_select', 
					'value'   => esc_attr( $meta_value ), 
					'compare' => 'LIKE', 
					'type'    => 'CHAR', 
				),
			);
		}
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) :
			while( $the_query->have_posts() ): 
			$the_query->the_post();?>
			<div class="rt-search-result-list">
				<a class="rt-top-title" href="<?php echo esc_url( post_permalink() ); ?>">
					<svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.96799 10L10.5 5.5L5.96799 1" stroke="#6B707F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M1 10L5.53201 5.5L1 1" stroke="#6B707F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg> <?php the_title();?>
				</a>
				<ul class="rt-search-breadcrumb">
				<?php
					$term_lists = get_the_terms( get_the_ID(), 'docfi_docs_category' );
					if( $term_lists ) {
						foreach ( $term_lists as $term_list ){ 
							$link = get_term_link( $term_list->term_id, 'docfi_docs_category' ); ?>
							<li><a href="<?php echo esc_url( $link ); ?>">
							<?php echo esc_html( $term_list->name ); ?></a></li><?php 
						}
					} 
					$terms = get_terms( array('taxonomy' => 'docfi_docs_group' ) );
					$category_dropdown = array(  0 => __( 'All Docs', 'docfi-core' ) );
					foreach ( $terms as $category ) {
						$category_dropdown[$category->slug] = $category->name;
					}
				?>
				<li><i class="fas fa-chevron-right"></i> <a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>
				</ul>
			</div>
			<?php endwhile;
			wp_reset_postdata();  
			else: ?>
			<h3 class="rt-no-found"><?php echo esc_html('No Results Found', 'docfi'); ?></h3>
		<?php endif;
		die();
	}
}

new RTsearchAjax();
 	