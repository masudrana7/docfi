<?php
/**
 *Template Name: User Login
 */

?>
<?php get_header('empty'); ?>
<div class="docfi-login-section text-center">
	<div class="rt-page-wrapper">
		<div class="docfi-login-wrapper">
			<div class="docfi-login-left-sidebar">
			</div>
			<div class="docfi-login-right-sidebar">
				<div class="docfi-form-inner">
					<?php if ( !is_user_logged_in() ) :
					$current_user = wp_get_current_user(); ?>
					<div class="text-center">
						<h3>Log In your Account</h3>
					</div>

					<form action="<?php echo esc_url(home_url( '/')); ?>wp-login.php" class="row docfi-login-form" method="post">
						<div class="col-lg-12 form-group">
							<label for="username" class="userlabel"> <?php esc_html_e( 'Username', 'docfi' ); ?> </label>
							<input type="text" class="username form-control" id="username" name="log" placeholder="<?php esc_attr_e('User Name', 'docfi'); ?>">
						</div>
						<div class="col-lg-12 form-group">
							<label for="pwd" class="pwlabel"> <?php esc_html_e( 'Password', 'docfi' ); ?> </label>
							<div class="docfi_password">
								<input id="pwd" name="pwd" type="password" class="password form-control" autocomplete="off" placeholder="Password">
								<a href="<?php echo esc_url(home_url( '/')) . '/wp-login.php?action=lostpassword'; ?>" class="forget_pass">
									<?php esc_html_e( 'Forgotten password?', 'docfi' ); ?>
								</a>
							</div>
						</div>
						<div class="col-lg-12">
							<button type="submit" class="btn action_btn thm_btn">
								Sign In
							</button>
						</div>
					</form>
					<div class="docfi-aaccount">
						Don’t have an account yet? <a href="#">Sign up here</a>
					</div>
					<?php else : ?>
					<div class="text-center">
						<h2 class="signup_title">
							<?php esc_html_e('Welcome ', 'docfi'); echo esc_html($current_user->display_name); 
							?>
						</h2>
						<br>
						<p> <?php esc_html_e('You are logged in', 'docfi'); ?> </p>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer('empty'); ?>