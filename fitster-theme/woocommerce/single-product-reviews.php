<?php 
global $product;
if ( ! comments_open() ) {
	return;
}
?>
<?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) : ?>
					<h2><strong>Liczba Opinii:</strong> <?php echo $count;?></h2>
				<?php endif;?>
			    	<hr>
			    	<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>	
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
		<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>	
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required/>',
							'email'  => '<label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required/></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);
										if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<label for="rating"><strong>' . __( 'Your Rating', 'woocommerce' ) .'</strong></label>
							<div id="rating_buttons">
				    		<button class="rate_button" data-id="1"><span>1</span><i class="fa fa-star"></i></button>
				    		<button class="rate_button" data-id="2"><span>2</span><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button class="rate_button" data-id="3"><span>3</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button class="rate_button" data-id="4"><span>4</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button class="rate_button" data-id="5"><span>5</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button></div><select style="display:none" name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></br>';
					}

					$comment_form['comment_field'] .= '<label for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
					<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>			    	
<!-- 			    	<div class="opinia">
			    		<img src="img/user-1.jpg">
			    		<a href="#">Użytkownik</a>
			    		<span> - 04.05.2015:</span>
			    		<div class="stars">
			    			<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
			    		</div>
			    		<p>Polecam ten produkt.</p> 
			    		<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> 
			    	</div> -->

	<!-- 		    	<div class="add-reviev">	
			    		<h2><strong>Dodaj opinię</strong></h2>
			    		<hr>
			    		
				    		<label>Twoja ocena: <strong>*</strong></label>
				    		<button><span>1</span><i class="fa fa-star"></i></button>
				    		<button><span>2</span><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>3</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>4</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>5</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button><br>
				    		<form>
				    		<label>Twoja opinia:</label>
				    		<textarea></textarea>
				    		<span><strong>*</strong>Pole wymagane</span>
				    		<input class="send" value="Dodaj opinię" type="submit" />
			    		</form>
			    	</div> -->