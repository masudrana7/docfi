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
$iso = 'g-4 no-equal-gallery';
$template = 'docs-1';

$post_classes = "";
if (  DocfiTheme::$layout == 'right-sidebar' || DocfiTheme::$layout == 'left-sidebar' ){
	$post_classes = 'col-sm-6 col-md-6';
} else {
	$post_classes = 'col-sm-6 col-xl-4';
}
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}
$docs_post_number = DocfiTheme::$options['docs_post_number'];
$args = array(
	'posts_per_page'    => $docs_post_number,
	'post_type'			=> 'docfi_docs',
	'post_status'		=> 'publish',
	'paged'             => $paged,
);

$query = new WP_Query( $args ); ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">	
		<div class="row">
			<?php
				if ( DocfiTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $docfi_layout_class );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php get_template_part( 'template-parts/content', $template ); ?>	
				<?php else: ?>
					<?php get_template_part( 'template-parts/content', 'none' );?>
				<?php endif;?>
			</div>

			<?php
				if( DocfiTheme::$layout == 'right-sidebar' ){				
					get_sidebar();
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>