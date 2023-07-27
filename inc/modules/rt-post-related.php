<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'docfi_related_post' )){
	
	function docfi_related_post(){
		$thumb_size = 'docfi-size3';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );	
		$title_length = DocfiTheme::$options['show_related_post_title_limit'] ? DocfiTheme::$options['show_related_post_title_limit'] : '';
		$related_post_number = DocfiTheme::$options['show_related_post_number'];

		$docfi_has_entry_meta  = ( DocfiTheme::$options['blog_date'] || DocfiTheme::$options['blog_cats'] || DocfiTheme::$options['blog_author_name'] || DocfiTheme::$options['blog_comment_num'] || DocfiTheme::$options['blog_length'] && function_exists( 'docfi_reading_time' ) || DocfiTheme::$options['blog_view'] && function_exists( 'docfi_views' ) ) ? true : false;

		# Making ready to the Query ...
		$query_type = DocfiTheme::$options['related_post_query'];

		$args = array(
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
			$category_ids = array();
			$categories   = get_the_category( $post_id );

			foreach( $categories as $individual_category ){
				$category_ids[] = $individual_category->term_id;
			}

			$args['category__in'] = $category_ids;
		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}

	
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
				'992'    =>array('slidesPerView' =>2),
				'1200'    =>array('slidesPerView' =>2),				
				'1600'    =>array('slidesPerView' =>2)				
			),
			'auto'   =>false
		);

		$swiper_data = json_encode( $swiper_data );

		?>
		<?php if ( $related_query->have_posts() ) { ?>
		<div class="rt-related-post blog-layout-3">			
			<div class="rt-swiper-slider related-post" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
				<div class="rt-related-title">
					<h3 class="related-title"><?php echo wp_kses( DocfiTheme::$options['related_title'] , 'alltext_allow' ); ?></h3>
					<div class="swiper-button">
		                <div class="swiper-button-prev"><svg width="14" height="11" viewBox="0 0 14 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.2227 5.75C13.2227 6.24219 12.8398 6.625 12.375 6.625H3.98047L6.85156 9.52344C7.20703 9.85156 7.20703 10.4258 6.85156 10.7539C6.6875 10.918 6.46875 11 6.25 11C6.00391 11 5.78516 10.918 5.62109 10.7539L1.24609 6.37891C0.890625 6.05078 0.890625 5.47656 1.24609 5.14844L5.62109 0.773438C5.94922 0.417969 6.52344 0.417969 6.85156 0.773438C7.20703 1.10156 7.20703 1.67578 6.85156 2.00391L3.98047 4.875H12.375C12.8398 4.875 13.2227 5.28516 13.2227 5.75Z" fill=""></path>
                                                    </svg><?php echo esc_html__( 'Prev' , 'docfi' ) ?></div>
		                <div class="swiper-button-next"><?php echo esc_html__( 'Next' , 'docfi' ) ?><svg width="13" height="11" viewBox="0 0 13 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.9766 6.37891L7.60156 10.7539C7.4375 10.918 7.21875 11 7 11C6.75391 11 6.53516 10.918 6.37109 10.7539C6.01562 10.4258 6.01562 9.85156 6.37109 9.52344L9.24219 6.625H0.875C0.382812 6.625 0 6.24219 0 5.75C0 5.28516 0.382812 4.875 0.875 4.875H9.24219L6.37109 2.00391C6.01562 1.67578 6.01562 1.10156 6.37109 0.773438C6.69922 0.417969 7.27344 0.417969 7.60156 0.773438L11.9766 5.14844C12.332 5.47656 12.332 6.05078 11.9766 6.37891Z" fill=""></path>
                                                    </svg></div>
		            </div>
	            </div>
				<div class="swiper-wrapper">
				<?php
					while ( $related_query->have_posts() ) {
					$related_query->the_post();
					$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );

					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( get_the_excerpt(), DocfiTheme::$options['post_content_limit'], '' );
					$docfi_comments_number = number_format_i18n( get_comments_number() );
					$docfi_comments_html = $docfi_comments_number == 1 ? esc_html__( 'Comment' , 'docfi' ) : esc_html__( 'Comments' , 'docfi' );
					$docfi_comments_html = '<span class="comment-number">'. $docfi_comments_number .'</span> '. $docfi_comments_html;

					$docfi_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
					$docfi_time_html = apply_filters( 'docfi_single_time', $docfi_time_html );

				?>
					<div class="blog-box swiper-slide">
						<?php if ( has_post_thumbnail() || DocfiTheme::$options['display_no_preview_image'] == '1'  ) { ?>
						<div class="blog-img-holder">
							<div class="blog-img">
								<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
										<?php } else {
										if ( DocfiTheme::$options['display_no_preview_image'] == '1' ) {
											if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
												$thumbnail = wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );						
											}
											elseif ( empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
												$thumbnail = '<img class="wp-post-image" src="'.DOCFI_ASSETS_URL.'img/noimage_520X330.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
											}
											echo wp_kses( $thumbnail , 'alltext_allow' );
										}
									}
									?>
								</a>
							</div>
						</div>
						<?php } ?>
						<div class="entry-content">	
							<?php if ( $docfi_has_entry_meta ) { ?>
							<ul class="entry-meta">
								<?php if ( DocfiTheme::$options['blog_author_name'] ) { ?>
								<li class="post-author"><i class="icon-docfi-user"></i><?php esc_html_e( 'by ', 'docfi' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( DocfiTheme::$options['blog_cats'] ) { ?>
								<li class="entry-categories"><i class="icon-docfi-tags"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( DocfiTheme::$options['blog_date'] ) { ?>	
								<li class="post-date"><i class="icon-docfi-calendar"></i><?php echo get_the_date(); ?></li>								
								<?php } if ( DocfiTheme::$options['blog_comment_num'] ) { ?>
								<li class="post-comment"><i class="icon-docfi-comment"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $docfi_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( DocfiTheme::$options['blog_length'] && function_exists( 'docfi_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><i class="icon-docfi-time"></i><?php echo docfi_reading_time(); ?></li>
								<?php } if ( DocfiTheme::$options['blog_view'] && function_exists( 'docfi_views' ) ) { ?>
								<li><i class="fa-regular fa-eye"></i><span class="post-views meta-item "><?php echo docfi_views(); ?></span></li>
								<?php } ?>
							</ul>
							<?php } ?>
							<h4 class="entry-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $trimmed_title ); ?></a></h4>
							<?php if ( DocfiTheme::$options['blog_read_more'] ) { ?>
							<div class="post-read-more"><a class="button-style-3 btn-common" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'docfi' );?></a>
				          	</div>	
				          	<?php } ?>	

						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php
		wp_reset_postdata();
	}
}
?>