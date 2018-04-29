<?php if (!defined('ABSPATH')) {
    die;
}

add_filter( 'cs_metabox_options', 'rab_metabox' );
function rab_metabox( $metabox ) {
    $metabox = array();

    $metabox[] = array(
        'post_type'  => array('page'),
        'id' => '_custom_meta',
        'title' => esc_html__( 'Page/Post Settings', 'rab' ),
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name' => 'title-section',
                'title' => esc_html__( 'Titlebar','rab' ),
                'fields' => array(
                    array(
                        'id' => 'title_bar',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Title Bar', 'rab' ),
                        'default' => 'true',
                    ),

                    array(
                        'id' => 'custom_title',
                        'type' => 'text',
                        'title' => esc_html__( 'Custom title', 'rab' ),
                        'dependency' => array( 'title_bar', '==', 'true' )
                    ),

                    array(
                        'id' => 'breadcrumbs',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Enable breadcrumbs?', 'rab' ),
                        'default' => true,
                        'dependency' => array( 'title_bar', '==', '1' )
                    ),

                    array(
                        'id' => 'page-title-background',
                        'type' => 'background',
                        'title' => esc_html__( 'Background', 'rab'),
                        'default' => array(
                            'image' => '',
                            'repeat' => 'repeat-x',
                            'position' => 'center center',
                            'attachment' => 'fixed',
                            'color' => '#ffbc00',
                        ),
                        'dependency' => array( 'title_bar', '==', '1' )
                    )
                ) 
            ),
            array(
                'name' => 'sidebar-section',
                'title' => esc_html__( 'Sidebar', 'rab' ),
                'fields' => array(
                    array(
                        'id' => 'sidebar',
                        'type' => 'switcher',
                        'title' => esc_html__( 'Enable Sidebar', 'rab' ),
                        'default' => 0
                    ),

                    array(
                        'id' => 'page_sidebar_position',
                        'type' => 'radio',
                        'title' => esc_html__( 'Sidebar position', 'rab' ),
                        'options' => array(
                            'left' => esc_html__( 'Left', 'rab' ),
                            'right' => esc_html__( 'Right', 'rab' ),
                        ),
                        'default' => 'left',
                        'dependency' => array( 'sidebar', '==', '1' )
                    ),

                    array(
                        'id' => 'page-sidebar-select',
                        'type' => 'select',
                        'options' => 'sidebar',
                        'title' => esc_html__( 'Choose sidebar', 'rab' ),
                        'default_option' => esc_html__( 'Select one', 'rab'),
                        'dependency' => array( 'sidebar', '==', '1' )
                    ),
                ) 
            ),

            array(
                'name' => 'blog-section',
                'title' => esc_html__( 'Blog', 'rab' ),
                'fields' => array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__( 'Blog Settings. Only applicable when "RAB Blog" template is selected. Also sidebars are neglected in modern layout', 'rab' ),
                    ),

                    
                    array(
                        'id' => 'blog_layout',
                        'type' => 'select',
                        'title' => esc_html__( 'Choose Blog Layout', 'rab' ),
                        'options' => array(
                            'classic' => esc_html__( 'Classic', 'rab' ),
                            'masonry' => esc_html__( 'Masonry', 'rab' ),
                            'modern' => esc_html__( 'Modern', 'rab' )
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
                        'dependency' => array( 'featured-post', '==', 'true' )
                    ),

                    array(
                        'id' => 'pagination-type',
                        'type' => 'select',
                        'title' => esc_html__( 'Pagination Type', 'rab' ),
                        'desc' => esc_html__( 'Type of pagination', 'rab' ),
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
                )
            ),
            array(
                'name' => 'shop-section',
                'title' => esc_html__( 'Shop', 'rab' ),
                'fields' => array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__( 'Shop Settings. Only applicable when "RAB Shop" template is selected', 'rab' ),
                    ),

                    array(
                        'id' => 'products_per_page',
                        'type' => 'text',
                        'title' => esc_html__( 'Products per page', 'rab' ),
                        'desc' => esc_html__( 'No of products per page', 'rab' ),
                        'default' => 12
                    ),

                    array(
                        'id' => 'page_product_view',
                        'type' => 'radio',
                        'title' => esc_html__( 'View', 'rab' ),
                        'options' => array(
                            'grid' => esc_html__( 'Grid', 'rab' ),
                            'list' => esc_html__( 'List', 'rab' ),
                        ),
                        'default' => 'grid'
                    ),

                    array(
                        'id'  => 'products_page_column',
                        'type' => 'number',
                        'title' => esc_html__( 'Columns','rab' ),
                        'desc' => esc_html__( 'No. of columns to display', 'rab' ),
                        'attributes' => array(
                            'min' => 2,
                            'max' => 4
                        ),
                        'default' => 4,
                        'after' => esc_html__( 'Please adjust columns number if you are using sidebar to display it properly', 'rab' ),
                        'dependency' => array( 'page_product_view_grid', '==', '' )
                    ),

                    
                )
            )
        )
    );
    // page metabox
    
    return $metabox;
}
