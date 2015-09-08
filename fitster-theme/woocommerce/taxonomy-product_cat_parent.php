
<div class="container wszystkie-kategorie">
	<div class="header">
		<h1><strong><?php echo $term->name;?></strong></h1>
	</div>
	<div class="col-md-12">
			<div class="breadcrumbs">
		<?php woocommerce_breadcrumb(array(
			'delimiter' => ' > ',
	)); ?>
		</div>
		<div class="row">
			<?php 
			 foreach ($children as $child) {
			$thumbnail_id = get_woocommerce_term_meta( $child->term_id, 'thumbnail_id', true );
	    	$image = wp_get_attachment_image($thumbnail_id,'shop_catalog');
				?>
			<div class="col-md-3">
				<a href="<?php echo get_term_link($child->slug, 'product_cat' );?>"><div class="obrazek">
					<?php
				if ( $image ) {
		   			  echo $image;
					}
				else {
					?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/shop_catalog_placeholder_253x152.jpg">
					<?php 
				}
					;?>
					<div class="hover">
						<i class="fa fa-eye"></i>
					</div>
				</div></a>
				<h2><a href="<?php echo get_term_link($child->slug, 'product_cat' );?>"><?php echo $child->name;?></a></h2>
				<hr>
				<p><?php echo $child->description;?></p>
			</div>				
				<?php
			}
			?>
		</div>
	</div>		
</div>