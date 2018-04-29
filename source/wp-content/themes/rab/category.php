<?php
/**
 * The category archive template
 * 
 * @package RAB
 */

    
// title bar options
$default = array(
    'blog-title-bar' => true
);
$title_banner = cs_get_option( 'blog-title-fieldset', $default );
$display_title_bar = ( isset( $title_banner['blog-title-bar'] ) ) ? true : false;

$layout = cs_get_option( 'blog_layout', 'classic' );

get_header(); 

?>
    
<?php
/**
 * RAB Title Banner
 */
if( $display_title_bar ){
    rab_title_banner('blog');
}
?>

<main class="main p-pb">
    <section class="blog-block">
        <div class="container">
            <?php get_template_part( 'partials/post/archive', esc_html( $layout ) ); ?>
        </div>
    </section>
    <!--blog-->
</main>
<!-- /.main-->

<?php
get_footer();
?>