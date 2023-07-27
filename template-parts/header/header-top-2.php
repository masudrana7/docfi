<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$docfi_socials = DocfiTheme_Helper::socials();
$container = ( DocfiTheme::$header_style == 6 ) ? 'container-custom' : 'container';
?>
<div id="tophead" class="header-top-bar">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="top-bar-wrap">
			<div class="topbar-left">
				<ul class="top-address">
					<li><i class="icon-docfi-location"></i><?php echo wp_kses( DocfiTheme::$options['address'] , 'alltext_allow' );?></li>
				</ul>
			</div>
			<div class="tophead-right">							
				<?php if ( $docfi_socials ) { ?>					
					<ul class="tophead-social">
						<?php foreach ( $docfi_socials as $docfi_social ): ?>
							<li><a target="_blank" aria-label="Social Link" href="<?php echo esc_url( $docfi_social['url'] );?>"><i class="fab <?php echo esc_attr( $docfi_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>