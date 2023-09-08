<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Utils;
use Elementor\Icons_Manager;
extract($data); 


$stats = bbp_get_statistics(); ?>

<div class="rt-forum-status">
	<div class="icon">
		<?php Icons_Manager::render_icon( $data['icon'], [ 'aria-hidden' => 'true' ] ); ?>
	</div>
	<h3 class="title"><?php echo wp_kses_post( $data['title'] );?></h3>
	<p class="para-text"><?php echo esc_html( $stats['topic_count'] ); ?> <?php echo esc_html('Topics', 'docfi');?> / <?php echo esc_html( $stats['reply_count'] ); ?> <?php echo esc_html('Reply', 'docfi');?></p>
</div>






