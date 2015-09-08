<?php get_header();?>
<?php $ud = get_userdata( bp_displayed_user_id() ); ?>
<?php
global $bp;
$profile_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username();
?>
<div id="headerProfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<?php bp_displayed_user_avatar( 'type=full' ); ?>
				<!-- <img class="thumbnail" src="http://placehold.it/250x250"> -->
			</div>		
			<div class="col-md-9 menu">
				<a href="<?php echo $profile_url;?>">profil</a>
				<?php $gallery_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/mediapress/';?>
				<a href="<?php echo $gallery_url;?>">galeria</a>
				<?php if(bp_is_my_profile()):
				$settings_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/settings/';?>
				<a href="<?php echo $settings_url;?>">ustawienia</a>
				<?php endif;?>
				<?php $stats_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/statystyki/';?>
				<a href="<?php echo $stats_url;?>">Statystyki</a>
			</div>	
		</div>
	</div>
</div>
<?php if ( bp_is_user_activity() || !bp_current_component() ) : 
		bp_get_template_part('members/single/profile-home');
	elseif ( bp_is_user_settings() ) :
		bp_get_template_part( 'members/single/settings' );
	elseif ( bp_is_user_profile() ) :
		bp_get_template_part( 'members/single/profile'  );
	elseif ( bp_is_user_friends() ) :
		bp_get_template_part( 'members/single/friends'  );
	elseif ( bp_is_user_friends() ) :
		bp_get_template_part( 'members/single/friends'  );
		// If nothing sticks, load a generic template
	else :
		bp_get_template_part( 'members/single/plugins'  );

endif;?>
<?php get_footer();?>
<script type="text/javascript">
(function($) {
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
    	$(this).parent().find(".komentarzePost").slideToggle("slow");
    });	
    })( jQuery );
</script>