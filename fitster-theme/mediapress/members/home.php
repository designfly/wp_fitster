<div class="container profile">
	<div class="header">
		<h1><strong><?php bp_is_my_profile() ? _e( 'My Profile', 'buddypress' ) : printf( __( "%s's Profile", 'buddypress' ), bp_get_displayed_user_fullname() ); ?></strong></h1>
	</div>
	<div class="col-md-12 under"></div>

	<div class="bg">
<?php get_sidebar('profile');?>
<div class="col-md-7">
<div class="menu">
 

</div>
<?php
//main file loaded by MediaPress
//it loads the requested file

if ( mpp_is_gallery_create() ) {
	$template = 'gallery/create.php';
} elseif ( mpp_is_gallery_management() ) {
	$template = 'gallery/manage.php';
} elseif ( mpp_is_media_management() ) {
	$template = 'gallery/media/manage.php';
} elseif ( mpp_is_single_media() ) {
	$template = 'gallery/media/single.php';
} elseif ( mpp_is_single_gallery() ) {
	$template = 'gallery/single.php';
} elseif ( mpp_is_gallery_home() ) {
	$template = 'gallery/loop-gallery.php';
} else {
	$template = 'gallery/404.php';//not found
}
	

$template = apply_filters( 'mpp_get_members_gallery_template', $template );

mpp_get_template( $template );
?>
		</div>
	</div>


</div>
