<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'docfi-size2';

global $post;
$docfi_project_title 		= get_post_meta( $post->ID, 'docfi_project_title', true );
$docfi_project_text 		= get_post_meta( $post->ID, 'docfi_project_text', true );
$docfi_project_client 		= get_post_meta( $post->ID, 'docfi_project_client', true );
$docfi_project_start 		= get_post_meta( $post->ID, 'docfi_project_start', true );
$docfi_project_end 			= get_post_meta( $post->ID, 'docfi_project_end', true );
$docfi_project_web 			= get_post_meta( $post->ID, 'docfi_project_web', true );

$ratting	 	= get_post_meta( $id, 'docfi_project_rating', true );
$docs_rating = 5- intval( $ratting ) ;
$post_id = get_the_ID();
$count_key = 'post_views_count';
$count = get_post_meta($post_id, $count_key, true);
$published_date = get_the_date('Y-m-d H:i');
?>
<div id="rt-post-<?php the_ID();?>" <?php post_class( 'docs-single' );?>>	
	<div class="docs-single-content rt-docs-single-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="rt-single-docs-meta head-title-area d-flex flex-wrap">
					<div class="icon">
						<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M52.5 17.502V42.5019C52.5 50.0019 48.75 55.0019 40 55.0019H20C11.25 55.0019 7.5 50.0019 7.5 42.5019V17.502C7.5 10.002 11.25 5.00195 20 5.00195H40C48.75 5.00195 52.5 10.002 52.5 17.502Z" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M36.248 11.25V16.25C36.248 19 38.498 21.25 41.248 21.25H46.248" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M20.002 32.498H30.002" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
							<path d="M20.002 42.502H40.0019" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
					</div>
					<div class="head-title-text-wrapper">
						<h2 class="head-title"><?php the_title(); ?></h2>
						<ul class="meta-list d-flex align-items-center flex-wrap">
							<li>
								<span>
									<svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M16.7578 6.87695C15.1758 3.27344 12.0117 0.8125 8.4375 0.8125C4.83398 0.8125 1.66992 3.27344 0.0878906 6.87695C0.0292969 7.02344 0 7.22852 0 7.375C0 7.52148 0.0292969 7.75586 0.0878906 7.90234C1.66992 11.5059 4.83398 13.9375 8.4375 13.9375C12.0117 13.9375 15.1758 11.5059 16.7578 7.90234C16.8164 7.75586 16.875 7.52148 16.875 7.375C16.875 7.22852 16.8164 7.02344 16.7578 6.87695ZM8.4375 12.5312C5.50781 12.5312 2.8125 10.5684 1.40625 7.4043C2.8418 4.21094 5.50781 2.21875 8.4375 2.21875C11.3379 2.21875 14.0332 4.21094 15.4395 7.375C14.0039 10.5684 11.3379 12.5312 8.4375 12.5312ZM8.4375 3.625C6.35742 3.625 4.6875 5.32422 4.6875 7.375C4.6875 9.45508 6.35742 11.125 8.4375 11.125C10.4883 11.125 12.1875 9.45508 12.1875 7.4043C12.1875 5.32422 10.4883 3.625 8.4375 3.625ZM8.4375 9.71875C7.11914 9.71875 6.09375 8.69336 6.09375 7.375C6.09375 7.375 6.09375 7.3457 6.09375 7.31641C6.24023 7.375 6.38672 7.375 6.5625 7.375C7.58789 7.375 8.4375 6.55469 8.4375 5.5C8.4375 5.35352 8.4082 5.20703 8.34961 5.06055C8.37891 5.06055 8.4082 5.03125 8.4375 5.03125C9.72656 5.03125 10.7812 6.08594 10.7812 7.4043C10.7812 8.69336 9.72656 9.71875 8.4375 9.71875Z" fill="#6C6C6C"></path>
									</svg>
									<?php echo esc_attr($count) . esc_attr('views', 'docfi');?>
								</span>
							</li>
							<?php if ( DocfiTheme::$options['post_date'] ) { ?>	
							<li>
								<span>
									<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M4.45312 2.75H8.67188V1.57812C8.67188 1.19727 8.96484 0.875 9.375 0.875C9.75586 0.875 10.0781 1.19727 10.0781 1.57812V2.75H11.25C12.2754 2.75 13.125 3.59961 13.125 4.625V14C13.125 15.0547 12.2754 15.875 11.25 15.875H1.875C0.820312 15.875 0 15.0547 0 14V4.625C0 3.59961 0.820312 2.75 1.875 2.75H3.04688V1.57812C3.04688 1.19727 3.33984 0.875 3.75 0.875C4.13086 0.875 4.45312 1.19727 4.45312 1.57812V2.75ZM1.40625 8.14062H3.75V6.5H1.40625V8.14062ZM1.40625 9.54688V11.4219H3.75V9.54688H1.40625ZM5.15625 9.54688V11.4219H7.96875V9.54688H5.15625ZM9.375 9.54688V11.4219H11.7188V9.54688H9.375ZM11.7188 6.5H9.375V8.14062H11.7188V6.5ZM11.7188 12.8281H9.375V14.4688H11.25C11.4844 14.4688 11.7188 14.2637 11.7188 14V12.8281ZM7.96875 12.8281H5.15625V14.4688H7.96875V12.8281ZM3.75 12.8281H1.40625V14C1.40625 14.2637 1.61133 14.4688 1.875 14.4688H3.75V12.8281ZM7.96875 6.5H5.15625V8.14062H7.96875V6.5Z" fill="#6C6C6C"></path>
									</svg>
									<?php echo get_the_date(); ?>
								</span>
							</li>
							<?php } ?>
							<?php if ( DocfiTheme::$options['post_author_name'] ) { ?>
							<li>
								<span>
									<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7.96875 9.78125C10.8105 9.78125 13.125 12.0957 13.125 14.9375C13.125 15.4648 12.6855 15.875 12.1875 15.875H0.9375C0.410156 15.875 0 15.4648 0 14.9375C0 12.0957 2.28516 9.78125 5.15625 9.78125H7.96875ZM1.40625 14.4688H11.6895C11.4551 12.623 9.87305 11.1875 7.96875 11.1875H5.15625C3.22266 11.1875 1.64062 12.623 1.40625 14.4688ZM6.5625 8.375C4.48242 8.375 2.8125 6.70508 2.8125 4.625C2.8125 2.57422 4.48242 0.875 6.5625 0.875C8.61328 0.875 10.3125 2.57422 10.3125 4.625C10.3125 6.70508 8.61328 8.375 6.5625 8.375ZM6.5625 2.28125C5.24414 2.28125 4.21875 3.33594 4.21875 4.625C4.21875 5.94336 5.24414 6.96875 6.5625 6.96875C7.85156 6.96875 8.90625 5.94336 8.90625 4.625C8.90625 3.33594 7.85156 2.28125 6.5625 2.28125Z" fill="#6C6C6C"></path>
									</svg>
									<?php the_author_posts_link(); ?>
								</span>
							</li>
							<?php } ?>
						</ul>
						<div class="rt-printer">
							<button class="print-button" onclick="printPage()">
							<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.5742 10.2082H24.4284V7.2915C24.4284 4.37484 23.3346 2.9165 20.0534 2.9165H14.9492C11.668 2.9165 10.5742 4.37484 10.5742 7.2915V10.2082Z" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M23.3346 21.875V27.7083C23.3346 30.625 21.8763 32.0833 18.9596 32.0833H16.043C13.1263 32.0833 11.668 30.625 11.668 27.7083V21.875H23.3346Z" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M30.625 14.5835V21.8752C30.625 24.7918 29.1667 26.2502 26.25 26.2502H23.3333V21.8752H11.6667V26.2502H8.75C5.83333 26.2502 4.375 24.7918 4.375 21.8752V14.5835C4.375 11.6668 5.83333 10.2085 8.75 10.2085H26.25C29.1667 10.2085 30.625 11.6668 30.625 14.5835Z" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M24.7904 21.875H23.0258H10.207" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M10.207 16.0415H14.582" stroke="#1D2746" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="docs-thumbnail">
					<?php if ( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail( $thumb_size );
					} ?>
				</div>
			</div>
		</div>
		<div class="docs-content">
			<?php the_content();?>
		</div>
	</div>	
</div>