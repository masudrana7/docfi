<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Rtcl\Helpers\Functions;

add_action( 'template_redirect', 'docfi_template_vars' );
if( !function_exists( 'docfi_template_vars' ) ) {
    function docfi_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;                     
                case 'docfi_docs':
                $prefix = 'docs';
                break; 
            }
			
			$layout_settings    = get_post_meta( $post_id, 'docfi_layout_settings', true );
            
            DocfiTheme::$layout = ( empty( $layout_settings['docfi_layout'] ) || $layout_settings['docfi_layout']  == 'default' ) ? DocfiTheme::$options[$prefix . '_layout'] : $layout_settings['docfi_layout'];

            DocfiTheme::$sidebar = ( empty( $layout_settings['docfi_sidebar'] ) || $layout_settings['docfi_sidebar'] == 'default' ) ? DocfiTheme::$options[$prefix . '_sidebar'] : $layout_settings['docfi_sidebar'];
			
			DocfiTheme::$header_opt = ( empty( $layout_settings['docfi_header_opt'] ) || $layout_settings['docfi_header_opt'] == 'default' ) ? DocfiTheme::$options['header_opt'] : $layout_settings['docfi_header_opt'];

            DocfiTheme::$tr_header = ( empty( $layout_settings['docfi_tr_header'] ) || $layout_settings['docfi_tr_header'] == 'default' ) ? DocfiTheme::$options['tr_header'] : $layout_settings['docfi_tr_header'];
			
            DocfiTheme::$footer_style = ( empty( $layout_settings['docfi_footer'] ) || $layout_settings['docfi_footer'] == 'default' ) ? DocfiTheme::$options['footer_style'] : $layout_settings['docfi_footer'];
			
			DocfiTheme::$footer_area = ( empty( $layout_settings['docfi_footer_area'] ) || $layout_settings['docfi_footer_area'] == 'default' ) ? DocfiTheme::$options['footer_area'] : $layout_settings['docfi_footer_area'];

			DocfiTheme::$footer_shape = ( empty( $layout_settings['docfi_footer_shape'] ) || $layout_settings['docfi_footer_shape'] == 'default' ) ? DocfiTheme::$options['footer_shape'] : $layout_settings['docfi_footer_shape'];

			DocfiTheme::$footer_newsletter = ( empty( $layout_settings['docfi_footer_newsletter'] ) || $layout_settings['docfi_footer_newsletter'] == 'default' ) ? DocfiTheme::$options['footer_newsletter'] : $layout_settings['docfi_footer_newsletter'];

            DocfiTheme::$copyright_area = ( empty( $layout_settings['docfi_copyright_area'] ) || $layout_settings['docfi_copyright_area'] == 'default' ) ? DocfiTheme::$options['copyright_area'] : $layout_settings['docfi_copyright_area'];
		
            $padding_top = ( empty( $layout_settings['docfi_top_padding'] ) || $layout_settings['docfi_top_padding'] == 'default' ) ? DocfiTheme::$options[$prefix . '_padding_top'] : $layout_settings['docfi_top_padding'];
			
            DocfiTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['docfi_bottom_padding'] ) || $layout_settings['docfi_bottom_padding'] == 'default' ) ? DocfiTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['docfi_bottom_padding'];
			
            DocfiTheme::$padding_bottom = (int) $padding_bottom;
			
            DocfiTheme::$has_banner = ( empty( $layout_settings['docfi_banner'] ) || $layout_settings['docfi_banner'] == 'default' ) ? DocfiTheme::$options[$prefix . '_banner'] : $layout_settings['docfi_banner'];
            
            DocfiTheme::$has_breadcrumb = ( empty( $layout_settings['docfi_breadcrumb'] ) || $layout_settings['docfi_breadcrumb'] == 'default' ) ? DocfiTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['docfi_breadcrumb'];
            
            DocfiTheme::$bgtype = ( empty( $layout_settings['docfi_banner_type'] ) || $layout_settings['docfi_banner_type'] == 'default' ) ? DocfiTheme::$options[$prefix . '_bgtype'] : $layout_settings['docfi_banner_type'];
            
            DocfiTheme::$bgcolor = empty( $layout_settings['docfi_banner_bgcolor'] ) ? DocfiTheme::$options[$prefix . '_bgcolor'] : $layout_settings['docfi_banner_bgcolor'];
			
			if( !empty( $layout_settings['docfi_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['docfi_banner_bgimg'], 'full', true );
                DocfiTheme::$bgimg = $attch_url[0];
            } elseif( !empty( DocfiTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DocfiTheme::$options[$prefix . '_bgimg'], 'full', true );
                DocfiTheme::$bgimg = $attch_url[0];
            } else {
                DocfiTheme::$bgimg = DOCFI_ASSETS_URL . 'img/banner.png';
            }
			
            DocfiTheme::$pagebgcolor = empty( $layout_settings['docfi_page_bgcolor'] ) ? DocfiTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['docfi_page_bgcolor'];			
            
            if( !empty( $layout_settings['docfi_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['docfi_page_bgimg'], 'full', true );
                DocfiTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( DocfiTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DocfiTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                DocfiTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                DocfiTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( is_post_type_archive( "docfi_docs" ) || is_tax( "docfi_docs_group" ) || is_tax( "docfi_docs_category" )  ) {
                $prefix = 'docs_archive'; 
            } else {
                $prefix = 'blog';
            }
            
            DocfiTheme::$layout         		= DocfiTheme::$options[$prefix . '_layout'];
            DocfiTheme::$header_opt      	    = DocfiTheme::$options['header_opt'];
            DocfiTheme::$tr_header             = DocfiTheme::$options['tr_header'];
            DocfiTheme::$footer_shape     	    = DocfiTheme::$options['footer_shape'];
            DocfiTheme::$footer_area     	    = DocfiTheme::$options['footer_area'];
            DocfiTheme::$copyright_area        = DocfiTheme::$options['copyright_area'];
            DocfiTheme::$footer_style   		= DocfiTheme::$options['footer_style'];
            DocfiTheme::$padding_top    		= DocfiTheme::$options[$prefix . '_padding_top'];
            DocfiTheme::$padding_bottom 		= DocfiTheme::$options[$prefix . '_padding_bottom'];
            DocfiTheme::$has_banner     		= DocfiTheme::$options[$prefix . '_banner'];
            DocfiTheme::$has_breadcrumb 		= DocfiTheme::$options[$prefix . '_breadcrumb'];
            DocfiTheme::$bgtype         		= DocfiTheme::$options[$prefix . '_bgtype'];
            DocfiTheme::$bgcolor        		= DocfiTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( DocfiTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DocfiTheme::$options[$prefix . '_bgimg'], 'full', true );
                DocfiTheme::$bgimg = $attch_url[0];
            } else {
                DocfiTheme::$bgimg = DOCFI_ASSETS_URL . 'img/banner.png';
            }
			
            DocfiTheme::$pagebgcolor = DocfiTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( DocfiTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DocfiTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                DocfiTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'docfi_body_classes' );
if( !function_exists( 'docfi_body_classes' ) ) {
    function docfi_body_classes( $classes ) {
		
		// Header
    	if ( DocfiTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}

        if ( DocfiTheme::$tr_header === 1 || DocfiTheme::$tr_header === "on" ){
           $classes[] = 'tr-header';
        }
				
        $classes[] = 'footer-style-'. DocfiTheme::$footer_style;
        $classes[] = ( DocfiTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
        $classes[] = ( DocfiTheme::$layout == 'left-right-sidebar' ) ? ('left-sidebar' && 'right-sidebar') : 'no-sidebar';
		$classes[] = ( DocfiTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . DocfiTheme::$options['post_style'];
        }
        return $classes;
    }
}