<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 modern-layout">

        <?php while( have_posts() ): the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class('blog-detail'); ?>>

                <div class="text-center">

                    <div class="text-center post-info mb-10">

                        <?php rab_entry_meta(); ?>

                    </div>

                </div>

            

                <div class="text-center mb-50">

                    <div class="content-wrap entry-content mb-0">

                        <?php 

                        the_title('<h2>', '</h2>' );

                        ?>



                        <div class="entry-post-content  mb-20">

                            <?php the_content(); ?>

                        </div>



                        <?php

                        $defaults = array(

                            'before'           => '<nav class="navigation">' . __( 'Pages:', 'rab' ),

                            'after'            => '</nav>',

                            'link_before'      => '<span class="pagenum">',

                            'link_after'       => '</span>',

                            'next_or_number'   => 'number',

                            'separator'        => ' ',

                            'nextpagelink'     => __( 'Next page', 'rab' ),

                            'previouspagelink' => __( 'Previous page', 'rab' ),

                            'pagelink'         => '%',

                            'echo'             => 1

                        );

     

                        wp_link_pages( $defaults );

                        ?>

                    </div>

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

                                    <a href="<?php echo esc_url( get_tag_link( $term_id ) ); ?>"><?php echo esc_html( $name ); ?></a>

                                    <?php

                                endforeach;

                            endif;

                            

                            ?>



                        </div>

                        <!--tag links-->



                        <?php get_template_part('partials/post/social', 'share' ); ?>



                        <div class="clearfix"></div>

                    </div>

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



</div>