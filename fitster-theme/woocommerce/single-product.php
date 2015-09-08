<?php get_header();?>
<!-- <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/slider-1.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/slider-2.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/slider-3.jpg" alt="...">
    </div>
  </div>
</div>
 -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
 <?php global $post,$product;?>
<div id="produkt">
	<div class="container head">
		<div class="header">
			<h1><strong><?php echo $product->get_title();?></strong></h1>
		</div>
	</div>
	<div class="container produkt">
	<a class="back" href="<?php echo $_SERVER['HTTP_REFERER'];?>">Wróć do poprzedniej strony</a>
		<div class="breadcrumbs">
		<?php woocommerce_breadcrumb(array(
			'delimiter' => ' > ',
	)); ?>
		</div>
		<div class="col-md-4">
			<?php echo $product->get_image('shop_single');?>
		</div>

		<div class="col-md-8">
			<h2><strong><?php echo $product->get_title();?></strong></h2>
			<hr>
<?php

if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) :
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = round($product->get_average_rating(),1);

if ( $rating_count > 0 ) : ?>
			<?php 
			$modulo = fmod($average,1)*10;
			if($modulo <= 3) {
				$average = floor($average);
			} elseif($modulo >= 4 && $modulo <= 7) {
				$average == floatval($average[0].'.5');
			}else {
				$average = ceil($average);
			}
			?>
			<div class="ocena ocena-full">
				<?php
				for ($i=0; $i < 5 ; $i++) { 
					if($average > 0 && $average >= 1){
						?>
						<i class="fa fa-star"></i>
						<?php	
					} elseif($average > 0 && $average < 1) {
						?>
						<i class="fa fa-star-half-o"></i>
						<?php 
					} else {
						?>
						<i class="fa fa-star-o"></i>
						<?php 
					}
					$average--;
				}
				?>
				<span> | </span>
				<a href="#" class="jump_reviews">
					<?php
					$modulo = $rating_count % 10;
					if($modulo == 1) {
						echo $rating_count.' opinia';
					} elseif($modulo > 1 && $modulo < 5) {
						echo $rating_count.' opinie';
					} else {
						echo $rating_count.' opinii';
					}
					?>
				</a>
				<span> | </span>
				<a href="#" class="jump_review_add">Dodaj opinię</a>
			</div>
<?php else : ?>
			<div class="ocena ocena-empty">
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-half-o"></i>
				<span> | </span>
				<a href="#" class="jump_review_add">Dodaj opinię jako pierwszy!</a>
			</div>
<?php endif;endif;?>
			<h3><?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?></h3>
			<div class="availability">
				<?php if($product->is_in_stock()) : ?>
				<i class="fa fa-check-square-o"></i>
				<span>Produkt dostępny</span>
				<?php else : ?>
				<i class="fa fa-times"></i>
				<span>Produkt niedostępny</span><br>				
			<?php endif;?>
			</div>

			<div class="ilosc">
			<?php if ($product->is_purchasable() ) :?>
			<form method="post" enctype='multipart/form-data'>	
					 	<?php
	 		if ( ! $product->is_sold_individually() || !$product->is_in_stock())
	 			?>
	 			<button class="remove">
					<i class="fa fa-minus"></i>
				</button>
				<?php 
				if(!$product->backorders_allowed() && $product->get_stock_quantity() != '') {
					$max = $product->get_stock_quantity();
				} else {
					$max = 'unlimited';
				}
				?>
				<input value="1" type="text" name="quantity" id="quantity_input" data-max="<?php echo $max;?>"/>
				<button class="add">
					<i class="fa fa-plus"></i>
				</button>
	 			
				<button type="submit" class="cart">Dodaj do koszyka</button>
				</form>
			<?php endif;?>
				<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
				<button title="Poleć produkt"><i class="fa fa-share-alt"></i></button>
			</div>
			<div class="info">
				<strong>Kategoria: </strong>
				<?php echo $product->get_categories(", ");?>
			</div>
			<div class="info">
				<strong>Tagi: </strong>
				<?php echo $product->get_tags(", ");?>
			</div>
			<div class="info">
				<strong>Producent: </strong>
				<?php echo get_the_term_list( $post->ID, 'product_brand');?>
			</div>
		</div>
	</div>
	<div class="container informacje">
		<div class="col-md-12">
			<div role="tabpanel">
<?php 
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			  	<?php $first = key($tabs); ?>
			  	<?php foreach ( $tabs as $key => $tab ) : ?>
			    <li role="presentation" class="<?php echo $key ?>_tab <?php if($key===$first){echo 'active';}?>"><a href="#tab-<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a></li>
			  <?php endforeach; ?>
			  </ul>
<?php endif;?>
			  <!-- Tab panes -->
			  <div class="tab-content">
			  	<?php foreach ( $tabs as $key => $tab ) : ?>
			    <div role="tabpanel" class="tab-pane <?php if($key===$first){echo 'active';}?>" id="tab-<?php echo $key ?>">
			    	<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			    </div>
			    <?php endforeach; ?>
<!-- 			    <div role="tabpanel" class="tab-pane" id="info">
			    	<p>
			    		<strong>Waga:</strong> 0.7 kg</br>
			    		<strong>Wymiary:</strong> 20 x 30 x 40 cm</br>
			    		<strong>Opakowanie:</strong> 700g
			    	</p>
			    </div> -->
<!-- 			    <div role="tabpanel" class="tab-pane" id="opinie">
			    	<h2><strong>Liczba opinii:</strong> 1</h2>
			    	<hr>
			    	<div class="opinia">
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
			    	</div>

			    	<div class="add-reviev">	
			    		<h2><strong>Dodaj opinię</strong></h2>
			    		<hr>
			    		<form>
				    		<label>Twoja ocena: <strong>*</strong></label>
				    		<button><span>1</span><i class="fa fa-star"></i></button>
				    		<button><span>2</span><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>3</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>4</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button>
				    		<button><span>5</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></button><br>
				    		<label>Twoja opinia:</label>
				    		<textarea></textarea>
				    		<span><strong>*</strong>Pole wymagane</span>
				    		<input class="send" value="Dodaj opinię" type="submit" />
			    		</form>
			    	</div>
			    </div> -->
<!-- 			    <div role="tabpanel" class="tab-pane" id="skladniki">
			    	<table>
			    		<tr>
			    			<td class="first">Nazwa składnika</td>
			    			<td class="first">Ilość</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>
			    		<tr>
			    			<td>Nazwa składnika</td>
			    			<td>78mg</td>
			    		</tr>

			    	</table>
			    </div> -->
<!-- 			    <div role="tabpanel" class="tab-pane" id="dawkowanie">
			    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			    </div> -->
			  </div>
			</div>
		</div>
	</div>

<?php get_template_part('featured-products');?>
</div>

<?php endwhile;endif;?>
<?php get_footer();?>