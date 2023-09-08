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
<div class="rt-timeline">
	<?php
		$i = 0;
		$add_class =" ";
    	foreach ( $data['timeline_repeat'] as $timeline ) { 
			$add_class = ($i % 2 == 0) ? 'right':'left';
		?>
		<div class="content-container <?php echo esc_attr($add_class); ?>">
			<div class="content">
				<h3><?php echo wp_kses_post( $timeline['timeline_month'] ) ?></h3>
				<?php echo wp_kses_post( $timeline['timeline_text'] ) ?>
			</div>
		</div>

	<?php $i++; } ?>


</div>