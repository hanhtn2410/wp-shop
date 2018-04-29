<?php
/**
 * Single post template
 *
 * @package RAB
 */

get_header(); 
global $post;
$layout = cs_get_option( 'post-detail-layout', 'classic' );

if ( empty($layout) ) {
    $layout = 'classic';
}

if( $layout === 'modern' && has_post_thumbnail() ): ?>
    <div class="hero-banner inner-banner blog-feature-banner banner-scroll">
        <div class="fixed-banner">
            <?php 
            $thumb_id = get_post_thumbnail_id( $post->ID );
            $banner = wp_get_attachment_image_src( $thumb_id, 'rab-blog-detail-banner' );
            if( $banner[0] ):
                ?>
                <figure class="overlay">
                    <img src="<?php echo esc_url( $banner[0] ); ?>" alt="">
                </figure>
                <?php
            endif;
            ?>
        </div>
    </div>
<?php endif; ?>


<main class="main blog-single-main p-pb single-pg">
    <div class="blog-single">
        <div class="container">
            <?php get_template_part( 'partials/single/post/content', $layout ); ?>
        </div>
    </div>
    <!--blog-->
</main>
<!-- /.main-->

<?php
get_footer();
?>