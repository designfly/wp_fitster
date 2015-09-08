<?php get_header();?>
<div class="container article-list">
			<div class="header">
			<h1><strong>fitster</strong></h1>
		</div>
	<div class="col-md-12 naglowek"></div>
<?php get_sidebar('article');?>
	<div class="col-md-9 content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="artykul">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_top',$attr=array(
								'class' => 'thumbnail'
								));
						} 
					?>		
			<h2><a href="#"><?php the_title();?></a></h2>
			<div class="row">
				<hr>
			</div>
<?php custom_excerpt(45);?>
		</div>
	<?php endwhile;endif;?>
		<nav class="paginacja">
					<?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
		</nav>
	</div>
</div>

<?php get_footer();?>