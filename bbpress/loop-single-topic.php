<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	<li class="bbp-topic-title">
		<div class="rt-topices-title">
			<h5 class="rt-title">
				<a href="<?php bbp_topic_permalink(); ?>">
				<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M7.17275 7.54636L9.10111 5.24823L10.0391 6.03532L10.8105 5.11606L5.18239 0.393543L4.41104 1.3128L5.34905 2.09988L3.42069 4.39802C2.78048 5.161 1.6352 5.24955 0.856653 4.59627L0.0853085 5.51552L2.88528 7.86497L0.185571 11.0824L0.268906 11.9355L1.12358 11.8694L3.82329 8.65206L6.6514 11.0251L7.42275 10.1059C6.6442 9.45259 6.53253 8.30934 7.17275 7.54636Z" fill="#0289FF"></path>
				</svg> 
				<?php bbp_topic_title(); ?> </a>
			</h5>
			<div class="user-meta">
				<span class="author"><?php printf( esc_html__( '%1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>
				<span class="topics-meta"><?php echo esc_html__('In:', 'docfi'); ?>
					<a href="<?php bbp_forum_permalink(bbp_get_topic_forum_id()); ?>">
                            <?php bbp_forum_title(bbp_get_topic_forum_id()); ?>
                        </a>
				</span>
			</div>
		</div>
	</li>
	<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li>
	<li class="bbp-topic-reply-count"><?php bbp_topic_reply_count(); ?></li>
	<li class="bbp-topic-freshness">
		<?php echo bbp_get_forum_last_active_time(bbp_get_topic_forum_id()) ?>
		<p class="bbp-topic-meta">
			<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>
			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>
			<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>
		</p>
	</li>
</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
