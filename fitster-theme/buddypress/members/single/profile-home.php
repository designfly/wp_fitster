<div class="container profile">
	<div class="header">
		<h1><strong><?php bp_is_my_profile() ? _e( 'My Profile', 'buddypress' ) : printf( __( "%s's Profile", 'buddypress' ), bp_get_displayed_user_fullname() ); ?></strong></h1>
	</div>
	<div class="col-md-12 under"></div>

	<div class="bg">
<?php get_sidebar('profile');?>
		<div class="col-md-7 ">
		<?php if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) ) : ?>
			<div class="dodaj_post">
				<?php bp_displayed_user_avatar('width=50&height=50'); ?>
				<form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form" role="complementary">
					<textarea name="whats-new" id="whats-new" class="bp-suggestions" ><?php if ( isset( $_GET['r'] ) ) : ?>@<?php echo esc_textarea( $_GET['r'] ); ?> <?php endif; ?></textarea><br>
<!-- 					<label>Wybierz gdzie chcesz go opublikować:</label>
					<select id="whats-new-post-in" name="whats-new-post-in">
						<option selected="selected" value="0"><?php _e( 'My Profile', 'buddypress' ); ?></option>
					</select> -->
					<div class="dodaj">
						<input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="Opublikuj"/>
					</div>
					<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
				</form>
				<?php do_action( 'bp_after_activity_post_form' ); ?>
			</div>
		<?php endif;?>
			<div class="tablica">
			  <!-- Nav tabs -->
<!-- 			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#yourPost" aria-controls="yourPost" role="tab" data-toggle="tab">Twoje posty</a></li>
			    <li role="presentation"><a href="#friendPost" aria-controls="friendPost" role="tab" data-toggle="tab">Posty znajomych</a></li>
			    <li role="presentation"><a href="#allPost" aria-controls="allPost" role="tab" data-toggle="tab">wszystkie posty</a></li>
			  </ul> -->

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" id="yourPost" class="tab-pane active activity-list item-list">
			    <?php do_action( 'bp_before_activity_loop' ); ?>
			    <?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>
			    	<?php if ( empty( $_POST['page'] ) ) : ?>
			   		<div class="posty" id="activity-stream">
			   		<?php endif; ?>
			   		<?php while ( bp_activities() ) : bp_the_activity(); ?>
			   			<?php bp_get_template_part( 'activity/entry' ); ?>
			   		<?php endwhile;?>
			   			<?php if ( bp_activity_has_more_items() ) : ?>

		<li class="load-more">
			<a href="<?php bp_activity_load_more_link() ?>"><?php _e( 'Load More', 'buddypress' ); ?></a>
		</li>
	<?php endif; ?>
		<?php if ( empty( $_POST['page'] ) ) : ?>
			</div>
	<?php endif; ?>
<?php else : ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, there was no activity found. Please try a different filter.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>			   		
			    </div>			  </div>

			</div>
		</div>
	</div>


</div>