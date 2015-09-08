<?php get_header();?>
<?php
$children = get_terms('product_cat',$args = array(
    'parent'            => '0',
));
?>
<div class="container wszystkie-kategorie">
	<div class="header">
		<h1><strong>Wszystkie Kategorie</strong></h1>
	</div>
	<div class="col-md-12">
		<div class="row">
			<?php 
			 foreach ($children as $child) {
			$thumbnail_id = get_woocommerce_term_meta( $child->term_id, 'thumbnail_id', true );
	    	$image = wp_get_attachment_image($thumbnail_id,'shop_catalog');
				?>
			<div class="col-md-3">
				<div class="img">
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
					<div class="ikony">
						<a href="<?php echo get_term_link($child->slug, 'product_cat' );?>"><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h2><?php echo $child->name;?></h2>
				<hr>
				<p><?php echo $child->description;?></p>
			</div>				
				<?php
			}
			?>
		</div>
	</div>		
</div>
<?php get_footer();?>