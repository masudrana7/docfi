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
$docfi_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "docfi_team" ) || is_tax( "docfi_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}
if ( is_post_type_archive( "docfi_service" ) || is_tax( "docfi_service_category" ) ) {
		get_template_part( 'template-parts/archive', 'service' );
	return;
}
if ( is_post_type_archive( "docfi_docs" ) || is_tax( "docfi_docs_category" ) ) {
		get_template_part( 'template-parts/archive', 'portfolio' );
	return;
}

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
			<div class="<?php echo esc_attr( $docfi_layout_class );?>">
				<main id="main" class="site-main">
					<?php if( ! empty( category_description() ) ) { ?>
					<div class="rt-cat-description">
					 	<h2 class="cat-title"><?php single_cat_title(); ?></h2>
						<?php echo category_description(); ?>
					</div>
					<?php } ?>
					<div class="rt-sidebar-sapcer">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $docfi_is_post_archive && DocfiTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $docfi_is_post_archive && DocfiTheme::$options['blog_style'] == 'style2' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
						} else if ( $docfi_is_post_archive && DocfiTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="row g-4 rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( class_exists( 'Docfi_Core' ) ) {
							if ( is_tax( 'docfi_docs_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}
						?>

						<?php if( DocfiTheme::$options['blog_loadmore'] == 'loadmore' && DocfiTheme::$options['blog_style'] == 'style1' ) { ?> 
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore" class="loadMore"><?php esc_html_e( 'See More', 'docfi' ) ?>
									<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.4849 12.6409C11.9874 11.9817 13.8307 9.70675 13.8307 7.00008C13.8307 3.78008 11.2407 1.16675 7.9974 1.16675C4.10656 1.16675 2.16406 4.41008 2.16406 4.41008M2.16406 4.41008V1.75008M2.16406 4.41008H3.33656H4.75406" stroke="#15C590" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										<path opacity="0.45" d="M1.16406 7C1.16406 10.22 3.7774 12.8333 6.9974 12.8333" stroke="#15C590" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="3 3"></path>
									</svg>
								</a>
						    </div> 
						<?php } else { ?>
							<?php DocfiTheme_Helper::pagination(); ?>
						<?php } ?>  

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>
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
