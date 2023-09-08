<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use \RT_Posts;
use DocfiTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'docfi_docs'  => array(
		'title'           => __( 'Docs', 'docfi-core' ),
		'plural_title'    => __( 'Docs', 'docfi-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => DocfiTheme::$options['docs_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		'taxonomies' 	  => array( 'post_tag' ),
	),
);

$taxonomies = array(
	'docfi_docs_category' => array(
		'title'        => __( 'Docs Category', 'docfi-core' ),
		'plural_title' => __( 'Docs Categories', 'docfi-core' ),
		'post_types'   => 'docfi_docs',
		'rewrite'      => array( 'slug' => DocfiTheme::$options['docs_cat_slug'] ),
	),
	'docfi_docs_group' => array(
		'title'        => __( 'Docs Group', 'docfi-core' ),
		'plural_title' => __( 'Docs Groups', 'docfi-core' ),
		'post_types'   => 'docfi_docs',
		'rewrite'      => array( 'slug' => DocfiTheme::$options['docs_group_slug'] ),
	),
);


$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );