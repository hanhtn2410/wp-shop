<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress

 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area clearfix">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : 
		global $wp_query;
		?>
		<div class="title-main text-center mb-60">
			<h4 class="comments-title">
				<?php
				$comments_number = get_comments_number();
				printf( esc_html__( 'Comments (%d)', 'rab' ), $comments_number );
				?>
			</h4>
		</div>
		
		<div class="cmt-list-wrap p-pb">
			<ul class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ul',
						'type'        => 'comment',
						'reply_text'  => esc_html__( 'Reply', 'rab' ),
					) );
				?>
			</ul>
		</div>

		<?php
		if ( ! empty( $comments_by_type['pings'] ) ) { ?>
			<div class="title-main text-center mb-60">
				<h4 class="pingtrack-title">
					<?php esc_html_e( 'Pingbacks &amp; Trackbacks', 'rab' ); ?>
				</h4>
			</div>
			

			<div class="cmt-list-wrap p-pb">
				<ul class="pingtrack-list">
					<?php
						wp_list_comments( array(
							'avatar_size' => 100,
							'style'       => 'ul',
							'short_ping'  => true,
							'type'        => 'pings',
							'reply_text'  => esc_html__( 'Reply', 'rab' ),
						) );
					?>
				</ul>
			</div>

		<?php } ?>
		

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'rab' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'rab' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'rab' ); ?></p>
	<?php
	endif;

comment_form(); ?>

</div><!-- #comments -->
