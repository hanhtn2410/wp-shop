<header class="home-header">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                <span class="sr-only"><?php esc_html_e('Toggle navigation', 'rab'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--button-->

            <?php 
            $logo = cs_get_option('default-logo');
            $high_logo = cs_get_option( 'retina-logo' );
            if( $logo || $high_logo ) :
                $logo_img = wp_get_attachment_image_src( $logo, 'full' );
                $high_res = wp_get_attachment_image_src( $high_logo, 'full' );
                ?>

                <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">
                    <img src="<?php echo esc_url( $logo_img[0] ); ?>" alt="<?php bloginfo('name'); ?>">
                </a>

                <?php if($high_res[0]): ?>
                    <a class="navbar-brand high-res" href="<?php echo esc_url( home_url('/') ); ?>">
                        <img src="<?php echo esc_url( $high_res[0] ); ?>" alt="<?php esc_attr( bloginfo('name' ) ); ?>">
                    </a>
                <?php endif; ?>
                <?php
                else:
                    ?>
                    <h1 id="logo">
                        <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ) ?>">
                            <?php esc_attr( bloginfo('name') ); ?>
                        </a>
                    </h1>
                    <?php
                endif;
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="container">
                <?php 
                $args = array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav'
                );

                $is_mega_menu = true;
                if( $is_mega_menu ) {
                    $args['walker'] = new Ktc_Nav_Walker();
                }

               if( has_nav_menu( 'primary' ) ):
                    wp_nav_menu( $args );
                endif;

                ?>

                <form action="<?php echo esc_url( home_url('/') ); ?>" class="navbar-form mobile-search visible-xs">
                    <input type="search" placeholder="<?php esc_html_e('Search...', 'rab' ); ?>" name="s" class="searchbox-input" required="">
                    <input type="submit" class="searchbox-submit" value="<?php esc_html_e( 'Submit', 'rab' ); ?>">
                    <?php 
                    if( function_exists('WC') ):
                        ?>
                        <input type="hidden" name="post_type" value="product">
                        <?php
                    endif;
                    ?> 
                </form>

                <div class="login visible-xs">
                	<ul>
                		<?php if( ! is_user_logged_in() && function_exists( 'WC' ) ): ?>
	                        <li> 
	                            <a href="#" class="btn-login trigger-modal" data-show="#login">
	                                <?php esc_html_e('Login', 'rab'); ?> 
	                            </a>

	                        </li>
	                    <?php else: ?>

	                        <?php if( function_exists( 'WC' ) ): ?>
	                            <li>
	                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
	                                    <i class="pe-7s-users"></i> <?php esc_html_e('My Account', 'rab'); ?> 
	                                </a> 
	                            </li>
	                        <?php endif; ?>
	                    <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!--container-->            
        </div>
        <!-- /.navbar-collapse -->

        <div class="header-right"> 
            <form action="<?php echo esc_url( home_url('/') ); ?>" class="searchbox navbar-form hidden-xs">
                <input type="search" placeholder="<?php esc_html_e( 'Search...', 'rab' ); ?>" name="s" class="searchbox-input" required="">
                <input type="submit" class="searchbox-submit" value="">
                <?php 
                if( function_exists('WC') ):
                    ?>
                    <input type="hidden" name="post_type" value="product">
                    <?php
                endif;
                ?>
                <span class="searchbox-icon"><i class="pe-7s-search"></i></span>
            </form>


            <ul class="site-header-cart menu on-hover">
                <?php 
                    if( rab_plugin_active('yith-woocommerce-wishlist/init.php') ):
                        $wishlist_page = get_option('yith_wcwl_wishlist_page_id');
                        $link = '#';
                        if( $wishlist_page ) {
                            $link = get_permalink( $wishlist_page );
                        }

                        $wishlist_count = YITH_WCWL()->count_products();
                        ?>

                        <li>
                            <a href="<?php echo esc_url($link); ?>" title="">
                                <?php  ?>
                                <span class="wishlist-count wishlist-rounded"><?php echo esc_attr( $wishlist_count ); ?></span>
                                <i class="pe-7s-like icon"></i>
                            </a>
                        </li>
                        <?php
                    endif;
                ?>

                <!--wish list-->
                <?php if( function_exists('WC') ): ?>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" title="">
                            <span class="count rounded-crcl"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'rab' ), WC()->cart->get_cart_contents_count() ); ?></span>
                            <i class="pe-7s-shopbag icon"></i>
                        </a>

                        <div class="dropdown-menu widget woocommerce widget_shopping_cart">
                            <button type="button" class="close">
                                <span>&times;</span>
                            </button>
                            <!--close-->

                            <h6 class="title"><?php esc_html_e('Your Shopping Cart', 'rab' ); ?> 
                                (<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'rab' ), WC()->cart->get_cart_contents_count() ); ?>)
                            </h6>

                            <div class="widget_shopping_cart_content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </li>

                <?php endif; ?>
                <!--cart-->
            </ul>

            <ul class="login hidden-xs">
                <?php if( ! is_user_logged_in() && function_exists( 'WC' ) ): ?>
                    <li> 
                        <a href="#" class="btn-login trigger-modal" data-show="#login">
                            <i class="pe-7s-users"></i><span><?php esc_html_e('Login', 'rab'); ?></span>
                        </a>

                    </li>
                <?php else: ?>

                    <?php if( function_exists( 'WC' ) ): ?>
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                <i class="pe-7s-users"></i><span><?php esc_html_e('My Account', 'rab'); ?></span>
                            </a> 
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <!--right-->
    </nav>
</header>