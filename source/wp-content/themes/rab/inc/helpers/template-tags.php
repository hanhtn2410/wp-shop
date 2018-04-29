<?php
if( ! defined( 'ABSPATH' ) ) {
    exit;   //exit if accessed directly
}

/**
 * =================================
 * RAB ::: Template helper functions
 * =================================
 */

// rab breadcrumbs
if( ! function_exists( 'rab_breadcrumbs' ) ):
    function rab_breadcrumbs() {
        // Settings
        $separator          = '&gt;';
        $breadcrums_id      = 'breadcrumbs';
        $breadcrums_class   = 'breadcrumb';
        $home_title         = esc_html__('Home', 'rab');
          
        // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
        $custom_taxonomy    = 'product_cat';
           
        // Get the query & post information
        global $post, $wp_query;
           
        // Do not display on the homepage
        if ( !is_front_page() ) {
           
            // Build the breadcrums
            echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
               
            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url( get_home_url() ) . '" title="' . $home_title . '">' . $home_title . '</a></li>';
               
            if ( is_archive() && !is_tax() && !is_category() && !is_tag() && ! is_month() && ! is_year() && ! is_day() ) {
                $prefix = '';
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
                  
            } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
                  
                // If post is a custom post type
                $post_type = get_post_type();
                  
                // If it is a custom post type display name and link
                if($post_type != 'post') {
                      
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = esc_url( get_post_type_archive_link($post_type) );
                  
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                  
                }
                  
                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
                  
            } else if ( is_single() ) {
                  
                // If post is a custom post type
                $post_type = get_post_type();
                  
                // If it is a custom post type display name and link
                if($post_type != 'post') {
                      
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = esc_url( get_post_type_archive_link($post_type) );
                  
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                  
                }
                  
                // Get post category info
                $category = get_the_category();
                 
                if(!empty($category)) {
                  
                    // Get last category post is in
                    $last_category = end(array_values($category));
                      
                    // Get parent any categories and create array
                    $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                    $cat_parents = explode(',',$get_cat_parents);
                      
                    // Loop through parent categories and store in variable $cat_display
                    $cat_display = '';
                    foreach($cat_parents as $parents) {
                        $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    }
                 
                }
                  
                // If it's a custom post type within a custom taxonomy
                $taxonomy_exists = taxonomy_exists($custom_taxonomy);
                if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                       
                    $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                    $cat_id         = $taxonomy_terms[0]->term_id;
                    $cat_nicename   = $taxonomy_terms[0]->slug;
                    $cat_link       = esc_url( get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy) );
                    $cat_name       = $taxonomy_terms[0]->name;
                   
                }
                  
                // Check if the post is in a category
                if(!empty($last_category)) {
                    echo esc_attr( $cat_display );
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                      
                // Else if post is in a custom taxonomy
                } else if(!empty($cat_id)) {
                      
                    echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
                } else {
                      
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                      
                }
                  
            } else if ( is_category() ) {
                   
                // Category page
                echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
                   
            } else if ( is_page() ) {
                   
                // Standard page
                if( $post->post_parent ){
                       
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                       
                    // Get parents in the right order
                    $anc = array_reverse($anc);
                       
                    // Parent page loop
                    if ( !isset( $parents ) ) $parents = null;
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . esc_url( get_permalink($ancestor) ) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    }
                       
                    // Display parent pages
                    echo esc_attr( $parents );
                       
                    // Current page
                    echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                       
                } else {
                       
                    // Just display current page if not parents
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                       
                }
                   
            } else if ( is_tag() ) {
                   
                // Tag page
                   
                // Get tag information
                $term_id        = get_query_var('tag_id');
                $taxonomy       = 'post_tag';
                $args           = 'include=' . $term_id;
                $terms          = get_terms( $taxonomy, $args );
                $get_term_id    = $terms[0]->term_id;
                $get_term_slug  = $terms[0]->slug;
                $get_term_name  = $terms[0]->name;
                   
                // Display the tag name
                echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
               
            } elseif ( is_day() ) {
                   
                // Day archive
                   
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a></li>';
                   
                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '" title="' . get_the_time('F') . '">' . get_the_time('F') . '</a></li>';
                   
                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('F') . '</strong></li>';
                   
            } else if ( is_month() ) {
                   
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</a></li>';
                   
                // Month display
                echo '<li class="item-current item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('F') . '">' . get_the_time('F') . '</strong></li>';
                   
            } else if ( is_year() ) {
                   
                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . '</strong></li>';
                   
            } else if ( is_author() ) {
                   
                // Get the author information
                global $author;
                $userdata = get_userdata( $author );
                   
                // Display author name
                echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . esc_html__('Author:', 'rab').' ' . $userdata->display_name . '</strong></li>';
               
            } else if ( get_query_var('paged') ) {
                   
                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page', 'rab') . ' ' . get_query_var('paged') . '</strong></li>';
                   
            } else if ( is_search() ) {
               
                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">'.esc_html__( 'Search results for:', 'rab').' '. esc_html( get_search_query() ) . '</strong></li>';
               
            } elseif ( is_404() ) {
                echo '<li class="item-current"><strong>' . esc_html__('Error 404','rab') . '</strong></li>';
            } elseif( is_home() ) {
                echo '<li class="item-current"><strong class="bread-current">' . esc_html__( 'Blog', 'rab' ) . '</strong></li>';
            }
           
            echo '</ul>'; 
        }
    }
endif;

/**
 * RAB title banner
 */
if( ! function_exists( 'rab_title_banner' ) ):
    function rab_title_banner( $type = 'page', $title = '' ) {

        switch( $type ){
            case 'blog':
                rab_blog_banner( $title );
                break;

            case 'product':
                rab_product_banner( $title );
                break;

            case 'shop':
                rab_shop_archive_banner( $title );
                break;

            case 'page':
            case 'default':
                rab_page_banner( $title );
        }
    }
endif;

if( ! function_exists( 'rab_blog_banner' ) ) {
    function rab_blog_banner( $title = '') {
        $banner = cs_get_option('blog-title-fieldset');
        if( $title ) {
            $title = $title;   
        } else {
            $title = ( isset( $banner['blog-archive-title'] ) ) ? $banner['blog-archive-title'] : __('Our Posts','rab');
        }


        $background = $banner['blog-background'];
        $url = $background['image'];
        $repeat = ( isset( $background['repeat'] ) ) ? $background['repeat'] : 'no-repeat';
        $position = ( isset( $background['position'] ) ) ? $background['position'] : 'top center';
        $attachment = ( isset( $background['attachment'] ) ) ? $background['attachment'] : 'scroll';
        $size = ( isset( $background['size'] ) ) ? $background['size'] : 'cover';
        $color = ( isset( $background['color'] ) ) ? $background['color'] : '#16000d';

        $style =  'background-color: ' . $color . ';';
        $style .= ' background-image: url(' . $url . ');';
        $style .= ' background-repeat: '.$repeat.';';
        $style .= ' background-position: '.$position.';';
        $style .= ' background-size: '.$size . ';';
        ?>
        <div class="hero-banner inner-banner banner-scroll">
            <div class="fixed-banner banner2" style="<?php echo esc_attr( $style ); ?>">  
                <div class="banner-content">
                    <div class="content-wrap mb-0 banner-overlay">
                        <div class="inner">
                            <?php
                            if( is_search() ): ?>
                                <h2>
                                <?php esc_html_e('Search results for: ', 'rab');
                                echo get_search_query(); ?>
                                </h2>
                            <?php else:
                                ?>
                                <h2><?php echo esc_attr( $title ); ?></h2>
                                <?php
                                rab_breadcrumbs();
                            endif;
                            ?>
                        </div>
                    </div>
                    <!--content wrap-->
                </div>
                <!--banner content-->
            </div>
        </div>
        <!--main banner-->
        <?php
    }
}

if( ! function_exists( 'rab_page_banner' ) ) {
    function rab_page_banner() { 
        global $post;
        $meta = get_post_meta( $post->ID, '_custom_meta', true );
        $background = isset( $meta['page-title-background'] ) ? $meta['page-title-background'] : array();
        $url = ( isset( $background['image'] ) ) ? $background['image'] : '';
        $repeat = ( isset( $background['repeat'] ) ) ? $background['repeat'] : 'no-repeat';
        $position = ( isset( $background['position'] ) ) ? $background['position'] : 'top center';
        $attachment = ( isset( $background['attachment'] ) ) ? $background['attachment'] : 'scroll';
        $size = ( isset( $background['size'] ) ) ? $background['size'] : 'cover';
        $color = ( isset( $background['color'] ) ) ? $background['color'] : '#16000d';

        $style =  'background-color: ' . $color . ';';
        $style .= ' background-image: url(' . $url . ');';
        $style .= ' background-repeat: '.$repeat.';';
        $style .= ' background-position: '.$position.';';
        $style .= ' background-size: '.$size . ';';
        ?>
        <div class="hero-banner inner-banner banner-scroll">
            <div class="fixed-banner" style="<?php echo esc_attr( $style ); ?>">
                <div class="banner-content">
                    <div class="content-wrap mb-0 banner-overlay">
                        <div class="inner">
                            <?php 
                            the_title('<h2>', '</h2>' ); ?>
                            <?php 
                            if( isset( $meta['breadcrumbs'] ) ) {
                                rab_breadcrumbs();
                            }
                            
                            ?>
                        </div>
                    </div>
                    <!--content wrap-->
                </div>
                <!--banner content-->
            </div>
        </div>
        <!--main banner-->
        <?php
    }
}

if( ! function_exists( 'rab_product_banner' ) ) {
    function rab_product_banner() {
        $background = $banner['blog-background'];
        $url = ( isset( $background['image'] ) ) ? $background['image'] : '';
        $color = ( isset( $background['color'] ) ) ? $background['color'] : '#16000d';
        $repeat = ( isset( $background['repeat'] ) ) ? $background['repeat'] : 'repeat-x';
        $position = ( isset( $background['position'] ) ) ? $background['position'] : 'top center';
        $attachment = ( isset( $background['attachment'] ) ) ? $background['attachment'] : 'cover';
        $size = ( isset( $background['size'] ) ) ? $background['size'] : '';
        ?>
        <div class="hero-banner inner-banner banner-scroll">
            <div class="fixed-banner banner2" style="background: <?php echo esc_attr( $color ); ?> url( <?php echo esc_url( $url ); ?> ) <?php echo esc_attr($repeat); ?> <?php echo esc_attr( $position ); ?> <?php echo esc_attr( $attachment ); ?>/<?php echo esc_attr( $size ); ?>;">
                <div class="banner-content">
                    <div class="content-wrap mb-0 banner-overlay">
                        <div class="inner">
                            <?php the_title('<h2>', '</h2>'); ?>
                            <?php 
                            // display breadcrumb
                            rab_breadcrumbs();
                            ?>
                        </div>
                    </div>
                    <!--content wrap-->
                </div>
                <!--banner content-->
            </div>
        </div>
        <!--main banner-->
        <?php
    }
}

if( ! function_exists( 'rab_shop_archive_banner' ) ) {
    function rab_shop_archive_banner() {
        $banner = cs_get_option('shop-title-fieldset');
        $title = ( isset( $banner['shop-archive-title'] ) ) ? $banner['shop-archive-title'] : __('Our Products','rab');

        $background = ( isset( $banner['shop-background'] ) ) ? $banner['shop-background'] : array();;
        $url = ( isset( $background['image'] ) ) ? $background['image'] : '';
        $repeat = ( isset( $background['repeat'] ) ) ? $background['repeat'] : 'no-repeat';
        $position = ( isset( $background['position'] ) ) ? $background['position'] : 'top center';
        $attachment = ( isset( $background['attachment'] ) ) ? $background['attachment'] : 'scroll';
        $size = ( isset( $background['size'] ) ) ? $background['size'] : 'cover';
        $color = ( isset( $background['color'] ) ) ? $background['color'] : '#16000d';

        $style =  'background-color: ' . $color . ';';
        $style .= ' background-image: url(' . $url . ');';
        $style .= ' background-repeat: '.$repeat.';';
        $style .= ' background-position: '.$position.';';
        $style .= ' background-size: '.$size . ';';

        ?>
        <div class="hero-banner inner-banner banner-scroll">
            <div class="fixed-banner banner2" style="<?php echo esc_attr( $style ); ?>">
                <div class="banner-content">
                    <div class="content-wrap mb-0 banner-overlay">
                        <div class="inner">
                            <?php 
                            if( is_search() ) {
                                ?>
                                <h2>
                                    <?php esc_html_e('Search results for: ', 'rab'); ?>
                                    <?php echo get_search_query(); ?> 
                                </h2>
                                <?php
                            } else {
                                ?>
                                <h2><?php echo esc_attr( $title ); ?></h2>
                                <?php 
                                rab_breadcrumbs();
                                ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!--content wrap-->
                </div>
                <!--banner content-->
            </div>
        </div>
        <!--main banner-->
        <?php
    }
}


// rab entry meta
if( ! function_exists( 'rab_entry_meta' ) ):
    function rab_entry_meta() {
        ?>
        <span> 
            <i class="fa fa-calendar"></i>  <?php echo get_the_date(); ?>
        </span>

        <span> 
            <i class="fa fa-user"></i> <?php esc_html_e('By', 'rab'); ?> <a href="#"><?php echo get_the_author(); ?></a> 
        </span>

        <span> 
            <i class="fa fa-comments"></i> 
            <a href="<?php echo esc_url( get_permalink() ) ?>#comments">
                <?php
                printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'rab' ), number_format_i18n( get_comments_number() ) );
                ?>
            </a> 
        </span>
        
        <?php 
        if( ! is_singular('post') ):
            ?>
            <span>
                <?php 
                $tags = get_the_tags();
                if( $tags ):
                    ?>
                    <i class="fa fa-tags"></i> 
                    <?php
                    $total = count( $tags ); 
                    $c = 0;
                    foreach( $tags as $tag ) {
                        $c++;
                        $title = $tag->name;
                        $link = get_tag_link($tag);
                        $append = ', ';
                        if( $c === $total ) {
                            $append = '';
                        }
                        ?>
                        <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_attr( $title ); ?><?php echo esc_html( $append ); ?></a>
                        <?php
                    }
                endif;
                ?>
                
            </span>
            <?php
        endif;
    }
endif;

// rab pagination
if( ! function_exists( 'rab_pagination' ) ):
    function rab_pagination( $query = null ) {
        global $wp_query;
        if( ! $query ) {
            $query = $wp_query;
        }
        $big = 999999;

        $paged = get_query_var('paged');
        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $paged ),
            'total' => $query->max_num_pages,
            'type' => 'list',
            'prev_next'          => true,
            'prev_text'          => esc_html__('&larr;', 'rab'),
            'next_text'          => esc_html__('&rarr;', 'rab'),
        );
        echo paginate_links( $args );
    }
endif;

if( ! function_exists( 'rab_get_pagination' ) ):
    function rab_get_pagination( $query = null ) {
        global $wp_query;
        if( ! $query ) {
            $query = $wp_query;
        }
        $big = 999999;

        $paged = get_query_var('paged');
        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $paged ),
            'total' => $query->max_num_pages,
            'type' => 'array',
        );
        return paginate_links( $args );
    }
endif;

// social links
if( ! function_exists( 'rab_social_links' ) ) {
    function rab_social_links() {
        $facebook = cs_get_option('facebook');
        $twitter = cs_get_option('twitter');
        $linkedin = cs_get_option('linkedin');
        $googleplus = cs_get_option('googleplus');
        $youtube = cs_get_option('youtube');
        $vimeo = cs_get_option('vimeo');
        $instagram = cs_get_option('instagram');
        $pinterest = cs_get_option('pinterest');
        $snapchat = cs_get_option( 'snapchat' );
        $dribbble = cs_get_option('dribbble');
        $wordpress = cs_get_option('wordpress');
        $rss = cs_get_option('rss');

        echo '<ul class="social-icons">';
            if( $facebook ){
                echo '<li><a target="_blank" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a> </li>';
            }

            if( $twitter ){
                echo '<li><a target="_blank" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a> </li>';
            }

            if( $instagram ){
                echo '<li><a target="_blank" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a> </li>';
            }

            if( $pinterest ){
                echo '<li><a target="_blank" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a> </li>';
            }

            if( $googleplus ){
                echo '<li><a target="_blank" href="'.esc_url($googleplus).'"><i class="fa fa-google-plus"></i></a> </li>';
            }

            if( $linkedin ){
                echo '<li><a target="_blank" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a> </li>';
            }

            if( $youtube ){
                echo '<li><a target="_blank" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a> </li>';
            }

            if( $vimeo ){
                echo '<li><a target="_blank" href="'.esc_url($vimeo).'"><i class="fa fa-vimeo"></i></a> </li>';
            }

            if( $snapchat ){
                echo '<li><a target="_blank" href="'.esc_url($snapchat).'"><i class="fa fa-snapchat"></i></a> </li>';
            }

            if( $dribbble ){
                echo '<li><a target="_blank" href="'.esc_url($dribbble).'"><i class="fa fa-dribbble"></i></a> </li>';
            }

            if( $wordpress ){
                echo '<li><a target="_blank" href="'.esc_url($wordpress).'"><i class="fa fa-wordpress"></i></a> </li>';
            }

            if( $rss ){
                echo '<li><a target="_blank" href="'.esc_url($rss).'"><i class="fa fa-rss"></i></a> </li>';
            }
        echo '</ul>';
        
    }
}