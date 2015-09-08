<?php
/**
 * List videos attached to activity
 * 
 */
?>
<div class="mpp-container mpp-media-list mpp-activity-media-list mpp-activity-video-list mpp-activity-video-player">
<?php
	$ids = mpp_activity_get_attached_media_ids( bp_get_activity_id() );
	//is there only one video attached?
	if( count( $ids ) == 1 ) {
		$ids = array_pop( $ids );
		$media = mpp_get_media( $ids );
		$args = array(
			'src'		=> mpp_get_media_src( '', $media ),
			'poster'	=> mpp_get_media_src( 'thumbnail', $media ),

		);
	//show single video with poster	
	echo wp_video_shortcode( $args );
	
	} else {
	//show all videos as playlist
		echo wp_playlist_shortcode( array( 'ids' => $ids , 'type' => 'video' ));
	
	}
?>
</div>