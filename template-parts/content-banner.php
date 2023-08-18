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
elseif (is_post_type_archive('docfi_team')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Teams', 'docfi' ) );
} elseif (is_post_type_archive('docfi_docs')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Docs', 'docfi' ) );
} elseif (is_post_type_archive('docfi_service')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Services', 'docfi' ) );
} elseif ( is_archive() ) {
	$docfi_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'docfi' ) );
} elseif (is_singular('docfi_team')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Team Details', 'docfi' ) );
} elseif (is_singular('docfi_docs')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Element Details', 'docfi' ) );
} elseif (is_singular('docfi_service')) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Service Details', 'docfi' ) );
} elseif (is_single()) {
	$docfi_title  = apply_filters( 'theme_blog_title', esc_html__( 'Blog Details', 'docfi' ) );
}  else {
	$docfi_title = get_the_title();	                   
}

if ( class_exists( 'WooCommerce' ) ) {
	if (is_shop()) {
		$docfi_title = esc_html__( 'Shop Page', 'docfi' );
	} elseif(is_product_category()) {
		$category = get_queried_object();
		if ($category) {
			$docfi_title = $category->name;
		}		
	} elseif(is_product()) {
		$docfi_title = esc_html__( 'Shop Details', 'docfi' );
	} else {
		$docfi_title = $docfi_title;
	}
}
?>

<?php if ( DocfiTheme::$has_banner == 1 || DocfiTheme::$has_banner == 'on' ) { ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if (  is_singular( 'forum' ) || is_singular( 'topic' ) || bbp_is_forum_archive() ) { 
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
		<?php if ( DocfiTheme::$has_breadcrumb == 1 ) { ?>
			<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
		<?php } ?>

	</div>
<?php } ?>