<?php while( mpp_have_media() ): mpp_the_media(); ?>

	<div class="mpp-u <?php mpp_media_class( mpp_get_media_grid_column_class() );?>">
		
		<?php do_action( 'mpp_before_media_item' ); ?>
		
		<div class='mpp-item-entry mpp-media-entry mpp-photo-entry'>
			<a href="<?php mpp_media_permalink() ;?>" <?php mpp_media_html_attributes( array( 'class' => "mpp-item-thumbnail mpp-media-thumbnail mpp-photo-thumbnail", 'mpp-data-context' => 'gallery' ) ); ?>>
				<img src="<?php mpp_media_src('thumbnail') ;?>" alt="<?php mpp_media_title();?> "/>
			</a>
		</div>
		
		<?php
					global $post;
					$ratings = get_post_meta($post->ID,'ratings',true);
					$sum = 0;
					if(empty($ratings)) {
						$ratings = array('0');
					}
					foreach ($ratings as $user => $rating) {
						$sum +=$rating;
					}
					$rating = $sum/sizeof($ratings);
		?>
		<span>Ocena: <?php echo round($rating,2);?></span>
		<div class="mpp-item-actions mpp-media-actions mpp-photo-actions">
			<?php mpp_media_action_links();?>
		</div>
				
		<?php do_action( 'mpp_after_media_item' ); ?>
	</div>

<?php endwhile; ?>