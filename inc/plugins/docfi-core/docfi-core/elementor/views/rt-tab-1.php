<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Icons_Manager;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;
extract($data);
?>
<div class="rt-normal-tab-wrapper rt-tab-style">
	<ul class="nav nav-pills" id="pills-tab" role="tablist">
		<?php $i = 1;
			foreach ( $data['tab_items'] as $tab_item_list ) { ?>
			<li class="nav-item" role="presentation">
				<button class="nav-link <?php if ( $i == 1 ) { ?>active<?php } ?>" id="v-pills-<?php echo esc_html( $i ); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo esc_html( $i ); ?>" type="button" role="tab" aria-controls="v-pills-<?php echo esc_html( $i ); ?>" aria-selected="true">
				<?php echo wp_kses_post( $tab_item_list['title'] ); ?></button>
			</li>
		<?php $i++; } ?>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<?php $i = 1;
		foreach ( $data['tab_items'] as $tab_item_list ) {
			?>
			<div class="tab-pane rtTabFadeInUp fade show <?php if ( $i == 1 ) { ?>active<?php } ?>" id="v-pills-<?php echo esc_html( $i ); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo esc_html( $i ); ?>-tab">
				<p class="para-text">
					<?php echo wp_kses_post( $tab_item_list['content'] ); ?>
				</p>
			</div>
		<?php $i++; } ?>	
	</div>
</div>
