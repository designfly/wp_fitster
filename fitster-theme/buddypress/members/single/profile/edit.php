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
			<?php do_action( 'bp_before_profile_edit_content' );

if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) :
	while ( bp_profile_groups() ) : bp_the_profile_group(); ?>
<form action="<?php bp_the_profile_group_edit_form_action(); ?>" method="post" id="profile-edit-form" class="standard-form <?php bp_the_profile_group_slug(); ?>">

	<?php

		/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
		do_action( 'bp_before_profile_field_content' ); ?>


		<?php if ( bp_profile_has_multiple_groups() ) : ?>
			<ul class="button-nav">

				<?php bp_profile_group_tabs(); ?>

			</ul>
		<?php endif ;?>

		<div class="clear"></div>

		<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
			<?php if(!(bp_get_the_profile_field_name() == 'Name')) :?>
			<div<?php bp_field_css_class( 'editfield' ); ?>>
				<?php
				$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
				$field_type->edit_field_html();

				/**
				 * Fires before the display of visibility options for the field.
				 *
				 * @since BuddyPress (1.7.0)
				 */
				do_action( 'bp_custom_profile_edit_fields_pre_visibility' );
				?>

				<?php

				/**
				 * Fires after the visibility options for a field.
				 *
				 * @since BuddyPress (1.1.0)
				 */
				do_action( 'bp_custom_profile_edit_fields' ); ?>

				
			</div>
		<?php endif;?>
		<?php endwhile; ?>

	<?php

	/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
	do_action( 'bp_after_profile_field_content' ); ?>

	<div class="submit">
		<input type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?> " />
	</div>

	<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

	<?php wp_nonce_field( 'bp_xprofile_edit' ); ?>

</form>
<?php endwhile; endif; ?>

		</div>
	</div>
</div>