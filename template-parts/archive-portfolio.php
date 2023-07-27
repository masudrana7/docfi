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

$iso						= 'g-4 no-equal-gallery';

if ( DocfiTheme::$options['portfolio_archive_style'] == 'style1' ){
	$portfolio_archive_layout 	= "rt-portfolio-default rt-portfolio-multi-layout-1";
	$template 				 	= 'portfolio-1';
}elseif( DocfiTheme::$options['portfolio_archive_style'] == 'style2' ){
	$portfolio_archive_layout 	= "rt-portfolio-default rt-portfolio-multi-layout-2";
	$template 				 	= 'portfolio-2';
}elseif( DocfiTheme::$options['portfolio_archive_style'] == 'style3' ){
	$portfolio_archive_layout 	= "rt-portfolio-default rt-portfolio-multi-layout-3";
	$template 				 	= 'portfolio-3';
}else{
	$portfolio_archive_layout 	= "rt-portfolio-default rt-portfolio-multi-layout-1";
	$template 				 	= 'portfolio-1';
}

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

$portfolio_post_number = DocfiTheme::$options['portfolio_post_number'];
$args = array(
	'posts_per_page'    => $portfolio_post_number,
	'post_type'			=> 'docfi_portfolio',
	'post_status'		=> 'publish',
	'paged'             => $paged,
);

$query = new WP_Query( $args );

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">	
		<div class="row">
			<?php
				if ( DocfiTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $portfolio_archive_layout );?> <?php echo esc_attr( $docfi_layout_class );?>">
				<main id="main" class="site-main">	
					<?php if ( $query->have_posts() ) :?>
						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<div class="<?php echo esc_attr( $post_classes );?>">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php DocfiTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
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