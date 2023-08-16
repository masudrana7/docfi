<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit; ?>
<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">
	<div class="reply-item">
		<div class="reply-item-header d-flex align-items-center justify-content-between flex-wrap wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="500ms">
			<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
				<div class="reply-author-info d-flex align-items-center flex-wrap">
					<div class="avatar">
						<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => false, 'type' => 'avatar' ) ); ?>
					</div>
					<h3 class="name mb-0">
						<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => false, 'type' => 'name' ) ); ?>
					</h3>
					<div class="author_role">
						<?php
							bbp_topic_author_role( array(
								'topic_id' => get_the_ID(),
								'before'=>'',
								'after'=> '',
							));
                        ?>
					</div>
				</div>
				<div class="duration">
					<span> <?php bbp_topic_post_date(get_the_ID()); ?></span>
				</div>
			<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
		</div>
		<div class="reply-body">
			<?php do_action( 'bbp_theme_before_reply_content' ); ?>
			<?php bbp_reply_content(); ?>
			<?php do_action( 'bbp_theme_after_reply_content' ); ?>
			<?php if ( is_user_logged_in() ) : ?>
				<ul class="list-unstyled d-flex bbp-admin-links">
					<?php
					$admin_link_args = array('before' => '<li>','after' => '</li>', 'sep' => '</li><li>' );
					bbp_reply_admin_links($admin_link_args);
					?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</div>
