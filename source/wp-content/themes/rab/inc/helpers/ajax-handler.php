<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_ajax_load_more_posts', 'rab_load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'rab_load_more_posts' );
function rab_load_more_posts() {

	if( ! check_ajax_referer( 'load-more' ) ) {
		echo 'nonce validation failed';
		die;
	}

	$paged = (int)$_POST['paged'];
	$page_num = $paged+1;
	$layout = $_POST['layout'];

	$args = array(
		'post_type' => 'post',
		'paged' => $page_num
	);

	$query = new WP_Query( $args );
    $max = $query->max_num_pages;

	ob_start();
	if( $query->have_posts() ):
		while( $query->have_posts() ): $query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list'); ?>>
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

                <div class="entry-post-content  mb-20">
                    <?php the_excerpt(); ?>
                </div>
                <!--entry post content-->
                <a href="<?php the_permalink(); ?>" class="more">
                    <?php esc_html_e( 'Learn more', 'rab' ); ?>
                </a>
            </article>
			<?php
		endwhile;
	endif;

    



	$html = ob_get_clean();

	$data = array( 'content' => $html );
    if( $page_num < $max ) {
        $data['page'] = $page_num;
    }
	wp_send_json( $data );
}
/**
 * AJAX Load more btn trigger
 */
