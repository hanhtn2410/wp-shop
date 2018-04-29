<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAB
 */

global $post;
$meta = get_post_meta( $post->ID, '_custom_meta', true );

// title bar options
$display_title_bar = true;
if( is_array( $meta ) ) {
    $display_title_bar = ( isset( $meta['title_bar'] ) ) ? true : false;
}


// sidebar options
$isSidebarActive = ( isset( $meta['sidebar'] ) && $meta['sidebar'] ) ? true : false;

$sidebarPosition = 'left';

$main_class = 'col-md-12 col-sm-12 col-xs-12';
if( $isSidebarActive ){
    $sidebarPosition = $meta['page_sidebar_position'];
    $main_class = 'col-md-9 col-sm-9 col-xs-12';
}

get_header(); 

?>
    
<?php
/**
 * RAB Title Banner
 */
if( $display_title_bar ){
    rab_title_banner('page');
}
?>

<main class="main single-pg  primary-padding">
    <div class="container">
        <div class="row">
            <?php 
            if ($isSidebarActive && $sidebarPosition === 'left' ): 
                $main_class .= ' pull-right';
            endif;
            ?>
            <div class="<?php echo esc_attr( $main_class ); ?>">
                
                    <?php 
                    while( have_posts() ): the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php 
                            if( has_post_thumbnail() ):
                                ?>
                                <figure class="mb-25">
                                    <?php the_post_thumbnail('full'); ?>
                                </figure>
                                <!--figure-->
                                <?php
                            endif;
                            ?>

                            <div class="entry-post-content">
                                <?php the_content(); ?>
                            </div>
                            <!--entry post content-->
                            
                            <?php 
                            $display_link_pages = false;

                            if( $display_link_pages ): ?>
                                <div class="link-pages">
                                    <?php wp_link_pages( $args ); ?>
                                </div>
                            <?php endif; ?>
                            
                        </article>
                        <?php
                    endwhile;
                    ?>
                <?php if( comments_open() ): ?>
                    <div class="comment-area p-pt clearfix">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>


            <?php 
            if( $isSidebarActive ):
                ?>
                <aside class="sidebar col-sm-3 col-md-3 col-xs-12">
                    <?php get_sidebar(); ?>
                </aside>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>
<!-- /.main-->

<?php
get_footer();
