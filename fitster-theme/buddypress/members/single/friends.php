<?php get_header();?>

<div class="container profile">
	<div class="header">
		<h1><strong><?php bp_is_my_profile() ? _e( 'My Profile', 'buddypress' ) : printf( __( "%s's Profile", 'buddypress' ), bp_get_displayed_user_fullname() ); ?></strong></h1>
	</div>
	<div class="col-md-12 under"></div>

	<div class="bg">
<?php get_sidebar('profile');?>
<?php switch ( bp_current_action() ) :
	case 'my-friends' : ?>
	<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>
		<div class="col-md-8 members">
		<?php while ( bp_members() ) : bp_the_member(); ?>
			<div class="member row">
				<?php bp_member_avatar(); ?>
				<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>	<br>
				<span><?php bp_member_latest_update(); ?></span>
				<?php if ( function_exists( 'bp_add_friend_button' ) ) : ?>
                <?php bp_add_friend_button() ?>
            <?php endif; ?>	
			</div>
		<?php endwhile;?>
		</div>
	<?php endif;?>
	<?php break;
	case 'requests' :
		bp_get_template_part( 'members/single/friends/requests' );
		break;?>
	<?php endswitch;?>
	</div>
</div>

<?php get_footer();?>

<script type="text/javascript">
	$("#moreInfo").click(function(event) {
    	event.preventDefault();
    	$("#moreInfo").fadeOut();
    	$("#allInfo").slideDown("slow");
    });	

    $("#lessInfo").click(function(event) {
    	event.preventDefault();
    	$("#allInfo").slideUp("slow");
    	$("#moreInfo").fadeIn();
    });	

    $(".comment").click(function(event) {
    	event.preventDefault();
    	$(".komentarzePost").slideToggle("slow");
    });	
</script>