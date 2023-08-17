<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
do_action( 'bbp_template_before_forums_loop' ); ?>
<ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">
	<li class="bbp-header">
		<ul class="forum-titles">
			<li class="bbp-forum-info"><?php esc_html_e( 'Forum', 'bbpress' ); ?></li>
			<li class="bbp-forum-topic-count">
				<svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.6934 3.62891C11.0449 3.98047 11.25 4.44922 11.25 4.94727V14C11.25 15.0547 10.4004 15.875 9.375 15.875H1.875C0.820312 15.875 0 15.0547 0 14V2.75C0 1.72461 0.820312 0.875 1.875 0.875H7.17773C7.67578 0.875 8.14453 1.08008 8.49609 1.43164L10.6934 3.62891ZM9.84375 14H9.81445V5.5625H7.5C6.97266 5.5625 6.5625 5.15234 6.5625 4.625V2.31055H1.875C1.61133 2.31055 1.40625 2.51562 1.40625 2.7793V14C1.40625 14.2637 1.61133 14.4688 1.875 14.4688H9.375C9.60938 14.4688 9.84375 14.2637 9.84375 14ZM2.8125 9.07812C2.8125 8.69727 3.10547 8.375 3.51562 8.375H7.73438C8.11523 8.375 8.4375 8.69727 8.4375 9.07812C8.4375 9.48828 8.11523 9.78125 7.73438 9.78125H3.51562C3.10547 9.78125 2.8125 9.48828 2.8125 9.07812ZM7.73438 11.1875C8.11523 11.1875 8.4375 11.5098 8.4375 11.8906C8.4375 12.3008 8.11523 12.5938 7.73438 12.5938H3.51562C3.10547 12.5938 2.8125 12.3008 2.8125 11.8906C2.8125 11.5098 3.10547 11.1875 3.51562 11.1875H7.73438Z" fill="#0289FF"/>
				</svg>
			</li>
			<li class="bbp-forum-reply-count">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.9277 1.60742C11.748 0.787109 13.0664 0.787109 13.8867 1.60742L14.2676 1.98828C15.0879 2.80859 15.0879 4.12695 14.2676 4.94727L8.4668 10.748C8.23242 10.9824 7.91016 11.1875 7.55859 11.2754L4.62891 12.125C4.39453 12.1836 4.13086 12.125 3.95508 11.9199C3.75 11.7441 3.69141 11.4805 3.75 11.2461L4.59961 8.31641C4.6875 7.96484 4.89258 7.64258 5.12695 7.4082L10.9277 1.60742ZM12.8906 2.60352C12.627 2.33984 12.1875 2.33984 11.9238 2.60352L11.0449 3.45312L12.4219 4.83008L13.2715 3.95117C13.5352 3.6875 13.5352 3.24805 13.2715 2.98438L12.8906 2.60352ZM5.94727 8.69727L5.44922 10.4258L7.17773 9.92773C7.29492 9.89844 7.38281 9.83984 7.4707 9.75195L11.4258 5.79688L10.0781 4.44922L6.12305 8.4043C6.03516 8.49219 5.97656 8.58008 5.94727 8.69727ZM5.85938 2.75C6.24023 2.75 6.5625 3.07227 6.5625 3.45312C6.5625 3.86328 6.24023 4.15625 5.85938 4.15625H2.57812C1.9043 4.15625 1.40625 4.68359 1.40625 5.32812V13.2969C1.40625 13.9707 1.9043 14.4688 2.57812 14.4688H10.5469C11.1914 14.4688 11.7188 13.9707 11.7188 13.2969V10.0156C11.7188 9.63477 12.0117 9.3125 12.4219 9.3125C12.8027 9.3125 13.125 9.63477 13.125 10.0156V13.2969C13.125 14.7324 11.9531 15.875 10.5469 15.875H2.57812C1.14258 15.875 0 14.7324 0 13.2969V5.32812C0 3.92188 1.14258 2.75 2.57812 2.75H5.85938Z" fill="#0289FF"/>
				</svg>
			</li>
			<li class="bbp-forum-freshness">
				<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7.96875 9.78125C10.8105 9.78125 13.125 12.0957 13.125 14.9375C13.125 15.4648 12.6855 15.875 12.1875 15.875H0.9375C0.410156 15.875 0 15.4648 0 14.9375C0 12.0957 2.28516 9.78125 5.15625 9.78125H7.96875ZM1.40625 14.4688H11.6895C11.4551 12.623 9.87305 11.1875 7.96875 11.1875H5.15625C3.22266 11.1875 1.64062 12.623 1.40625 14.4688ZM6.5625 8.375C4.48242 8.375 2.8125 6.70508 2.8125 4.625C2.8125 2.57422 4.48242 0.875 6.5625 0.875C8.61328 0.875 10.3125 2.57422 10.3125 4.625C10.3125 6.70508 8.61328 8.375 6.5625 8.375ZM6.5625 2.28125C5.24414 2.28125 4.21875 3.33594 4.21875 4.625C4.21875 5.94336 5.24414 6.96875 6.5625 6.96875C7.85156 6.96875 8.90625 5.94336 8.90625 4.625C8.90625 3.33594 7.85156 2.28125 6.5625 2.28125Z" fill="#0289FF"/>
				</svg>
			</li>
		</ul>
	</li><!-- .bbp-header -->
	<li class="bbp-body">
		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>
			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>
		<?php endwhile; ?>
	</li><!-- .bbp-body -->
</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' );
