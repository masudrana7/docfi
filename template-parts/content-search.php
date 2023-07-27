<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), DocfiTheme::$options['search_excerpt_length'], '' );

$docfi_has_entry_meta  = ( DocfiTheme::$options['blog_author_name'] || DocfiTheme::$options['blog_date'] || DocfiTheme::$options['blog_cats'] ) ? true : false;

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1' ); ?>>
	<div class="blog-box">		
		<div class="entry-content">
			<?php if ( $docfi_has_entry_meta ) { ?>
			<ul class="entry-meta">
				<?php if ( DocfiTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="icon-docfi-user"></i><?php esc_html_e( 'by ', 'docfi' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( DocfiTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="icon-docfi-calendar"></i><?php echo get_the_date(); ?></li>
				<?php } if ( DocfiTheme::$options['blog_cats'] && has_category() ) { ?>
				<li class="entry-categories"><i class="icon-docfi-tags"></i><?php echo the_category( ', ' );?></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( DocfiTheme::$options['blog_content'] ) { ?>
			<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>
		</div>
	</div>
</div>