<?php
if( ! defined( 'ABSPATH' ) ) {
	exit; // exit if accessed directly
}

/**
 * ===================================================================
 * RAB ::: all the css & js registration & enqueue process are handled
 * ===================================================================
 */

/**
 * Register & enqueue styles
 */
if( ! function_exists( 'rab_enqueue_styles' ) ) {
	function rab_enqueue_styles() {
	    // enqueue our theme styles
	    wp_enqueue_style( 
	    	'bootstrap',
	    	RAB_CSS . 'bootstrap.min.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'animate',
	    	RAB_CSS . 'animate.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
    	);

	    wp_enqueue_style( 
	    	'icofont',
	    	RAB_CSS . 'icofont.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'font-awesome',
	    	RAB_CSS . 'font-awesome.min.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'fa-animation',
	    	RAB_CSS . 'font-awesome-animation.min.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'hover',
	    	RAB_CSS . 'hover.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'jquery-ui',
	    	RAB_CSS . 'jquery-ui.min.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'bxslider',
	    	RAB_CSS . 'jquery.bxslider.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'fractionslider',
	    	RAB_CSS . 'fractionslider.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'pe-icon-7-stroke',
	    	RAB_CSS . 'pe-icon-7-stroke.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'rab-fonts',
	    	RAB_CSS . 'font.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'colorbox',
	    	RAB_CSS . 'colorbox.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'dlmenu',
	    	RAB_CSS . 'menu.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'rab-main',
	    	RAB_CSS . 'main.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'rab-colorskin',
	    	RAB_CSS . 'color-skin/default.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'rab-responsive',
	    	RAB_CSS . 'responsive.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
	    );

	    wp_enqueue_style( 
	    	'rab-custom',
	    	RAB_CSS . 'custom.css',
	    	array(),
	    	RAB_VERSION,
	    	'all'
		);
	    

	    $body_font = cs_get_option('body-font');
	    $family = $body_font['family'];
	    $is_line_height = ( isset($body_font['height'] ) ) ? true : false;
	    $body_font_family = 'body{
	    	color: '.$body_font['color'].';
	    	font-family: '.$family.';
	    	font-size: '.$body_font['size'].'px;
	    }';

	    $h1_size = cs_get_option( 'h1-font-size' );
	    $h2_size = cs_get_option( 'h2-font-size' );
	    $h3_size = cs_get_option( 'h3-font-size' );
	    $h4_size = cs_get_option( 'h4-font-size' );
	    $h5_size = cs_get_option( 'h5-font-size' );
	    $h6_size = cs_get_option( 'h6-font-size' );
	    $anchor_color = cs_get_option( 'anchor-color' );
	    $anchor_active_color = cs_get_option( 'anchor-hover-color' );
	    $heading_font = cs_get_option('heading-font');
	    $heading_family = $heading_font['family'];

	    $heading_font_family = 'h1, h2, h3, h4, h5, h6{
			color: '.$heading_font['color'].';
	    	font-family: '.$heading_family.';
	    }

	    h1 {
	    	font-size: '.$h1_size.'px;
	    }

	    h2 {
	    	font-size: '.$h2_size.'px;
	    }

	    h3 {
	    	font-size: '.$h3_size.'px;
	    }

	    h4 {
	    	font-size: '.$h4_size.'px;
	    }

	    h5 {
	    	font-size: '.$h5_size.'px;
	    }

	    h6 {
	    	font-size: '.$h6_size.'px;
	    }

	    a{
	    	color: '.$anchor_color.';
	    }

	    a:hover,a:active {
	    	color: '.$anchor_active_color.';
	    }';

	    $top_bar = cs_get_option( 'top-header' );
	    $top_background = $top_bar['top-bar-bg'];
	    $top_color = $top_bar['top-bar-text-color'];
	    $top_bar_style = '.top-bar-wrap{
			background: '.$top_background.';
	    }';

	    $top_bar_style .= '.top-bar-wrap,
	    .top-bar-wrap h1,
		.top-bar-wrap h2,
		.top-bar-wrap h3,
		.top-bar-wrap h4,
		.top-bar-wrap h5,
		.top-bar-wrap h6,
		.top-bar-wrap a,
		.top-bar-wrap p,
		.top-bar-wrap strong,
		.top-bar-wrap ul{
			color: '.$top_color.';
	    }';

	    wp_add_inline_style( 'rab-colorskin', $body_font_family );
	    wp_add_inline_style( 'rab-colorskin', $heading_font_family );
	    wp_add_inline_style( 'rab-colorskin', $top_bar_style );

	    if( cs_get_option('css') ):
		    $custom_style =  esc_attr( cs_get_option('css') );
			wp_add_inline_style( 'rab-colorskin', $custom_style );
		endif; 
	}
	add_action( 'wp_enqueue_scripts', 'rab_enqueue_styles' );
}


/**
 * Register & enqueue scripts
 */
if( ! function_exists( 'rab_enqueue_scripts' ) ) {
	function rab_enqueue_scripts() {

		// enqueue our registered scripts
		wp_enqueue_script( 
			'webfont',
			RAB_JS . 'webfont.js',
			array(),
			RAB_VERSION,
			false 		// we need it in the head
		);

		if( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 
			'modernizr',
			RAB_JS . 'modernizr.js', 
			array(),
			RAB_VERSION,
			false
		);

		wp_enqueue_script( 
			'bootstrap',
			RAB_JS . 'bootstrap.min.js', 
			array( 'jquery' ),
			RAB_VERSION,
			true
		);
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-masonry' );

		wp_enqueue_script( 
			'bxslider',
			RAB_JS . 'jquery.bxslider.min.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'fractionslider',
			RAB_JS . 'jquery.fractionslider.min.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'colorbox',
			RAB_JS . 'jquery.colorbox-min.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'wow',
			RAB_JS . 'wow.min.js',
			array(),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'parallax',
			RAB_JS . 'parallax.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'dlmenu',
			RAB_JS . 'jquery.dlmenu.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'validate',
			RAB_JS . 'jquery.validate.min.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'countdown',
			RAB_JS . 'jquery.countdown.min.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		wp_enqueue_script( 
			'rab-main',
			RAB_JS . 'main.js',
			array('jquery'),
			RAB_VERSION,
			true
		);

		/**
		 * We need to localize other strings
		 */
		$strings = array(
			'username' => esc_html__( 'Please enter username', 'rab' ),
			'password' => esc_html__( 'Please enter password', 'rab' ),
			'email'    => esc_html__( 'Please enter email address', 'rab' ),
			'valid_email' => esc_html__( 'Please enter valid email', 'rab' ),
			'confirm' => esc_html__( 'Please enter same password', 'rab' ),
			'equals' => esc_html__( 'Password mismatch', 'rab' )
		);

		$ajax_url = array('ajaxurl' => admin_url( 'admin-ajax.php' ) );
		wp_localize_script( 'rab-main', 'rabStrings', $strings );
		wp_localize_script( 'rab-main', 'rab', $ajax_url );
		if( cs_get_option('google-analytics') ):
		    $analytics =  esc_attr( cs_get_option( 'google-analytics' ) );
			wp_add_inline_script( 'rab-main', esc_js( $analytics ) );
		endif;

		if( cs_get_option('js') ):
		    $custom_script =  esc_attr( cs_get_option( 'js' ) );
			wp_add_inline_script( 'rab-main', esc_js( $custom_script ) );
		endif;
		
	}
	add_action( 'wp_enqueue_scripts', 'rab_enqueue_scripts' );
}

/**
 * RAB ::: localize scripts
 */
if( ! function_exists( 'rab_localize_scripts' ) ) {
	function rab_localize_scripts() {
		$body_font = cs_get_option('body-font');
		$heading_font = cs_get_option('heading-font');

		$fonts = array();

		if( $body_font['font'] === 'google' ){
			$variants = $body_font['variant'];
			$family = $body_font['family'];
			$variant = ( isset( $variants ) && is_array( $variants ) ) ? implode(',', $variants ) : $variants[0];
			$family_variants = $family . ':'.$variant;
			array_push( $fonts, $family_variants );
		}

		if( $heading_font['font'] === 'google' ) {
			$variants = ( isset( $heading_font['variant'] ) && is_array( $heading_font['variant'] ) ) ? $heading_font['variant'] : array();
			$family = $heading_font['family'];
			if( $variants ){
				$variant = ( isset( $variants ) ) ? implode(',', $variants ) : '';
				$family_variants = $family . ':'.$variant;
			}
			
			array_push( $fonts, $family_variants );
		}

		$data = array('fonts' => $fonts);

		if( wp_script_is( 'webfont' ) ) {
			wp_localize_script( 'webfont', 'rabFonts', $data );

		}
		
		$script = "try{
			WebFont.load({
	            google: {
	              families: rabFonts.fonts
	            }
	        })
    	} catch(e){}";

    	if( wp_script_is( 'webfont' ) ) {
    		wp_add_inline_script( 'webfont', $script );	
    	}
	}

	add_action( 'wp_enqueue_scripts', 'rab_localize_scripts' );
}

/**
 * Rab admin enqueue
 */
if( ! function_exists( 'rab_admin_enqueue_styles_scripts' ) ) {
	function rab_admin_enqueue_styles_scripts() {
		wp_enqueue_style( 'rab-admin', RAB_CSS . 'admin/rab-admin.css' );		
	}
	add_action( 'admin_enqueue_scripts', 'rab_admin_enqueue_styles_scripts' );
}


/**
 * Enqueue rab widgets JS to widget screen
 */
if( ! function_exists( 'rab_widgets_page_resources' ) ) {
	function rab_widgets_page_resources() {
		wp_enqueue_script( 'rab-promo-banner-widget', RAB_JS . 'admin/rab-promo-banner-widget.js', array('jquery'), '1.0', true );
	}
	add_action( 'admin_print_scripts-widgets.php', 'rab_widgets_page_resources', 10 );
}

/**
 * Editor style
 */
if( ! function_exists( 'rab_add_editor_style' ) ) {
	function rab_add_editor_style() {
		add_editor_style( 'editor-style.css' );
	}
	add_action( 'admin_init', 'rab_add_editor_style' );
}

function rab_get_theme_used_google_fonts() {
	$fonts = array();

	$body = cs_get_option( 'body-font' );
	$heading = cs_get_option( 'heading-font' );

	if( $body && $body['font'] === 'google' ) {
		$family = $body['family'];
		$variants = '';
		if( ! empty( $body['variant'] ) && count( $body['variant'] ) > 1 ) {
			$variants = implode(',', $body['variant'] );
		} else {
			$variants = $body['variant'][0];
		}
		
		$fonts[$family] = $variants;
	}

	if( $heading && $heading['font'] === 'google' ) {
		$family = $heading['family'];
		$variants = '';
		if( ! empty( $heading['variant'] ) && count( $heading['variant'] ) > 1 ) {
			$variants = implode(',', $heading['variant'] );
		} else {
			$variants = $heading['variant'][0];
		}
		$fonts[$family] = $variants;
	}

	return $fonts;
}



/**
 * Google Font URL builder
 * Combine multiple google font in one URL
 */
function rab_google_fonts_url( $fonts, $subsets = array() ){
 
    /* URL */
    $base_url    =  "//fonts.googleapis.com/css";
    $font_args   = array();
    $family      = array();
 
    /* Format Each Font Family in Array */
    foreach( $fonts as $font_name => $font_weight ){
        $font_name = str_replace( ' ', '+', $font_name );
        if( !empty( $font_weight ) ){
            if( is_array( $font_weight ) ){
                $font_weight = implode( ",", $font_weight );
            }
            $family[] = trim( $font_name . ':' . urlencode( trim( $font_weight ) ) );
        }
        else{
            $family[] = trim( $font_name );
        }
    }
 
    /* Only return URL if font family defined. */
    if( !empty( $family ) ){
 
        /* Make Font Family a String */
        $family = implode( "|", $family );
 
        /* Add font family in args */
        $font_args['family'] = $family;
 
        /* Add font subsets in args */
        if( !empty( $subsets ) ){
 
            /* format subsets to string */
            if( is_array( $subsets ) ){
                $subsets = implode( ',', $subsets );
            }
 
            $font_args['subset'] = urlencode( trim( $subsets ) );
        }
 
        return add_query_arg( $font_args, $base_url );
    }
 
    return '';
}


/**
 * Registers an editor stylesheet for the current theme.
 */
function rab_theme_add_editor_styles() {
	$fonts = rab_get_theme_used_google_fonts();
	$url = rab_google_fonts_url( $fonts );
    $font_url = str_replace( ',', '%2C', $url );
    add_editor_style( $font_url );
}
add_action( 'admin_init', 'rab_theme_add_editor_styles' );


/* PHP Closing tag is omitted */