<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';?>
<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments', $comment ); ?>>
<div id="respond-<?php comment_ID(); ?>" class="each-comment">
	<?php if ( get_option( 'show_avatars' ) ): ?>
		<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?> imgholder">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
		</div>
	<?php endif; ?>
	<div class="media-body comments-body">

		<div class="comment-meta">
			<div class="comment-author-name">
	
				<h4><?php echo get_comment_author_link( $comment );?></h4> 

					<?php printf( esc_html__( '%1$s', 'docfi' ), get_comment_date( '', $comment ) );
					
				?>
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'docfi' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>

			</div>			
		</div>


		<div class="comment-text">
			
			<?php
			comment_reply_link( array_merge( $args, array(
				'add_below' => 'respond',
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="replay-area"> ',
				'after'     => '<svg width="15" height="14" viewBox="0 0 15 14" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.7539 5.95703L8.94141 10.0859C8.53125 10.4414 7.875 10.1406 7.875 9.59375V7.21484C3.60938 7.26953 1.80469 8.30859 3.03516 12.2734C3.17188 12.7109 2.625 13.0664 2.26953 12.793C1.06641 11.918 0 10.25 0 8.58203C0 4.42578 3.47266 3.52344 7.875 3.46875V1.30859C7.875 0.734375 8.53125 0.433594 8.94141 0.789062L13.7539 4.91797C14.0547 5.21875 14.0547 5.68359 13.7539 5.95703Z" fill=""></path>
                                                    </svg></div>'
				) ) );
			?>
		</div>	

	</div>
	<div class="clear"></div>
</div>