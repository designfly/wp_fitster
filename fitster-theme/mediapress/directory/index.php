
		<?php do_action( 'bp_before_directory_mediapress_page' ); ?>
<div class="container galerie">
		<div class="header">
		galerie	
	</div>
	<div class="under"></div>
<div class="bg">
	<div id="buddypress" class="mpp-directory-contents">

	<?php do_action( 'bp_before_directory_mediapress_items' ); ?>

	

<!-- 	<div id="mpp-dir-search" class="dir-search" role="search">
		<?php mpp_directory_gallery_search_form(); ?>
	</div><!-- #mpp-dir-search -->

	<?php do_action( 'mpp_before_directory_gallery_tabs' ); ?>



		<div class="item-list-tabs" role="navigation">
		<form>
		<select name="sort" onchange="this.form.submit()" id="gallery_sort">
			<option value="newest">Najnowsze</option>
			<option value="oldest">Najstarsze</option>
			<option value="best">Najlepiej Oceniane</option>
			<option value="worst">Najgorzej Oceniane</option>
		</select>
		</form>
			
		</div><!-- .item-list-tabs -->

		

		<div id="mpp-dir-list" class="mpp mpp-dir-list dir-list">
			<?php
				mpp_get_template( 'gallery/loop-gallery.php' );
			?>
		</div><!-- #mpp-dir-list -->

		<?php do_action( 'mpp_directory_gallery_content' ); ?>

		<?php wp_nonce_field( 'directory_mpp', '_wpnonce-mpp-filter' ); ?>

		<?php do_action( 'mpp_after_directory_gallery_content' ); ?>


	<?php do_action( 'mpp_after_directory_gallery' ); ?>

</div><!-- #buddypress -->
</div>
</div>
<?php do_action( 'mpp_after_directory_gallery_page' ); ?>

