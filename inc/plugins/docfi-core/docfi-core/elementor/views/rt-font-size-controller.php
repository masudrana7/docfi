<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Utils;
extract($data);
?>
<div class="font-size-controller-btn-area">
	<div class="font-size-controller-btn-wrapper d-flex align-items-center">
		<button class="font-size-minus"><?php echo esc_html__( 'A-' , 'docfi' ) ?></button>
		<button class="active font-size-normal"><?php echo esc_html__( 'A' , 'docfi' ) ?></button>
		<button class="font-size-plus"><?php echo esc_html__( 'A+' , 'docfi' ) ?></button>
	</div>
</div>
