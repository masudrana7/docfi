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
<div id="primary" class="content-area">
	<div class="container">


		<div class="row">
			<?php //if ( DocfiTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="col-md-3">
					<?php get_template_part('template-parts/docs-single', 'sidebarLeft' ); ?>
				</div>
				<div class="<?php //echo esc_attr( $docfi_layout_class );?> col-md-6">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'docs' );
							endwhile;						
						?>
						<?php if( DocfiTheme::$options['show_related_docs'] == '1' ) { ?>
							<div class="portfolio-related">
								<div class="container"><?php docfi_related_docs(); ?></div>
							</div>
						<?php } ?>
					</main>
				</div>
				<div class="col-md-3">

					<?php
						if (is_active_sidebar('docs-right-sidebar')) {
							dynamic_sidebar('docs-right-sidebar');
						}
					?>

				</div>
			<?php //if ( DocfiTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>


	</div>	
</div>

<?php get_footer(); ?>