<?php get_header();?>
<div class="container wish-list">
	<div class="header">
		<h1><strong>Lista życzeń</strong></h1>
	</div>
	<?php if(count( $wishlist_items ) == 0) :?>
	<div class="col-md-12 empty">
		<span>Twoja lista życzeń jest pusta.</span>
		<span>Przejdź do <a href="#"><strong>sklepu</strong></a>, aby kontynuować zakupy.</span>
	</div>
	<?php else: ?>
	<div class="col-md-12">
		<?php 
	foreach( $wishlist_items as $item ) :
                global $product;
	            if( function_exists( 'wc_get_product' ) ) {
		            $product = wc_get_product( $item['prod_id'] );
	            }
	            else{
		            $product = get_product( $item['prod_id'] );
	            }

                if( $product !== false && $product->exists() ) {
	                $availability = $product->get_availability();
	                $stock_status = $availability['class'];
	            }
	            ?>
		<div class="wiersz">
			<div class="col-md-6">
                            <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
                                <?php echo $product->get_image() ?>
                            </a>
			</div>
			<div class="col-md-6">
				<div class="ilosc">
					<h2><strong><?php echo $product->get_title();?></strong></h2>
					<hr>
					<h3>Cena: <?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?></h3>
<!-- 					<button class="add">
						<i class="fa fa-minus"></i>
					</button>
					<input value="1" type="text" />
					<button class="remove">
						<i class="fa fa-plus"></i>
					</button>
					<h3>RAZEM: 39,99 zł</h3> -->
			<div class="availability">
				<?php if($product->is_in_stock()) : ?>
				<i class="fa fa-check-square-o"></i>
				<span>Produkt dostępny</span>
				<?php else : ?>
				<i class="fa fa-times"></i>
				<span>Produkt niedostępny</span><br>				
			<?php endif;?>
			</div>
			<?php if ($product->is_purchasable() ) :?>
					<a href="<?php echo $product->add_to_cart_url();?>"><button class="dodaj-do">Dodaj do koszyka</button></a>
			<?php endif;?>
			<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>"><button class="dodaj-do">Usuń z listy życzeń</button></a>	
				</div>
			</div>
		</div>
	            <?php 
	endforeach;
		?>
		</div>
<?php endif;?>
</div>
<div class="container wish-list-podobne">
	<div class="col-md-12">
		<h2>ostatnio przeglądane</h2>
		<hr>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
	</div>
</div>

<div class="container wish-list-podobne">
	<div class="col-md-12">
		<h2>polecane produkty</h2>
		<hr>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-3">
			<div class="img">
				<img src="img/produkt.png">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
	</div>
</div>
<?php get_footer();?>