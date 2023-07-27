<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;

$docfi_team_position 		= get_post_meta( $post->ID, 'docfi_team_position', true );
$docfi_team_website       	= get_post_meta( $post->ID, 'docfi_team_website', true );
$docfi_team_email    		= get_post_meta( $post->ID, 'docfi_team_email', true );
$docfi_team_phone    		= get_post_meta( $post->ID, 'docfi_team_phone', true );
$docfi_team_address    	= get_post_meta( $post->ID, 'docfi_team_address', true );
$docfi_team_skill       	= get_post_meta( $post->ID, 'docfi_team_skill', true );
$docfi_team_skill_info     = get_post_meta( $post->ID, 'docfi_team_skill_info', true );
$socials        				= get_post_meta( $post->ID, 'docfi_team_socials', true );
$socials        				= array_filter( $socials );
$socials_fields 				= DocfiTheme_Helper::team_socials();

$docfi_team_contact_form 	= get_post_meta( $post->ID, 'docfi_team_contact_form', true );
$thumb_size = 'full';

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-content has-sidebar">
		<div class="row">
			<div class="col-lg-5 col-12 fixed-bar-coloum">
				<div class="team-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . DocfiTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>	
				</div>				
			</div>	
			<div class="col-lg-7 col-12">
				<div class="team-contents">
					<div class="team-heading">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if ( $docfi_team_position ) { ?>
						<h2 class="designation"><?php echo esc_html( $docfi_team_position );?></h2>
						<?php } ?>
					</div>
					<?php the_content();?>

					<!-- Team info -->
					<?php if ( DocfiTheme::$options['team_info'] && ( !empty( $docfi_team_website ) ||  !empty( $docfi_team_phone ) || !empty( $docfi_team_email ) || !empty( $docfi_team_address ) ) ) { ?>
					<div class="team-info">
						<h3><?php esc_html_e( 'Information:', 'docfi' );?></h3>
						<ul>							
							<?php if ( !empty( $docfi_team_phone ) ) { ?>	
								<li><span class="team-label"><?php esc_html_e( 'Phone', 'docfi' );?> : </span><a href="tel:<?php echo esc_html( $docfi_team_phone );?>"><?php echo esc_html( $docfi_team_phone );?></a></li>
							<?php } if ( !empty( $docfi_team_website ) ) { ?>	
								<li><span class="team-label"><?php esc_html_e( 'Website', 'docfi' );?> : </span><?php echo esc_html( $docfi_team_website );?></li>
							<?php } if ( !empty( $docfi_team_email ) ) { ?>	
								<li><span class="team-label"><?php esc_html_e( 'Email', 'docfi' );?> : </span><a href="mailto:<?php echo esc_html( $docfi_team_email );?>"><?php echo esc_html( $docfi_team_email );?></a></li>
							<?php } if ( !empty( $docfi_team_address ) ) { ?>	
								<li><span class="team-label"><?php esc_html_e( 'Address', 'docfi' );?> : </span><?php echo esc_html( $docfi_team_address );?></li>	
							<?php } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if ( !empty( $socials ) ) { ?>
					<ul class="team-social-social">
						<?php foreach ( $socials as $key => $value ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>						
					<?php } ?>
				</div>
				<!-- Team Skills -->
				<?php if ( DocfiTheme::$options['team_skill'] ) { ?>
					<?php if ( !empty( $docfi_team_skill ) ) { ?>
					<div class="rt-skill-wrap">
						<div class="rt-skills">
							<h3><?php esc_html_e( 'Professional Skills', 'docfi' );?></h3>
							<?php echo esc_html( $docfi_team_skill_info );?>
							<?php foreach ( $docfi_team_skill as $skill ): ?>
								<?php
								if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
									continue;
								}
								$skill_value = (int) $skill['skill_value'];
								$skill_style = "width:{$skill_value}%;";

								if ( !empty( $skill['skill_color'] ) ) {
									$skill_style .= "background-color:{$skill['skill_color']};";
								}
								?>
								<div class="rt-skill-each">
									<div class="rt-name"><?php echo esc_html( $skill['skill_name'] );?></div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped wow slideInLeft animated" data-wow-delay="0s" data-wow-duration="3s" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?> animation-name: slideInLeft;"> <span><?php echo esc_html( $skill_value );?>%</span></div>
									</div>								
								</div>
							<?php endforeach;?> 
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>					
		</div>
	</div>

	<?php if ( !empty( $docfi_team_contact_form ) && DocfiTheme::$options['team_contact'] ) { ?>
	<div class="team-contact-wrap"> 
		<div class="form-box">
			<h3><?php echo wp_kses( DocfiTheme::$options['team_contact_title'] , 'alltext_allow' );?></h3>
			<?php echo do_shortcode( $docfi_team_contact_form );?>
		</div>
	</div>
	<?php } ?>
	
	<?php if( DocfiTheme::$options['show_related_team'] == '1' && is_single() && !empty ( docfi_related_team() ) ) { ?>
		<?php echo docfi_related_team(); ?>
	<?php } ?>
</div>