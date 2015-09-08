<?php
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

?>
<div class="opinia" id="comment-<?php comment_ID(); ?>">
			    		<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '60' ), '' ); ?>
			    		<a href="#"><?php comment_author(); ?></a>
			    		<span> - <?php echo get_comment_date( __( get_option( 'date_format' ), 'woocommerce' ) ); ?></span>
			    		<div class="stars">
			    			<?php for ($i=1; $i <= 5 ; $i++) { 
			    				if($rating > 0): ?>
			    				<i class="fa fa-star"></i>
			    				<?php else : ?>
			    				<i class="fa fa-star-o"></i>
			    				<?php endif;?>
			    				<?php $rating--;?>
			    			<?php }?>
			    		</div>
			    		<p>
			    		<?php comment_text(); ?></p> 
</div>