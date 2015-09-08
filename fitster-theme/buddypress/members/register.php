<?php get_header();?>
<div class="container login">
	<div class="header">
		<h1><strong>Zarejestruj się</strong></h1>
	</div>
	<div class="col-md-12">
		<div class="col-md-6 register">
			<h2>Dane konta</h2>
			<div class="row">
				<hr>
			</div>
			<p>Stworzenie konta zajmie Ci tylko kilka sekund!</p>
	<?php

	/**
	 * Fires at the top of the BuddyPress member registration page template.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_register_page' ); ?>

		<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

		<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>
			<?php

			/**
			 * Fires before the display of the registration disabled message.
			 *
			 * @since BuddyPress (1.5.0)
			 */
			do_action( 'bp_before_registration_disabled' ); ?>

				<p><?php _e( 'User registration is currently not allowed.', 'buddypress' ); ?></p>

			<?php

			/**
			 * Fires after the display of the registration disabled message.
			 *
			 * @since BuddyPress (1.5.0)
			 */
			do_action( 'bp_after_registration_disabled' ); ?>
		<?php endif; // registration-disabled signup step ?>

		<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>

			<p><?php _e( 'Registering for this site is easy. Just fill in the fields below, and we\'ll get a new account set up for you in no time.', 'buddypress' ); ?></p>

			<?php

			/**
			 * Fires before the display of member registration account details fields.
			 *
			 * @since BuddyPress (1.1.0)
			 */
			do_action( 'bp_before_account_details_fields' ); ?>

			<div class="register-section" id="basic-details-section">

				<?php /***** Basic Account Details ******/ ?>

				<h4><?php _e( 'Account Details', 'buddypress' ); ?></h4>

				<label for="signup_username"><?php _e( 'Username', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
				<?php

				/**
				 * Fires and displays any member registration username errors.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_signup_username_errors' ); ?>
				<input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" <?php bp_form_field_attributes( 'username' ); ?>/>

				<label for="signup_email"><?php _e( 'Email Address', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
				<?php

				/**
				 * Fires and displays any member registration email errors.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_signup_email_errors' ); ?>
				<input type="email" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" <?php bp_form_field_attributes( 'email' ); ?>/>

				<label for="signup_password"><?php _e( 'Choose a Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
				<?php

				/**
				 * Fires and displays any member registration password errors.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_signup_password_errors' ); ?>
				<input type="password" name="signup_password" id="signup_password" value="" class="password-entry" <?php bp_form_field_attributes( 'password' ); ?>/>
				<div id="pass-strength-result"></div>

				<label for="signup_password_confirm"><?php _e( 'Confirm Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
				<?php

				/**
				 * Fires and displays any member registration password confirmation errors.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_signup_password_confirm_errors' ); ?>
				<input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" class="password-entry-confirm" <?php bp_form_field_attributes( 'password' ); ?>/>

				<?php

				/**
				 * Fires and displays any extra member registration details fields.
				 *
				 * @since BuddyPress (1.9.0)
				 */
				do_action( 'bp_account_details_fields' ); ?>

			</div><!-- #basic-details-section -->

			<?php

			/**
			 * Fires after the display of member registration account details fields.
			 *
			 * @since BuddyPress (1.1.0)
			 */
			do_action( 'bp_after_account_details_fields' ); ?>

			<?php /***** Extra Profile Details ******/ ?>

			<?php if ( bp_is_active( 'xprofile' ) ) : ?>

				<?php

				/**
				 * Fires before the display of member registration xprofile fields.
				 *
				 * @since BuddyPress (1.2.4)
				 */
				do_action( 'bp_before_signup_profile_fields' ); ?>

				<div class="register-section" id="profile-details-section">

					<h4><?php _e( 'Profile Details', 'buddypress' ); ?></h4>

					<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
					<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

					<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

						<div<?php bp_field_css_class( 'editfield' ); ?>>

							<?php
							$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
							$field_type->edit_field_html();
							/**
							 * Fires after the display of the visibility options for xprofile fields.
							 *
							 * @since BuddyPress (1.1.0)
							 */
							do_action( 'bp_custom_profile_edit_fields' ); ?>

							<p class="description"><?php bp_the_profile_field_description(); ?></p>

						</div>

					<?php endwhile; ?>

					<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

					<?php endwhile; endif; endif; ?>

					<?php

					/**
					 * Fires and displays any extra member registration xprofile fields.
					 *
					 * @since BuddyPress (1.9.0)
					 */
					do_action( 'bp_signup_profile_fields' ); ?>

				</div><!-- #profile-details-section -->

				<?php

				/**
				 * Fires after the display of member registration xprofile fields.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_after_signup_profile_fields' ); ?>

			<?php endif; ?>

			<?php

			/**
			 * Fires before the display of the registration submit buttons.
			 *
			 * @since BuddyPress (1.1.0)
			 */
			do_action( 'bp_before_registration_submit_buttons' ); ?>

			<div class="submit">
				<input type="submit" name="signup_submit" id="signup_submit" value="<?php esc_attr_e( 'Complete Sign Up', 'buddypress' ); ?>" />
			</div>

			<?php

			/**
			 * Fires after the display of the registration submit buttons.
			 *
			 * @since BuddyPress (1.1.0)
			 */
			do_action( 'bp_after_registration_submit_buttons' ); ?>

			<?php wp_nonce_field( 'bp_new_signup' ); ?>

		<?php endif; // request-details signup step ?>

		<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>
			<?php

			/**
			 * Fires before the display of the registration confirmed messages.
			 *
			 * @since BuddyPress (1.5.0)
			 */
			do_action( 'bp_before_registration_confirmed' ); ?>

			<?php if ( bp_registration_needs_activation() ) : ?>
				<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'buddypress' ); ?></p>
			<?php else : ?>
				<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'buddypress' ); ?></p>
			<?php endif; ?>

			<?php

			/**
			 * Fires after the display of the registration confirmed messages.
			 *
			 * @since BuddyPress (1.5.0)
			 */
			do_action( 'bp_after_registration_confirmed' ); ?>

		<?php endif; // completed-confirmation signup step ?>

		<?php

		/**
		 * Fires and displays any custom signup steps.
		 *
		 * @since BuddyPress (1.1.0)
		 */
		do_action( 'bp_custom_signup_steps' ); ?>

		</form>
</div>
		<div class="col-md-6">
			<h2>Dlaczego warto założyć konto?</h2>
			<div class="row">
				<hr>
			</div>
			<p><?php echo get_option('fitster_rejestracja');?></p>
<!-- 			<h2>Co nowego?</h2>
			<div class="row">
				<hr>
			</div> -->
		</div>
	</div>
</div>
	<?php

	/**
	 * Fires at the bottom of the BuddyPress member registration page template.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_register_page' ); ?>
	<?php get_footer();?>
	<script type="text/javascript">
var url = document.location.href;
jQuery(document).ready(function() {
//copy profile name to account name during registration
if (url.indexOf("register/") >= 0) {
    jQuery('label[for=field_1],#field_1').css('display','none');
    jQuery('#signup_username').blur(function(){
        jQuery("#field_1").val(jQuery("#signup_username").val());
    });
}
});
	</script>