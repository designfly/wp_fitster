<?php
    global $post;
    $tags = wp_get_post_tags($post->ID);
     
    if ($tags) :
    $tag_ids = array();
    foreach($tags as $individual_tag) {
    	$tag_ids[] = $individual_tag->term_id;
    }
$args = array(  
    'post_type' => 'article',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 4,
    'orderby' => 'rand'  ,
    'post__not_in' => array($post->ID),  
);  
     
    $my_query = new wp_query( $args );
    if ( $my_query->have_posts() ) :
    ?>
			<div class="polecane">
				<h2>Polecane dla Ciebie</h2>
				<hr><br>
				<?php 
				    while( $my_query->have_posts() ) :
				    $my_query->the_post();
    			?>
				<div class="article">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
					<h3><a href="<?php the_permalink();?>"><strong><?php the_title();?></strong></a></h3>
					<p><?php the_excerpt();?>
					</p>
				</div>
			<?php endwhile;endif;endif;?>
			</div>