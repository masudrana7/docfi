<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
		if ( have_comments() ):
		$docfi_comment_count = get_comments_number();
		$docfi_comments_text = number_format_i18n( $docfi_comment_count ) . ' ';
		if ( $docfi_comment_count > 1 && $docfi_comment_count != 0 ) {
			$docfi_comments_text .= esc_html__( 'Comments', 'docfi' );
		} else if ( $docfi_comment_count == 0 ) {
			$docfi_comments_text .= esc_html__( 'Comment', 'docfi' );
		} else {
			$docfi_comments_text .= esc_html__( 'Comment', 'docfi' );
		}
	?>
		<h3><?php echo esc_html( $docfi_comments_text );?></h3>
	<?php
		$docfi_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $docfi_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'DocfiTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'docfi' ),
					'avatar_size'       => 90,
					'format'            => 'html5',
					)
				);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'docfi' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'docfi' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'docfi' ); ?></p>
	<?php endif;?>
	<div>
	<?php
		$docfi_commenter = wp_get_current_commenter();
		$docfi_req = get_option( 'require_name_email' );
		$docfi_aria_req = ( $docfi_req ? " required" : '' );

		$docfi_fields =  array(
			'author' =>
			'<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $docfi_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'docfi' ).( $docfi_req ? ' *' : '' ).'" class="form-control"' . $docfi_aria_req . '></div></div>',

			'email' =>
			'<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $docfi_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'docfi' ).( $docfi_req ? ' *' : '' ).'"' . $docfi_aria_req . '></div></div></div>',
		);

		$docfi_args = array(
			'class_submit'      => 'submit btn-send ghost-on-hover-btn',
			'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'docfi' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h3>',
			'fields' => apply_filters( 'comment_form_default_fields', $docfi_fields ),
		);

	?>
	<?php comment_form( $docfi_args );?>
	</div>
</div>