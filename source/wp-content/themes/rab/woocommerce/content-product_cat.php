<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$class = array();
if($border == '')
{
	$class[] = 'with-border';
}

?>
<li <?php wc_product_cat_class($class, $category); ?> >
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

		<div class="interactive-background-image">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category, $image_size );
		?>
		</div>
		    <div  class="category-hover" style="background-color:<?php echo esc_attr($hover_color); ?>"></div>
            <style type="text/css" media="all" scoped>
            <?php if(strlen(esc_attr($hover_text_color))) {//Changes on hover text color
                    echo ".product-category:hover h3#categories_".$category ->term_id;?>
                    {
                        color:<?php echo esc_attr($hover_text_color); ?>!important;
                    }
           <?php } ?>
           </style>
            <h3 id="<?php echo esc_attr('categories_'.$category ->term_id); ?>" style="color:<?php echo esc_attr($style); ?>">
			        <?php
				         echo esc_html($category->name);
				         if ( $count== 'enable' && $category->count > 0 )
					     echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
				         echo '<span>' . esc_html($category->description) . '</span>';
                    ?>
		    </h3>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	<?php do_action( 'woocommerce_after_subcategory', $category); ?>
</li>
