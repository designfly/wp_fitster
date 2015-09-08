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
</div> -->
<div class="shop">
	<div class="container">
		<div class="header">
		Sklep
	</div>
	<div class="naglowek"></div>
	<div class="bg">
		<div class="col-md-3 kategorie">
			<ul>
				<?php
$terms = get_terms('product_cat' );
foreach ($terms as $term) : ?>
				<li><a href="<?php echo get_term_link($term,'product_cat');?>"><i class="fa fa-bookmark"></i><?php echo $term->name;?></a></li>
				<!-- <li><a href="all-category.php"><i class="fa fa-plus-square-o"></i>Więcej kategorii</a></li> -->
			<?php endforeach;?>
			</ul>
		</div>
			<?php
			$sale = wc_get_product_ids_on_sale();
$args = array(  
    'post_type' => 'product',  
    'posts_per_page' => 3,
    'orderby' => 'rand', 
    'post__in' => $sale,
);  
  
$on_sale_query = new WP_Query( $args ); 
if ($on_sale_query->have_posts()) :  ?> 
	<div class="col-md-9 promocje">
			<h2>promocje</h2>
			<hr>
<?php   while ($on_sale_query->have_posts()) :  
			$on_sale_query->the_post();          
   			$product = get_product($on_sale_query->post->ID );?>
			<div class="col-md-4">
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					if($regular_price == 0) {
						$regular_price = 1;
					}
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<a href="<?php the_permalink(); ?>"><div class="obrazek">
					<?php echo $product->get_image('shop_thumbnail'); ?>
					<div class="hover">
						<i class="fa fa-eye"></i>
					</div>
				</div></a>
				<h3><a href="<?php the_permalink(); ?>"><?php echo $product->get_title();?></a></h3>
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
    <?php endwhile; ?>  
		</div>
</div>
	<?php endif;?>
	<?php wp_reset_query(); ?>
	</div>

<?php
    $args = array( 
    	'post_type' => 'product', 
    	'posts_per_page' => 3, 
    	'orderby' =>'rand',
    	'meta_key' => '_featured',
    	'meta_value' => 'yes');
    $loop = new WP_Query( $args );
?>
	<div class="container new">
		<div class="header">
			<h1><strong>nowe produkty</strong></h1>
		</div>
		<div class="col-md-12">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			$product = get_product($loop->post->ID );?>
				<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
					<a href="<?php echo $product->get_permalink()?>"><div class="obrazek">
						<?php echo woocommerce_get_product_thumbnail('shop_single');?>
						<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
					</div></a>
					<h3><a href="<?php echo $product->get_permalink()?>"><?php echo $product->get_title();?></a></h3>
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
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
		</div>
	</div>

<?php
$args = array(  
    'post_type' => 'product',  
    'meta_key' => '_featured',  
    'meta_value' => 'yes',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$featured_query = new WP_Query( $args );  
      
if ($featured_query->have_posts()) :  ?> 
	<div class="container new">
		<div class="header">
			<h1><strong>Polecane produkty</strong></h1>
		</div>
		<div class="col-md-12">
<?php    while ($featured_query->have_posts()) :  
	$featured_query->the_post();          
    $product = get_product( $featured_query->post->ID );?>
		<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
			<a href="<?php the_permalink(); ?>"><div class="obrazek">
				<?php echo $product->get_image('shop_single'); ?>
				<div class="hover">
					<i class="fa fa-eye"></i>
				</div>
			</div></a>
			<h3><a href="<?php the_permalink(); ?>"><?php echo $product->get_title();?></a></h3>
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
        
    <?php endwhile; ?>  
		</div>
	</div>
	<?php endif;  
wp_reset_query(); // Remember to reset
?>

	<?php
$terms = get_terms( 'product_cat' );
foreach ($terms as $term):
?>
<div class="container new">
			<div class="header">
				<h1><strong><?php echo $term->name;?></strong></h1>
			</div>
			<div class="col-md-12">
<?php
				$args = array(
	'post_type' => 'product',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	),
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
<?php $product = get_product( $term_query->post->ID );?>
		<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
			<a href="<?php the_permalink(); ?>"><div class="obrazek">
				<?php echo $product->get_image('shop_single'); ?>
				<div class="hover">
					<i class="fa fa-eye"></i>
				</div>
			</div></a>
			<h3><a href="<?php the_permalink(); ?>"><?php echo $product->get_title();?></a></h3>
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
<?php endwhile;?>	
			
			</div>
			</div>
	<?php endforeach;?>
	<div class="container">
		<div class="col-md-12 marki">
			<h2>polecane marki</h2>
			<hr>
			<div class="controls">
		    	<a class="jcarousel-prev" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
		    	<a class="jcarousel-next" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a>
		    </div>
			<div class="jcarousel">
				<ul>
				<?php $brands = get_terms('product_brand'); 
				if(!empty($brands)) :
				foreach ($brands as $brand) {
					if(get_woocommerce_term_meta( $brand->term_id, 'featured', true )) {
						$featured[] = $brand;
					}
				}
				?>
				<?php foreach ($featured as $brand) :?>
					<li><a href="<?php echo get_term_link($brand->slug,'product_brand');?>">
						<?php if (function_exists('z_taxonomy_image')) z_taxonomy_image($brand->term_id,'brand'); ?>
</a></li>
				<?php endforeach;?>	
			<?php endif;?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.jcarousel-core.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.jcarousel-control.min.js"></script>
    <script type="text/javascript">
    (function($) {
$(function() {
    $('.jcarousel').jcarousel();
    
    $('.jcarousel-prev').jcarouselControl({
        target: '-=1'
    });

    $('.jcarousel-next').jcarouselControl({
        target: '+=1'
    });    
});
        })( jQuery );

    </script>