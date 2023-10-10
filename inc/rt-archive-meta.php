<?php 
	/*------------------
		add Docfi category color meta
	--------------------*/

	// Docs Post Count Views 
	function rt_docs_post_views() {
		if (is_singular('docfi_docs')) {
			$post_id = get_the_ID();
			$count_key = 'post_views_count';
			$count = get_post_meta($post_id, $count_key, true);
			if ($count == '') {
				$count = 0;
			}
			$count++;
			update_post_meta($post_id, $count_key, $count);
		}
	}
	add_action('wp', 'rt_docs_post_views');

	function docfi_colorpicker_field_add_new_category( $taxonomy ) { ?>
		<div class="form-field term-colorpicker-wrap">
			<label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'docfi' ); ?></label>
			<input name="rt_category_color" value="#111111" class="colorpicker" id="term-colorpicker" />
			<p><?php esc_html_e( 'This is category background color.', 'docfi' ); ?></p>
		</div>

		<div class="form-field term-group">
			<label for=""><?php esc_html_e( 'Upload and Image', 'docfi' ); ?></label> 
			<div class="category-image"></div> 
			<input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'docfi' ); ?>" />
		</div>
	<?php
	}
	add_action( 'docfi_docs_category_add_form_fields', 'docfi_colorpicker_field_add_new_category' );


	function docfi_colorpicker_field_edit_category( $term ) {
		$color = get_term_meta( $term->term_id, 'rt_category_color', true );
		$color = ( ! empty( $color ) ) ? "#{$color}" : '#111111';
		$image = get_term_meta( $term->term_id, 'rt_term_image', true );
	?>
		<tr class="form-field term-colorpicker-wrap">
			<th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'docfi' ); ?></label></th>
			<td>
				<input name="rt_category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
				<p class="description"><?php esc_html_e( 'This is category background color.', 'docfi' ); ?></p>
			</td>
		</tr>
		<tr class="form-field term-image-wrap">
			<th scope="row"><label for="term-image"><?php esc_html_e( 'Category Image', 'docfi' ); ?></label></th>
			<td> 
				<div class="category-image">
					<?php if ( $image ) { ?>
						<div class="category-image-wrap">
							<img src='<?php echo wp_get_attachment_image_src($image, 'thumbnail')[0]; ?>' width='200' />
							<input type="hidden" name="rt_term_image" value="<?php echo esc_attr( $image ); ?>" class="category-image-id"/>
							<button>x</button>
						</div>
					<?php } ?>
				</div>
				<input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'docfi' ); ?>" />
			</td>
		</tr>
	<?php
	}
	add_action( 'docfi_docs_category_edit_form_fields', 'docfi_colorpicker_field_edit_category' ); 


	function docfi_save_termmeta( $term_id ) {
		// Save term color if possible
		if( isset( $_POST['rt_category_color'] ) && ! empty( $_POST['rt_category_color'] ) ) {
			update_term_meta( $term_id, 'rt_category_color', sanitize_hex_color_no_hash( $_POST['rt_category_color'] ) );
		} else {
			delete_term_meta( $term_id, 'rt_category_color' );
		}

		if( isset( $_POST['rt_term_image'] ) && ! empty( $_POST['rt_term_image'] ) ) {
			update_term_meta( $term_id, 'rt_term_image', absint( $_POST['rt_term_image'] ) );
		} else {
			delete_term_meta( $term_id, 'rt_term_image' );
		}
	}
	add_action( 'created_docfi_docs_category', 'docfi_save_termmeta' );
	add_action( 'edited_docfi_docs_category',  'docfi_save_termmeta' );

	function docfi_category_colorpicker_enqueue( $taxonomy ) {
		if( null !== ( $screen = get_current_screen() ) && 'edit-docfi_docs_category' !== $screen->id ) {
			return;
		}
		// Colorpicker Scripts
		wp_enqueue_script( 'wp-color-picker' );
		// Colorpicker Styles
		wp_enqueue_style( 'wp-color-picker' );
	}
	add_action( 'admin_enqueue_scripts', 'docfi_category_colorpicker_enqueue' );


	//Category Color column
	add_filter( 'manage_edit-docfi_docs_category_columns', 'docfi_edit_term_columns', 10, 3 );
	function docfi_edit_term_columns( $columns ) {
		$columns['rt_category_color'] = esc_html__( 'Color', 'docfi' );
		$columns['rt_term_image'] = esc_html__( 'Image', 'docfi' );
		return $columns;
	}

	// RENDER COLUMNS
	add_filter( 'manage_docfi_docs_category_custom_column', 'docfi_manage_term_custom_column', 10, 3 );
	function docfi_manage_term_custom_column( $out, $column, $term_id ) {
		if ( 'rt_category_color' === $column ) {
			$value  = get_term_meta( $term_id , 'rt_category_color', true );
			if ( ! $value )
				$value = '';
			$out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
		}

		if ( 'rt_term_image' === $column ) {
			$value  = get_term_meta( $term_id , 'rt_term_image', true );
			if ( $value ) {
				$out = '<img src='.wp_get_attachment_image_src($value, 'thumbnail')[0].' width="200" />';
			} 
		}
		return $out;
	}


	/*------------------
		add Docfi Group color meta
	--------------------*/

	function docfi_colorpicker_field_add_new_group( $taxonomy ) { ?>

		<div class="form-field term-colorpicker-wrap">
			<label for="term-colorpicker"><?php esc_html_e( 'Icon BG', 'docfi' ); ?></label>
			<input name="rt_group_color" value="#111111" class="colorpicker" id="term-colorpicker" />
			<p><?php esc_html_e( 'This is Icon background color.', 'docfi' ); ?></p>
		</div>

		<div class="form-field term-group">
			<label for=""><?php esc_html_e( 'Upload and Image', 'docfi' ); ?></label> 
			<div class="group-image"></div> 
			<input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'docfi' ); ?>" />
		</div>

		<div class="form-field term-colorpicker-wrap">
			<label for="term-colorpicker"><?php esc_html_e( 'Items Background', 'docfi' ); ?></label>
			<input name="rt_item_bg" value="#E7E7E7" class="colorpicker" id="term-colorpicker" />
			<p><?php esc_html_e( 'This is Group background color.', 'docfi' ); ?></p>
		</div>

	<?php }
	
	add_action( 'docfi_docs_group_add_form_fields', 'docfi_colorpicker_field_add_new_group' );

	function docfi_colorpicker_field_edit_group( $term ) {
		$color = get_term_meta( $term->term_id, 'rt_group_color', true );
		$color = ( ! empty( $color ) ) ? "#{$color}" : '#111111';
		$item_bg = get_term_meta( $term->term_id, 'rt_item_bg', true );
		$item_bg = ( ! empty( $item_bg ) ) ? "#{$item_bg}" : '#E7E7E7';
		$image = get_term_meta( $term->term_id, 'rt_term_image', true );
	?>
		<tr class="form-field term-colorpicker-wrap">
			<th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Group Color', 'docfi' ); ?></label></th>
			<td>
				<input name="rt_group_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
				<p class="description"><?php esc_html_e( 'This is group background color.', 'docfi' ); ?></p>
			</td>
		</tr>

		<tr class="form-field term-image-wrap">
			<th scope="row"><label for="term-image"><?php esc_html_e( 'Group Image', 'docfi' ); ?></label></th>
			<td> 
				<div class="category-image">
					<?php if ( $image ) { ?>
						<div class="category-image-wrap">
							<img src='<?php echo wp_get_attachment_image_src($image, 'thumbnail')[0]; ?>' width='200' />
							<input type="hidden" name="rt_term_image" value="<?php echo esc_attr( $image ); ?>" class="category-image-id"/>
							<button>x</button>
						</div>
					<?php } ?>
				</div>
				
				<input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'docfi' ); ?>" />
			</td>
		</tr>

		<tr class="form-field term-colorpicker-wrap">
			<th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Items Color', 'docfi' ); ?></label></th>
			<td>
				<input name="rt_item_bg" value="<?php echo esc_attr( $item_bg ); ?>" class="colorpicker" id="term-colorpicker" />
				<p class="description"><?php esc_html_e( 'This is group background color.', 'docfi' ); ?></p>
			</td>
		</tr>

	<?php
	}
	add_action( 'docfi_docs_group_edit_form_fields', 'docfi_colorpicker_field_edit_group' ); 

	function docfi_group_save_termmeta( $term_id ) {
		// Save term color if possible

		if( isset( $_POST['rt_group_color'] ) && ! empty( $_POST['rt_group_color'] ) ) {
			update_term_meta( $term_id, 'rt_group_color', sanitize_hex_color_no_hash( $_POST['rt_group_color'] ) );
		} else {
			delete_term_meta( $term_id, 'rt_group_color' );
		}

		if( isset( $_POST['rt_item_bg'] ) && ! empty( $_POST['rt_item_bg'] ) ) {
			update_term_meta( $term_id, 'rt_item_bg', sanitize_hex_color_no_hash( $_POST['rt_item_bg'] ) );
		} else {
			delete_term_meta( $term_id, 'rt_item_bg' );
		}

		if( ! empty( $_POST['rt_term_image'] ) ) {
			update_term_meta( $term_id, 'rt_term_image', absint( $_POST['rt_term_image'] ) );
		} else {
			delete_term_meta( $term_id, 'rt_term_image' );
		}
	}
	add_action( 'created_docfi_docs_group', 'docfi_group_save_termmeta' );
	add_action( 'edited_docfi_docs_group',  'docfi_group_save_termmeta' );

	function docfi_group_colorpicker_enqueue( $taxonomy ) {
		if( null !== ( $screen = get_current_screen() ) && 'edit-docfi_docs_group' !== $screen->id ) {
			return;
		}
		// Colorpicker Scripts
		wp_enqueue_script( 'wp-color-picker' );
		// Colorpicker Styles
		wp_enqueue_style( 'wp-color-picker' );
	}
	add_action( 'admin_enqueue_scripts', 'docfi_group_colorpicker_enqueue' );


	//group Color column
	add_filter( 'manage_edit-docfi_docs_group_columns', 'docfi_group_edit_term_columns', 10, 3 );
	function docfi_group_edit_term_columns( $columns ) {
		$columns['rt_group_color'] = esc_html__( 'Icon Bg', 'docfi' );
		$columns['rt_item_bg'] = esc_html__( 'Item Bg', 'docfi' );
		$columns['rt_term_image'] = esc_html__( 'Image', 'docfi' );
		return $columns;
	}

	// RENDER COLUMNS
	add_filter( 'manage_docfi_docs_group_custom_column', 'docfi_group_manage_term_custom_column', 10, 3 );
	function docfi_group_manage_term_custom_column( $out, $column, $term_id ) {
		if ( 'rt_group_color' === $column ) {
			$value  = get_term_meta( $term_id , 'rt_group_color', true );
			if ( ! $value )
				$value = '';
			$out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
		}
		if ( 'rt_item_bg' === $column ) {
			$value  = get_term_meta( $term_id , 'rt_item_bg', true );
			if ( ! $value )
				$value = '';
			$out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
		}
		if ( 'rt_term_image' === $column ) {
			$value  = get_term_meta( $term_id , 'rt_term_image', true );
			if ( $value ) {
				$out = '<img src='.wp_get_attachment_image_src($value, 'thumbnail')[0].' width="200" />';
			} 
		}
		return $out;
	}

	// Remove Group Meta

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'docfi_hseparator_breadcrumb_trail', 1);
	function docfi_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> / </span>';
		return $object;
	}

	/*review comment most count*/
	add_filter('pre_wp_update_comment_count_now', function( $counts, $old, $post_id){ 
		global $wpdb;
		return (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_parent = 0 AND comment_approved = '1'", $post_id ) );

	}, 999, 3);

	/*post order*/
	add_action('admin_init', 'rt_add_page_attributes');
	function rt_add_page_attributes(){
		add_post_type_support( 'post', 'page-attributes' );
	}

	/*Remove Taxonomy Group*/
	add_action( 'admin_init', 'rt_remove_metabox' );
	function rt_remove_metabox() {
		if ( is_admin() ) {
			add_filter( 'get_user_option_meta-box-order_docfi_docs', 'rt_remove_group_taxonomy_div' );
        }
	}
	function rt_remove_group_taxonomy_div() {
		global $wp_meta_boxes;
		unset( $wp_meta_boxes['docfi_docs']['side']['core']['docfi_docs_groupdiv'] );
		return [];
	}

	// Remove and add Docs Column
	function custom_remove_docfi_docs_default_columns($columns) {
		unset($columns['date']); // Remove the "Date" column
		unset($columns['taxonomy-docfi_docs_group']);
		$columns['docs_group'] = __( 'Docs Groups', 'docfi' );
		$columns['date'] = __( 'Date', 'docfi' );
		return $columns;
	}
	add_filter('manage_docfi_docs_posts_columns', 'custom_remove_docfi_docs_default_columns');

	function custom_remove_docfi_group_columns($columns){
		unset($columns['posts']);
		return $columns;
	}
	add_filter('manage_edit-docfi_docs_group_columns', 'custom_remove_docfi_group_columns');


	// Add Select Custom Group
	add_action( 'manage_docfi_docs_posts_custom_column', 'docfi_docs_posts_column', 10, 2 );
		function docfi_docs_posts_column( $column, $post_id ) {
		 if ( 'docs_group' === $column ) {
			$select_group = get_post_meta( $post_id, 'group_post_select', true );
			if ( ! $select_group ) {
				_e( 'n/a', 'docfi' );  
			} else {
				$term = get_term_by('id', $select_group, 'docfi_docs_group');

				if ( empty( $term ) ) {
					return;
				}

				$title = get_term_by('id', $select_group, 'docfi_docs_group')->name;
				$url = admin_url() . 'term.php?taxonomy=docfi_docs_group&tag_ID=' . $select_group;
				echo '<a href=' . esc_url( $url ) . '>' . esc_html( $title ) . '</a>';
			}
		}	
	}