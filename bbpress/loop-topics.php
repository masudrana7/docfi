<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_topics_loop' ); ?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="rt-tofics-info bbp-topics">
	<li class="bbp-header">
		<ul class="forum-titles">
			<li class="bbp-topic-title"><?php esc_html_e( 'Topic', 'docfi' ); ?></li>
			<li class="bbp-topic-title2 bbp-topic-replies"><?php esc_html_e( 'Replies', 'docfi' ); ?></li>
			<li class="bbp-topic-title2 bbp-topic-riews"><?php esc_html_e( 'Views', 'docfi' ); ?></li>
			<li class="bbp-topic-freshness"><?php esc_html_e( 'Activity', 'docfi' ); ?></li>
		</ul>
	</li>

	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>
</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' );
