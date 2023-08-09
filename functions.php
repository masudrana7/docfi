<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$docfi_theme_data = wp_get_theme();
	$action  = 'docfi_theme_init';
	do_action( $action );

	define( 'DOCFI_VERSION', ( WP_DEBUG ) ? time() : $docfi_theme_data->get( 'Version' ) );
	define( 'DOCFI_AUTHOR_URI', $docfi_theme_data->get( 'AuthorURI' ) );
	define( 'DOCFI_NAME', 'docfi' );

	// DIR
	define( 'DOCFI_BASE_DIR',    get_template_directory(). '/' );
	define( 'DOCFI_INC_DIR',     DOCFI_BASE_DIR . 'inc/' );
	define( 'DOCFI_ASSETS_DIR',  DOCFI_BASE_DIR . 'assets/' );
	define( 'DOCFI_WOO_DIR',     DOCFI_BASE_DIR . 'woocommerce/' );

	// URL
	define( 'DOCFI_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'DOCFI_ASSETS_URL',  DOCFI_BASE_URL . 'assets/' );
	
	// icon trait Plugin Activation
	require_once DOCFI_INC_DIR . 'icon-trait.php';
	// Includes
	require_once DOCFI_INC_DIR . 'helper-functions.php';
	require_once DOCFI_INC_DIR . 'docfi.php';
	require_once DOCFI_INC_DIR . 'general.php';
	require_once DOCFI_INC_DIR . 'ajax-tab.php'; 
	require_once DOCFI_INC_DIR . 'ajax-loadmore.php'; 
	require_once DOCFI_INC_DIR . 'scripts.php';
	require_once DOCFI_INC_DIR . 'template-vars.php';
	require_once DOCFI_INC_DIR . 'rt-archive-meta.php';
	require_once DOCFI_INC_DIR . 'includes.php';
	// require_once DOCFI_INC_DIR . 'lc-helper.php';
	// require_once DOCFI_INC_DIR . 'lc-utility.php';

	
	if( is_admin() ) {
		// TGM Plugin Activation
		require_once DOCFI_BASE_DIR . 'lib/class-tgm-plugin-activation.php';
		require_once DOCFI_INC_DIR . 'tgm-config.php';
	} else {
		// Includes Modules
		require_once DOCFI_INC_DIR . 'modules/rt-post-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-team-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-docs-related.php';
		require_once DOCFI_INC_DIR . 'modules/rt-breadcrumbs.php';
	}

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'docfi_hseparator_breadcrumb_trail', 1);
	function docfi_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> | </span>';
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
				_e( 'n/a' );  
			} else {
				$title = get_term_by('id', $select_group, 'docfi_docs_group')->name;
				$url = admin_url() . 'term.php?taxonomy=docfi_docs_group&tag_ID=' . $select_group;
				echo '<a href=' . esc_url( $url ) . '>' . esc_html( $title ) . '</a>';
			}
		}	
	}

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


	// Ajax Query
	function enqueue_custom_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('custom-search', get_template_directory_uri() . '/assets/js/custom-search.js', array('jquery'), '1.0', true);

		wp_localize_script('custom-search', 'customSearch', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
	function custom_search_results() {
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';
    $args = array(
        'post_type' => 'docfi_docs',
        'post_status' => 'publish',
        's' => $search_term,
        'cat' => $category
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Display your search results here
        }
    } else {
        echo 'No results found.';
    }
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_custom_search_results', 'custom_search_results');
add_action('wp_ajax_nopriv_custom_search_results', 'custom_search_results');





	