<?php

global $woocommerce_loop;
$woocommerce_loop['columns'] = 3;
$title = esc_attr( $attr['title'] );
$vclink = vc_build_link( $attr['button_url'] );

$link = '#';
if( isset( $vclink['url'] ) ) {
    $link = $vclink['url'];
}
$label = $attr['button_label'];
$featured_image = $attr['featured_image'];
$image = wp_get_attachment_image_src( $featured_image, 'full' );

?>
<div class="cat-wrap2 mb-40">
    <div class="col-md-4 col-sm-4">
        <div class="cat-content">
            <h3 class="text-uppercase mb-10"><?php echo $title; ?></h3>
            <div class="content-wrap mb-40">
                <?php echo apply_filters( 'the_content', $content ); ?>
            </div> 
            
            <?php if( $link ) : ?>
                <a href="<?php echo esc_url( $link ); ?>" class="text-uppercase primary-color faa-parent animated-hover">
                    <?php echo esc_html( $label ); ?> <i class="fa fa-long-arrow-right faa-passing"></i>
                </a>
            <?php endif; ?>
        </div>
        <!--cat content-->
    </div>
    <!--left block-->

    <div class="col-md-8 col-sm-8">
        <figure>
            <a href="<?php echo esc_url( $link ); ?>" class="image-effect">
                <img src="<?php echo esc_attr( $image[0] ); ?>" alt="<?php echo $title; ?>">
            </a>
        </figure>
    </div>

    <div class="col-md-12 col-sm-12 move-up">
        <?php
        $pargs = array(
            'post_type'       => 'product',
            'posts_per_page'  => 3,
            'post_status'     => 'publish',
            'tax_query'       => array(
                'relation'    => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $attr['product_cat']
                )
            )
        );
        $loop = new WP_Query( $pargs );

        if( $loop->have_posts() ):
            ?>
            <ul class="products clearfix product-slide">
                <?php
                while( $loop->have_posts() ): $loop->the_post();
                    do_action( 'woocommerce_shop_loop' );
                    wc_get_template_part( 'content', 'product' );
                endwhile;
                ?>
            </ul>
            <?php
        endif;
        woocommerce_reset_loop();
        
        wp_reset_postdata();
        ?>
    </div>
</div>