<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="docfi-wrapper-forums bbpress-wrapper">
	<?php if ( post_password_required() ) : ?>
		<?php bbp_get_template_part( 'form', 'protected' ); ?>
	<?php else : ?>
	<div class="rt-single-topics-wrapper">
		<div class="question-title">
			<span class="rt-topics-question" title="Question"><?php echo esc_html('Q1', 'docfi'); ?></span>
			<h3 class="rt-q-title">
				<?php
				the_title();
				do_action( 'bbpc-resolved-topics' );
				?>
			</h3>
		</div>
		<div class="forum-post-content">
			<div class="content">
				<?php bbp_topic_content(); ?>
			</div>
		</div>
	</div>	
	<?php endif; ?>

	<div class="topic-details-footer d-flex flex-wrap justify-content-between align-items-center wow animate__fadeInUp animate__animated animate__animated" data-wow-duration="1200ms" data-wow-delay="800ms">
        <div class="topic-author d-flex align-items-center flex-wrap">
            <div class="avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
            </div>
            <div class="author-info">
                <h3 class="name mb-0">
                    <a href="<?php echo bbp_get_topic_author_url(); ?>">
                        <?php echo get_the_author_meta( 'display_name' ); ?>
                    </a>
                </h3>
                <div class="entry-meta">
                    <ul class="entry-meta d-flex align-items-center flex-wrap">
                        <li class="post-by d-flex align-items-center">
                            <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.7578 6.87695C15.1758 3.27344 12.0117 0.8125 8.4375 0.8125C4.83398 0.8125 1.66992 3.27344 0.0878906 6.87695C0.0292969 7.02344 0 7.22852 0 7.375C0 7.52148 0.0292969 7.75586 0.0878906 7.90234C1.66992 11.5059 4.83398 13.9375 8.4375 13.9375C12.0117 13.9375 15.1758 11.5059 16.7578 7.90234C16.8164 7.75586 16.875 7.52148 16.875 7.375C16.875 7.22852 16.8164 7.02344 16.7578 6.87695ZM8.4375 12.5312C5.50781 12.5312 2.8125 10.5684 1.40625 7.4043C2.8418 4.21094 5.50781 2.21875 8.4375 2.21875C11.3379 2.21875 14.0332 4.21094 15.4395 7.375C14.0039 10.5684 11.3379 12.5312 8.4375 12.5312ZM8.4375 3.625C6.35742 3.625 4.6875 5.32422 4.6875 7.375C4.6875 9.45508 6.35742 11.125 8.4375 11.125C10.4883 11.125 12.1875 9.45508 12.1875 7.4043C12.1875 5.32422 10.4883 3.625 8.4375 3.625ZM8.4375 9.71875C7.11914 9.71875 6.09375 8.69336 6.09375 7.375C6.09375 7.375 6.09375 7.3457 6.09375 7.31641C6.24023 7.375 6.38672 7.375 6.5625 7.375C7.58789 7.375 8.4375 6.55469 8.4375 5.5C8.4375 5.35352 8.4082 5.20703 8.34961 5.06055C8.37891 5.06055 8.4082 5.03125 8.4375 5.03125C9.72656 5.03125 10.7812 6.08594 10.7812 7.4043C10.7812 8.69336 9.72656 9.71875 8.4375 9.71875Z" fill="#6C6C6C"></path>
                            </svg>
                            <span class="para-text">
                                <?php 
                                    if( !function_exists('get_wpbbp_post_view') ) :
                                    // get bbpress topic view counter
                                    function get_wpbbp_post_view($postID){
                                    $count_key = 'post_views_count';
                                    $count = get_post_meta($postID, $count_key, true);
                                    if($count==''){
                                        delete_post_meta($postID, $count_key);
                                        add_post_meta($postID, $count_key, '0');
                                        return "0";
                                    }
                                    return $count;
                                    }
                                    function set_wpbbp_post_view($postID) {
                                        $count_key = 'post_views_count';
                                        $count = get_post_meta($postID, $count_key, true);
                                        if( $count == '' ){
                                            add_post_meta($postID, $count_key, '1');
                                        } else {
                                            $new_count = $count + 1;
                                            update_post_meta($postID, $count_key, $new_count);
                                        }
                                    }
                                    endif;
                                    if( !function_exists('add_wpbbp_topic_counter') ) :
                                    function add_wpbbp_topic_counter() {
                                    global $wp_query;
                                    $bbp = bbpress();
                                    $active_topic = $bbp->current_topic_id;
                                    set_wpbbp_post_view( $active_topic );
                                    }
                                    add_action('bbp_template_after_single_topic', 'add_wpbbp_topic_counter');
                                    endif;
                                    echo get_wpbbp_post_view( bbp_get_topic_id() ); echo esc_html(' views', 'docfi');
                                ?>
                            </span> 
                        </li>             
                        <li class="post-date d-flex align-items-center">
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.45312 2.75H8.67188V1.57812C8.67188 1.19727 8.96484 0.875 9.375 0.875C9.75586 0.875 10.0781 1.19727 10.0781 1.57812V2.75H11.25C12.2754 2.75 13.125 3.59961 13.125 4.625V14C13.125 15.0547 12.2754 15.875 11.25 15.875H1.875C0.820312 15.875 0 15.0547 0 14V4.625C0 3.59961 0.820312 2.75 1.875 2.75H3.04688V1.57812C3.04688 1.19727 3.33984 0.875 3.75 0.875C4.13086 0.875 4.45312 1.19727 4.45312 1.57812V2.75ZM1.40625 8.14062H3.75V6.5H1.40625V8.14062ZM1.40625 9.54688V11.4219H3.75V9.54688H1.40625ZM5.15625 9.54688V11.4219H7.96875V9.54688H5.15625ZM9.375 9.54688V11.4219H11.7188V9.54688H9.375ZM11.7188 6.5H9.375V8.14062H11.7188V6.5ZM11.7188 12.8281H9.375V14.4688H11.25C11.4844 14.4688 11.7188 14.2637 11.7188 14V12.8281ZM7.96875 12.8281H5.15625V14.4688H7.96875V12.8281ZM3.75 12.8281H1.40625V14C1.40625 14.2637 1.61133 14.4688 1.875 14.4688H3.75V12.8281ZM7.96875 6.5H5.15625V8.14062H7.96875V6.5Z" fill="#6C6C6C"></path>
                            </svg>
                            <span class="para-text"><?php bbp_topic_post_date( get_the_ID() ); ?></span> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="topic-details-action-meta">
            <div class="entry-meta">
                <ul class="entry-meta d-flex align-items-center">
                    <li class="post-by d-flex align-items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8514 12.6225L14.1439 14.9925C14.2189 15.615 13.5514 16.05 13.0189 15.7275L9.87641 13.86C9.53141 13.86 9.19391 13.8375 8.86391 13.7925C9.41891 13.14 9.74891 12.315 9.74891 11.4225C9.74891 9.29249 7.90391 7.56752 5.62391 7.56752C4.75391 7.56752 3.95141 7.815 3.28391 8.25C3.26141 8.0625 3.25391 7.87499 3.25391 7.67999C3.25391 4.26749 6.21641 1.5 9.87641 1.5C13.5364 1.5 16.4989 4.26749 16.4989 7.67999C16.4989 9.70499 15.4564 11.4975 13.8514 12.6225Z" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9.75 11.4226C9.75 12.3151 9.42001 13.1401 8.86501 13.7926C8.12251 14.6926 6.945 15.2701 5.625 15.2701L3.6675 16.4326C3.3375 16.6351 2.9175 16.3576 2.9625 15.9751L3.15 14.4976C2.145 13.8001 1.5 12.6826 1.5 11.4226C1.5 10.1026 2.205 8.94011 3.285 8.25011C3.9525 7.81511 4.755 7.56763 5.625 7.56763C7.905 7.56763 9.75 9.29259 9.75 11.4226Z" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <a href="<?php bbp_topic_permalink(); ?>">
                            <span class="para-text"><?php bbp_topic_reply_count(); echo esc_html(' Comments', 'docfi');
                            ?></span> 
                        </a>
                    </li>             
                    <li class="post-date d-flex align-items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.7188 4.62744C14.2187 5.66994 15.2538 7.32744 15.4638 9.23994" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M2.61914 9.2773C2.81414 7.3723 3.83414 5.7148 5.31914 4.66479" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M6.13867 15.7046C7.00867 16.1471 7.99867 16.3946 9.04117 16.3946C10.0462 16.3946 10.9912 16.1696 11.8387 15.7571" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9.04399 5.77522C10.1955 5.77522 11.129 4.84174 11.129 3.69022C11.129 2.53871 10.1955 1.60522 9.04399 1.60522C7.89247 1.60522 6.95898 2.53871 6.95898 3.69022C6.95898 4.84174 7.89247 5.77522 9.04399 5.77522Z" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M3.62016 14.9398C4.77167 14.9398 5.70516 14.0063 5.70516 12.8548C5.70516 11.7033 4.77167 10.7698 3.62016 10.7698C2.46864 10.7698 1.53516 11.7033 1.53516 12.8548C1.53516 14.0063 2.46864 14.9398 3.62016 14.9398Z" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M14.3741 14.9398C15.5256 14.9398 16.4591 14.0063 16.4591 12.8548C16.4591 11.7033 15.5256 10.7698 14.3741 10.7698C13.2225 10.7698 12.2891 11.7033 12.2891 12.8548C12.2891 14.0063 13.2225 14.9398 14.3741 14.9398Z" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="para-text">Share</span> 
                    </li>
                </ul>
            </div>
        </div>
        <div class="rt-replies-wrapper">
            <?php if ( bbp_has_replies() ) : ?>
                <?php bbp_get_template_part( 'loop', 'replies' ); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php bbp_get_template_part( 'form', 'reply' ); ?>
	<?php bbp_get_template_part( 'alert', 'topic-lock' ); ?>
	<?php do_action( 'bbp_template_after_single_topic' ); ?>
</div>
