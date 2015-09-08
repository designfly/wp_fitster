<?php get_header(); ?>
	<div class="container category">
		<?php get_sidebar('shop');?>
<?php
$price = array();
$brands = array();
if(isset($_GET['cena'])) {
	if($_GET['cena'] == '_') {
		$prices[0] = 0;
		$prices[1] = 99999;
	} else {
		$prices = explode("_",$_GET['cena']);
	}
	$price = array(
    'meta_query' => array(
        array(
            'key' => '_price',
            'value' => array(floatval($prices[0]),floatval($prices[1])),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        )
    )
);
}
if(isset($_GET['marki'])) {
	$brands = array(
		'product_brand' => $_GET['marki'], 
		); 
}
$query = array_merge($price,$brands);
global $wp_query;
$args = array_merge( $wp_query->query_vars,$query);
				query_posts($args);
				?>
		<div class="col-md-9 produkty">
			<div class="opcje">
				<span><?php woocommerce_result_count();?></span>
				<div class="option">
<?php woocommerce_catalog_ordering();?> 
				</div>
			</div>
			<?php wc_print_notices(); ?>
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
 				<?php global $post,$product;?>
				<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
					<div class="img">
						<?php echo woocommerce_get_product_thumbnail('shop_thumbnail');?>
						<div class="ikony">
							<a href="<?php echo $product->get_permalink()?>"><span class="glyphicon glyphicon-new-window"></span></a>
						</div>
					</div>
					<h3><?php echo $product->get_title();?></h3>
					<hr>
					<div class="price">
					<?php if($product->is_on_sale()) :?>
					<span class="old-price">
					<?php echo $product->get_regular_price().' '.get_woocommerce_currency_symbol(); ?>
					</span>
					<?php endif;?>
					<span class="new-price">
						<?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?>
					</span>						
						<span>
							
						</span>
						<a class="cart" href="<?php echo $product->add_to_cart_url();?>">Dodaj do koszyka</a>
					</div>
				</div>
				
				<?php endwhile;else:?>
				<p>Brak wyników</p>
				<?php endif;?>
				<?php echo woocommerce_pagination(); ?>
			</div>
	
		</div>
	</div>
	<?php get_footer();?>