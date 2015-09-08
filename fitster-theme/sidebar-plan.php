
<div class="col-md-3 side-bar-plany">
		<div class="row kategorie">
			<ul>
				<?php
$args = array(
	'orderby' => 'count',
	'parent' => '0',
	);
$terms = get_terms('plany_categories',$args);
foreach ($terms as $term) : ?>
				<li><a href="<?php echo get_term_link($term,'product_cat');?>"><i class="fa fa-bookmark"></i><?php echo $term->name;?></a></li>
				<!-- <li><a href="all-category.php"><i class="fa fa-plus-square-o"></i>Więcej kategorii</a></li> -->
			<?php endforeach;?>
			</ul>
		</div>
		<div class="row">
			<h3>Popularne tagi</h3>
			<div class="row">
				<hr>
			</div>
			<div class="tagi">
				<?php $tags = get_terms( 'post_tag', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '10', 
)); ?>
					<?php foreach ($tags as $tag) {
						?>
						<a href="<?php echo get_term_link($tag->slug,'post_tag');?>"><?php echo $tag->name;?></a>
						<?php
					}?>
			</div>
		</div>
<?php 
    $args=array(
    	'post_type' => 'plan',
	    'post__not_in' => array($post->ID),
	    'posts_per_page'=>2, // Number of related posts to display.
    );
     
    $ra_query = new wp_query( $args );
    if ( $ra_query->have_posts() ) :
    ?>
		<div class="row random">
			<h3>Losowe Plany</h3>
			<div class="row">
				<hr>
			</div>
				<?php 
				    while( $ra_query->have_posts() ) :
				    $ra_query->the_post();
    			?>
								<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<p><?php custom_excerpt(20);?></p>
		<?php endwhile;?>
		</div>
	<?php endif;?>
	</div>