<?php
/**
 * Initialize RAB Importer
 */
$asp = 'add_'.'submenu_'.'page';

$settings      = array(
  'menu_parent' => 'themes.php',
  'menu_title'  => esc_html__('RAB Importer', 'rab'),
  'menu_type'   => $asp,
  'menu_slug'   => 'rab-import',
);

/**
 * Front Page & Blog Page are page name strings. hence cannot be translated here
 */
$options        = array(
    'fashion' => array(
      'title'         => esc_html__('Fashion', 'rab'),
      'preview_url'   => 'http://rab.kaththemes.com/fashion/',
      'front_page'    => 'Home',
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary'   => 'Main', // Menu Location and Title
      ),
      'revslider'     => true,
      'revname'       => 'fashion-banner.zip'
    ),
    'shoes' => array(
      'title'         => esc_html__('Shoes', 'rab'),
      'preview_url'   => 'http://rab.kaththemes.com/shoes/',
      'front_page'    => 'Home',
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary'   => 'Main menu', // Menu Location and Title
      ),
      'revslider'     => true,
      'revname'       => 'shoes-banner.zip'
    ),
    'bags' => array(
      'title'         => esc_html__('Bags', 'rab'),
      'preview_url'   => 'http://rab.kaththemes.com/bags/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary'   => 'Main menu', // Menu Location and Title
      ),
      'revslider'     => true,
      'revname'       => 'bags-banner.zip'
    ),

    'cosmetics' => array(
      'title'         => esc_html__('Cosmetics', 'rab'),
      'preview_url'   => 'http://rab.kaththemes.com/cosmetics/',
      'front_page'    => 'Cosmetics Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'header-3'      => 'Fullscreen Menu',
          'header-3-left' => 'Header 3 Left'
      ),
      'revslider'     => true,
      'revname'       => 'cosmetic-banner.zip'
    ),

    'fashionv3' => array(
      'title'         => esc_html__('Fashion V3', 'rab'),
      'preview_url'   => 'http://rab.kaththemes.com/fashionv3/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'header-3'      => 'Fullscreen Menu',
          'header-3-left' => 'Header 3 Left'
      ),
      'revslider'     => true,
      'revname'       => 'fashion-v3-banner.zip'
    ),
);
if( class_exists( 'Kath_Demo_Importer' ) ) {
    Kath_Demo_Importer::instance( $settings, $options );
}


