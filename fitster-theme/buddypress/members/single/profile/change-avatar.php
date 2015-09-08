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
<h4><?php _e( 'Change Profile Photo', 'buddypress' ); ?></h4>

<?php

/**
 * Fires before the display of profile avatar upload content.
 *
 * @since BuddyPress (1.1.0)
 */
do_action( 'bp_before_profile_avatar_upload_content' ); ?>

<?php if ( !(int)bp_get_option( 'bp-disable-avatar-uploads' ) ) : ?>

	<p><?php _e( 'Your profile photo will be used on your profile and throughout the site. If there is a <a href="http://gravatar.com">Gravatar</a> associated with your account email we will use that, or you can upload an image from your computer.', 'buddypress' ); ?></p>

	<form action="" method="post" id="avatar-upload-form" class="standard-form" enctype="multipart/form-data">

		<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

			<?php wp_nonce_field( 'bp_avatar_upload' ); ?>
			<p><?php _e( 'Click below to select a JPG, GIF or PNG format photo from your computer and then click \'Upload Image\' to proceed.', 'buddypress' ); ?></p>

			<p id="avatar-upload">
				<input type="file" name="file" id="file" />
				<input type="submit" name="upload" id="upload" value="<?php esc_attr_e( 'Upload Image', 'buddypress' ); ?>" />
				<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
			</p>

			<?php if ( bp_get_user_has_avatar() ) : ?>
				<p><?php _e( "If you'd like to delete your current profile photo but not upload a new one, please use the delete profile photo button.", 'buddypress' ); ?></p>
				<p><a class="button edit" href="<?php bp_avatar_delete_link(); ?>" title="<?php esc_attr_e( 'Delete Profile Photo', 'buddypress' ); ?>"><?php _e( 'Delete My Profile Photo', 'buddypress' ); ?></a></p>
			<?php endif; ?>

		<?php endif; ?>

		<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

			<h5><?php _e( 'Crop Your New Profile Photo', 'buddypress' ); ?></h5>

			<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" class="avatar" alt="<?php esc_attr_e( 'Profile Photo to crop', 'buddypress' ); ?>" />

			<div id="avatar-crop-pane">
				<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" class="avatar" alt="<?php esc_attr_e( 'Profile Photo preview', 'buddypress' ); ?>" />
			</div>

			<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e( 'Crop Image', 'buddypress' ); ?>" />

			<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src(); ?>" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />

			<?php wp_nonce_field( 'bp_avatar_cropstore' ); ?>

		<?php endif; ?>

	</form>

	<?php
	/**
	 * Load the Avatar UI templates
	 *
	 * @since  BuddyPress (2.3.0)
	 */
	bp_avatar_get_templates(); ?>

<?php else : ?>

	<p><?php _e( 'Your profile photo will be used on your profile and throughout the site. To change your profile photo, please create an account with <a href="http://gravatar.com">Gravatar</a> using the same email address as you used to register with this site.', 'buddypress' ); ?></p>

<?php endif; ?>

<?php

/**
 * Fires after the display of profile avatar upload content.
 *
 * @since BuddyPress (1.1.0)
 */
do_action( 'bp_after_profile_avatar_upload_content' ); ?>
		</div>
	</div>
</div>