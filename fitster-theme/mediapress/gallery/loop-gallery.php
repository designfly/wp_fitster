<?php
/**
 * List all galleries for the current component
 * 
 */
?>
<?php if($_GET['sort'] && $_GET['sort'] != 'newest') {

switch ($_GET['sort']) {
	case 'oldest':
		$query = array(
			'orderby' => 'date',
			'order' => 'ASC' 
			);
		break;
	
	case 'best':
		$query = array(  
        'order'     => 'DESC',
        'meta_key' => 'gallery_ratings',
        'orderby'   => 'meta_value_num', //or 'meta_value_num'		
		);
	break;

	case 'worst':
		$query = array(  
        'order'     => 'ASC',
        'meta_key' => 'gallery_ratings',
        'orderby'   => 'meta_value', //or 'meta_value_num'		
		);
	break;
}
} else {
		$query = array(  
		'orderby'   => 'date', //or 'meta_value_num'
        'order'     => 'DESC',        		
		);		
}
global $wp_query;
$args = $query;
$gallery_query = new MPP_Gallery_Query($args);
?>
<?php global $bp;?>
<?php global $post;?>
<?php if( $gallery_query->have_galleries() ): ?>
	<div class="gallery">
	<div class='mpp-g mpp-item-list mpp-galleries-list'>

		<?php while( $gallery_query->have_galleries() ): $gallery_query->the_gallery(); ?>

			<div class="col-md-3">
			<?php $gallery_rating = get_post_meta($post->ID, 'gallery_ratings',true);?>
				<strong>ocena: <?php echo round($gallery_rating,2);?></strong>
				<a href="<?php mpp_gallery_permalink() ;?>"><div class="obrazek">
					<img src="<?php mpp_gallery_cover_src( 'thumbnail' ) ;?>"/>
					<div class="hover">
						<i class="fa fa-eye"></i>
					</div>
			</div></a>
				<div class="mpp-item-actions mpp-gallery-actions">
					<?php mpp_gallery_action_links();?>
				</div>
			</div>




<!-- <div class="<?php mpp_gallery_class(  mpp_get_gallery_grid_column_class() );?>" id="mpp-gallery-<?php mpp_gallery_id();?>">
				
				<?php do_action( 'mpp_before_gallery_entry' );?>
				
				<div class="mpp-item-entry mpp-gallery-entry">

					<a href="<?php mpp_gallery_permalink() ;?>" <?php mpp_gallery_html_attributes( array( 'class' => "mpp-item-thumbnail mpp-gallery-cover", 'mpp-data-context'=> 'galery' ) ); ?>>
						
						<img src="<?php mpp_gallery_cover_src( 'thumbnail' ) ;?>" />
					</a>
				</div>	
								
				<?php do_action( 'mpp_before_gallery_title' ); ?>
				
				<a href="<?php mpp_gallery_permalink() ;?>" class="mpp-gallery-title"><?php mpp_gallery_title() ;?></a>

				<?php do_action( 'mpp_before_gallery_actions' ); ?>	
				<?php $gallery_rating = get_post_meta($post->ID, 'gallery_ratings',true);?>
				<span>Ocena: <?php echo round($gallery_rating,2);?></span>
				<div class="mpp-item-actions mpp-gallery-actions">
					<?php mpp_gallery_action_links();?>
				</div>
				
				<?php do_action( 'mpp_before_gallery_type_icon' ); ?>
				
				<div class="mpp-type-icon"><?php do_action( 'mpp_type_icon', mpp_get_gallery_type(), mpp_get_gallery() );?></div>
				
				<?php do_action( 'mpp_after_gallery_entry' ); ?>
			</div> -->

		<?php endwhile; ?>
		<?php $create_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/mediapress/create/';?>
<?php if(is_user_logged_in() && !is_page('galerie') ) :?>

			<div class="col-md-3">
				<a href="<?php echo $create_url;?>">
					<div class="obrazek addGallery" data-toggle="modal" data-target="#dodajWykres">
					<img src="http://placehold.it/195x195">
					<div class="dodaj">
						<i class="fa fa-plus"></i>
					</div>	
				</div>	
				</a>
				<h2>Dodaj galerię</h2>
			</div>
		<?php endif;?>
	</div>
	</div>
<?php else:?>
	<div class="mpp-notice mpp-no-gallery-notice">
		<p> <?php _ex( 'There are no galleries available!', 'No Gallery Message', 'mediapress' ); ?> 
	</div>
<?php endif;?>
