<div class="container cart-podobne">
	<div class="col-md-12">
		<h2>ostatnio przeglądane</h2>
				<?php $products = sw_recently_viewed_products(4);?>
				<hr>	
				<?php if(is_array($products)) : ?>
				<?php foreach ($products as $product) :?>
		<div class="col-md-3">
			<div class="img">
				<?php echo $product->get_image('sidebar_thumb'); ?>
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3><?php echo $product->get_title();?></h3>
			<hr>
			<span class="price">
				<?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?>
			</span>
			<a class="cart" href="<?php echo $product->add_to_cart_url();?>">Dodaj do koszyka</a>
		</div>
	<?php endforeach;?>
	<?php else: ?>
			<p><?php echo $products;?></p>
	<?php endif;?>	
	</div>
</div>