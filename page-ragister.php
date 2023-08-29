<?php
/**
 *Template Name: Register Page
 */

	get_header('empty');
	if( !empty( DocfiTheme::$options['register_logo'] ) ) {
		$register_logo = wp_get_attachment_image_src( DocfiTheme::$options['register_logo'], 'full', true );
		$logo_image = '<img src="'.$register_logo[0].'" alt="">';
	}else {
		$logo_image =  '<img src="'.DOCFI_ASSETS_URL.'img/light-logo.svg" alt="Logo" />';
	}

	if( !empty( DocfiTheme::$options['rg_left_bgimage'] ) ) {
		$rg_left_bgimage = wp_get_attachment_image_src( DocfiTheme::$options['rg_left_bgimage'], 'full', true );
		$bg_img = $rg_left_bgimage[0];
	}else {
		$bg_img = DOCFI_ASSETS_URL . 'img/left-bg.png';
	} 
?>
<div class="docfi-register-section docfi-login-section">
	<div class="rt-page-wrapper">
		<div class="docfi-login-wrapper">
			<div class="docfi-login-left-sidebar" style="background-image:url(<?php echo esc_url( $bg_img ); ?>);">
				<div class="rt-left-sidebar-inner">
					<div class="rt-sidebar-logo">

						<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>">
							<?php echo wp_kses( $logo_image, 'allow_link' ); ?>
						</a>
						<?php if (!empty(DocfiTheme::$options['register_title'])) { ?>
							<h2><?php echo esc_html( DocfiTheme::$options['register_title'] ); ?></h2>
						<?php } ?>
						<?php if (!empty(DocfiTheme::$options['register_description'])) { ?>	
							<div class="desc"><?php echo esc_html( DocfiTheme::$options['register_description'] ); ?></div>
						<?php } ?>

					</div>
				</div>
			</div>
			<div class="docfi-login-right-sidebar">
				<div class="docfi-form-inner">
					<?php if ( !is_user_logged_in() ) :
					$current_user = wp_get_current_user(); ?>
					<?php if (!empty(DocfiTheme::$options['rg_right_title'])) { ?>
						<h2 class="rt-form-title"><?php echo esc_html( DocfiTheme::$options['rg_right_title'] ); ?></h2>	
					<?php } ?>
					<?php
						if(class_exists('bbpress')){
							echo do_shortcode( '[bbp-register]' );
						}
					?>
					<?php if (!empty(DocfiTheme::$options['rg_sign_up_text'])) { ?>
						<div class="docfi-aaccount">
							<?php echo wp_kses( DocfiTheme::$options['rg_sign_up_text'],  'allow_link' ); ?>
						</div>
					<?php } ?>
					<?php else : ?>
					<div class="text-center">
						<h2 class="signup_title">
							<?php esc_html_e('Welcome ', 'docfi'); echo esc_html($current_user->display_name); ?>
						</h2>
						<p> <?php esc_html_e('You are logged in', 'docfi'); ?> </p>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer('empty'); ?>