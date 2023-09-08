<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}
?>
<div id="bbpress-forums" class="docfi-wrapper-forums bbpress-wrapper">
	<ul id="forums-list-0" class="rt-tofics-info bbp-topics">
		<li class="bbp-header">
			<ul class="forum-titles">
				<li class="bbp-topic-title"><?php esc_html_e( 'Topic', 'bbpress' ); ?></li>
				<li class="bbp-topic-voice-count">
					<svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.3457 10.25C7.67578 10.25 6.29883 8.90234 6.32812 7.20312C6.32812 5.5332 7.67578 4.15625 9.3457 4.15625C11.0156 4.15625 12.3926 5.5332 12.3926 7.20312C12.3926 8.90234 11.0449 10.25 9.3457 10.25ZM10.8105 11.1875C13.125 11.1875 15 12.9453 15 15.1133C15 15.5527 14.6191 15.875 14.1504 15.875H4.57031C4.10156 15.875 3.75 15.5527 3.75 15.1133C3.75 12.9453 5.5957 11.1875 7.91016 11.1875H10.8105ZM15 5.5625C13.6816 5.5625 12.6562 4.53711 12.6562 3.21875C12.6562 1.92969 13.6816 0.875 15 0.875C16.2891 0.875 17.3438 1.92969 17.3438 3.21875C17.3438 4.53711 16.2891 5.5625 15 5.5625ZM5.36133 7.20312C5.36133 8.19922 5.74219 9.10742 6.35742 9.78125H0.498047C0.205078 9.78125 0 9.54688 0 9.25391C0 7.73047 1.14258 6.5 2.57812 6.5H4.36523C4.74609 6.5 5.09766 6.58789 5.41992 6.76367C5.39062 6.91016 5.36133 7.05664 5.36133 7.20312ZM3.75 5.5625C2.43164 5.5625 1.40625 4.53711 1.40625 3.21875C1.40625 1.92969 2.43164 0.875 3.75 0.875C5.03906 0.875 6.09375 1.92969 6.09375 3.21875C6.09375 4.53711 5.03906 5.5625 3.75 5.5625ZM16.1426 6.5C17.5781 6.5 18.75 7.73047 18.75 9.25391C18.75 9.54688 18.5156 9.78125 18.2227 9.78125H12.3633C12.9785 9.10742 13.3301 8.19922 13.3301 7.20312C13.3301 7.05664 13.3008 6.91016 13.3008 6.76367C13.623 6.61719 13.9746 6.5 14.3555 6.5H16.1426Z" fill="#0289FF"></path>
					</svg>
				</li>
				<li class="bbp-topic-reply-count">
					<?php bbp_show_lead_topic()?>
					<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.09375 0.875C10.4336 0.875 13.1875 3.18945 13.1875 6.03125C13.1875 8.90234 10.4336 11.1875 7.09375 11.1875C6.53711 11.1875 6.00977 11.1289 5.48242 11.0117C4.60352 11.5684 3.31445 12.125 1.70312 12.125C1.41016 12.125 1.14648 11.9785 1.05859 11.6855C0.941406 11.4219 0.970703 11.1289 1.17578 10.8945C1.20508 10.8945 1.84961 10.1914 2.31836 9.25391C1.49805 8.375 1 7.26172 1 6.03125C1 3.18945 3.72461 0.875 7.09375 0.875ZM5.80469 9.63477C6.24414 9.75195 6.6543 9.78125 7.09375 9.78125C9.67188 9.78125 11.7812 8.11133 11.7812 6.03125C11.7812 3.98047 9.67188 2.28125 7.09375 2.28125C4.48633 2.28125 2.40625 3.98047 2.40625 6.03125C2.40625 7.08594 2.9043 7.84766 3.34375 8.28711L4.04688 9.01953L3.57812 9.92773C3.46094 10.1035 3.34375 10.3086 3.22656 10.5137C3.75391 10.3672 4.25195 10.1328 4.75 9.81055L5.24805 9.51758L5.80469 9.63477ZM13.9199 4.6543C17.1719 4.77148 19.75 7.02734 19.75 9.78125C19.75 11.0117 19.2227 12.125 18.4023 13.0039C18.8711 13.9414 19.5156 14.6445 19.5449 14.6445C19.75 14.8789 19.7793 15.1719 19.6621 15.4355C19.5742 15.7285 19.3105 15.875 19.0176 15.875C17.4062 15.875 16.1172 15.3184 15.2383 14.7617C14.7109 14.8789 14.1836 14.9375 13.6562 14.9375C11.2539 14.9375 9.17383 13.7656 8.17773 12.0664C8.67578 12.0078 9.17383 11.8906 9.61328 11.7148C10.4336 12.8281 11.9277 13.5312 13.6562 13.5312C14.0664 13.5312 14.4766 13.502 14.916 13.3848L15.4727 13.2676L15.9707 13.5605C16.4688 13.8828 16.9668 14.1172 17.4941 14.2637C17.377 14.0586 17.2598 13.8535 17.1426 13.6777L16.6738 12.7695L17.377 12.0371C17.8164 11.5977 18.3438 10.8359 18.3438 9.78125C18.3438 7.84766 16.4688 6.26562 14.0957 6.06055L14.125 6.03125C14.125 5.5625 14.0371 5.09375 13.9199 4.6543Z" fill="#0289FF"></path>
					</svg>
				</li>
				<li class="bbp-topic-freshness"><?php esc_html_e( 'Last Post', 'bbpress' ); ?></li>
			</ul>
		</li>
		<li class="bbp-body">
		<?php
		$topics = new WP_Query(array(
			'post_type' => 'topic',
			'posts_per_page' 	=> $data['number'],
			'paged' 			=> $paged,
		));
		
		$i = 0;
		while($topics->have_posts()): $topics->the_post(); ?>

			<ul id="bbp-topic-<?php bbp_topic_id(get_the_ID()); ?>" <?php bbp_topic_class(get_the_ID()); ?>>
				<li class="bbp-topic-title">
					<div class="rt-topices-title">
						<h5 class="rt-title">
							<a href="<?php the_permalink(); ?>">
							<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.17275 7.54636L9.10111 5.24823L10.0391 6.03532L10.8105 5.11606L5.18239 0.393543L4.41104 1.3128L5.34905 2.09988L3.42069 4.39802C2.78048 5.161 1.6352 5.24955 0.856653 4.59627L0.0853085 5.51552L2.88528 7.86497L0.185571 11.0824L0.268906 11.9355L1.12358 11.8694L3.82329 8.65206L6.6514 11.0251L7.42275 10.1059C6.6442 9.45259 6.53253 8.30934 7.17275 7.54636Z" fill="#0289FF"></path>
							</svg> 
							<?php the_title(); ?> </a>
						</h5>
						<div class="user-meta">
							<span class="author"><?php printf( esc_html__( '%1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>
							<span class="topics-meta"><?php echo esc_html__('In:', 'docfi'); ?>
								<a href="<?php bbp_forum_permalink(bbp_get_topic_forum_id(get_the_ID())); ?>">
										<?php bbp_forum_title(bbp_get_topic_forum_id(get_the_ID())); ?>
									</a>
							</span>
						</div>
					</div>
				</li>
				<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(get_the_ID()); ?></li>

				<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic(get_the_ID()) ? bbp_topic_reply_count(get_the_ID()) : bbp_topic_post_count(get_the_ID()); ?></li>
				<li class="bbp-topic-freshness">
					<?php echo bbp_get_forum_last_active_time(bbp_get_topic_forum_id(get_the_ID())) ?>
					<p class="bbp-topic-meta">
						<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>
						<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(get_the_ID()), 'size' => 14 ) ); ?></span>
						<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>
					</p>
				</li>
			</ul>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</li>
	</ul>
	<?php DocfiTheme_Helper::pagination( $topics  ); ?>
	
</div>