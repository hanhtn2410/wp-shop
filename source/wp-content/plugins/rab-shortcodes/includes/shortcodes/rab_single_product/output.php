<?php
global $woocommerce_loop;



$shortcode = 'rab_single_product';

$columns = 1;

$uniqueid = rab_sc_id( 'rab_single_product' );
$woocommerce_loop['columns'] = $columns;
$woocommerce_loop['thumb_size'] = 'rab-product-featured-carousel';

$args = array(
	'posts_per_page'      => 1,
	'post_type'           => 'product',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
);

if ( isset( $attributes['sku'] ) && ! empty($attributes['sku']) ) {
	$args['meta_query'][] = array(
		'key'     => '_sku',
		'value'   => sanitize_text_field( $attributes['sku'] ),
		'compare' => '=',
	);

	$args['post_type'] = array( 'product', 'product_variation' );
}

if ( isset( $attributes['id'] ) ) {
	$args['p'] = absint( $attributes['id'] );
}

$single_product = new WP_Query( $args );



if ( isset( $attributes['sku'] ) && $single_product->have_posts() && 'product_variation' === $single_product->post->post_type ) {

	$variation = new WC_Product_Variation( $single_product->post->ID );
	$attributes = $variation->get_attributes();

	// set preselected id to be used by JS to provide context
	$preselected_id = $single_product->post->ID;

	// get the parent product object
	$args = array(
		'posts_per_page'      => 1,
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'p'                   => $single_product->post->post_parent,
	);

	$single_product = new WP_Query( $args );
}

if( $single_product->have_posts() ):
	echo '<div id="'.$uniqueid.'" class="rab-wc-single-product rab-wc-column-'.$columns.'">';
		echo '<ul class="products big">';
		while( $single_product->have_posts() ): $single_product->the_post();
			$image_s = 'rab-product-featured-carousel';
			do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'product' );
		endwhile;
		echo '</ul>';
		echo '<div class="clearfix"></div>';
	echo '</div>';
endif;
wp_reset_postdata();
unset( $woocommerce_loop['thumb_size'] );