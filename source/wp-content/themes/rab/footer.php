	<footer>
		<?php 
		$footer_fieldset = cs_get_option('footer-widgets-fieldset' );
		$footer_widgets_area = ( isset( $footer_fieldset['footer-widgets-switcher'] ) ) ? true : false;

		if( $footer_widgets_area ):
			$active = false;
			if( is_active_sidebar( 'footer-widgets' ) ) {
				$active = true;
			}
			?>
			<div class="bg-gray primary-padding top <?php echo ( $active ) ? '' : 'p-0'; ?>">
				<div class="container">
					<div class="row">
						<?php 
						$number = absint( $footer_fieldset['widgets-column'] );
						$ids = array();
						for( $i = 1; $i <= $number; $i++ ){
							if($i === 1) {
								$ids[] = 'footer-widgets';
							} else {
								$ids[] = 'footer-widgets-'.$i;
							}

						}

						foreach( $ids as $id ) {
							if( is_active_sidebar ( $id ) ){
								dynamic_sidebar( $id );
							}
							
						}
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
		?>


		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
						if( rab_plugin_active('rab-shortcodes/rab-shortcodes.php' ) ) {
							$default_notice = esc_html__( '&copy; [year] [site_name]. All rights reserved.', 'rab' );
						} else {
							$default_notice = esc_html__( '&copy; 2017 RAB Fashion. All rights reserved', 'rab' );
						}
						$copyright_notice = cs_get_option( 'footer-copyright', $default_notice );
						echo apply_filters( 'the_content', $copyright_notice ); 
						?>
					</div>
					<!--left-->

					<div class="col-md-6 col-sm-6 col-xs-12 text-right ">
						<?php 
						$social_links = cs_get_option( 'footer-social' );
						if( $social_links ): ?>
							<?php rab_social_links(); ?>
						<?php endif; ?>
					</div>
					<!--right-->
				</div>
			</div>
		</div>
	</footer>
	<!--footer-->


	<div class="modal fade login" id="modal-login" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<h2 class="pull-left text-uppercase"><?php esc_html_e( 'My Account', 'rab' ); ?></h2>

			<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<div id="login" class="hidden">
				<div class="content text-center">
					<div class="top mb-35">
						<h4 class="contact-title">
							<i class="pe-7s-users primary-color"></i>
							<?php esc_html_e('Login Account', 'rab'); ?>
						</h4>
						<p>
							<?php esc_html_e('Enter your username and password to login.', 'rab'); ?>
						</p>
					</div>
					<!--top-->
					<?php 
					wp_login_form();
					?>

					<div class="row">
						<div class="col-sm-12 login-social">
							<?php 
								if( rab_plugin_active( 'yith-woocommerce-social-login/init.php' ) ) {
									if( YITH_WC_Social_Login()->enabled_social ) {
										?>
										<div class="or mb-15"><?php esc_html_e( 'OR', 'rab' ); ?></div>
										<?php
										YITH_WC_Social_Login_Frontend()->social_buttons('social-icons'); 
									}
								}
							?>
						</div> 
					</div>
				</div>
			</div>

			<!-- /.modal-dialog -->
		</div>
		<!-- modal login -->  
	</div>

	<?php 
	if( cs_get_option('back-to-top') ) {
		?>
		<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
		<?php
	}
	?>	
	    
</div>  <!-- end #primary -->

<?php 
do_action( 'rab_after_body_output' );
?>

<?php
wp_footer();
?>
</body>

</html>
