<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$docfi_socials = DocfiTheme_Helper::socials();

$docfi_mobile_meta  = ( DocfiTheme::$options['mobile_date'] || DocfiTheme::$options['mobile_address'] || DocfiTheme::$options['mobile_opening'] || DocfiTheme::$options['mobile_phone'] || DocfiTheme::$options['mobile_email'] || DocfiTheme::$options['mobile_button'] || DocfiTheme::$options['mobile_social'] && $docfi_socials ) ? true : false;

?>
<?php if ( $docfi_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="mobile-top">
		<ul class="mobile-address">
			<?php if ( DocfiTheme::$options['mobile_date'] ) { ?>
			<li><i class="icon-docfi-calendar"></i><?php echo date_i18n( get_option('date_format') ); ?></li>
			<?php } if ( DocfiTheme::$options['mobile_address'] ) { ?>
			<li><i class="icon-docfi-location"></i><?php echo wp_kses( DocfiTheme::$options['address'] , 'alltext_allow' );?></li>
			<?php } if ( DocfiTheme::$options['mobile_opening'] ) { ?>
			<li><i class="icon-docfi-time"></i><span class="opening-label"><?php echo wp_kses( DocfiTheme::$options['opening_label'] , 'alltext_allow' );?></span> <?php echo wp_kses( DocfiTheme::$options['opening'] , 'alltext_allow' );?></li>
			<?php } if ( DocfiTheme::$options['mobile_phone'] ) { ?>
			<li><i class="icon-docfi-phone"></i><a href="tel:<?php echo esc_attr( DocfiTheme::$options['phone'] );?>"><?php echo wp_kses( DocfiTheme::$options['phone'] , 'alltext_allow' );?></a></li>
			<?php } if ( DocfiTheme::$options['mobile_email'] ) { ?>
			<li><i class="icon-docfi-message"></i><a href="mailto:<?php echo esc_attr( DocfiTheme::$options['email'] );?>"><?php echo wp_kses( DocfiTheme::$options['email'] , 'alltext_allow' );?></a></li>
			<?php } ?>
		</ul>

		<?php if ( DocfiTheme::$options['mobile_social'] && $docfi_socials ) { ?>
			<ul class="mobile-social">
				<?php foreach ( $docfi_socials as $docfi_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $docfi_social['url'] );?>"><i class="fab <?php echo esc_attr( $docfi_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>

		<?php if ( DocfiTheme::$options['mobile_button'] ) { ?>
			<?php get_template_part( 'template-parts/header/icon', 'button' );?>
		<?php } ?>

	</div>
</div>
<?php } ?>