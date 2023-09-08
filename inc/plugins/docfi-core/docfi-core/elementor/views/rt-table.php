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
<div class="rt-table-area">
	<table class="table table-bordered table-hover">
		<thead class="text-white">
			<tr>
				<th class="para-text" scope="col"><?php echo wp_kses_post( $data['thead_id'] ); ?></th>
				<th class="para-text" scope="col"><?php echo wp_kses_post( $data['reading_1'] ); ?></th>
				<th class="para-text" scope="col"><?php echo wp_kses_post( $data['reading_2'] ); ?></th>
				<th class="para-text" scope="col"><?php echo wp_kses_post( $data['reading_3'] ); ?></th>
				<th class="para-text" scope="col"><?php echo wp_kses_post( $data['reading_4'] ); ?></th>
			</tr>
		</thead>
		<tbody>

		<?php
			$i = 1;
			foreach ( $data['table_repeat'] as $table ) {
		?>
		<tr>
			<th class="para-text" scope="row"><?php echo wp_kses_post( $i ); ?></th>
			<td class="para-text"><?php echo wp_kses_post( $table['reading_number1'] ); ?></td>
			<td class="para-text"><?php echo wp_kses_post( $table['reading_number2'] ); ?></td>
			<td class="para-text"><?php echo wp_kses_post( $table['reading_number3'] ); ?></td>
			<td class="para-text"><?php echo wp_kses_post( $table['reading_number4'] ); ?></td>
		</tr>
		<?php $i++; } ?>		
			
		</tbody>
	</table>
</div>


