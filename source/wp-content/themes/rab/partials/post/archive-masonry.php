<?php
// image thumb sizes for masonry
$thumb_arr = array(
    'rab-blog-masonry-small', 
    'rab-blog-masonry-medium', 
    'rab-blog-masonry-large'
);


?>
<div class="row masonry grid">
    <?php
    if( have_posts() ):
        while( have_posts() ): the_post();
            $size = array_rand( array_flip( $thumb_arr ), 1 );
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4 grid-item'); ?>>
               <div class="blog-list"> 
                   <?php 
                    if( has_post_thumbnail() ):
                        ?>
                        <figure class="mb-20">
                            <a href="<?php the_permalink(); ?>" class="image-effect overlay">
                                <?php the_post_thumbnail( $size ); ?>
                            </a>
                        </figure>
                        <!--figure-->
                        <?php
                    endif;
                    ?>

                    <h4 class="entry-title mb-5">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                    <!--title-->

                    <div class="post-info mb-28">
                        <?php rab_entry_meta(); ?>
                    </div>
                    <!--post info-->

                    <div class="entry-post-content  mb-20">
                        <?php the_excerpt(); ?>
                    </div>
                    <!--entry post content-->
                    <a href="<?php the_permalink(); ?>" class="more">
                        <?php esc_html_e('Learn More', 'rab'); ?>
                    </a>
                </div>    
            </div>
            <?php
        endwhile;
        ?>

        <div class="pagination">
            <?php 
            $pagination_type = cs_get_option( 'pagination-type', 'pagination' );
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            if( $pagination_type === 'load-more' ):
                $label = cs_get_option('load-more-text');
                ?>
                <a href="#" data-page="<?php echo $paged ?>" data-nonce="<?php echo wp_create_nonce('load-more'); ?>" data-layout="classic" class="load-more btn"><?php echo ( $label ) ? esc_html( $label ) : esc_html__('Load more', 'rab'); ?></a>
                <?php
            else:
                rab_pagination();
            endif;
            ?>
        </div>

        <?php
    endif;
    wp_reset_postdata();
    ?>
</div>

