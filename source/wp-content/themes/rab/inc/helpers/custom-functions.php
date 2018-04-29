<?php
if( ! defined( 'ABSPATH' ) ) {
	exit; // exit if accessed directly
}

/**
 * ================================
 * Custom functions definition file
 * ================================
 */

if( ! function_exists('cs_get_option' ) ) {
	// fallback if codestar framework if not active
	function cs_get_option( $option_name = '', $default = '' ) {
		$options = apply_filters( 'cs_get_option', get_option( CS_OPTION ), $option_name, $default );

		if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
			return $options[$option_name];
		} else {
			return ( ! empty( $default ) ) ? $default : null;
		}
	}
}

/**
 * Add woocommerce class in body if it doesn't exist
 */
add_filter('body_class', 'rab_add_body_class', 999 );
function rab_add_body_class( $classes ) {
	if( rab_plugin_active('woocommerce/woocommerce.php' ) && ! in_array('woocommerce', $classes ) ) {
		$classes[] = 'woocommerce';
	}

	return $classes;
}


// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function rab_include_visual_composer_extender(){
		require_once get_parent_theme_file_path( 'inc/helpers/visual-composer.php' );
	}
	add_action('init', 'rab_include_visual_composer_extender',1);
}



if ( ! function_exists( 'rab_get_height_percentage' ) ) {
    function rab_get_height_percentage($image, $width=1, $height=1) {
        if($image != '')
        {
            $re = "/width=\"(\\d+)\".*height=\"(\\d+)\"/";

            preg_match($re, $image, $matches);
            $height = $matches[2];
            $width = $matches[1];
        }

        if($width == 0)
            return 100;

        return ( $height / $width ) * 100;
    }
}

/**
 * Excerpt Length
 */
if( ! function_exists( 'rab_customize_excerpt_length' ) ) {
	function rab_customize_excerpt_length( $length ) {
		$num = (int)cs_get_option( 'excerpt-length', 30 );
		return $num;
	}
	add_filter( 'excerpt_length', 'rab_customize_excerpt_length', 999 );
}



/**
 * Body class filter
 */
if( ! function_exists( 'rab_add_body_classes' ) ) {
	function rab_add_body_classes( $classes ) {
		$sticky_header = cs_get_option( 'sticky' );
		if( $sticky_header ) {
			$classes[] = 'sticky-header';
		}

		return $classes;
	}
	add_filter( 'body_class', 'rab_add_body_classes', 99 );
}


/**
 * WP Title filter
 */
if( ! function_exists( 'rab_wp_title' ) ) {
	function rab_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		$title .= get_bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'rab' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'rab_wp_title', 10, 2 );
}



/**
 * Enable shortcode support in text widget
 */
add_filter( 'widget_text','do_shortcode' );

/**
 * RAB Cosmetics homepage
 */
if( ! function_exists( 'rab_after_body_output' ) ) {
	function rab_after_body_output() {
		$header = cs_get_option( 'header-style' );
    	$header_style = ( isset( $header ) ) ? $header : 'style1';

    	// we don't want extra content so return early
    	if( $header_style !== 'style3' ) {
    		return;
    	}

    	$variation = cs_get_option( 'header-variation', 'dark' );
    	$vClass = 'icon-dark';

		if( 'light' === $variation ) {
		    $vClass = 'icon-light';
		}
		
		?>
		<a href="#cd-nav" class="cd-nav-trigger bottom-trigger"><?php esc_html__( 'Menu' ,'rab' ); ?> 
	        <span class="cd-nav-icon <?php echo esc_attr( $vClass ); ?>"></span> 
	    </a> 

	    <div id="cd-nav" class="cd-nav">
	        <div class="cd-navigation-wrapper">
	             <div class="container"> 
	                <div id="dl-menu" class="dl-menuwrapper mb-40">
	                	<?php 
		                $args = array(
		                    'theme_location' => 'header-3',
		                    'container'      => false,
		                    'menu_class'     => 'full-pg-menu nav navbar-nav dl-menu dl-menuopen'
		                );

		                $is_mega_menu = true;
		                if( $is_mega_menu ) {
		                    $args['walker'] = new Ktc_Nav_Walker();
		                }

		               if( has_nav_menu( 'header-3' ) ):
		                    wp_nav_menu( $args );
		                else:
		                	?>
							<p><?php esc_html_e( 'Please assign header-3 menu', 'rab' ); ?></p>
		                	<?php
	                	endif;
		                ?>
	                </div>
	                <!--menu-->

	                <div class="clearfix"></div>
	                    <div class="mobile-search visible-xs">
                            <form action="<?php echo esc_url( home_url('/') ); ?>" class="navbar-form mobile-search visible-xs">
			                    <input type="search" placeholder="<?php esc_html_e('Search...', 'rab' ); ?>" name="s" class="searchbox-input" required="">
			                    <input type="submit" class="searchbox-submit" value="<?php esc_html_e( 'Submit', 'rab' ); ?>">
			                    <?php 
			                    if( function_exists('WC') ):
			                        ?>
			                        <input type="hidden" name="post_type" value="product">
			                        <?php
			                    endif;
			                    ?> 
			                </form>
	                    </div> 
	             </div>
	        </div> 
	    </div>
		<?php
	}
	add_action( 'rab_after_body_output', 'rab_after_body_output', 10 );
}



/* PHP Closing tag is omitted */