<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
	<li class="bbp-forum-info rt-title-inner">
		<?php if ( has_post_thumbnail(get_the_ID()) ) : ?>
            <div class="rt-author-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
		
		<div class="rt-forum-title">
			<?php do_action( 'bbp_theme_before_forum_title' ); ?>
			<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
			<?php do_action( 'bbp_theme_after_forum_title' ); ?>
			<?php do_action( 'bbp_theme_before_forum_description' ); ?>
			<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>
			<?php do_action( 'bbp_theme_after_forum_description' ); ?>
			<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>
			<?php bbp_list_forums(); ?>
			<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>
			<?php bbp_forum_row_actions(); ?>
		</div>
	</li>
	<li class="bbp-forum-topic-count"><?php bbp_forum_topic_count(); ?></li>
	<li class="bbp-forum-reply-count"><?php bbp_forum_reply_count(); ?></li>
	<li class="bbp-forum-freshness">
		<div class="rt-bbp-forum-author">
			<?php if(bbp_get_forum_last_active_id()){?>
			<div class="rt-forum-image">
				<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 100, 'type' => 'avatar' ) ); ?>
			</div>
			<?php } ?>

			<div class="rt-forum-content">
				<?php do_action( 'bbp_theme_before_topic_author' ); ?>
				<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'type' => 'name' ) ); ?>
				<?php do_action( 'bbp_theme_after_topic_author' ); ?>
				<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>
				<?php bbp_forum_freshness_link(); ?>
				<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>
			</div>
		</div>
	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
