<div id="comments" class="comments-area">
<?php if ( have_comments() ) : ?>
				<div class="row">
					<h2>Komentarze <strong>(<?php echo get_comments_number();?>)</strong></h2>
					<hr>
				</div>
				<?php
				wp_list_comments( array(
					'callback' => 'fitster_comments'
				) );
			?>
<?php endif;?>
<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>
	<?php $args = array(
		'comment_notes_after' => '',
		'comment_field' =>  '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea>',
		);
		?>
			<?php  bs_comment_form($args);?>
</div>