<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$docfi_title = "Error Page";
}
elseif ( is_search() ) {
	$docfi_title = esc_html__( 'Search Results for : ', 'docfi' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$docfi_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$docfi_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'docfi' ) );
	}
}
elseif (is_post_type_archive('docfi_docs')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Documentation', 'docfi' ) );
} elseif ( is_archive() ) {
	$docfi_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'docfi' ) );
} elseif (is_singular('docfi_docs')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Element Details', 'docfi' ) );
} elseif (is_single()) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Blog Details', 'docfi' ) );
}  else {
	$docfi_title = get_the_title();	                   
}
$class_width = ( DocfiTheme::$header_width === "on" || DocfiTheme::$header_width === 1 ) ? "container-fluid" : "container"; 

$search_ajax = get_post_meta( get_the_ID(), 'docfi_layout_settings', true );

if ( DocfiTheme::$has_banner == 1 || DocfiTheme::$has_banner == 'on' || class_exists('bbPress') ) { ?>
	<div class="entry-banner">
		<div class="<?php echo esc_attr($class_width); ?>">
			<div class="entry-banner-content">
<?php if (( function_exists('bbpress') && (is_singular('forum') || is_singular( 'topic' ) || is_singular( 'docfi_docs' ) || bbp_is_forum_archive() )) || is_singular('docfi_docs') || (isset($search_ajax['docfi_search_ajax']) && $search_ajax['docfi_search_ajax'] == 'on') ) { 
						get_template_part( 'template-parts/banner', 'search' ); 
					} elseif (is_single()) { ?>
					<h1 class="entry-title wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms"><?php echo wp_kses( $docfi_title , 'alltext_allow' );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms"><?php echo wp_kses( $docfi_title , 'alltext_allow' );?></h1>
				<?php } else { ?>
					<h1 class="entry-title wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms"><?php echo wp_kses( $docfi_title , 'alltext_allow' );?></h1>
				<?php } ?>	

			</div>
		</div>
		<?php if ( DocfiTheme::$has_breadcrumb != 0 ) { ?>
			<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
		<?php } ?>
	</div>
<?php } ?>