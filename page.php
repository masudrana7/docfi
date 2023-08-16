<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( DocfiTheme::$layout == 'full-width' ) {
	$docfi_layout_class = 'col-sm-12 col-12';
} else {
	$docfi_layout_class = DocfiTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row rt-page-wrapper">
			<?php
			//if ( DocfiTheme::$layout == 'left-sidebar' ) {
				//get_sidebar();
			//}
			?>
			<?php if (is_active_sidebar('forum-sidebar')) { ?>			
				<div class="col-md-4 docfi-column-sticky">
					<div class="rt-forum-widget-wrapper">
						<?php dynamic_sidebar('forum-sidebar'); ?>
					</div>
				</div>
			<?php } ?>
			<div class="<?php //echo esc_attr( $docfi_layout_class );?> col-md-8 docfi-column-sticky">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>					
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php
			//if( DocfiTheme::$layout == 'right-sidebar' ){				
				//get_sidebar();
			//}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>