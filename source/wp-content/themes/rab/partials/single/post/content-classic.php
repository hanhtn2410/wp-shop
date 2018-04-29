<?php 

$sidebar = cs_get_option( 'blog-fieldset' );

$sidebar_position = ( isset( $sidebar['blog-list-sidebar-position'] ) ) ? $sidebar['blog-list-sidebar-position'] : 'right';

$container_class = '';

if( $sidebar_position == 'left' ) {

    $container_class = 'pull-right';

}

?>

<div class="row p-pt">

    <div class="col-sm-9 col-xs-12 col-md-9 <?php echo esc_attr( $container_class ); ?>">

        <?php while( have_posts() ): the_post(); ?>

            <div id="post-<?php the_id(); ?>" <?php post_class('blog-detail'); ?>>

                

                <?php if( has_post_thumbnail() ): ?>

                    <figure>

                        <?php the_post_thumbnail('rab-blog-classic'); ?>

                    </figure>

                <?php endif; ?>



                <div class="classic-content-wrap entry-content mb-0">

                    <?php 

                    the_title('<h2>', '</h2>' );

                    ?>



                    <div class="post-info mb-10">

                        <?php rab_entry_meta(); ?>

                    </div>



                    <div class="entry-post-content  mb-20">

                        <?php the_content(); ?>

                    </div>

                    <div class="clearfix"></div>

                    <?php

                    $defaults = array(

                        'before'           => '<nav class="navigation">' . __( 'Pages:', 'rab' ),

                        'after'            => '</nav>',

                        'link_before'      => '<span class="pagenum">',

                        'link_after'       => '</span>',

                        'next_or_number'   => 'number',

                        'separator'        => ' ',

                        'nextpagelink'     => esc_attr__( 'Next page', 'rab' ),

                        'previouspagelink' => esc_attr__( 'Previous page', 'rab' ),

                        'pagelink'         => '%',

                        'echo'             => 1

                    );

 

                    wp_link_pages( $defaults );

                    ?>

                </div>



                <div class="mb-50">

                    <div class="bottom">

                        <div class="tag-links pull-left">

                            <?php 

                            $post_tags = get_the_tags();

                            if( $post_tags ):

                                foreach( $post_tags as $tags ):

                                    $term_id = $tags->term_id;

                                    $name = $tags->name;

                                    ?>

                                    <a href="<?php echo esc_url( get_tag_link( $term_id ) ); ?>"><?php echo esc_attr( $name ); ?></a>

                                    <?php

                                endforeach;

                            endif;

                            

                            ?>



                        </div>

                        <!--tag links-->



                        <?php get_template_part('partials/post/social', 'share' ); ?>

                    </div>

                    <div class="clearfix"></div>

                </div>



                <div class="btn-wrap">

                    <?php 

                    $next = get_next_post();

                    $prev = get_previous_post();



                    if( $prev && $prev->ID ):

                        ?>

                        <a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="btn btn-link text-uppercase btn-prev">

                            <i class="fa fa-long-arrow-left"></i> 

                                <?php esc_html_e('Previous Post', 'rab'); ?>

                        </a>

                        <?php

                    else:

                        ?>

                        <a href="#" class="disabled btn btn-link text-uppercase btn-prev">

                            <i class="fa fa-long-arrow-left"></i> 

                                <?php esc_html_e('Previous Post', 'rab'); ?>

                        </a>

                        <?php

                    endif;

                    

                    if( $next && $next->ID ):

                        ?>

                            <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="btn btn-link text-uppercase btn-next"><?php esc_html_e('next post', 'rab'); ?> <i class="fa fa-long-arrow-right"></i></a>

                        <?php

                    else:

                        ?>

                        <a href="#" class="disabled btn btn-link text-uppercase btn-next"><?php esc_html_e('next post', 'rab'); ?> <i class="fa fa-long-arrow-right"></i> </a>

                        <?php

                    endif;

                    ?>

                </div>

            </div>

        <?php endwhile; ?>





        <?php if( comments_open() ): ?>

            <div class="comment-area p-pb">

            

                <?php comments_template( '/comments.php', true ); ?>

            </div>

        <?php endif; ?>

    </div>



    <aside class="sidebar col-sm-3 col-xs-12 col-md-3">

        <?php get_sidebar(); ?>

    </aside>

</div>

