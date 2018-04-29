<?php
if( ! defined( 'ABSPATH' ) ) {
	exit; // exit if accessed directly
}

/**
 * ===================================================
 * WooCommerce function definition & modification file
 * ===================================================
 */

/**
 * WooCommerce default actions removed
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Make some adjustments and rehook the required functions to their actions
 */
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 50 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 60 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
/**
 * ===========================================
 * WooCommerce modification made to our theme
 * ===========================================
 */

/**
 * Modify the shop columns applicable only in grid view
 */
add_filter('loop_shop_columns', 'rab_wc_shop_loop_columns', 10 );
function rab_wc_shop_loop_columns() {
	$column = cs_get_option( 'shop-post-columns' );	
	return $column;
}


/**
 * Hide the woocommerce default page title
 */
add_filter( 'woocommerce_show_page_title', 'rab_wc_page_title' );
function rab_wc_page_title() {
	return false;
}

/**
 * List Grid mode switcher
 */
add_action( 'woocommerce_before_shop_loop', 'rab_list_grid_switcher', 25 );
function rab_list_grid_switcher() {
    global $woocommerce_loop;
    
    // do not display if we're on 4 columns
    if( $woocommerce_loop['columns'] === '4' ) {
        return;
    } 

    $view = 'grid'; // default view
    if( isset( $woocommerce_loop['view'] ) && $woocommerce_loop['view'] === 'list' ) {
        $view = 'list';
    }

    if( isset( $_GET['view'] ) ) {
        $view = $_GET['view'];
    }
	?>
	<div class="short-by">
        <?php 
        if( $view === 'list' ):
            ?>
            <a href="?view=list" data-view="list" class="btn btn-default bdr active view-switcher">
                <i class="fa fa-list-ul"></i>
            </a>
            <?php
        else:
            ?>
            <a href="?view=list" data-view="list" class="btn btn-default bdr view-switcher">
                <i class="fa fa-list-ul"></i>
            </a>
            <?php
        endif;
        ?>

        <?php 
        if( $view === 'grid' ) :
            ?>
            <a href="?view=grid" data-view="grid" class="btn btn-default active bdr view-switcher">
                <i class="fa fa-th-large"></i>
            </a>
            <?php
        else:
            ?>
            <a href="?view=grid" data-view="grid" class="btn btn-default bdr view-switcher">
                <i class="fa fa-th-large"></i>
            </a>
            <?php
        endif;
        ?>
       
        <!--list-->

        
        <!--list-->
    </div>
	<?php
}

// adds pagination before the shop loop in filtering banner
add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 35 );


/**
 * Product archive thumbnail size
 */
add_filter( 'single_product_archive_thumbnail_size', 'rab_product_archive_thumbnail_size' );
function rab_product_archive_thumbnail_size() {
    global $wp_query, $woocommerce_loop;
    // to be filtered for different number of columns & case of sidebar
    
    $size = 'rab-product-default'; // 3 columns with sidebar
    if( isset( $woocommerce_loop['thumb_size'] ) ) {
        $size = $woocommerce_loop['thumb_size'];
    }
    return $size;
}

/**
 * ==================
 * Products Loop
 * ==================
 */

/**
 * Custom hooks
 */
add_action( 'rab_loop_before_thumbnail', 'rab_button_wrapper_open', 5 );
function rab_button_wrapper_open() {
    echo '<div class="icons">';
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'rab_loop_add_to_cart_args', 10, 3 );
function rab_loop_add_to_cart_args( $args, $product ) {

    $class = $args['class'];
    unset( $args['class'] );
    $filtered_class = $class;
    if( preg_match('/\bbutton\b/', $class ) ) {
        $filtered_class = preg_replace('/\bbutton\b/', 'btn ', $class );
    }

    $args['class'] = $filtered_class;

    return $args;
}

add_action( 'rab_loop_before_thumbnail', 'woocommerce_template_loop_add_to_cart', 10 );


function rab_woocommerce_product_add_to_cart_text( $text ) {
    global $product;

    if ( $product->is_type( 'variable' ) || $product->is_type('grouped') ) {
        return '<i class="pe-7s-edit"></i>';
    } else if( $product->is_type( 'external' ) ) {
        return '<i class="pe-7s-link"></i>';
    } else {
        return '<i class="pe-7s-cart"></i>';
    }
    
}
add_filter( 'woocommerce_product_add_to_cart_text', 'rab_woocommerce_product_add_to_cart_text', 999 );

add_action( 'rab_loop_before_thumbnail', 'rab_add_to_favorite_icon', 15 );
function rab_add_to_favorite_icon() {
    if( ! rab_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) {
        return;
    }
    global $product, $post;
    $current_product = $product;
    $product_id = $current_product->get_id();
    $product_type = $current_product->get_type();

    echo '<a href="'.esc_url( add_query_arg( 'add_to_wishlist', $product_id ) ) .'" class="btn"  rel="nofollow" data-product-id="'.$product_id .'" data-product-type="'.$product_type.'"><i class="pe-7s-like"></i></a>';
}


add_action( 'rab_loop_before_thumbnail', 'rab_add_to_compare_icon', 15 );
function rab_add_to_compare_icon() {
    if( ! rab_plugin_active( 'yith-woocommerce-compare/init.php' ) ) {
        return;
    }
    global $product;
    $product_id = $product->get_id();
    $args = array(
        'action' => 'yith-woocompare-add-product',
        'id' => $product_id
    );

    $lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
    if( $lang ) {
        $args['lang'] = $lang;
    }
    $url = esc_url_raw( add_query_arg( $args, site_url() ) );
    echo '<a href="'.$url.'" data-product_id="'.$product_id.'" class="compare btn"><i class="pe-7s-shuffle"></i></a>';
}

add_action( 'rab_loop_before_thumbnail', 'rab_quick_view_icon', 15 );
function rab_quick_view_icon() {
    if( ! rab_plugin_active( 'yith-woocommerce-quick-view/init.php' ) ) {
        return;
    }
    global $product;
    $product_id = $product->get_id();
    // add_filter( 'yith_add_quick_view_button_html', 'rab_quick_view_button_html', 10, 3 );
    echo '<a href="#" class="btn yith-wcqv-button" data-product_id="'.$product_id.'"><i class="pe-7s-look"></i></a>';
}


add_action( 'rab_loop_before_thumbnail', 'rab_button_wrapper_close', 30 );
function rab_button_wrapper_close() {
    echo '</div>';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'rab_before_thumbnail_wrapper_open', 5 );
function rab_before_thumbnail_wrapper_open() {
    echo '<div class="product-wrap base-align">';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'rab_print_product_link', 8 );
function rab_print_product_link() {
    global $product;
    $id = $product->get_id();
    $link = get_permalink( $id );
    echo '<a href="'.esc_url( $link ).'">&nbsp;</a>';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'rab_after_thumbnail_wrapper_close', 30 );
function rab_after_thumbnail_wrapper_close() {
    echo '</div>';
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'rab_modify_item_title_output', 10 );
function rab_modify_item_title_output() {
    echo '<h6 class="woocommerce-loop-product__title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h6>';
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

/**
 * ===========================================
 * Product Archive page & Custom template loop
 * ===========================================
 */

add_filter( 'loop_shop_per_page', 'rab_loop_shop_per_page', 20 );
function rab_loop_shop_per_page( $cols ) {
  $number = cs_get_option('shop-post-number', 12);
  return $number;
}

/**
 * Display product excerpt in list view
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'rab_show_description', 15 );
function rab_show_description() {
    global $woocommerce_loop;
    if( isset( $woocommerce_loop['view'] ) && $woocommerce_loop['view'] === 'list' ) {
        $excerpt = get_the_excerpt();
        echo apply_filters( 'the_excerpt', $excerpt );
    }
}

/**
 * Add to cart button & other buttons for List view
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'rab_show_buttons_list_view', 20 );
function rab_show_buttons_list_view() {
    global $woocommerce_loop, $product;
    $product_id = $product->get_id();
    if( isset( $woocommerce_loop['view'] ) && $woocommerce_loop['view'] === 'list' ):
        ?>
        <div class="button-group mb-25 list-view-buttons-wrap">
            <?php
            if ( $product->is_type( 'variable' ) || $product->is_type('grouped') ) {
                ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-default btn-cart"><i class="pe-7s-edit"></i> <?php esc_html_e('
                    Select Options', 'rab'); ?>
                </a>
                <?php
            } else if( $product->is_type( 'external' ) ) {
                ?>
                <a href="<?php echo esc_url( $product->get_product_url() ); ?>" class="btn btn-default btn-cart"><i class="pe-7s-link"></i> <?php esc_html_e('
                    View Product', 'rab'); ?>
                </a>
                <?php
            } else {
                $uri = $_SERVER['REDIRECT_URL'];
                ?>
                <a href="<?php echo add_query_arg('add-to-cart', $product_id, $uri ); ?>" class="btn btn-default btn-cart"><i class="pe-7s-cart"></i> <?php esc_html_e('
                    ADD TO CART', 'rab'); ?>
                </a>
                <?php
            }
            ?>
            
            <div class="icons mb-0"> 
                <?php
                // yith wishlist
                if( rab_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) {
                    $current_product = $product;
                    $product_id = $current_product->get_id();
                    $product_type = $current_product->get_type();
                    echo '<a href="'.esc_url( add_query_arg( 'add_to_wishlist', $product_id ) ) .'" class="btn"  rel="nofollow" data-product-id="'.$product_id .'" data-product-type="'.$product_type.'"><i class="pe-7s-like"></i></a>';
                }
                
                // yith product compare
                if( rab_plugin_active( 'yith-woocommerce-compare/init.php' ) ) {
                    $args = array(
                        'action' => 'yith-woocompare-add-product',
                        'id' => $product_id
                    );

                    $lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
                    if( $lang ) {
                        $args['lang'] = $lang;
                    }
                    $url = esc_url_raw( add_query_arg( $args, site_url() ) );

                    echo '<a href="'.$url.'" data-product_id="'.$product_id.'" class="compare btn"><i class="pe-7s-shuffle"></i></a>';
                }
                

                // quick view
                if( rab_plugin_active( 'yith-woocommerce-quick-view/init.php' ) ) {
                    echo '<a href="#" class="btn yith-wcqv-button" data-product_id="'.$product_id.'"><i class="pe-7s-look"></i></a>';
                }
                ?>


    
            </div>
        </div>
        <?php
    endif;
}

/**
 * Show Product meta if it's list view
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'rab_show_product_meta', 40 );
function rab_show_product_meta( ) {
    global $woocommerce_loop, $product;

    if( isset( $woocommerce_loop['view'] ) && $woocommerce_loop['view'] === 'list' ) {
        ?>
        <div class="tags-wrap">
            <b><?php esc_html_e('Category:', 'rab'); ?> </b>
            <?php 
            $categories_arr = $product->get_category_ids();
            $categories = get_terms( array(
                'taxonomy' => 'product_cat',
                'include' => $categories_arr 
                )
            );
            foreach( $categories as $cat ) {
                $link = get_term_link( $cat );
                ?>
                <span><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_attr( $cat->name ); ?></a></span>
                <?php
            }
            ?>
        </div>
        <?php
    }
}

/**
 * ================================
 * Product Detail Page
 * ================================
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

/**
 * Stock counter
 */
add_action( 'woocommerce_single_product_summary', 'rab_stock_info', 15 );
function rab_stock_info() {
    global $product;
    if( $product->is_in_stock() ):
        ?>
        <div class="stock-info mb-10">
            <span>
                <i class="fa fa-check-square"></i> <?php esc_html_e('Instock', 'rab' ); ?>
            </span>
        </div>
        <?php
    else:
        ?>
        <div class="stock-info out-of-stock mb-10">
            <span>
                <i class="fa fa-minus-square"></i> <?php esc_html_e('Out of stock', 'rab' ); ?>
            </span>
        </div>
        <?php
    endif;
}

/**
 * ========================
 * Product Detail Page
 * ========================
 */
add_action( 'woocommerce_before_main_content', 'rab_add_breadcrumb_to_product_detial', 20 );
function rab_add_breadcrumb_to_product_detial() {
    if( is_singular( 'product' ) ) {
        $args = array( 'delimeter' => '<span class="">/</span>' );
        woocommerce_breadcrumb( $args );
    }
    
}


/**
 * Cart Item Counter
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'rab_woocommerce_header_add_to_cart_fragment' );
function rab_woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="count rounded-crcl"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'rab' ), WC()->cart->get_cart_contents_count() ); ?> </span> 
    <?php
    
    $fragments['span.count.rounded-crcl'] = ob_get_clean();
    
    return $fragments;
}


/**
 * YITH Compare
 */
add_filter( 'yith_woocompare_compare_added_label', 'rab_modify_yith_compare_added_label', 99 );
function rab_modify_yith_compare_added_label() {
    return '';
}

/**
 * Woocommerce product carousel
 */
add_filter( 'woocommerce_single_product_carousel_options', 'rab_product_carousel', 99 );
function rab_product_carousel( $settings ) {
    $settings = array(
        'rtl'            => is_rtl(),
        'animation'      => 'slide',
        'smoothHeight'   => true,
        'directionNav'   => false,
        'controlNav'     => 'thumbnails',
        'slideshow'      => true,
        'animationSpeed' => 500,
        'animationLoop'  => true, // Breaks photoswipe pagination if true.
    );

    return $settings;
}

/* PHP Closing tag is omitted */