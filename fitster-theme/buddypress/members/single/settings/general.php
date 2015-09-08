<?php global $bp;?>
<div class="container profile">
	<div class="header">
		<h1><strong>ustawienia</strong></h1>
	</div>
	<div class="col-md-12 under"></div>
	<div class="bg">
		<div class="col-md-12 settings">
			<div class="menu">
			<?php
			$general_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/settings/general/';
			$profile_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/profile/edit/';
			$avatar_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/profile/change-avatar/';
			$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
			  $shop_url = $myaccount_page_url = get_permalink( $myaccount_page_id );
			}
			?>
				<a href="<?php echo $general_url;?>">Ogólne</a>
				<a href="<?php echo $profile_url;?>">Profil</a>
				<a href="<?php echo $avatar_url;?>">Zmień Avatar</a>
				<a href="<?php echo $shop_url;?>">Sklep</a>
			</div>
			<?php do_action( 'bp_before_member_settings_template' ); ?>
			<div class="col-md-6">
				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/general'; ?>" method="post" class="standard-form" id="settings-form">
						<?php if ( !is_super_admin() ) : ?>

		<label for="pwd"><?php _e( 'Current Password <span>(required to update email or change current password)</span>', 'buddypress' ); ?></label>
		<input type="password" name="pwd" id="pwd" size="16" value="" class="settings-input small" <?php bp_form_field_attributes( 'password' ); ?>/> &nbsp;<a href="<?php echo wp_lostpassword_url(); ?>" title="<?php esc_attr_e( 'Password Lost and Found', 'buddypress' ); ?>"><?php _e( 'Lost your password?', 'buddypress' ); ?></a>
					<?php endif;?>
<label for="email"><?php _e( 'Account Email', 'buddypress' ); ?></label>
	<input type="email" name="email" id="email" value="<?php echo bp_get_displayed_user_email(); ?>" class="settings-input" <?php bp_form_field_attributes( 'email' ); ?>/>
			</div>
			<div class="col-md-6">
				<label for="pass1"><?php _e( 'Change Password <span>(leave blank for no change)</span>', 'buddypress' ); ?></label>
	<input type="password" name="pass1" id="pass1" size="16" value="" class="settings-input small password-entry" <?php bp_form_field_attributes( 'password' ); ?>/> &nbsp;<?php _e( 'New Password', 'buddypress' ); ?><br />
	<div id="pass-strength-result"></div>
	<input type="password" name="pass2" id="pass2" size="16" value="" class="settings-input small password-entry-confirm" <?php bp_form_field_attributes( 'password' ); ?>/> &nbsp;<?php _e( 'Repeat New Password', 'buddypress' ); ?>
				
			</div>
			<div class="col-md-12">
		<input type="submit" name="submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?>"/>
		<?php wp_nonce_field( 'bp_settings_general' ); ?>
		</form>
			</div>	
		</div>
	</div>
</div>