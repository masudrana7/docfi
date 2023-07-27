<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'docfi-size2';

global $post;
$docfi_project_title 		= get_post_meta( $post->ID, 'docfi_project_title', true );
$docfi_project_text 			= get_post_meta( $post->ID, 'docfi_project_text', true );
$docfi_project_client 		= get_post_meta( $post->ID, 'docfi_project_client', true );
$docfi_project_start 		= get_post_meta( $post->ID, 'docfi_project_start', true );
$docfi_project_end 			= get_post_meta( $post->ID, 'docfi_project_end', true );
$docfi_project_web 			= get_post_meta( $post->ID, 'docfi_project_web', true );

$ratting	 	= get_post_meta( $id, 'docfi_project_rating', true );
$portfolio_rating = 5- intval( $ratting ) ;

?>
<div id="post-<?php the_ID();?>" <?php post_class( 'portfolio-single' );?>>	
	<div class="portfolio-single-content">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="portfolio-thumbnail">
					<?php if ( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail( $thumb_size );
					} ?>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="portfolio-info">
					<?php if ( !empty( $docfi_project_title ) ) { ?>
						<div class="rt-section-title style3 has-animation">
							<h2 class="entry-title"><?php echo esc_html( $docfi_project_title );?><span class="line"></span></h2>							
						</div>
					<?php } if ( !empty( $docfi_project_text ) ) { ?>
					<p><?php echo esc_html( $docfi_project_text );?></p>
					<?php } ?>
					<ul class="info-list">
						<?php if( DocfiTheme::$options['single_portfolio_cat'] ) { ?>
						<li><label><?php esc_html_e( 'Category', 'docfi' );?>: </label>
							<span class="portfolio-cat"><?php
								$i = 1;
								$term_lists = get_the_terms( get_the_ID(), 'docfi_portfolio_category' );
								if( $term_lists ) {
								foreach ( $term_lists as $term_list ){ 
								$link = get_term_link( $term_list->term_id, 'docfi_portfolio_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?>
							</span>
						</li>
						<?php } ?>
						<?php if ( !empty( $docfi_project_client ) && DocfiTheme::$options['single_portfolio_client'] ) { ?>
						<li><label><?php esc_html_e( 'Client', 'docfi' );?>: </label><?php echo esc_html( $docfi_project_client );?></li>
						<?php } if ( !empty( $docfi_project_start ) && DocfiTheme::$options['single_portfolio_startdate'] ) { ?>
						<li><label><?php esc_html_e( 'Starts On', 'docfi' );?>: </label><?php echo esc_html( $docfi_project_start );?></li>
						<?php } if ( !empty( $docfi_project_end ) && DocfiTheme::$options['single_portfolio_enddate'] ) { ?>
						<li><label><?php esc_html_e( 'Ends On', 'docfi' );?>: </label><?php echo esc_html( $docfi_project_end );?></li>
						<?php } if ( !empty( $docfi_project_web ) && DocfiTheme::$options['single_portfolio_weblink'] ) { ?>
						<li><label><?php esc_html_e( 'Web Link', 'docfi' );?>: </label><?php echo esc_html( $docfi_project_web );?></li>
						<?php } ?>

						<?php if( DocfiTheme::$options['single_portfolio_rating'] ) { ?>
						<?php if( $ratting != -1) { ?>
						<li><label><?php esc_html_e( 'Rating', 'docfi' );?>: </label>
							<ul class="rating">
								<?php for ($i=0; $i < $ratting; $i++) { ?>
									<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>			
								<?php for ($i=0; $i < $portfolio_rating; $i++) { ?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>
							</ul>
						</li>
					<?php } } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="portfolio-content">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content();?>
		</div>
	</div>	
</div>