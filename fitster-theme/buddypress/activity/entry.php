			   			<div class="row" id="activity-<?php bp_activity_id(); ?>">
		   				<?php bp_activity_avatar(); ?>
<!-- 							<a href="<?php bp_activity_user_link(); ?>">Użytkownik</a>
							<span> - 04.05.2015:</span> -->
			<?php bp_activity_action(); ?>

							<?php if ( bp_activity_has_content() ) : ?>
							<p> <?php bp_activity_content_body(); ?></p>
						<?php endif;?>
							<a class="comment" href="#"><i class="fa fa-comment"></i> Komentarze (<?php echo bp_activity_get_comment_count();?>)</a>
	<?php if ( ( bp_activity_get_comment_count() || bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>
							<div class="komentarzePost">
								<div class="komentarz">
								<?php bp_activity_comments(); ?>
<!-- 									<div class="seeComment">
										<img src="img/user-1.jpg">
										<a href="#">nazwa użytkownika</a>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
									</div> -->
									<?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>
									<div class="addComment">
									<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" <?php bp_activity_comment_form_nojs_display(); ?>>
										<?php bp_loggedin_user_avatar( 'width=50&height=50'); ?>
																	<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
															<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>
						</form>
									</div>
								<?php endif;?>
								</div>
							</div>
						<?php endif;?>
			   			</div>