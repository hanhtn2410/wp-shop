<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />    
    <!-- favicon -->
    
    <?php 
    if( function_exists( 'wp_site_icon' ) ) {
        wp_site_icon();
    } else {
        $favicon = cs_get_option( 'default_favicon' );
        if( $favicon ){
            $img = wp_get_attachment_image_src( $favicon, 'full' );
            ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( $img[0] ); ?>" />
            <?php
        }
    }
    ?>
    <link rel="pingback" href="<?php esc_url( bloginfo('pingback_url') ); ?>" />
    <?php
    wp_head();
    ?>    
</head>

<body <?php body_class(); ?>>
    <?php 
    $header = cs_get_option( 'header-style' );
    $header_style = ( $header ) ? $header : 'style1';
    ?>
    <div id="primary" class="outer-wrap header-<?php echo esc_attr( $header_style ); ?>">
        <?php 
        do_action( 'rab_before_body_output' );
        ?>

        <?php 
        $top_header = cs_get_option( 'top-header' );
        $is_enabled = ( isset( $top_header['top-bar-switch'] ) && $top_header['top-bar-switch'] ) ? true : false;

        if( $is_enabled ): 
            $text = $top_header['top-bar-left'];
            ?>

            <div class="top-bar">
                <div class="top-bar-wrap bar-visible">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <?php echo apply_filters( 'the_content', $text ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="top-bar-action">
                    <span class="toggle-top-bar">
                        <i class="fa fa-chevron-up"></i>
                    </span>
                </div>
            </div>
        <?php endif; ?>
        
        <?php get_template_part( 'partials/global/header', $header_style ); ?>
        <!--header-->