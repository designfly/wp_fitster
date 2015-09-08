<?php
/**
 * Shortcode Photo List
 */
$query = mpp_widget_get_media_data('query' ); ?>

<?php if( $query->have_media() ) :?>

<div class="mpp-container mpp-widget-container mpp-media-widget-container mpp-media-photo-widget-container">
	
	<div class='mpp-g mpp-item-list mpp-media-list mpp-photo-list'>
		
		<?php while( $query->have_media() ): $query->the_media(); ?>

			<div class="<?php mpp_media_class( 'mpp-widget-item mpp-widget-photo-item '. mpp_get_grid_column_class( 1 ) );?>">
				
				<?php do_action( 'mpp_before_media_widget_item' ); ?>
				
				<div class='mpp-item-entry mpp-media-entry mpp-photo-entry'>
					
					<a href="<?php mpp_media_permalink() ;?>" <?php mpp_media_html_attributes( array( 'class' => "mpp-item-thumbnail mpp-media-thumbnail mpp-photo-thumbnail", 'mpp-data-context' => 'widget' ) ); ?>>
						<img src="<?php mpp_media_src('thumbnail') ;?>" alt="<?php mpp_media_title();?> "/>
					</a>
					
				</div>		
				
				<a href="<?php mpp_media_permalink() ;?>" <?php mpp_media_html_attributes( array( 'class' => "mpp-item-title mpp-media-title mpp-photo-title", 'mpp-data-context' => 'widget' ) ); ?> >
					<?php mpp_media_title() ;?>
				</a>
				
				<div class="mpp-item-actions mpp-media-actions mpp-photo-actions">
					<?php mpp_media_action_links();?>
				</div>
				
				<?php do_action( 'mpp_after_media_widget_item' ); ?>
				
			</div>

		<?php endwhile; ?>
		<?php mpp_reset_media_data(); ?>
	</div>
</div>	
<?php endif;?>