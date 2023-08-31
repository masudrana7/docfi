<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( DocfiTheme::$layout == 'full-width' ) {
	$docfi_layout_class = 'col-sm-12 col-12';
}
else{
	$docfi_layout_class = DocfiTheme_Helper::has_active_widget();
}
$docfi_has_entry_meta  = ( DocfiTheme::$options['post_date'] || DocfiTheme::$options['post_author_name'] || DocfiTheme::$options['post_comment_num'] || ( DocfiTheme::$options['post_length'] && function_exists( 'docfi_reading_time' ) ) || DocfiTheme::$options['post_published'] && function_exists( 'docfi_get_time' ) || ( DocfiTheme::$options['post_view'] && function_exists( 'docfi_views' ) ) ) ? true : false;

$docfi_comments_number = number_format_i18n( get_comments_number() );
$docfi_comments_html = $docfi_comments_number == 1 ? esc_html__( 'Comment' , 'docfi' ) : esc_html__( 'Comments' , 'docfi' );
$docfi_comments_html = '<span class="comment-number">'. $docfi_comments_number .'</span> '. $docfi_comments_html;
$docfi_author_bio = get_the_author_meta( 'description' );

$docfi_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$docfi_time_html       = apply_filters( 'docfi_single_time', $docfi_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'docfi_youtube_link', true );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<input type="hidden" id="docfi-cat-ids" value="<?php echo implode(',', wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ) ); ?>">
	<?php if ( DocfiTheme::$options['post_style'] == 'style1' ) { ?>
		<div id="contentHolder">
			<div class="container rt-single-post-content">
				<div class="row">				
					<?php if ( DocfiTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
						<div class="<?php echo esc_attr( $docfi_layout_class );?>">
							<main id="main" class="site-main"> 
								<div class="rt-sidebar-sapcer <?php echo ( DocfiTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
								<?php endwhile; ?> 
								</div> 
							</main>
						</div>
					<?php if ( DocfiTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
				</div>
			</div>
			<?php if ( comments_open() || get_comments_number() ){ ?>
			<div class="rt-comments-area">
				<div class="container">
					<div class="col-xl-8">
						<?php
							comments_template();
						?>	
					</div>
					
				</div>
			</div>
			<?php } ?>
		</div>
	<?php } else if ( DocfiTheme::$options['post_style'] == 'style2' ) { ?>
	<div id="contentHolder">
		<div class="container">
			<div class="row">
				<?php if ( DocfiTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $docfi_layout_class );?>">
						<main id="main" class="site-main">
							<div class="rt-sidebar-sapcer <?php echo ( DocfiTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>					
					</div>
				<?php if ( DocfiTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php get_footer(); ?>