<?php get_header();?>
<!-- <div id="headerProfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="thumbnail" src="http://placehold.it/250x250">
			</div>		
			<div class="col-md-9 menu">
				<a href="#">tablica</a>
				<a href="#">galeria</a>
				<a href="#">ustawienia</a>
			</div>	
		</div>
	</div>
</div> -->

<div class="container profile">
	<div class="header">
		<h1><strong>Wszyscy użytkownicy</strong></h1>
	</div>
	<div class="col-md-12 under"></div>
	<div class="bg">
	<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>
		<div class="col-md-12 members">
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