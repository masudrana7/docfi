<?php
/**
 * Template Name: Post Layout 2
 * Template Post Type: post
 * 
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

?>
<?php get_header(); ?>

<div id="primary" class="content-area post-detail-style2">
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
</div>
<?php get_footer(); ?>