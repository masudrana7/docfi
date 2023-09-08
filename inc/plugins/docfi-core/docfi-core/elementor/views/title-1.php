<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Utils;
extract($data);
// Time Format
$published_timestamp = get_the_time('U');
$current_timestamp = current_time('timestamp');
$minutes_elapsed = round(($current_timestamp - $published_timestamp) / 60);
// Post Views
$post_id = get_the_ID();
$count_key = 'post_views_count';
$count = get_post_meta($post_id, $count_key, true);
?>
<div class="rt-docs-title">
	<?php if( !empty ( $data['title'] ) ) { ?>
	<<?php echo esc_attr( $data['heading_size'] ); ?> class="entry-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_attr( $data['heading_size'] ); ?>>
	<?php } ?>	

	<?php if( !empty ( $data['title_content'] ) ) { ?>
	<div class="sub-title"><?php echo wp_kses_post( $data['title_content'] ); ?> 
	<?php if ( $data['minutes_display'] == 'yes' ) { echo esc_html($minutes_elapsed." minutes", 'docfi'); } ?> 
	<?php if ( $data['views_display'] == 'yes' ) { echo $count . esc_attr('views', 'docfi'); } ?>

</div>
	<?php } ?>
</div>
