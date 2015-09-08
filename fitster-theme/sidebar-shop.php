<div class="col-md-3 side-bar">
				
			<div class="row kategorie">
			<ul>
				<?php
$args = array(
	'orderby' => 'count',
	'parent' => '0',
	);
$terms = get_terms('product_cat',$args);
foreach ($terms as $term) : ?>
				<li><a href="<?php echo get_term_link($term,'product_cat');?>"><i class="fa fa-bookmark"></i><?php echo $term->name;?></a></li>
				<!-- <li><a href="all-category.php"><i class="fa fa-plus-square-o"></i>Więcej kategorii</a></li> -->
			<?php endforeach;?>
			</ul>
			</div>
			<h2>opcje</h2>
			<div class="row">
				<form id="options_form">
				<h3>Cena (zł)</h3>
				<hr>
				<?php 
				?>
				<input placeholder="od" class="cena_od" value="<?php if($_GET['cena']) echo explode('_',$_GET['cena'])[0];?>"/>
				<span>-</span>
				<input placeholder="do" class="cena_do" value="<?php if($_GET['cena']) echo explode('_',$_GET['cena'])[1];?>"/>
			</div>
<?php if(!is_tax( 'product_brand')) :?>
			<div class="row">
				<h3>Marka</h3>
				<hr>
				
				<ul class="marki">
					<?php $brands = get_terms('product_brand'); ?>
					<?php 
					if($_GET['marki']) {
						$marki = explode(",",$_GET['marki']);
					} else {
						$marki = array();
					}
					?>
					<?php 
					foreach ($brands as $brand) {
						?>
						<li><input type="checkbox" class="brand_checkbox" value="<?php echo $brand->slug;?>" <?php if(in_array($brand->slug, $marki)) echo 'checked';?>/><?php echo $brand->name;?></li>
						<?php 					}
					?>
				</ul>
			</div>
			<input type="hidden" name="marki"/>
			<?php endif;?>
			<input type="hidden" name="cena"/>
			<input type="submit" id="filter_options" value="Filtruj"/>
			</form>
			<h2>inne</h2>
			<div class="row">
				<h3>Popularne tagi</h3>
				<hr>
				<div class="tagi">
				<?php $tags = get_terms( 'product_tag', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '10', 
)); ?>
					<?php foreach ($tags as $tag) {
						?>
						<a href="<?php echo get_term_link($tag->slug,'product_tag');?>"><?php echo $tag->name;?></a>
						<?php
					}?>
				</div>
			</div>

			<div class="row last">
				<h3>Ostatnio przeglądane</h3>
				<?php $products = sw_recently_viewed_products(2);?>
				<div class="row">
					<hr>
				</div>	
				<?php if(is_array($products)) : ?>
				<?php foreach ($products as $product) {
					?>
				<a href=""><div class="obrazek">
					<?php echo $product->get_image('sidebar_thumb'); ?>
					<div class="hover">
						<i class="fa fa-eye"></i>
					</div>
				</div></a>
				<h4><a href=""><?php echo $product->get_title();?></a></h4>
				<hr class="linia">
					<div class="price">
					<span>
						<?php echo $product->get_display_price().' '.get_woocommerce_currency_symbol();?>
					</span>
				</div>
					<?php
				}?>
			<?php else: ?>
			<p><?php echo $products;?></p>
			<?php endif;?>	
			</div>
		</div>