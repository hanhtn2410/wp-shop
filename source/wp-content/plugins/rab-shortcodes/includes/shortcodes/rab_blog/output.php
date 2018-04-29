<?php
$columns = $attributes['columns'];
$uniqueid = rab_sc_id( 'rab_blog' );
$args = array(
	'post_type'         =>  'post',
	'posts_per_page'    =>   $attributes['posts_per_page'],
	'order'             =>   $attributes['order'],
	'orderby'           =>   $attributes['orderby'],
);

$extra_class = '';
if( $attributes['alternate_layout'] === 'true' ) {
	$extra_class .= ' alternate-layout';
}

if( isset( $attributes['view_mode' ] ) && ! $attributes['alternate_layout'] ) {
	$extra_class .= ' '.$extra_class;
}

$image_size = '';

$posts = new WP_Query( $args );
if( $posts->have_posts() ):
	?>
	<div class="row news-wrap <?php echo $extra_class; ?>">
		<?php 
		$total = count( $posts->posts );
		$c = 0;
		while( $posts->have_posts() ): $posts->the_post();
			$c++;
			$wrap_class = 'col-md-4 col-sm-6 col-xs-12';
			$class = '';
			if( $total > 3 && $attributes['alternate_layout'] ) {
				$wrap_class = 'col-md-6 col-sm-6 col-xs-12';
				$class .= ' alternate';
			}

			$final = $wrap_class . ' ' . $class;
		 	?>
			<div id="post-<?php the_ID(); ?>" <?php post_class($final); ?>>
				<?php 
				if( $attributes['alternate_layout'] !== 'true' ) {
					$wclass = 'full-width';
				} else {
					$wclass = 'mb-50';
				}
				?>
				<div class="wrap <?php echo $wclass; ?>">
					<?php 
					if( has_post_thumbnail() ):
						if( $attributes['alternate_layout'] === 'true' ) {
							$image_size = 'rab-blog-default';
						} else if( $attributes['alternate_layout'] !== 'true' && $attributes['view_mode'] === 'grid' ) {
							$image_size = 'rab-blog-col-full';
						}

						?>
	                    <figure>
	                        <a href="<?php the_permalink(); ?>" class="image-effect overlay">
	                        	<?php the_post_thumbnail($image_size); ?>
	                        </a>
	                    </figure>
                    	<!--figure-->
                    	<?php
                	endif;
                	?>

                    <div class="entry-content">
                        <h5 class="entry-title mb-10">
                        	<?php 
                        	$title = wp_strip_all_tags( get_the_title() );
                        	if( strlen($title) > 35 && $attributes['alternate_layout'] === 'true' ) {
                        		$title = substr( $title, 0, 35 );
                        		$title = $title .'&hellip;';
                        	} else {
                        		$title = substr( $title, 0, 45 );
                        		$title = $title .'&hellip;';
                        	}
                        	

                        	?>
                            <a href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
                        </h5>
                        <div class="post-info  mb-15">
                            <span><i class="pe-7s-alarm"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="pe-7s-users"></i> <?php echo get_the_author(); ?> </span>
                        </div>
                        <!--post info-->

                        <div class="entry-post-content">
                        	<?php 
                        	$content = get_the_content();
                        	if( $attributes['alternate_layout'] === 'true' ) {
                        		$length = apply_filters( 'rab_alternate_layout_content_length', 10 );
                        	} else {
                        		$length = apply_filters( 'rab_grid_layout_content_width', 18 );
                        	}
                        	$trimmed = wp_trim_words( $content, $length, '&hellip;' );
                        	echo apply_filters( 'the_content', $trimmed );
                        	?>
                        </div>
                    </div>
                </div>
			</div>
		 	<?php
		 	if( $c === 4 ) {
		 		$c = 0;
		 	}
		endwhile;
		?>

		<?php 
		$pagination_type = $attributes['pagination_style'];
		if( $pagination_type === 'link' || $pagination_type === 'loadmore' ) {
			$label = $attributes['button_label'];
			$link = array();
			$link['url'] = '#';
			$btn_class = 'btn btn-default bdr text-uppercase faa-parent animated-hover';
			if( $pagination_type === 'link' ) {
				$link = vc_build_link( $attributes['link'] );
			}

			$extra_data = '';
			if( $pagination_type === 'loadmore' ) {
				$btn_class .= ' rab-load-more-btn';
				$extra_data .= ' data-page="'.$paged.'"';
				$extra_data .= ' data-mode="'.$attributes['display_style'].'"';
				$extra_data .= ' data-view="'.$attributes['view_mode'].'"';
				$nonce = wp_create_nonce( 'rab-load-more' );
				$extra_data .= ' data-nonce="'.$nonce.'"';

				if( $attributes['alternate_layout'] ) {
					$extra_data .= 'data-layout="alternate"';
				}
			}
			?>
			<div class="clearfix"></div>
			<div class="rab-anchor-btn col-md-12 col-sm-12 col-xs-12 text-center">
				<a href="<?php echo $link['url']; ?>" class="<?php echo $btn_class; ?>" <?php echo $extra_data; ?>><?php echo sprintf( __('%s', 'rab'), $label ); ?>
					<?php 
					if( $pagination_type === 'link' ) {
						echo '<i class="fa fa-long-arrow-right faa-passing"></i>';
					}

					?>
				</a>
			</div>
			<?php
		}
		?>
	</div>
	<?php
endif;
wp_reset_postdata();
