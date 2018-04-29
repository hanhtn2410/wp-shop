<?php
/**
 * Template Name: RAB Blog
 */
global $post;
$meta = get_post_meta( $post->ID, '_custom_meta', true );


$display_title_bar = ( $meta['title_bar'] ) ? true : false;
$display_sidebar = ( $meta['sidebar'] ) ? 'enabled' : 'disabled';

$layout = ( isset( $meta['blog_layout'] ) ) ? $meta['blog_layout'] : 'classic';

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
<main class="main single-pg  p-pb">
	<section class="blog-block">
		<div class="container">
			<h2 class="hidden"><?php the_title(); ?></h2>
			<?php get_template_part( 'partials/post/layout', $layout ); ?>
		</div>
	</section>
</main>
<?php

get_footer();