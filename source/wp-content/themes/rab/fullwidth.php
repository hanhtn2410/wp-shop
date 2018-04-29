<?php
/**
 * Template Name: Fullwidth page template
 */
global $post;
$meta = get_post_meta( $post->ID, '_custom_meta', true );
$display_title_bar = ( isset( $meta['title_bar'] ) && $meta['title_bar'] ) ? true : false;
get_header();
?>

<?php
/**
 * RAB Title Banner
 */

if( $display_title_bar ){
    rab_title_banner();
}

$main_class = 'primary-padding';
if( is_front_page() ) {
	$main_class = '';
}
?>
<main class="main">
	<div class="rab-main-content">
		<?php 
		while( have_posts() ):
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();