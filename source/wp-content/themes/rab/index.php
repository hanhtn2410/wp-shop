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
        	<h2 class="hidden"><?php esc_html_e('Our blogs', 'rab'); ?></h2>
            <?php get_template_part( 'partials/post/archive', $layout ); ?>
        </div>
    </section>
    <!--blog-->
</main>
<!-- /.main-->

<?php
get_footer();
?>