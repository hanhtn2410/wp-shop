<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<section class="checkout-steps">
    <div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12"> 
            <div class="wrap first active">
                <span class="circle rounded-crcl"> 01 </span>
                <h6><?php esc_html_e('Shopping Cart', 'rab'); ?></h6>
            </div>
            <!--steps-->

            <div class="wrap second half active">
                <span class="circle rounded-crcl"> 02 </span>
                 <h6><?php esc_html_e( 'Check Out', 'rab'); ?></h6>
            </div>
            <!--steps-->

            <div class="wrap final full">
                <span class="circle rounded-crcl"> 03 </span>
                <h6><?php esc_html_e('Order Complete', 'rab'); ?></h6>
            </div>
            <!--steps-->
        </div> 
    </div>
</section>
<?php
if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'rab' ) );
$info_message .= ' <a href="#" class="showlogin">' . __( 'Click here to login', 'rab' ) . '</a>';
wc_print_notice( $info_message, 'notice' );

woocommerce_login_form(
	array(
		'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'rab' ),
		'redirect' => wc_get_page_permalink( 'checkout' ),
		'hidden'   => true,
	)
);

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
