<?php

/**
 * The file that defines the shortcode used within the theme
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://themeforest.net/user/bickyg/portfolio
 * @since      1.0.0
 *
 * @package    Rab_Shortcodes
 * @subpackage Rab_Shortcodes/includes
 */


// Remove below Scripts becuase cause bug and We replace Our functionality
function rab_remove_VC_scripts( $handles = array() ) {

    wp_deregister_style( 'vc_tta_style' );
    wp_dequeue_style('vc_tta_style');

    wp_deregister_script('vc_accordion_script');
    wp_dequeue_script('vc_accordion_script');

    wp_deregister_script('vc_tta_autoplay_script');
    wp_dequeue_script('vc_tta_autoplay_script');

    wp_deregister_script('vc_tabs_script');
    wp_dequeue_script('vc_tabs_script');

    wp_deregister_script('waypoints');
    wp_dequeue_script('waypoints');
}

add_action('wp_footer', 'rab_remove_VC_scripts');


add_action( 'admin_init', 'rab_vc_add_custom_fields');

//Separators
add_shortcode('vc_separator', 'rab_sc_separator');

//Title with horizontal line
add_shortcode('vc_text_separator', 'rab_sc_title');

//Team Member
add_shortcode('team_member', 'rab_sc_team_member');

//Social Icon 
add_shortcode( 'social_icon', 'rab_sc_social_icon' );

//Text-Box
add_shortcode( 'textbox', 'rab_sc_textbox' );

//Custom textbox
add_shortcode( 'custom_textbox', 'rab_sc_custom_textbox' );

//Custom Title 
add_shortcode( 'custom_title', 'rab_sc_customTitle' );

//Image-Box
add_shortcode( 'imagebox', 'rab_sc_imagebox' );


//Banner
add_shortcode( 'banner', 'rab_sc_banner' );

//Custom image-box - Creative image box
add_shortcode( 'custom_imagebox', 'rab_sc_custom_imagebox' );

//Icon-Box-left
add_shortcode( 'iconbox_left', 'rab_sc_iconbox_left' );

// Icon-Box Top No border
add_shortcode( 'iconbox_top_noborder', 'rab_sc_iconbox_noborder' );

//Embed Video
add_shortcode( 'embed_video', 'rab_sc_embed_video' );

// Audio SoundCloud
add_shortcode( 'audio_soundcloud', 'rab_sc_audio_soundcloud' );

//Tabs
add_shortcode( 'tab_group', 'rab_sc_tab_group' );
add_shortcode( 'tab', 'rab_sc_tab' );

//Button
add_shortcode('button', 'rab_sc_button');

// VC Toggle Counter Box
add_shortcode( 'vc_toggle', 'rab_sc_vctoggle' );

/** 
 * RAB Social Share
 */
function rab_social_share() {
    if( ! is_single() ) {
        return;
    }
    $featured_image_id = get_post_thumbnail_id( get_the_ID() );
    $featured_image = wp_get_attachment_url( $featured_image_id );
    $title = get_the_title();
    $link = esc_url( get_permalink() );

    $facebook = "http://www.facebook.com/sharer.php?u=" . urlencode($link);
    $google = "https://plus.google.com/share?url=" . urlencode($link);
    $twitter = "https://twitter.com/intent/tweet?original_referer=" . urlencode($link) . "&amp;source=tweetbutton&amp;text=" . urlencode($title) . "&amp;url=" . urlencode(get_permalink(get_the_ID()));
    $pinterest = '//pinterest.com/pin/create/button/?url='.urlencode($link).'&media='.esc_attr($featured_image).'&description='.urlencode($title);
    ?>

    <ul class="social-icons pull-right">
        <li> <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
        <li> <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter" ></i></a> </li>
        <li> <a href="<?php echo esc_url( $google ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a> </li>
        <li> 
            <a target="_blank" href="<?php echo esc_url( $pinterest ); ?>" class="pin-it-button"      count-layout="horizontal"><i class="fa fa-pinterest"></i>
            </a>
        </li>
    </ul>
    <?php
}


/**
 * Rewritten shortcodes
 */
require_once dirname(__FILE__ ) . '/shortcodes/site_name/site_name.php';
require_once dirname( __FILE__ ) . '/shortcodes/year/year.php';

/**
 * ========================================================
 * The following shortcodes are mapped with Visual Composer
 * ========================================================
 */
require_once dirname(__FILE__ ) . '/shortcodes/info_banner/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/category_banner/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/rab_products/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/promo_banner/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/product_collections/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/flash_sale/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/rab_single_product/init.php';
require_once dirname(__FILE__ ) . '/shortcodes/rab_blog/init.php';
