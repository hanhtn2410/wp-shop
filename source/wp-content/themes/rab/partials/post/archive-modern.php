<?php
$enable_featured_posts_carousel = cs_get_option( 'featured-post' );

if( $enable_featured_posts_carousel ):
    $category = cs_get_option('category', 1);

    $featured_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category__in' => array( $category )
    );

    $featured = new WP_Query( $featured_args );
    ?>
    <section class="feature-post mb-50 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap">
                        <div class="content">
                            <?php 
                            if( $featured->have_posts() ):
                                ?>
                                <ul class="feature-post-list">
                                <?php
                                while( $featured->have_posts() ): $featured->the_post();
                                    ?>
                                    <li>
                                        <div class="content-wrap no-margin">
                                            <div class="post-date">
                                                <?php 
                                                echo sprintf( __('By %s', 'rab'), get_the_author() );
                                                ?> / <?php echo get_the_date(); ?>
                                            </div>

                                            <h2 class="post-title mb-20">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php 
                                                    $title = get_the_title();
                                                    if( strlen($title) > 30 ) {
                                                        echo wp_trim_words( $title, 6 );
                                                    } else {
                                                        the_title();
                                                    }
                                                    ?>
                                                    
                                                </a>
                                            </h2>

                                            <div class="entry-content mb-35">
                                                <?php the_excerpt(); ?>
                                            </div>                                            
                                            <!--entry content-->

                                            <a href="<?php the_permalink(); ?>" class="more">
                                                <?php esc_attr_e( 'Learn more','rab' ); ?>
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                        <!--content-->
                                        <figure>
                                            <a href="<?php the_permalink(); ?>" class="image-effect">
                                                <?php 
                                                the_post_thumbnail('rab-blog-modern-featured');
                                                ?>
                                            </a>
                                        </figure>
                                        <!--figure-->
                                    </li>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                                </ul>
                                <?php
                            endif;
                            ?>
                        </div>
                        <!--content-->
                    </div>
                    <!--wrap-->
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
?>


<section class="modern-blog-list mt-60">
    <div class="container">
        <div class="cover">
        <?php 
        if( have_posts() ):
            $c = 0; // counter
            $r = 1;
            while( have_posts() ): the_post();
                $c++;
                if( $c === 1 ) {
                    echo '<div class="row">';
                }

                $extra_class = 'col-md-6 col-sm-6 col-xs-12 modern-list';
                $image_size = 'rab-blog-modern-big';

                if( $r % 2 == 0 ) {
                    if( $c == 1 ) {
                        $image_size = 'rab-blog-modern-small';
                        $extra_class .= ' mt-60 pull-right';
                    } else {
                        $image_size = 'rab-blog-modern-big';

                    }
                } else {
                    if( $c == 1 ) {
                        $image_size = 'rab-blog-modern-big';
                        $extra_class .= ' mt-60 pull-right';
                    } else {
                        $image_size = 'rab-blog-modern-small';
                    }
                }
                ?>

                <div id="post-<?php the_ID();  ?>" <?php post_class( $extra_class ); ?>>
                    <div class="title">
                        <h4>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <a href="<?php the_permalink(); ?>" class="more"><?php esc_attr_e( 'Read more', 'rab' ); ?></a>
                    </div>
                    <!--title-->

                    <div class="content">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <figure>
                            <a href="<?php the_permalink(); ?>" class="image-effect overlay">
                                <?php 
                                the_post_thumbnail($image_size);
                                ?>
                            </a>
                        </figure>
                    </div>
                    <!--content-->
                </div>

                <?php
                if( $c === 2 ) {
                    $r++;
                    echo '</div> <!-- /.row -->';
                    $c = 0;
                }
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="pagination">
                    <?php 
                    $pagination_type = cs_get_option( 'pagination-type', 'pagination' );
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    if( $pagination_type === 'load-more' ):
                        $label = cs_get_option('load-more-text');
                        ?>
                        <a href="#" data-page="<?php echo esc_attr( $paged ) ?>" data-nonce="<?php echo wp_create_nonce('load-more'); ?>" data-layout="modern" class="load-more btn"><?php echo ( $label ) ? esc_html( $label ) : esc_html__('Load more', 'rab'); ?></a>
                        <?php
                    else:
                        rab_pagination();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>