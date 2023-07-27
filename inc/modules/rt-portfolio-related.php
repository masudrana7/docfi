<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'docfi_related_portfolio' )){
	
	function docfi_related_portfolio(){
		$thumb_size 			= 'docfi-size5';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$title_length = DocfiTheme::$options['related_portfolio_title_limit'] ? DocfiTheme::$options['related_portfolio_title_limit'] : '';
		$related_post_number = DocfiTheme::$options['related_portfolio_number'];
		
		$portfolio_related_title  = get_post_meta( get_the_ID(), 'portfolio_related_title', true );

		# Making ready to the Query ...
		$query_type = DocfiTheme::$options['related_post_query'];

		$args = array(
			'post_type'				 => 'docfi_portfolio',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( DocfiTheme::$options['related_post_sort'] ){

			$post_order = DocfiTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'docfi_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			
			$terms = get_the_terms( $post_id, 'docfi_portfolio_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
			 
				$port_cat_links = array();
			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}
			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'docfi_portfolio_category',
					'field'    => 'ID',
					'terms'    => $port_cat_links,
				)
			);

		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		$swiper_data=array(
			'slidesPerView' 	=>2,
			'centeredSlides'	=>false,
			'loop'				=>true,
			'spaceBetween'		=>24,
			'slideToClickedSlide' =>true,
			'slidesPerGroup' => 1,
			'autoplay'				=>array(
				'delay'  => 1,
			),
			'speed'      =>500,
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>2),
				'768'    =>array('slidesPerView' =>2),
				'992'    =>array('slidesPerView' =>3),
				'1200'    =>array('slidesPerView' =>3),				
				'1600'    =>array('slidesPerView' =>3)				
			),
			'auto'   =>false
		);

		$swiper_data = json_encode( $swiper_data );
		
		if( $related_query->have_posts() ) { ?>
		
		<div class="rt-portfolio-default rt-portfolio-multi-layout-2 related-portfolio">
			<div class="rt-swiper-slider" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
				<div class="rt-related-title">
					<div class="title-holder">
						<h3 class="entry-title has-animation"><?php echo wp_kses( DocfiTheme::$options['portfolio_related_title'] , 'alltext_allow' ); ?><span class="titleline"></span></h3>
					</div>
					<div class="swiper-button">
		                <div class="swiper-button-prev">
							<svg width="14" height="11" viewBox="0 0 14 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.2227 5.75C13.2227 6.24219 12.8398 6.625 12.375 6.625H3.98047L6.85156 9.52344C7.20703 9.85156 7.20703 10.4258 6.85156 10.7539C6.6875 10.918 6.46875 11 6.25 11C6.00391 11 5.78516 10.918 5.62109 10.7539L1.24609 6.37891C0.890625 6.05078 0.890625 5.47656 1.24609 5.14844L5.62109 0.773438C5.94922 0.417969 6.52344 0.417969 6.85156 0.773438C7.20703 1.10156 7.20703 1.67578 6.85156 2.00391L3.98047 4.875H12.375C12.8398 4.875 13.2227 5.28516 13.2227 5.75Z" fill=""></path>
							</svg>
						<?php echo esc_html__( 'Prev' , 'docfi' ) ?></div>
		                <div class="swiper-button-next"><?php echo esc_html__( 'Next' , 'docfi' ) ?>
							<svg width="13" height="11" viewBox="0 0 13 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.9766 6.37891L7.60156 10.7539C7.4375 10.918 7.21875 11 7 11C6.75391 11 6.53516 10.918 6.37109 10.7539C6.01562 10.4258 6.01562 9.85156 6.37109 9.52344L9.24219 6.625H0.875C0.382812 6.625 0 6.24219 0 5.75C0 5.28516 0.382812 4.875 0.875 4.875H9.24219L6.37109 2.00391C6.01562 1.67578 6.01562 1.10156 6.37109 0.773438C6.69922 0.417969 7.27344 0.417969 7.60156 0.773438L11.9766 5.14844C12.332 5.47656 12.332 6.05078 11.9766 6.37891Z" fill=""></path>
							</svg>
						</div>
		            </div>
	            </div>
				<div class="swiper-wrapper" >
					<?php
						while ( $related_query->have_posts() ) {
						$related_query->the_post();
						$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );
						$id = get_the_ID();

					?>
						<div class="portfolio-item swiper-slide">
							<div class="portfolio-figure">
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
										} else {
											if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );
											} else {
												echo '<img class="wp-post-image" src="' . DocfiTheme_Helper::get_img( 'noimage_610X414.jpg' ) . '" alt="'.get_the_title().'" loading="lazy" >';
											}
										}
									?>
								</a>
								
							</div>
							<div class="portfolio-content">
								<div class="content-info">
									<h3 class="entry-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $trimmed_title ); ?></a></h3>
									<?php if ( DocfiTheme::$options['portfolio_ar_category'] ) { ?>
									<span class="portfolio-cat"><?php
										$i = 1;
										$term_lists = get_the_terms( get_the_ID(), 'docfi_portfolio_category' );
										if( $term_lists ) {
										foreach ( $term_lists as $term_list ){ 
										$link = get_term_link( $term_list->term_id, 'docfi_portfolio_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?>
									</span>
									<?php } ?>				
									<?php if ( DocfiTheme::$options['portfolio_ar_excerpt'] ) { ?>
										<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
									<?php } ?>
								</div>
								<?php if ( DocfiTheme::$options['portfolio_ar_action'] ) { ?>
								<div class="content-action">
									<a href="<?php the_permalink();?>"><i class="icon-docfi-right-arrow"></i></a>
								</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php }
		wp_reset_postdata();
	}
}
?>