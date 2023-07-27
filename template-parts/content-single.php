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

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-wrap">
		
		<div class="entry-header">			
			<?php if ( $docfi_has_entry_meta ) { ?>
			<ul class="entry-meta">				
				<?php if ( DocfiTheme::$options['post_author_name'] ) { ?>
				<li class="item-author">
					<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.78125 9.5C12.0938 9.5 14 11.4062 14 13.7188V14.5C14 15.3438 13.3125 16 12.5 16H1.5C0.65625 16 0 15.3438 0 14.5V13.7188C0 11.4062 1.875 9.5 4.1875 9.5C5.09375 9.5 5.5 10 7 10C8.46875 10 8.875 9.5 9.78125 9.5ZM12.5 14.5V13.7188C12.5 12.2188 11.2812 11 9.78125 11C9.3125 11 8.59375 11.5 7 11.5C5.375 11.5 4.65625 11 4.1875 11C2.6875 11 1.5 12.2188 1.5 13.7188V14.5H12.5ZM7 9C4.5 9 2.5 7 2.5 4.5C2.5 2.03125 4.5 0 7 0C9.46875 0 11.5 2.03125 11.5 4.5C11.5 7 9.46875 9 7 9ZM7 1.5C5.34375 1.5 4 2.875 4 4.5C4 6.15625 5.34375 7.5 7 7.5C8.625 7.5 10 6.15625 10 4.5C10 2.875 8.625 1.5 7 1.5Z" fill="#6B707F"></path>
					</svg>
				<?php esc_html_e( 'by ', 'docfi' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( DocfiTheme::$options['post_date'] ) { ?>	
				<li>
				<svg width="15" height="15" viewBox="0 0 19 20" fill="#6B707F" xmlns="http://www.w3.org/2000/svg">
					<path d="M14.7532 1.53669H13.602V0.768344C13.602 0.564567 13.5293 0.369135 13.3997 0.225043C13.2702 0.0809502 13.0945 0 12.9113 0C12.7281 0 12.5524 0.0809502 12.4229 0.225043C12.2934 0.369135 12.2206 0.564567 12.2206 0.768344V1.53669H6.23442V0.768344C6.23442 0.564567 6.16164 0.369135 6.03211 0.225043C5.90258 0.0809502 5.72689 0 5.5437 0C5.36051 0 5.18483 0.0809502 5.05529 0.225043C4.92576 0.369135 4.85299 0.564567 4.85299 0.768344V1.53669H3.7018C3.23519 1.47653 2.76239 1.53451 2.31877 1.70631C1.87515 1.8781 1.47219 2.15925 1.14004 2.52873C0.80789 2.89822 0.555143 3.34646 0.400708 3.83994C0.246272 4.33342 0.194146 4.85936 0.248228 5.37841V16.1352C0.194146 16.6543 0.246272 17.1802 0.400708 17.6737C0.555143 18.1672 0.80789 18.6154 1.14004 18.9849C1.47219 19.3544 1.87515 19.6355 2.31877 19.8073C2.76239 19.9791 3.23519 20.0371 3.7018 19.977H14.7532C15.2198 20.0371 15.6926 19.9791 16.1362 19.8073C16.5799 19.6355 16.9828 19.3544 17.315 18.9849C17.6471 18.6154 17.8999 18.1672 18.0543 17.6737C18.2087 17.1802 18.2609 16.6543 18.2068 16.1352V5.37841C18.2609 4.85936 18.2087 4.33342 18.0543 3.83994C17.8999 3.34646 17.6471 2.89822 17.315 2.52873C16.9828 2.15925 16.5799 1.8781 16.1362 1.70631C15.6926 1.53451 15.2198 1.47653 14.7532 1.53669ZM3.7018 3.07338H4.85299V3.84172C4.85299 4.0455 4.92576 4.24093 5.05529 4.38502C5.18483 4.52912 5.36051 4.61007 5.5437 4.61007C5.72689 4.61007 5.90258 4.52912 6.03211 4.38502C6.16164 4.24093 6.23442 4.0455 6.23442 3.84172V3.07338H12.2206V3.84172C12.2206 4.0455 12.2934 4.24093 12.4229 4.38502C12.5524 4.52912 12.7281 4.61007 12.9113 4.61007C13.0945 4.61007 13.2702 4.52912 13.3997 4.38502C13.5293 4.24093 13.602 4.0455 13.602 3.84172V3.07338H14.7532C16.2056 3.07338 16.8254 3.76284 16.8254 5.37841V6.14675H1.62966V5.37841C1.62966 3.76284 2.24946 3.07338 3.7018 3.07338ZM14.7532 18.4403H3.7018C2.24946 18.4403 1.62966 17.7508 1.62966 16.1352V7.68344H16.8254V16.1352C16.8254 17.7508 16.2056 18.4403 14.7532 18.4403ZM6.48307 11.0129C6.48306 11.2151 6.42928 11.4128 6.32848 11.581C6.22769 11.7493 6.08439 11.8806 5.91665 11.9584C5.7489 12.0362 5.5642 12.0571 5.38581 12.0184C5.20742 11.9797 5.04331 11.8831 4.91416 11.7409C4.785 11.5986 4.69657 11.417 4.66 11.219C4.62343 11.021 4.64036 10.8153 4.70866 10.6279C4.77695 10.4406 4.89356 10.2799 5.04379 10.1661C5.19402 10.0523 5.37117 9.9905 5.55291 9.98848H5.56212C5.80637 9.98848 6.04062 10.0964 6.21333 10.2885C6.38604 10.4807 6.48307 10.7412 6.48307 11.0129ZM10.1669 11.0129C10.1669 11.2151 10.1131 11.4128 10.0123 11.581C9.91149 11.7493 9.7682 11.8806 9.60046 11.9584C9.43271 12.0362 9.24801 12.0571 9.06962 12.0184C8.89123 11.9797 8.72712 11.8831 8.59796 11.7409C8.46881 11.5986 8.38038 11.417 8.34381 11.219C8.30724 11.021 8.32417 10.8153 8.39246 10.6279C8.46076 10.4406 8.57736 10.2799 8.7276 10.1661C8.87783 10.0523 9.05497 9.9905 9.23672 9.98848H9.24593C9.49018 9.98848 9.72443 10.0964 9.89714 10.2885C10.0699 10.4807 10.1669 10.7412 10.1669 11.0129ZM13.8507 11.0129C13.8507 11.2151 13.7969 11.4128 13.6961 11.581C13.5953 11.7493 13.452 11.8806 13.2843 11.9584C13.1165 12.0362 12.9318 12.0571 12.7534 12.0184C12.575 11.9797 12.4109 11.8831 12.2818 11.7409C12.1526 11.5986 12.0642 11.417 12.0276 11.219C11.991 11.021 12.008 10.8153 12.0763 10.6279C12.1446 10.4406 12.2612 10.2799 12.4114 10.1661C12.5616 10.0523 12.7388 9.9905 12.9205 9.98848H12.9297C13.174 9.98848 13.4082 10.0964 13.5809 10.2885C13.7537 10.4807 13.8507 10.7412 13.8507 11.0129ZM6.48307 15.1108C6.48306 15.313 6.42928 15.5106 6.32848 15.6789C6.22769 15.8471 6.08439 15.9784 5.91665 16.0562C5.7489 16.1341 5.5642 16.1549 5.38581 16.1162C5.20742 16.0775 5.04331 15.981 4.91416 15.8387C4.785 15.6965 4.69657 15.5149 4.66 15.3168C4.62343 15.1188 4.64036 14.9131 4.70866 14.7258C4.77695 14.5384 4.89356 14.3777 5.04379 14.2639C5.19402 14.1501 5.37117 14.0883 5.55291 14.0863H5.56212C5.80637 14.0863 6.04062 14.1942 6.21333 14.3864C6.38604 14.5785 6.48307 14.8391 6.48307 15.1108ZM10.1669 15.1108C10.1669 15.313 10.1131 15.5106 10.0123 15.6789C9.91149 15.8471 9.7682 15.9784 9.60046 16.0562C9.43271 16.1341 9.24801 16.1549 9.06962 16.1162C8.89123 16.0775 8.72712 15.981 8.59796 15.8387C8.46881 15.6965 8.38038 15.5149 8.34381 15.3168C8.30724 15.1188 8.32417 14.9131 8.39246 14.7258C8.46076 14.5384 8.57736 14.3777 8.7276 14.2639C8.87783 14.1501 9.05497 14.0883 9.23672 14.0863H9.24593C9.49018 14.0863 9.72443 14.1942 9.89714 14.3864C10.0699 14.5785 10.1669 14.8391 10.1669 15.1108ZM13.8507 15.1108C13.8507 15.313 13.7969 15.5106 13.6961 15.6789C13.5953 15.8471 13.452 15.9784 13.2843 16.0562C13.1165 16.1341 12.9318 16.1549 12.7534 16.1162C12.575 16.0775 12.4109 15.981 12.2818 15.8387C12.1526 15.6965 12.0642 15.5149 12.0276 15.3168C11.991 15.1188 12.008 14.9131 12.0763 14.7258C12.1446 14.5384 12.2612 14.3777 12.4114 14.2639C12.5616 14.1501 12.7388 14.0883 12.9205 14.0863H12.9297C13.174 14.0863 13.4082 14.1942 13.5809 14.3864C13.7537 14.5785 13.8507 14.8391 13.8507 15.1108Z" fill=""></path>
				</svg>
				<?php echo get_the_date(); ?></li>
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
				<div class="entry-thumbnail-area"><?php the_post_thumbnail( 'docfi-size1' , ['class' => 'img-responsive'] ); ?></div>
			<?php } ?>
		<?php } ?>

		<div class="entry-content">
			<?php the_content();?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'docfi' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) ); ?>
		</div>

		<?php if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $id ) && !empty( $youtube_link ) )  ) {		
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_link, $match);
			$youtube_id = $match[1];
		} ?>
		<?php if ( !empty($youtube_id) ) { ?>
			<?php if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $id ) )  ) { ?>
				<div class="entry-content embed-responsive-16by9">
					<div class="embed-responsive">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>" allowfullscreen></iframe>
					</div>
				</div>
			<?php } ?>
		<?php } ?>

		<?php if ( ( DocfiTheme::$options['post_tags'] && has_tag() ) || ( DocfiTheme::$options['post_share']  && ( function_exists( 'docfi_post_share' ) ) ) ) { ?>
		<div class="entry-footer">
			<div class="entry-footer-meta">
				<?php if ( DocfiTheme::$options['post_tags'] && has_tag() ) { ?>
				<div class="meta-tags">
					<span class="meta-title"><?php esc_html_e( 'Tags:', 'docfi' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
				</div>	
				<?php } if ( ( DocfiTheme::$options['post_share'] ) && ( function_exists( 'docfi_post_share' ) ) ) { ?>
				<div class="post-share"><span class="meta-title"><?php esc_html_e( 'Share:', 'docfi' );?></span><?php docfi_post_share(); ?></div>
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
		
	</div>
</div>