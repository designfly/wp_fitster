<?php get_header();?>
<div class="container artykuly">
	<div class="header">
		<h1><strong>Artykuły</strong></h1>
	</div>
	<div class="col-md-12 naglowek"></div>
<?php get_sidebar('article');?>
	<div class="col-md-9 content">
<?php 
$args = array(  
    'post_type' => 'article',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  ?> 
		<div class="row polecane">
			<h2>Polecane artykuły</h2>
			<hr>
<?php    while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
			<div class="col-md-4">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<hr>
				<p><?php the_excerpt();?></p>
			</div>
		<?php endwhile;?>
		</div>
<?php endif;?>

<?php 
$args = array(  
    'post_type' => 'article',  
    'posts_per_page' => 3,
);  
  
$na_query = new WP_Query( $args );  
      
if ($na_query->have_posts()) :  ?> 
		<div class="row category">
			<div class="header">
				<h1><strong>Najnowsze artykuły</strong></h1>
			</div>
			<div class="col-md-12">
<?php    while ($na_query->have_posts()) :  
$na_query->the_post();  ?>
			<div class="col-md-4">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
				<h3><a href="#"><?php the_title();?></a></h3>
				<hr>
				<p><?php the_excerpt();?></p>
			</div>
			<?php endwhile;?>
			</div>
		</div>
	<?php endif;?>
<?php 
$terms = get_terms( 'article_categories' );
foreach ($terms as $term):
?>
		<div class="row category">
			<div class="header">
				<h1><strong><?php echo $term->name;?></strong></h1>
			</div>
			<div class="col-md-12">
				<?php
				$args = array(
	'post_type' => 'article',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'article_categories',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	
	),
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
				<div class="col-md-4">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<hr>
					<?php the_excerpt();?>
				</div>
			<?php endwhile;?>
			</div>
			<div class="col-md-12 see">
				<a class="all" href="<?php echo get_term_link($term, 'article_categories');?>">Zobacz Wszystko</a>
			</div>
		</div>
<?php endforeach;?>
	</div>
</div>
<?php get_footer();?>