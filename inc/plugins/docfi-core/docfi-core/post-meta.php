<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;

use DocfiTheme;
use DocfiTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = DOCFI_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$group_name  = DocfiTheme_Helper::docs_group_name();
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'docfi-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'docfi-core' ) ) + DocfiTheme_Helper::custom_sidebar_fields();
$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'docfi-core' ), array( 'page', 'post', 'docfi_team', 'docfi_service', 'product' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'docfi-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'docfi-core' ),
						'full-width'    => __( 'Full Width', 'docfi-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'docfi-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'docfi-core' ),
					),
					'default'  => 'default',
				),		
				'docfi_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'docfi-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'docfi-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'docfi-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'docfi-core' ),
						'1'       => __( 'Layout 1', 'docfi-core' ),
						'2'       => __( 'Layout 2', 'docfi-core' ),
						'3'       => __( 'Layout 3', 'docfi-core' ),
						'4'       => __( 'Layout 4', 'docfi-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),

				"{$prefix}_cutom_logo" => array(
					'label' => __( 'Header Dark Logo', 'docfi-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),

				"{$prefix}_cutom_sticky_logo" => array(
					'label' => __( 'Header Light Logo', 'docfi-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),

				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'docfi-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'1'       => __( 'Layout 1', 'docfi-core' ),
						'2'       => __( 'Layout 2', 'docfi-core' ),
						'3'       => __( 'Layout 3', 'docfi-core' ),
						'4'       => __( 'Layout 4', 'docfi-core' ),
						'5'       => __( 'Layout 5', 'docfi-core' ),
						'6'       => __( 'Layout 6', 'docfi-core' ),
						'7'       => __( 'Layout 7', 'docfi-core' ),
						'8'       => __( 'Layout 8', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'1'       => __( 'Layout 1', 'docfi-core' ),
						'2'       => __( 'Layout 2', 'docfi-core' ),
						'3'       => __( 'Layout 3', 'docfi-core' ),
					),
					'default'  => 'default',
				),

				"{$prefix}_footer_newsletter" => array(
					'label' 	  => __( 'Footer Newsletter', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),

				"{$prefix}_footer_shape" => array(
					'label' 	  => __( 'Footer Shape', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),
	
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'docfi-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enabled', 'docfi-core' ),
						'off'     => __( 'Disabled', 'docfi-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'0px'     => __( '0px', 'docfi-core' ),
						'10px'    => __( '10px', 'docfi-core' ),
						'20px'    => __( '20px', 'docfi-core' ),
						'30px'    => __( '30px', 'docfi-core' ),
						'40px'    => __( '40px', 'docfi-core' ),
						'50px'    => __( '50px', 'docfi-core' ),
						'60px'    => __( '60px', 'docfi-core' ),
						'70px'    => __( '70px', 'docfi-core' ),
						'80px'    => __( '80px', 'docfi-core' ),
						'90px'    => __( '90px', 'docfi-core' ),
						'100px'   => __( '100px', 'docfi-core' ),
						'110px'   => __( '110px', 'docfi-core' ),
						'120px'   => __( '120px', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'0px'     => __( '0px', 'docfi-core' ),
						'10px'    => __( '10px', 'docfi-core' ),
						'20px'    => __( '20px', 'docfi-core' ),
						'30px'    => __( '30px', 'docfi-core' ),
						'40px'    => __( '40px', 'docfi-core' ),
						'50px'    => __( '50px', 'docfi-core' ),
						'60px'    => __( '60px', 'docfi-core' ),
						'70px'    => __( '70px', 'docfi-core' ),
						'80px'    => __( '80px', 'docfi-core' ),
						'90px'    => __( '90px', 'docfi-core' ),
						'100px'   => __( '100px', 'docfi-core' ),
						'110px'   => __( '110px', 'docfi-core' ),
						'120px'   => __( '120px', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'	  => __( 'Enable', 'docfi-core' ),
						'off'	  => __( 'Disable', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'on'      => __( 'Enable', 'docfi-core' ),
						'off'	  => __( 'Disable', 'docfi-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'docfi-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'docfi-core' ),
						'bgimg'   => __( 'Background Image', 'docfi-core' ),
						'bgcolor' => __( 'Background Color', 'docfi-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'docfi-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'docfi-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'docfi-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'docfi-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
				),
				"{$prefix}_primary_color" => array(
					'label' => __('Primary Color', 'docfi-core'),
					'type'  => 'color_picker',
					'desc'  => __('If not selected, default will be used', 'docfi-core'),
				),
				"{$prefix}_secondary_color" => array(
					'label' => __('Secondary Color', 'docfi-core'),
					'type'  => 'color_picker',
					'desc'  => __('If not selected, default will be used', 'docfi-core'),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/
$Postmeta->add_meta_box( 'docfi_post_info', __( 'Post Info', 'docfi-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(
		"docfi_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'docfi-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'docfi-core' ),
		),
		'docfi_post_gallery' => array(
			'label' => __( 'Post Gallery', 'docfi-core' ),
			'type'  => 'gallery',
			'desc'  => __( 'Only work for the gallery post format', 'docfi-core' ),
		),
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/
$Postmeta->add_meta_box( 'docfi_team_settings', __( 'Team Member Settings', 'docfi-core' ), array( 'docfi_team' ), '', '', 'high', array(
	'fields' => array(
		'docfi_team_position' => array(
			'label' => __( 'Position', 'docfi-core' ),
			'type'  => 'text',
		),
		'docfi_team_website' => array(
			'label' => __( 'Website', 'docfi-core' ),
			'type'  => 'text',
		),
		'docfi_team_email' => array(
			'label' => __( 'Email', 'docfi-core' ),
			'type'  => 'text',
		),
		'docfi_team_phone' => array(
			'label' => __( 'Phone', 'docfi-core' ),
			'type'  => 'text',
		),
		'docfi_team_address' => array(
			'label' => __( 'Address', 'docfi-core' ),
			'type'  => 'text',
		),
		'docfi_team_socials_header' => array(
			'label' => __( 'Socials', 'docfi-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'docfi-core' ),
		),
		'docfi_team_socials' => array(
			'type'  => 'group',
			'value'  => DocfiTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'docfi_team_skills', __( 'Team Member Skills', 'docfi-core' ), array( 'docfi_team' ), '', '', 'high', array(
	'fields' => array(
		'docfi_team_skill_info' => array(
			'label' => __( 'Skill Info', 'docfi-core' ),
			'type'  => 'textarea',
		),
		'docfi_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'docfi-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'docfi-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'docfi-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'docfi-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'docfi-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'docfi-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'docfi-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'docfi_team_contact', __( 'Team Member Contact', 'docfi-core' ), array( 'docfi_team' ), '', '', 'high', array(
	'fields' => array(
		'docfi_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'docfi-core' ),
			'type'  => 'text',
		),
	)
) );


/*-------------------------------------
#. Docs Post
---------------------------------------*/

$Postmeta->add_meta_box( 'docfi_docs', __( 'Docs Post Meta', 'docfi-core' ), array( 'docfi_docs' ), '', '', 'high', array(
	'fields' => array(
		'docly_check_post' => array(
			'label' => __( 'Featured Post', 'docfi-core' ),
			'type'  => 'checkbox',
		),

		'docfi_icon_bg' => array(
			'label' => __( 'Icon Background', 'docfi-core' ),
			'type'  => 'color_picker',
		),
		
		'docfi_icon_img' => array(
			'label' => __( 'Icon Image', 'docfi-core' ),
			'type'  => 'image',
			'desc'  => __( 'If not selected, default will be used', 'docfi-core' ),
		),

		'group_post_select' => array(
			'label'    => __( 'Select Group', 'docfi-core' ),
			'type'     => 'select',
			'options'  => $group_name,
			'default'  => 'default',
		),
	)
) );





