<?php
wc_reset_loop();
global $woocommerce_loop;
$columns = (int) $attributes['columns'];

$woocommerce_loop['columns'] = $columns;

$woocommerce_loop['name'] = 'rab_products';
$meta_query = WC()->query->get_meta_query();
$tax_query = WC()->query->get_tax_query();

if( $attributes['featured'] ) {
	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => 'featured',
		'operator' => 'IN',
	);
}


$uniqueid = rab_sc_id( 'rab_products' );



$args = array(
	'post_type'         =>  'product',
	'posts_per_page'    =>   (int) $attributes['per_page'],
	'order'             =>   $attributes['order'],
	'orderby'           =>   $attributes['orderby'],
	'meta_query'        =>   $meta_query,
	'tax_query'         =>   $tax_query
);

$query = new WP_Query( $args );
if( $query->have_posts() ):
	$extra_class = '';
	if( $attributes['display_style'] === 'carousel' ) {
		$extra_class .= 'product-slide';
	}
	
	echo '<div id="'.$uniqueid.'" class="rab-wc-products rab-wc-column-'.$columns.'">';
		echo '<ul class="products '.$extra_class.'">';
		while( $query->have_posts() ): $query->the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
		echo '</ul>';
		echo '<div class="clearfix"></div>';
	echo '</div>';
endif;

wc_reset_loop();
wp_reset_postdata();
