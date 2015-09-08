<?php
global $post;
$args = array(  
    'post_type' => 'product',  
    'meta_key' => '_featured',  
    'meta_value' => 'yes',  
    'post__not_in' => array($post->ID), 
    'posts_per_page' => 4,
    'orderby' => 'rand',
     
);  
  
$featured_query = new WP_Query( $args );  
      
if ($featured_query->have_posts()) :  ?> 
<div class="container cart-podobne">
	<div class="col-md-12">
		<h2>polecane produkty</h2>
		<hr>
<?php    while ($featured_query->have_posts()) :  
$featured_query->the_post();          
        $product = get_product( $featured_query->post->ID );?>
		<div class="col-md-3">
			<a href="<?php echo $product->get_permalink()?>"><div class="obrazek">
				<?php echo $product->get_image('shop_thumbnail'); ?>
				<div class="hover">
					<i class="fa fa-eye"></i></a>
				</div>
			</div></a>
			<h3><a href="<?php echo $product->get_permalink()?>"><?php echo $product->get_title();?></a></h3>
			<hr>
			<span class="price">
				<?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?>
			</span>
			<a class="cart" href="<?php echo $product->add_to_cart_url();?>">Dodaj do koszyka</a>
		</div>
        
    <?php endwhile; ?>  
  	</div>
</div>    
<?php endif;  
wp_reset_query(); // Remember to reset  
?>

