<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'logo'               	=> '',
            'logo_light'          	=> '',
            'logo_width'            => '',
            'mobile_logo_width'     => '',
			'image_blend'			=> 'normal',			
			'container_width'		=> '1320',
            'preloader'          	=> 0,
            'preloader_image'    	=> '',
			'preloader_bg_color' 	=> '#ffffff',
            'back_to_top'     		=> 1,
            'display_no_preview_image' => 0,

			
			// Color
			'primary_color' 			=> '',
			'secondary_color' 			=> '',
			'body_color' 				=> '',			
            'body_bg_color'             => '',          
			'menu_color' 				=> '',
			'menu_hover_color' 			=> '',
			'menu_color_tr' 			=> '',			
			'submenu_color' 			=> '',
			'submenu_hover_color' 		=> '',
			'submenu_bgcolor' 			=> '',
			
            'header_bg_color'           => '',
			'header_opt'       			=> 1,
			'header_style'       		=> 1,
			'header_width'       		=> 0,
			'sticky_menu'       		=> 1,
            'tr_header'                 => 0,
            'email'                     => '',

            'online_button'             => 0,
            'online_button_text'        => esc_html__('Free Trial', 'docfi'),
            'online_button_link'        => '#',

			// Footer
            'footer_style'        		=> 1,
            'copyright_text'      		=> '&copy; ' . date('Y') . ' docfi. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . DOCFI_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_column_1'			=> 4,
            'footer_column_2'           => 4,
            'footer_column_3'           => 4,
			'footer_newsletter'		    => 1,
			'footer_area'				=> 1,
            'nws_shortcode'             => '',
            'newsletter_title'          => '',
            'copyright_area'            => 1,
            'logo_display'              => 1,
			'footer_bgtype' 			=> 'fbgcolor',
            'footer_bgtype2'            => 'fbgcolor2',
            'footer_bgtype3'            => 'fbgcolor3',
			'fbgcolor' 					=> '#ffffff',
            'fbgcolor2'                 => '#1B2234',
            'fbgcolor3'                 => '#ffffff',
			'fbgimg'					=> '',
            'fbgimg2'                   => '',
            'fbgimg3'                   => '',
			'footer_title_color' 		=> '',
			'footer_color' 				=> '',
			'footer_link_color' 		=> '',
			'footer_link_hover_color' 	=> '',
            'footer_logo_light'         => '',
            'copyright_text_color'      => '',
            'copyright_link_color'      => '',
            'copyright_hover_color'     => '',
            'copyright_bg_color'        => '',
            'footer_logo2'              => '',
            'footer_shape'              =>  0,
            'footer_shape1'             => '',
            'footer_shape2'             => '',
            'footer_newsletter_image'   => '',

            // Contact Socials            
            'social_label'   	=> '',
            'social_facebook'  	=> '',
            'social_twitter'   	=> '',
            'social_linkedin'   => '',
            'social_behance' 	=> '',
            'social_dribbble'  	=> '',
            'social_youtube'    => '',
            'social_pinterest'  => '',
            'social_instagram'  => '',
            'social_skype'      => '',
            'social_rss'       	=> '',
            'social_snapchat'   => '',
			
			// Banner 
			'breadcrumb_link_color' 	=> '',
			'breadcrumb_link_hover_color' => '',
			'breadcrumb_active_color' 	=> '',
			'breadcrumb_seperator_color'=> '',
			'banner_bg_opacity' 		=> 1,
			'banner_top_padding'    	=> 200,
            'banner_bottom_padding' 	=> 185,
            'breadcrumb_active' 		=> 0,

            //Forum
            'banner_popular_text' 		=> 'Popular:',
            'banner_popular_tag1' 		=> 'Code',
            'banner_popular_tag2' 		=> 'Basic',
            'banner_popular_tag3' 		=> 'Price',
            'banner_popular_tag4' 		=> 'WordPress',
            'forum_bgcolor' 		    => '',
            'forum_bgimage' 	        => '',

            //Login
            'login_logo'                => '',
            'login_title'               => 'Welcome Back',
            'login_description'         => 'To keep connected with us please login with your personal info',
            'right_title'               => 'Log In your Account',
            'sign_up_text'              => 'Already have an account? Please Signin now',
            'login_left_bgcolor'        => '',
            'left_bgimage'              => '',

            //Register
            'register_logo'                => '',
            'register_title'               => 'Welcome Back',
            'register_description'         => 'To keep connected with us please login with your personal info',
            'rg_right_title'               => 'Register your Account',
            'rg_sign_up_text'              => 'Don’t have an account yet? Please Signin now',
            'register_left_bgcolor'        => '',
            'rg_left_bgimage'              => '',
			
			// Post Type Slug
			'team_slug' 				=> 'team',
            'service_slug'              => 'service',
            'docs_slug'                 => 'docs',
			'team_cat_slug' 			=> 'team-category',		
            'service_cat_slug'          => 'service-category',     
            'docs_cat_slug'             => 'docs-category',     
            'docs_group_slug'           => 'docs-group',     
			
            // Page Layout Setting 
            'page_layout'        => 'full-width',
            'page_sidebar'        => '',
			'page_padding_top'    => 120,
            'page_padding_bottom' => 120,
            'page_banner' => 1,
            'page_breadcrumb' => 0,
            'page_bgtype' => 'bgcolor',
            'page_bgcolor' => '',
            'page_bgimg' => '',
            'page_page_bgimg' => '',
            'page_page_bgcolor' => '',
			
			//Blog Layout Setting 
            'blog_layout' => 'right-sidebar',
            'blog_sidebar'        => '',
			'blog_padding_top'    => 120,
            'blog_padding_bottom' => 120,
            'blog_banner' => 1,
            'blog_breadcrumb' => 0,			
			'blog_bgtype' => 'bgcolor',
            'blog_bgcolor' => '',
            'blog_bgimg' => '',
            'blog_page_bgimg' => '',
            'blog_page_bgcolor' => '',
			
			//Single Post Layout Setting 
			'single_post_layout' => 'right-sidebar',
            'single_post_sidebar'        => '',
			'single_post_padding_top'    => 120,
            'single_post_padding_bottom' => 120,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 0,			
			'single_post_bgtype' => 'bgcolor',
            'single_post_bgcolor' => '',
            'single_post_bgimg' => '',
            'single_post_page_bgimg' => '',
            'single_post_page_bgcolor' => '',

         
            //docs Layout Setting 
            'docs_archive_layout' => 'full-width',
            'docs_archive_sidebar'  => '',
            'docs_archive_padding_top'    => 120,
            'docs_archive_padding_bottom' => 120,
            'docs_archive_banner' => 1,
            'docs_archive_breadcrumb' => 0,         
            'docs_archive_bgtype' => 'bgcolor',
            'docs_archive_bgcolor' => '',
            'docs_archive_bgimg' => '',
            'docs_archive_page_bgimg' => '',
            'docs_archive_page_bgcolor' => '',



            
            //docs Single Layout Setting 
            'docs_layout' => 'full-width',
            'docs_sidebar'        => '',
            'docs_padding_top'    => 120,
            'docs_padding_bottom' => 120,
            'docs_banner' => 1,
            'docs_breadcrumb' => 0,         
            'docs_bgtype' => 'bgcolor',
            'docs_bgcolor' => '',
            'docs_bgimg' => '',
            'docs_page_bgimg' => '',
            'docs_page_bgcolor' => '',
            'left-right-sidebar' => '',
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
			'search_padding_top'    => 120,
            'search_padding_bottom' => 120,
            'search_banner' => 1,
            'search_breadcrumb' => 0,			
			'search_bgtype' => 'bgcolor',
            'search_bgcolor' => '',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '',
            'search_excerpt_length' => 40,
			
			//Error Layout Setting 
			'error_padding_top'    => 120,
            'error_padding_bottom' => 120,
            'error_banner' => 1,
            'error_breadcrumb' => 0,			
			'error_bgtype' => 'bgcolor',
            'error_bgcolor' => '',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '',	

            // Blog Archive
			'blog_style'				=> 'style1',
            'blog_loadmore'             => 'pagination',
            'load_more_limit'           => 4,            
			'post_banner_title'  		=> '',
			'post_content_limit'  		=> '20',
			'blog_content'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 1,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
            'blog_video'                => 0,
            'blog_read_more'            => 1,
			'blog_animation'  			=> 'hide',
			'blog_animation_effect'  	=> 'fadeInUp',
			
			// Post
            'post_style'                => 'style1',
			'scroll_post_enable'		=> 0,
            'post_scroll_limit'         => 1,
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 1,
			'post_length'				=> 0,
			'post_published'			=> 0,
			'show_related_post'			=> 0,
			'show_related_post_number'	=> 5,
			'related_title'				=> esc_html__('You May Also Like', 'docfi'),
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			'post_time_format'			=> 'modern',
			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_youtube' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 1,
			'post_share_whatsapp' 		=> 0,
			'post_share_cloud' 			=> 0,
			'post_share_dribbble' 		=> 0,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,
			'post_share_email' 			=> 0,
			'post_share_print' 			=> 0,

            // docs
            'docs_group_number'      => 6,
            'docs_post_number'       => 4,
            'docs_arexcerpt_limit'   => 20,
            'show_related_docs'      => 0,
            'docs_related_title'     => esc_html__('Related Case', 'docfi'),
            'related_docs_number'    => 5,
            'related_docs_title_limit'=> 5,
			
            // Error
            'error_bodybg_color' 		=> '',
            'error_text1_color' 		=> '',
            'error_text2_color' 		=> '',
			'error_image' 				=> '',
			'error_image2' 				=> '',
            'error_text1' 				=> esc_html__('Oops... Page Not Found!', 'docfi'),
            'error_text2' 				=> esc_html__('Sorry! This Page Is Not Available!', 'docfi'),
            'error_buttontext' 			=> esc_html__('Go Back To Home Page', 'docfi'),
            'error_animation' 			=> 'hide',
            'error_animation_effect' 	=> 'fadeInUp',
            
            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => '400',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '28px',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => '500',
                )
            ),
            'typo_menu_size' => '16px',
            'typo_menu_height'=> '22px',

            //Sub Menu Typography
            'typo_sub_menu' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => '400',
                )
            ),
            'typo_submenu_size' => '15px',
            'typo_submenu_height'=> '20px',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => '600',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h1_size' => '44px',
            'typo_h1_height' => '54px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h2_size' => '36px',
            'typo_h2_height'=> '40px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h3_size' => '28px',
            'typo_h3_height'=> '28px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h4_size' => '22px',
            'typo_h4_height'=> '26px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '22px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h6_size' => '14px',
            'typo_h6_height'=> '18px',

            
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}