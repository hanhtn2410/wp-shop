<?php
/**
 * Template Name: RAB Shop
 */

global $post, $woocommerce_loop;

$meta = get_post_meta( $post->ID, '_custom_meta', true );

$display_title_bar = ( isset( $meta['title_bar'] ) ) ? true : false;
$display_sidebar = ( $meta['sidebar'] ) ? 'enabled' : 'disabled';

$columns = ( isset( $meta['products_page_column'] ) ) ? $meta['products_page_column'] : 4;
if( ! isset($_GET['view'] ) ) {
	$view = ( isset( $meta['page_product_view'] ) ) ? $meta['page_product_view'] : 'grid';
} else {
	$view = $_GET['view'];
}

$woocommerce_loop['name'] = $post->post_name;

$woocommerce_loop['view'] = $view;
if( $view === 'list' ) {
	$woocommerce_loop['columns'] = 1;
} else {
	$woocommerce_loop['columns'] = $columns;
	if( $display_sidebar === 'enabled' ) {
		$woocommerce_loop['columns'] = 3;
	} else {
		$woocommerce_loop['columns'] = 4;
	}
}
get_header('shop');
?>

<?php
/**
 * RAB Title Banner
 */
if( $display_title_bar ){
    rab_title_banner('page');
}
?>

<?php			
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 * @hooked WC_Structured_Data::generate_website_data() - 30
	 */
	do_action( 'woocommerce_before_main_content' );
?>

		<?php
		$wrap_class = 'col-md-12 col-sm-12';
		if( $display_sidebar === 'enabled' ) {
		    $wrap_class = 'col-md-9 col-sm-9 sidebar-enabled';
		}

		$position = ( isset( $meta['page_sidebar_position'] ) ) ? $meta['page_sidebar_position'] : 'left';
		if( $position === 'left' ) {
			$wrap_class .= ' pull-right';
		} else {
			$wrap_class .= ' pull-left';
		}

		$wrap_class .= ' columns-'.$columns;

		?>
    	<div class="<?php echo $wrap_class; ?> col-xs-12">

			<?php
		 	
			$paged = ( get_query_var('paged' ) ) ? get_query_var('paged') : 1;
			$per_page = $meta['products_per_page'] ? $meta['products_per_page'] : cs_get_option('shop-post-number', 12 );

			$meta_query = WC()->query->get_meta_query();
			$tax_query = WC()->query->get_tax_query();
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => $per_page,
				'post_status'    => 'publish',
				'paged' => $paged,
				'meta_query'        =>   $meta_query,
				'tax_query'         =>   $tax_query
			);
			global $wp_query;
			$the_query = $wp_query;
			$query = new WP_Query( $args );

			
			$wp_query = $query;
			if( $wp_query->have_posts() ): 
				wc_set_loop_prop( 'per_page', $per_page );
				wc_set_loop_prop( 'total_pages', $query->max_num_pages );
				wc_set_loop_prop( 'total', $query->found_posts );
				?>

				<div class="storefront-sorting rab-sorting clearfix">
					<?php
						/**
						 * woocommerce_before_shop_loop hook.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
					?>
				</div>
				
				<div class="products-wrap view-<?php echo $view; ?>">
					<?php
					woocommerce_product_loop_start();
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<?php
							/**
							 * woocommerce_shop_loop hook.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
						?>

						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; // end of the loop. ?>

					<?php 
					
					woocommerce_product_loop_end(); ?>
				</div>
				<div class="clearfix"></div>
				<nav class="woocommerce-pagination">
					<?php rab_pagination($query); ?>
				</nav>

				<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					// do_action( 'woocommerce_after_shop_loop' );
				?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php
					/**
					 * woocommerce_no_products_found hook.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				?>

			<?php 
			wp_reset_postdata();

			$wp_query = $the_query;
			endif; ?>

		</div>

		<?php 

		// only display if it's enabled from theme options
		if( $display_sidebar === 'enabled' ):

			?>
			<aside class="sidebar col-md-3 col-sm-3 col-xs-12 shop-sidebar">
				<?php 
				$page_sidebar = $meta['page-sidebar-select'];
				if( ! isset( $page_sidebar ) ) {
					$page_sidebar = 'rab-product-sidebar';
				}
				dynamic_sidebar( $page_sidebar );
				?>
			</aside>
			<?php
		endif;
		
		?>
		

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>


<?php
get_footer();