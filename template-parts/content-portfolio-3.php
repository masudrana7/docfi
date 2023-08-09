<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'docfi-size6';
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), DocfiTheme::$options['docs_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="docs-item">
		<div class="docs-figure">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size, ['class' => 'img-fluid'] );
					} else {
						if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );
						} else {
							echo '<img class="wp-post-image" src="' . DocfiTheme_Helper::get_img( 'noimage_450X626.jpg' ) . '" alt="'.get_the_title().'" loading="lazy" >';
						}
					}
				?>
			</a>
		</div>
		<div class="docs-content">
			<div class="content-info">
				<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<?php if ( DocfiTheme::$options['docs_ar_category'] ) { ?>
				<span class="docs-cat"><?php
					$i = 1;
					$term_lists = get_the_terms( get_the_ID(), 'docfi_docs_category' );
					if( $term_lists ) {
					foreach ( $term_lists as $term_list ){ 
					$link = get_term_link( $term_list->term_id, 'docfi_docs_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?>
				</span>
				<?php } ?>
				<?php if ( DocfiTheme::$options['docs_ar_excerpt'] ) { ?>
					<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
				<?php } ?>
			</div>
			<?php if ( DocfiTheme::$options['docs_ar_action'] ) { ?>
			<div class="content-action">
				<a href="<?php the_permalink();?>"><i class="icon-docfi-right-arrow"></i></a>
			</div>
			<?php } ?>
		</div>
	</div>
</article>