<?php
/**
 * 404 page template
 */
get_header();
?>

<main class="error-page primary-padding">

    <div class="container">
        <div class="row pri-pad">
            <div class="col-sm-12 col-md-12 text-center">
                <figure class="error-img mb-90">
                    <img src="<?php echo RAB_IMAGES; ?>404.png" alt="<?php esc_html_e( '404 not found', 'rab' ); ?>">  
                </figure>

                <h2><?php esc_html_e('Oops. The page you were looking for does not exist.', 'rab'); ?></h2>

                <h6 class="mb-55 primary-font">
                	<?php esc_html_e('You may have mistyped the address or the page may have moved.', 'rab'); ?>
            	</h6>

                <a href="<?php echo esc_url( site_url() ); ?>" class="primary-color"> 
                	<u><?php esc_html_e('Take me back to the homepage','rab'); ?></u>
            	</a>
            </div>
        </div>
    </div>
   
</main>


<?php
get_footer();
?>