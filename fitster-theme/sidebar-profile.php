<div class="col-md-4 side-bar-profile">
<?php $ud = get_userdata( bp_displayed_user_id() ); ?>
<?php if ( bp_has_profile() ) : ?>
<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>	
<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
	<?php if ( bp_field_has_data() ) : ?>
	<?php if(!(bp_get_the_profile_field_name() == 'Name')) :?>	
	<div class="row">
		<h2><?php bp_the_profile_field_name(); ?></h2>
		<div class="row">
			<hr>
		</div>
		<p><?php echo strip_tags(bp_get_the_profile_field_value()); ?></p>
	</div>
<?php endif;?>
	<?php endif;?>
<?php endwhile;?>
<?php endif;?>
<?php endwhile;?>
<?php endif;?>
<?php $args = 
array(
	'user_id' => 'bp_displayed_user_id()', 
	'per_page' => 9,
	);
$media = new MPP_Media_Query($args);?>
	<div class="row">
		<h2><a href="#">galeria</a></h2>
		<div class="row">
			<hr>
		</div>
<?php if($media->have_media()) : 
while($media->have_media()):
	$media->the_media();?>
		<div class="col-md-4 photo">
			<a href="<?php mpp_media_permalink() ;?>"><img src="<?php mpp_media_src('thumbnail') ;?>"></a>
		</div>
<?php endwhile;endif;?>

	</div>
</div>

