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

?>
<?php get_header(); ?>
<div id="primary" class="content-area docfi-dosc-single">
	<div class="container">
		<div class="row">

			<?php //if ( DocfiTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<?php if (is_active_sidebar('docs-left-sidebar')) { ?>			
				<div class="col-lg-3 col-md-5 docfi-column-sticky">
					<?php dynamic_sidebar('docs-left-sidebar'); ?>
				</div>
			<?php } ?>

			<div class="<?php //echo esc_attr( $docfi_layout_class );?> col-lg-6 col-md-7 docfi-column-sticky">
				<main id="main" class="site-main">
					<?php							
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-single', 'docs' );
						endwhile;						
					?>
				</main>
			</div>

			<?php if (is_active_sidebar('docs-right-sidebar')) { ?>			
				<div class="col-lg-3 docfi-column-sticky-min-1024">
					<div class="rt-right-docs-content">
						<?php dynamic_sidebar('docs-right-sidebar'); ?>
					</div>
				</div>
			<?php } ?>

			<?php //if ( DocfiTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>	
</div>

<?php get_footer(); ?>