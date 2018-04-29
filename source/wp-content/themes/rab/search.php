<?php
    
// title bar options
$search_for = 'blog';
$sidebar = true;
if( isset( $_GET['post_type'] ) && $_GET['post_type'] === 'product' ) {
    $search_for = 'shop';
    $sidebar = false;
}
$title_banner = cs_get_option( 'blog-title-fieldset' );
$display_title_bar = ( isset( $title_banner['blog-title-bar'] ) ) ? $title_banner['blog-title-bar'] : false;

get_header();
?>
    
<?php
/**
 * RAB Title Banner
 */

rab_title_banner($search_for);

?>

<main class="main primary-padding">
    <section class="blog-block">
        <div class="container">
            <?php 
            if( $search_for === 'shop' ):
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="blog-list-wrap">
                            <ul class="products">
                                <?php if( function_exists( 'wc_get_template_part' ) ): ?>
                                     wc_get_template_part( 'content', 'product' );
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php  else: ?>
                <?php if( have_posts() ): ?>
                    <?php get_template_part( 'partials/post/archive', 'classic' ); ?>
                <?php else: ?>
                    <h3><?php esc_html_e( 'Your search did not return any results.', 'rab' ); ?></h3>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="home-url">
                        <?php esc_html_e( 'Go back to home', 'rab' ); ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <!--blog-->
</main>
<!-- /.main-->

<?php
get_footer();
?>