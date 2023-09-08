<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'docfi-size2';

$docfi_has_entry_meta  = ( DocfiTheme::$options['blog_date'] || DocfiTheme::$options['blog_author_name'] || DocfiTheme::$options['blog_comment_num'] || DocfiTheme::$options['blog_length'] && function_exists( 'docfi_reading_time' ) || DocfiTheme::$options['blog_view'] && function_exists( 'docfi_views' ) ) ? true : false;

$docfi_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$docfi_time_html       = apply_filters( 'docfi_single_time', $docfi_time_html );

$docfi_comments_number = number_format_i18n( get_comments_number() );
$docfi_comments_html = $docfi_comments_number == 1 ? esc_html__( 'Comment' , 'docfi' ) : esc_html__( 'Comments' , 'docfi' );
$docfi_comments_html = '<span class="comment-number">'. $docfi_comments_number .'</span> ' . $docfi_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), DocfiTheme::$options['post_content_limit'], '.' );

$wow = DocfiTheme::$options['blog_animation'];
$effect = DocfiTheme::$options['blog_animation_effect'];

$youtube_link = get_post_meta( get_the_ID(), 'docfi_youtube_link', true );

$img_class = empty(has_post_thumbnail() ) ? 'no-image' : 'show-image';
$preview = DocfiTheme::$options['display_no_preview_image'] == '1' ? 'show-preview' : 'no-preview';

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
	<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
		<div class="blog-img-holder">
			<div class="blog-img">
				<?php
				$swiper_data=array(
					'slidesPerView' 	=>1,
					'centeredSlides'	=>false,
					'loop'				=>true,
					'spaceBetween'		=>20,
					'slideToClickedSlide' =>true,
					'slidesPerGroup' => 1,
					'autoplay'				=>array(
						'delay'  => 1,
					),
					'speed'      =>500,
					'breakpoints' =>array(
						'0'    =>array('slidesPerView' =>1),
						'576'    =>array('slidesPerView' =>1),
						'768'    =>array('slidesPerView' =>1),
						'992'    =>array('slidesPerView' =>1),
						'1200'    =>array('slidesPerView' =>1),				
						'1600'    =>array('slidesPerView' =>1)				
					),
					'auto'   =>false
				);

				$swiper_data = json_encode( $swiper_data );
				$docfi_post_gallerys_raw = get_post_meta( get_the_ID(), 'docfi_post_gallery', true );
				$docfi_post_gallerys = explode( "," , $docfi_post_gallerys_raw );
					if ( !empty( $docfi_post_gallerys_raw ) && 'gallery' == get_post_format( $id ) ) { ?>
						<div class="rt-swiper-slider single-post-slider rt-swiper-nav" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
							<div class="swiper-wrapper">
								<?php foreach( $docfi_post_gallerys as $docfi_posts_gallery ) { ?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image( $docfi_posts_gallery, $thumb_size, "", array( "class" => "img-responsive" ) );
									?>
								</div>
								<?php } ?>
							</div>
							<div class="swiper-navigation">
					            <div class="swiper-button-prev"><i class="icon-docfi-left-arrow"></i></div>
					            <div class="swiper-button-next"><i class="icon-docfi-right-arrow"></i></div>
					        </div>
						</div>
					<?php } else { ?>
					<?php if ( DocfiTheme::$options['blog_video'] && ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) && ( !empty( has_post_thumbnail() ) ) ) { ?>
							<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
							<?php } else {
								if ( DocfiTheme::$options['display_no_preview_image'] == '1' ) {
									if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );						
									}
									elseif ( empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = '<img class="wp-post-image" src="'.DOCFI_ASSETS_URL.'img/noimage_960X520.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
									}
									echo wp_kses( $thumbnail , 'alltext_allow' );
								}
							}
						?>
						</a>
				<?php } ?>
			</div>				
		</div>
		<div class="entry-content">
			<?php if ( DocfiTheme::$options['blog_video'] && ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) && ( empty( has_post_thumbnail() ) ) ) { ?>
				<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
			<?php } ?>
			<?php if ( $docfi_has_entry_meta ) { ?>
			<ul class="entry-meta">
				<?php if ( DocfiTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="icon-docfi-user"></i><?php esc_html_e( 'by ', 'docfi' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( DocfiTheme::$options['blog_cats'] ) { ?>
				<li class="entry-categories"><i class="icon-docfi-tags"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( DocfiTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="icon-docfi-calendar-alt"></i><?php echo get_the_date(); ?></li>				
				<?php } if ( DocfiTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="icon-docfi-comment"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $docfi_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( DocfiTheme::$options['blog_length'] && function_exists( 'docfi_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="icon-docfi-time"></i><?php echo docfi_reading_time(); ?></li>
				<?php } if ( DocfiTheme::$options['blog_view'] && function_exists( 'docfi_views' ) ) { ?>
				<li><i class="fa-regular fa-eye"></i><span class="post-views"><?php echo docfi_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( DocfiTheme::$options['blog_content'] ) { ?>
			<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>	
			<?php if ( DocfiTheme::$options['blog_read_more'] ) { ?>
			<div class="post-read-more"><a class="button-style-3 btn-common" href="<?php the_permalink();?>"><?php esc_html_e( 'Continue Reading', 'docfi' );?></a>
          	</div>	
          	<?php } ?>
		</div>
	</div>
</div>