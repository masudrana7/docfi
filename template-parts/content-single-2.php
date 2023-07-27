<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$docfi_has_entry_meta  = ( DocfiTheme::$options['post_date'] || DocfiTheme::$options['post_author_name'] || DocfiTheme::$options['post_cats'] || DocfiTheme::$options['post_comment_num'] || ( DocfiTheme::$options['post_length'] && function_exists( 'docfi_reading_time' ) ) || DocfiTheme::$options['post_published'] && function_exists( 'docfi_get_time' ) || ( DocfiTheme::$options['post_view'] && function_exists( 'docfi_views' ) ) ) ? true : false;

$docfi_comments_number = number_format_i18n( get_comments_number() );
$docfi_comments_html = $docfi_comments_number == 1 ? esc_html__( 'Comment' , 'docfi' ) : esc_html__( 'Comments' , 'docfi' );
$docfi_comments_html = '<span class="comment-number">'. $docfi_comments_number .'</span> '. $docfi_comments_html;
$docfi_author_bio = get_the_author_meta( 'description' );

$docfi_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$docfi_time_html       = apply_filters( 'docfi_single_time', $docfi_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'docfi_facebook', true );
$news_author_tw = get_user_meta( $author, 'docfi_twitter', true );
$news_author_ld = get_user_meta( $author, 'docfi_linkedin', true );
$news_author_pr = get_user_meta( $author, 'docfi_pinterest', true );
$news_author_ins = get_user_meta( $author, 'docfi_instagram', true );
$docfi_author_designation = get_user_meta( $author, 'docfi_author_designation', true );

$youtube_link = get_post_meta( get_the_ID(), 'docfi_youtube_link', true );

$img_class = empty(has_post_thumbnail() ) ? 'no-image' : 'show-image';

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
							<?php echo wp_get_attachment_image( $docfi_posts_gallery, 'full', "", array( "class" => "img-responsive" ) );
							?>
						</div>
						<?php } ?>
					</div>
					<div class="swiper-navigation">
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
			<?php } else { ?>
			<?php if ( has_post_thumbnail() && ( DocfiTheme::$options['post_featured_image'] == true ) ) { ?>
				<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
					<?php if ( DocfiTheme::$options['post_featured_image'] == true ) { ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'docfi-size1' , ['class' => 'img-responsive'] ); ?><?php } ?><?php } ?>
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="rt-video"><a class="rt-play play-btn-white-lg rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>				
				</div>
			<?php } ?>
		<?php } ?>

	<div class="main-wrap">
		<div class="entry-header">
			<?php if ( $docfi_has_entry_meta ) { ?>
			<ul class="entry-meta">				
				<?php if ( DocfiTheme::$options['post_author_name'] ) { ?>
				<li class="item-author"><i class="icon-docfi-user"></i><?php esc_html_e( 'by ', 'docfi' );?><?php the_author_posts_link(); ?>
				</li>
				<?php } if ( DocfiTheme::$options['post_date'] ) { ?>	
				<li><i class="icon-docfi-calendar"></i><?php echo get_the_date(); ?></li>
				<?php } if ( DocfiTheme::$options['post_cats'] ) { ?>
				<li><i class="icon-docfi-tags"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( DocfiTheme::$options['post_comment_num'] ) { ?>
				<li><i class="icon-docfi-comment"></i><?php echo wp_kses( $docfi_comments_html , 'alltext_allow' ); ?></li>
				<?php } if ( DocfiTheme::$options['post_length'] && function_exists( 'docfi_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><i class="icon-docfi-time"></i><?php echo docfi_reading_time(); ?></li>
				<?php } if ( DocfiTheme::$options['post_view'] && function_exists( 'docfi_views' ) ) { ?>
				<li><span class="meta-views meta-item "><i class="fa-regular fa-eye"></i><?php echo docfi_views(); ?></span></li>
				<?php } if ( DocfiTheme::$options['post_published'] && function_exists( 'docfi_get_time' ) ) { ?>	
				<li><i class="icon-docfi-calendar-alt"></i><?php echo docfi_get_time(); ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h1 class="entry-title"><?php the_title();?></h1>
		</div>
		<div class="entry-content rt-single-content"><?php the_content();?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'docfi' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) ); ?>
		</div>
		<?php if ( ( DocfiTheme::$options['post_tags'] && has_tag() ) || ( DocfiTheme::$options['post_share']  && ( function_exists( 'docfi_post_share' ) ) ) ) { ?>
		<div class="entry-footer">
			<div class="entry-footer-meta">
				<?php if ( DocfiTheme::$options['post_tags'] && has_tag() ) { ?>
				<div class="meta-tags">
					<h4 class="meta-title"><?php esc_html_e( 'Tags:', 'docfi' );?></h4><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
				</div>	
				<?php } if ( ( DocfiTheme::$options['post_share'] ) && ( function_exists( 'docfi_post_share' ) ) ) { ?>
				<div class="post-share"><h4 class="meta-title"><?php esc_html_e( 'Share:', 'docfi' );?></h4><?php docfi_post_share(); ?></div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<!-- author bio -->
		<?php if ( DocfiTheme::$options['post_author_bio'] == '1' ) { ?>
			<?php if ( !empty ( $docfi_author_bio ) ) { ?>
			<div class="media about-author">
				<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
					<?php echo get_avatar( $author, 110 ); ?>
				</div>
				<div class="media-body">
					<div class="about-author-info">
						<h3 class="author-title"><?php the_author_posts_link();?></h3>
						<div class="author-designation"><?php if ( !empty ( $docfi_author_designation ) ) {	echo esc_html( $docfi_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<?php if ( $docfi_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $docfi_author_bio );?></div>
					<?php } ?>
					<ul class="author-box-social">
						<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest-p"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ins ) ){ ?><li><a href="<?php echo esc_url( $news_author_ins ); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		<?php } ?>
		<!-- next/prev post -->
		<?php if ( DocfiTheme::$options['post_links'] ) { docfi_post_links_next_prev(); } ?>
		<!-- related post -->
		<?php if( DocfiTheme::$options['show_related_post'] == '1' && is_single() && !empty ( docfi_related_post() ) ) { ?>
			<div class="related-post">
				<?php docfi_related_post(); ?>
			</div>
		<?php } ?>	
		<?php
		if ( comments_open() || get_comments_number() ){
			comments_template();
		}
		?>	
	</div>
</div>