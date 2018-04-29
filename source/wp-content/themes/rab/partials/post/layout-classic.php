<?php
global $post;
$meta = get_post_meta( $post->ID, '_custom_meta', true );


$sidebar_position = 'left';
$sidebar_position = $meta['page_sidebar_position'];
$column_class = 'col-xs-12 col-md-9 col-sm-9';


if(  $sidebar_position === 'left' ) {
    $column_class .= ' pull-right';
}

?>
<div class="row">
    <div class="<?php echo esc_attr( $column_class ); ?>">
        <div class="blog-list-wrap">
            <?php 
            $args = array(
                'post_type' => 'post'
            );
            $posts = new WP_Query( $args );
            while( $posts->have_posts() ): $posts->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>"  <?php post_class('blog-list'); ?>>
                    <?php 
                    if( has_post_thumbnail() ):
                        ?>
                        <figure class="mb-25">
                            <a class="image-effect overlay" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('rab-blog-classic'); ?>
                            </a>
                        </figure>
                        <!--figure-->
                        <?php
                    endif;
                    ?>

                    <h3 class="entry-title mb-5">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?> 
                        </a>
                    </h3>
                    <!--title-->

                    <div class="post-info mb-28">
                        <?php rab_entry_meta(); ?>
                    </div>
                    <!--post info-->

                    <div class="entry-post-content  mb-30">
                        <?php the_excerpt(); ?>
                    </div>
                    <!--entry post content-->
                    <a href="<?php the_permalink(); ?>" class="btn bdr">
                        <?php esc_html_e( 'Learn more', 'rab' ); ?>
                    </a>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            
            ?>
            
        </div>
        <!--blog list wrap-->
        
        <div class="pagination">
            <?php 
            global $wp_query;
            $max = $wp_query->max_num_pages;
            $pagination_type = cs_get_option( 'pagination-type', 'pagination' );
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            if( $pagination_type === 'load-more' && is_array( rab_get_pagination() ) && $paged + 1 <= $max ):
                $label = cs_get_option('load-more-text');
                ?>
                <a href="#" data-container=".blog-list-wrap" data-page="<?php echo $paged ?>" data-nonce="<?php echo wp_create_nonce('load-more'); ?>" data-layout="classic" class="load-more btn"><?php echo ( $label ) ? esc_html( $label ) : esc_html__('Load more', 'rab'); ?></a>
                <?php
            else:
                rab_pagination( $posts );
            endif;
            ?>
        </div>
        
    </div>


    <aside class="sidebar col-sm-3 col-md-3 col-xs-12">
        <?php get_sidebar(); ?>
    </aside>

</div>