<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 
use Rtrs\Models\Review; 

function docfi_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','docfi_enqueue_high_priority_scripts', 1500 );
function docfi_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', DOCFI_ASSETS_URL . 'css/rtl.css', array(), DOCFI_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'docfi_register_scripts', 12 );
if ( !function_exists( 'docfi_register_scripts' ) ) {
	function docfi_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     docfi_get_maybe_rtl('magnific-popup.css'), array(), DOCFI_VERSION );		
		wp_register_style( 'animate',        	 docfi_get_maybe_rtl('animate.min.css'), array(), DOCFI_VERSION );

		/*JS*/
		// magnific popup
		wp_register_script( 'magnific-popup',    DOCFI_ASSETS_URL . 'js/jquery.magnific-popup.min.js', array( 'jquery' ), DOCFI_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 DOCFI_ASSETS_URL . 'js/theia-sticky-sidebar.min.js', array( 'jquery' ), DOCFI_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'rt-parallax',   	 DOCFI_ASSETS_URL . 'js/rt-parallax.js', array( 'jquery' ), DOCFI_VERSION, true );
		
		// nice select js
		wp_register_script( 'nice-select',   	 DOCFI_ASSETS_URL . 'js/jquery.nice-select.js', array( 'jquery' ), DOCFI_VERSION, true );
		
		
		// wow js
		wp_register_script( 'rt-wow',   		 DOCFI_ASSETS_URL . 'js/wow.min.js', array( 'jquery' ), DOCFI_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      DOCFI_ASSETS_URL . 'js/isotope.pkgd.min.js', array( 'jquery' ), DOCFI_VERSION, true );		
		wp_register_script( 'swiper-min',        DOCFI_ASSETS_URL . 'js/swiper.min.js', array( 'jquery' ), DOCFI_VERSION, true );

		// counterup js
		wp_register_script( 'waypoints',        DOCFI_ASSETS_URL . 'js/waypoints.min.js', array( 'jquery' ), DOCFI_VERSION, true );
		wp_register_script( 'counterup',        DOCFI_ASSETS_URL . 'js/jquery.counterup.min.js', array( 'jquery' ), DOCFI_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'docfi_enqueue_scripts', 15 );
if ( !function_exists( 'docfi_enqueue_scripts' ) ) {
	function docfi_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'docfi-gfonts', 	DocfiTheme_Helper::fonts_url(), array(), DOCFI_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 				docfi_get_maybe_rtl('bootstrap.min.css'), array(), DOCFI_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-docfi',    DOCFI_ASSETS_URL . 'fonts/flaticon-docfi/flaticon.css', array(), DOCFI_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       	DOCFI_ASSETS_URL . 'css/font-awesome.min.css', array(), DOCFI_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            	docfi_get_maybe_rtl('animate.min.css'), array(), DOCFI_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'docfi-default',    	docfi_get_maybe_rtl('default.css'), array(), DOCFI_VERSION );
		// vc modules css
		wp_enqueue_style( 'docfi-elementor',   docfi_get_maybe_rtl('elementor.css'), array(), DOCFI_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'docfi-style',     	docfi_get_maybe_rtl('style.css'), array(), DOCFI_VERSION );
		
		// Template Style
		wp_add_inline_style( 'docfi-style',   	docfi_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         	DOCFI_ASSETS_URL . 'js/bootstrap.min.js', array( 'jquery' ), DOCFI_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'rt-parallax' );
		wp_enqueue_script( 'nice-select' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'swiper-min' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'docfi-main',    	DOCFI_ASSETS_URL . 'js/main.js', $dep , DOCFI_VERSION, true );
		
		// localize script
		$docfi_localize_data = array(
			'stickyMenu' 	=> DocfiTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => DocfiTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => DocfiTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'rtl':'ltr',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'post_scroll_limit' => DocfiTheme::$options['post_scroll_limit'],
			'nonce' => wp_create_nonce( 'docfi-nonce' )
		);
		wp_localize_script( 'docfi-main', 'docfiObj', $docfi_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
	} 

	/*review rating*/
	if( class_exists( Review::class )){
		wp_enqueue_style( 'rtrs-app' );
		return true;
	}
	return false;

}

add_action( 'wp_enqueue_scripts', 'docfi_high_priority_scripts', 1500 );
if ( !function_exists( 'docfi_high_priority_scripts' ) ) {
	function docfi_high_priority_scripts() {
		// Dynamic style
		DocfiTheme_Helper::dynamic_internal_style();
	}
}

function docfi_template_style(){
	
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( DocfiTheme::$bgtype == 'bgcolor' ): ?>
			<?php if( !empty( DocfiTheme::$bgcolor ) ) { ?>
				background-color: <?php echo DocfiTheme::$bgcolor; ?>;
			<?php } ?>
		<?php else: ?>
			background: url(<?php echo esc_url( DocfiTheme::$bgimg );?>) no-repeat scroll top center / 100%;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( DocfiTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( DocfiTheme::$padding_bottom );?>px;
	}
	.single-post .content-area .rt-single-post-content{
		padding-bottom: <?php echo esc_html( DocfiTheme::$padding_bottom );?>px;
	}

	<?php if( isset( DocfiTheme::$pagebgcolor ) || isset( DocfiTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo DocfiTheme::$pagebgimg; ?> );
		<?php if( !empty( DocfiTheme::$pagebgcolor ) ) { ?>
		background-color: <?php echo DocfiTheme::$pagebgcolor; ?>;
		<?php } ?>
	}
	<?php } ?>	
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'docfi-gfonts', DocfiTheme_Helper::fonts_url(), array(), DOCFI_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       DOCFI_ASSETS_URL . 'css/font-awesome.min.css', array(), DOCFI_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-docfi',    DOCFI_ASSETS_URL . 'fonts/flaticon-docfi/flaticon.css', array(), DOCFI_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'docfi-admin-style',  DOCFI_ASSETS_URL . 'css/admin-style.css', false, DOCFI_VERSION );
	wp_enqueue_script( 'docfi-admin-main',  DOCFI_ASSETS_URL . 'js/admin.main.js', false, DOCFI_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

/*Topbar menu function*/
if ( !function_exists( 'docfi_top_menu' ) ) {
	function docfi_top_menu() {
	    $menus = wp_get_nav_menus();
	    if(!empty($menus)){
	      	$menu_links = array();
	      	foreach ($menus as $key => $value) {
	        	$menu_links[$value->slug] = $value->name;  
	      	}
	      	return $menu_links;
	    }
	}
}
