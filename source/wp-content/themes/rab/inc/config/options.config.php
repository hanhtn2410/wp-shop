<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // exit if accessed directly
}

/**
 * Create the settings page
 */
add_filter( 'cs_framework_settings', 'rab_settings_page' );
function rab_settings_page( $settings ) {
    $settings = array(
        'menu_title' => esc_html__( 'RAB Theme Options', 'rab' ),
        'menu_type' => 'submenu',
        'menu_parent' => 'themes.php',
        'menu_slug' => 'rab-options',
        'framework_title' => esc_html__( 'RAB Options', 'rab' ),
        'show_reset_all' => true,
        'ajax_save' => false
    );

    return $settings;
}

/**
 * Pass the options for settings page
 */
add_filter( 'cs_framework_options', 'rab_settings_page_options' );
function rab_settings_page_options( $options ) {
    $options = array();
    /**
     * General Settings
     */

    $options[] = array(
        'name' => 'general',
        'title' => esc_html__( 'General Settings', 'rab' ),
        'icon' => 'fa fa-cog',
        'fields' => array(

            array(
                'id' => 'site-width',
                'type' => 'text',
                'title' => esc_html__( 'Site Width', 'rab' ),
                'default' => '1100',
                'after' => 'px'
            ),

            array(
                'id' => 'back-to-top',
                'type' => 'switcher',
                'title' => esc_html__( 'Back to Top', 'rab' ),
                'desc' => esc_html__( 'Enable or disable to top', 'rab' ),
                'default' => 1
            ),

            array(
                'id' => 'default-logo',
                'type' => 'image',
                'title' => esc_html__( 'Default Logo', 'rab' ),
                'desc' => esc_html__( 'Non retina version', 'rab' ),
            ),

            array(
                'id' => 'retina-logo',
                'type' => 'image',
                'title' => esc_html__( 'Retina Logo', 'rab' ),
                'desc' => esc_html__( 'Retina version', 'rab' ),
            ),

            array(
                'id' => 'default_favicon',
                'type' => 'image',
                'title' => esc_html__( 'Favicon', 'rab' ),
                'desc' => esc_html__( 'Favicon for your website (16px x 16px)', 'rab' ),
            ),
        )
    );

    /**
     * Typography Options
     */
    $options[] = array(
        'name' => 'typography',
        'title' => esc_html__( 'Typography Options', 'rab' ),
        'icon' => 'fa fa-font',
        'fields' => array(
            
            array(
                'id'        => 'body-font',
                'type'      => 'typography_advanced',
                'title'     => esc_html__('Body Font', 'rab'),
                'default'   => array(
                  'family'  => 'Arimo',
                  'variant' => 'regular',
                  'font'    => 'google',
                  'size'    => '15',
                  'color'   => '#5a5254'
                ),
                'height' => false,
                'chosen'    => true,
                'preview'   => true,
              ),

            array(
                'id' => 'heading-font',
                'type' => 'typography_advanced',
                'title' => esc_html__( 'Heading', 'rab' ),
                'default' => array(
                    'family' => 'Poppins',
                    'variant' => array( '300', 'regular', '500', '600', '700', '800', '900'),
                    'font' => 'google',
                    'color' => '#5a5254'
                ),
                'variant' => true,
                'chosen'    => true,
                'size'       => false,
                'preview'   => true,
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__( 'Font size', 'rab' ),
            ),

            array(
                'id' => 'h1-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H1 font size','rab' ),
                'default' => '48'
            ),

            array(
                'id' => 'h2-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H2 font size', 'rab' ),
                'default' => '35',
            ),

            array(
                'id' => 'h3-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H3 font size', 'rab' ),
                'default' => '30',
            ),

            array(
                'id' => 'h4-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H4 font size', 'rab' ),
                'default' => '24',
            ),

            array(
                'id' => 'h5-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H5 font size', 'rab' ),
                'default' => '20',
            ),

            array(
                'id' => 'h6-font-size',
                'type' => 'text',
                'after' => 'px',
                'title' => esc_html__( 'H6 font size', 'rab' ),
                'default' => '18',
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__( 'Color Settings', 'rab' ),
            ),

            array(
                'id' => 'anchor-color',
                'type' => 'color_picker',
                'title' => esc_html__( 'Anchor color', 'rab' ),
                'default' => '#5a5254'
            ),

            array(
                'id' => 'anchor-hover-color',
                'type' => 'color_picker',
                'title' => esc_html__( 'Anchor hover & active color', 'rab' ),
                'default' => '#e56d8e'
            ),

        )
    );

    /**
     * Header Options
     */
    $options[] = array(
        'name' => 'header',
        'title' => esc_html__( 'Header Settings', 'rab' ),
        'icon' => 'fa fa-header',
        'fields' => array(

            array(
                'id' => 'top-header',
                'type' => 'fieldset',
                'title' => esc_html__( 'Top Bar', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'top-bar-switch',
                        'type' => 'switcher',
                        'desc' => esc_html__( 'Enable or disable top bar in header', 'rab' ),
                        'default' => 0
                    ),

                    array(
                        'id' => 'top-bar-left',
                        'type' => 'wysiwyg',
                        'title' => esc_html__( 'Content', 'rab' ),
                        'settings' => array(
                            'media_buttons' => false
                        ),
                        'dependency' => array('top-bar-switch', '==', '1')
                    ),

                    array(
                        'id' => 'top-bar-bg',
                        'type' => 'color_picker',
                        'title' => esc_html__( 'Bar background color', 'rab' ),
                        'default' => '#303030',
                        'dependency' => array('top-bar-switch', '==', '1')
                    ),

                    array(
                        'id' => 'top-bar-text-color',
                        'type' => 'color_picker',
                        'title' => esc_html__( 'Bar text color','rab' ),
                        'color' => '#fff',
                        'dependency' => array('top-bar-switch', '==', '1')
                    ),
                )
            ),

            array(
                'id'  => 'header-style',
                'type' => 'image_select',
                'title' => esc_html__( 'Choose Header Style', 'rab' ),
                'options' => array(
                    'style1' => RAB_IMAGES . 'preset/header/header2.jpg',
                    'style2' => RAB_IMAGES . 'preset/header/header1.jpg',
                    'style3' => RAB_IMAGES . 'preset/header/header3.jpg',
                ),
                'default' => 'style1'
            ),

            array(
                'id'      => 'header-variation',
                'type'    => 'radio',
                'title'   => esc_html__( 'Header Variation', 'rab' ),
                'class'   => 'horizontal',
                'options' => array(
                    'light'    => 'Dark',
                    'dark'     => 'Light',
                ),
                'default'  => 'dark',
                'dependency' => array( 'header-style_style3', '==', 'true' ),
            ),

            array(
                'id' => 'sticky',
                'type' => 'switcher',
                'title' => esc_html__( 'Sticky Header', 'rab' ),
                'default' => 0
            ),
        )
    );

    /**
     * Page Settings
     */

    $options[] = array(
        'name' => 'page',
        'title' => esc_html__( 'Page Settings', 'rab' ),
        'icon' => 'fa fa-file-text',
        'fields' => array(

            array(
                'id' => 'page-title-fieldset',
                'type' => 'fieldset',
                'title' => esc_html__( 'Page', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'title-bar',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Title Bar','rab' ),
                        'default' => 1
                    ),

                    array(
                        'id' => 'page-title-background',
                        'type' => 'background',
                        'title' => esc_html__( 'Background', 'rab' ),
                        'default' => array(
                            'image' => '',
                            'repeat' => 'repeat-x',
                            'position' => 'center center',
                            'attachment' => 'fixed',
                            'color' => '#ffbc00',
                        ),
                        'dependency' => array( 'title-bar', '==', '1' )
                    )
                )
            ),
        )
    );

    /**
     * Blog Options
     */

    $options[] = array(
        'name' => 'blog',
        'title' => esc_html__( 'Blog Settings', 'rab' ),
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'blog-title-fieldset',
                'type' => 'fieldset',
                'title' => esc_html__( 'Blog', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'blog-title-bar',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Title Bar', 'rab' ),
                        'default' => 1
                    ),
                    array(
                        'id' => 'blog-archive-title',
                        'type' => 'text',
                        'title' => esc_html__( 'Blog archive title', 'rab' ),
                        'default' => esc_html__( 'Blog', 'rab' ),
                        'dependency' => array('blog-title-bar', '==', '1')
                    ),

                    array(
                        'id' => 'blog-background',
                        'type' => 'background',
                        'title' => esc_html__( 'Background', 'rab' ),
                        'default' => array(
                            'image' => '',
                            'repeat' => 'repeat-x',
                            'position' => 'center center',
                            'attachment' => 'fixed',
                            'color' => '#ffbc00',
                        ),
                        'dependency' => array('blog-title-bar', '==', '1')
                    )
                )
            ),
            array(
                'id' => 'blog_layout',
                'type' => 'select',
                'title' => esc_html__( 'Choose Blog Layout', 'rab' ),
                'options' => array(
                    'classic' => esc_html__( 'Classic', 'rab' ),
                    'masonry' => esc_html__( 'Masonry', 'rab' ),
                    'modern' => esc_html__( 'Modern', 'rab' ),
                ),
                'default' => 'classic',
            ),

             array(
                'type' => 'switcher',
                'id' => 'featured-post',
                'title' => esc_html__( 'Posts Carousel', 'rab' ),
                'desc' => esc_html__( 'Enable the display of post carousel?', 'rab' ),
                'dependency' => array( 'blog_layout', '==', 'modern' )
            ),

            array(
                'type' => 'select',
                'options' => 'category',
                'title' => esc_html__( 'Choose category to display for carousel', 'rab' ),
                'id' => 'posts_feature',
                'dependency' => array( 'blog_layout|featured-post', '==', 'modern|true' )
            ),

            array(
                'id' => 'excerpt-length',
                'type' => 'text',
                'title' => esc_html__( 'Excerpt Length', 'rab' ),
                'after' => esc_html__( '(words)', 'rab' ),
                'default' => '18',
                'desc' => ''
            ),

            array(
                'id' => 'pagination-type',
                'type' => 'select',
                'title' => esc_html__( 'Pagination Type', 'rab' ),
                'default_option' => esc_html__( 'Select one', 'rab' ),
                'options' => array(
                    'pagination' => esc_html__( 'Pagination', 'rab' ),
                    'load-more' => esc_html__( 'Load more button', 'rab' ),
                ),
                'default' => 'pagination'
            ),

            array(
                'id' => 'load-more-text',
                'type' => 'text',
                'title' => esc_html__( 'Button label', 'rab' ),
                'desc' => esc_html__( 'Load more button label', 'rab' ),
                'dependency' => array('pagination-type', '==', 'load-more')
            ),

            array(
                'id' => 'post-detail-layout',
                'type' => 'radio',
                'default' => true,
                'options' => array(
                    'classic' => esc_html__( 'Classic', 'rab' ),
                    'modern'  => esc_html__( 'Modern', 'rab' ),
                ),
                'title' => esc_html__( 'Post detail page layout', 'rab' ),
                'desc' => esc_html__( 'Modern layout will disable sidebar', 'rab' ),
            ),

            array(
                'type' => 'notice',
                'content' => wp_kses_post( esc_attr__( '<strong>The sidebar options shown below are applicable only in "Classic Blog Layout" and "Classic Post Detail" page layout</strong>', 'rab' ) ),
                'class' => 'info'
            ),

            array(
                'id' => 'blog-fieldset',
                'type' => 'fieldset',
                'title' => esc_html__( 'Sidebar', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'blog-list-sidebar-position',
                        'type' => 'select',
                        'title' => esc_html__( 'Sidebar position', 'rab' ),
                        'default' => 'right',
                        'desc' => esc_html__( 'Sidebar position for archive page', 'rab' ),
                        'options' => array(
                            'left' => esc_html__( 'Left', 'rab' ),
                            'right' => esc_html__( 'Right', 'rab' )
                        ),
                    ),

                    array(
                        'id' => 'blog-archive-sidebar-select',
                        'type' => 'select',
                        'options' => 'sidebar',
                        'title' => esc_html__( 'Choose sidebar', 'rab' ),
                        'default_option' => esc_html__( 'Select one', 'rab' ),
                    ),                    
                ),

            ),
        )
    );

    /**
     * Shop Settings
     */
    $options[] = array(
        'name' => 'shop',
        'title' => esc_html__( 'Shop Settings', 'rab' ),
        'icon' => 'fa fa-shopping-cart',
        'fields' => array(
            array(
                'id' => 'shop-title-fieldset',
                'type' => 'fieldset',
                'title' => esc_html__( 'Shop', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'shop-title-bar',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Title Bar', 'rab' ),
                        'desc'  =>  esc_html__( 'Show/hide title bar', 'rab' ),
                        'default' => 1
                    ),
                    array(
                        'id' => 'shop-archive-title',
                        'type' => 'text',
                        'title' => esc_html__( 'Shop archive title', 'rab' ),
                        'default' => esc_html__( 'Our Store', 'rab' ),
                        'dependency' => array('shop-title-bar', '==', '1')
                    ),

                    array(
                        'id' => 'shop-background',
                        'type' => 'background',
                        'title' => esc_html__( 'Background', 'rab' ),
                        'dependency' => array('shop-title-bar', '==', '1'),
                        'default' => array(
                            'image' => '',
                            'repeat' => 'repeat-x',
                            'position' => 'center center',
                            'attachment' => 'fixed',
                            'color' => '#ffbc00',
                        ),
                    )
                )
            ),
            
            array(
                'id' => 'shop-post-number',
                'type' => 'number',
                'title' => esc_html__( 'Number of products', 'rab' ),
                'default' => 12,
                'desc' => esc_html__( 'Enter number of products per page to display on listing page', 'rab' ),
            ),

            array(
                'id' => 'shop-layout',
                'type' => 'select',
                'title' => esc_html__( 'Shop Layout', 'rab' ),
                'default' => 'fullwidth',
                'options' => array(
                    'fullwidth' => esc_html__( 'Fullwidth', 'rab' ),
                    'two-column' => esc_html__( 'Two Columns', 'rab' ),
                )
            ),

            
            array(
                'id' => 'shop-fieldset',
                'type' => 'fieldset',
                'title' => esc_html__( 'Sidebar', 'rab' ),
                'dependency' => array('shop-layout', '==', 'two-column'),
                'fields' => array(

                    array(
                        'id' => 'shop-list-sidebar-position',
                        'type' => 'select',
                        'title' => esc_html__( 'Sidebar position (archive)', 'rab' ),
                        'default' => 'right',
                        'desc' => esc_html__( 'Sidebar position for products archive page', 'rab' ),
                        'options' => array(
                            'left' => esc_html__( 'Left', 'rab' ),
                            'right' => esc_html__( 'Right', 'rab' )
                        ),
                    ),

                    array(
                        'id' => 'shop-archive-sidebar-select',
                        'type' => 'select',
                        'options' => 'sidebar',
                        'title' => esc_html__( 'Choose sidebar', 'rab' ),
                        'default_option' => esc_html__( 'Select one', 'rab' ),
                    ),
                )
            ),
        )
    );

    /**
     * Footer Settings
     */

    $options[] = [
        'name'      =>      'footer',
        'title'     =>      esc_html__( 'Footer', 'rab' ),
        'icon'      =>      'fa fa-building',
        'fields'        =>      [
            [
                'id'        =>  'footer-widgets-fieldset',
                'type'  =>  'fieldset',
                'title' =>  esc_html__( 'Footer Widgets', 'rab' ),
                'fields'    =>  [
                    [
                        'id'        =>      'footer-widgets-switcher',
                        'type'  =>      'switcher',
                        'default'   =>      1,
                    ],

                    [
                        'id'    =>  'widgets-column',
                        'type'  =>  'number',
                        'title' =>  esc_html__( 'Number of columns', 'rab' ),
                        'default'   =>      '4',
                        'attributes'    =>  [
                            'max'   =>  4,
                            'min'   =>  0
                        ],
                        'dependency'    =>  ['footer-widgets-switcher', '==', 1]
                    ]
                ]
            ],
            [
                'id'      => 'google-analytics',
                'type'    => 'textarea',
                'title'   => esc_html__( 'Google Analytics', 'rab' ),
                'desc'  =>  esc_html__( 'Place your google analytics code here', 'rab' ),
                'before'    =>  esc_html__( 'Do not use &lt;script&gt; &lt;/script&gt; tag, it will be added by default', 'rab' ),
                'attributes'    =>  [
                    'rows'  =>  12,
                ],
                'sanitize'=>    false
            ],


            [
                'id'        =>  'footer-social',
                'type'  =>  'switcher',
                'title' =>  esc_html__( 'Social Links', 'rab' ),
                'desc'  =>  esc_html__( 'Enable or disable social links in footer', 'rab' ),
                'default'   =>  1
            ],

            [
                'id'      => 'footer-copyright',
                'type'    => 'wysiwyg',
                'title'   => esc_html__( 'Copyright message', 'rab' ),
                'desc'  =>  wp_kses_post( esc_html__( 'Enter your copyright notice. Shortcode can be used here. Available Shortcodes: [year], [site_name]', 'rab' ) ),
                'settings'  =>  [
                    'textarea_rows' => 10,
                    'tinymce'       => false,
                    'media_buttons' => false,
                ],
                'default'   =>  esc_html__( '&copy; [year] [site_name]. All rights reserved', 'rab' ),
            ],
        ]
    ];


    /**
     * Social Links
     */

    $options[] = array(
        'name'      =>      'social_links',
        'title'     =>      esc_html__( 'Social Media', 'rab' ),
        'icon'      =>      'fa fa-globe',
        'fields'        =>      array(

            array(
                'id'        =>  'facebook',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Facebook', 'rab' ),
            ),

            array(
                'id'        =>  'twitter',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Twitter', 'rab' ),
            ),

            array(
                'id'        =>  'googleplus',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Google Plus', 'rab' ),
            ),

            array(
                'id'        =>  'linkedin',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Linkedin', 'rab' ),
            ),

            array(
                'id'        =>  'youtube',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Youtube', 'rab' ),
            ),

            array(
                'id'        =>  'vimeo',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Vimeo', 'rab' ),
            ),

            array(
                'id'        =>  'instagram',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Instagram', 'rab' ),
            ),

            array(
                'id'        =>  'pinterest',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Pinterest', 'rab' ),
            ),

            array(
                'id'        =>  'snapchat',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Snapchat', 'rab' ),
            ),

            array(
                'id'        =>  'dribbble',
                'type'  =>  'text',
                'title' =>  esc_html__( 'Dribbble', 'rab' ),
            ),

            array(
                'id'        =>  'wordpress',
                'type'  =>  'text',
                'title' =>  esc_html__( 'WordPress', 'rab' ),
            ),

            array(
                'id'        =>  'rss',
                'type'  =>  'text',
                'title' =>  esc_html__( 'RSS', 'rab' ),
            ),
        )
    );

    /**
     * Custom CSS & JS
     */

    $options[] = [
        'name'      =>      'css_js',
        'title'     =>      esc_html__( 'Custom CSS & JS', 'rab' ),
        'icon'      =>      'fa fa-code',
        'fields'        =>      [
            [
                'id'      => 'css',
                'type'    => 'textarea',
                'title'   => esc_html__( 'Custom CSS', 'rab' ),
                'desc'  =>  esc_html__( 'All the custom css will be placed within &lt;head&gt; &lt;/head&gt; tag', 'rab' ),
                'before'    =>  esc_html__( 'Do not use &lt;style&gt; &lt;/style&gt; tag, it will be added by default', 'rab' ),
                'attributes'    =>  [
                    'rows'  =>  12,
                ]
            ],

            [
                'id'      => 'js',
                'type'    => 'textarea',
                'title'   => esc_html__( 'Custom JS', 'rab' ),
                'desc'  =>  esc_html__( 'All the custom js will be placed before closing &lt;/body&gt; tag.', 'rab' ),
                'before'    =>  esc_html__( 'Do not use &lt;script&gt; &lt;/script&gt; tag, it will be added by default', 'rab' ),
                'attributes'    =>  [
                    'rows'  =>  12,
                ]
            ],
        ]
    ];


    /**
     * Backup Options
     */
    $options[]   = [
        'name'     =>       'backup_restore',
        'title'    =>       esc_html__( 'Backup & restore', 'rab' ),
        'icon'     =>       'fa fa-refresh',
        'fields'   =>       [

            [
            'type'    =>    'notice',
            'class'   =>    'warning',
            'content' =>    esc_html__( 'You can save your current options. Download a Backup and Import.', 'rab' ),
            ],

            [
            'type'    => 'backup',
            ],

        ]
    ];


    return $options;
}

/**
 * Closing php tag is ommitted
 */