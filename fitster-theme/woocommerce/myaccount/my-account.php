<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php $ud = get_userdata( bp_displayed_user_id() ); ?>
<?php global $bp;?>
<?php 
$profile_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username();
$gallery_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username() . '/mediapress/';
?>
<div id="headerProfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<?php bp_loggedin_user_avatar( 'type=full' ); ?>
				<!-- <img class="thumbnail" src="http://placehold.it/250x250"> -->
			</div>		
			<div class="col-md-9 menu">
				<a href="<?php echo $profile_url;?>">profil</a>
				<a href="#">galeria</a>
				<?php $settings_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username().'/settings/';?>
				<a href="<?php echo $settings_url;?>">ustawienia</a>
				<?php $stats_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username().'/statystyki/';?>
				<a href="<?php echo $stats_url;?>">Statystyki</a>
			</div>	
	
		</div>
	</div>
</div>
<div class="container profile">
	<div class="header">
		<h1><strong>ustawienia</strong></h1>
	</div>
	<div class="col-md-12 under"></div>
	<div class="bg">
		<div class="col-md-12 settings">
			<div class="menu">
			<?php
			$general_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username().'/settings/general/';
			$profile_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username().'/profile/edit/';
			$avatar_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username().'/profile/change-avatar/';
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

<?php wc_print_notices(); ?>


<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
		</div>
	</div>
</div>