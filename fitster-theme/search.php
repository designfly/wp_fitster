<?php get_header();?>

<div class="container plany">
		<div class="header">
		<h1><strong>fitster</strong></h1>
	</div>
	<div class="col-md-12 naglowek">
	</div>
	<div class="bg">
<?php get_sidebar('plan');?>
	<div class="content col-md-9">
		<div class="row plany-cwiczen wyniki-wyszukiwania">
			<h1><?php echo get_search_query(); ?></h1>

			
			<?php 
			if(!$_GET['limit'] || $_GET['limit'] == 'all') {
				$post_types = array('product','article','plan');
			} else {
				$post_types = array($_GET['limit']);
				
			}
			global $wp_query;
			$custom_args = array(
			'post_type' => $post_types,
);
			$args = array_merge( $wp_query->query_vars,$custom_args);

			$query = new WP_Query($args);
?>					
<?php if ( $query->have_posts() ) : ?>
<?php 
if($_GET['s']) {
	$s = $_GET['s'];
}

$count_products = new WP_Query(array( 'posts_per_page' => -1, 's' => $s,'post_type' => 'product'));
$count_products = $count_products->post_count;
$count_articles = new WP_Query(array( 'posts_per_page' => -1, 's' => $s,'post_type' => 'article'));
$count_articles = $count_articles->post_count;
$count_plans = new WP_Query(array( 'posts_per_page' => -1, 's' => $s,'post_type' => 'plan'));
$count_plans = $count_plans->post_count;

$last_type = '';
$typecount = 0;
while ($query->have_posts()){
    $query->the_post(); 
    if($last_type != $post->post_type) {
        $typecount = $typecount + 1;
        if ($typecount > 1){
            echo '</div>'; //close type container
        }
       // save the post type.
        $last_type = $post->post_type;
        //open type container
        switch ($post->post_type) {
            case 'product':
                echo '<h2>Sklep <span>('.$count_products.')</span></h2><hr><div class="row">';
                break;
            case 'article':
                echo '<h2>Artykuły <span>('.$count_articles.')</span></h2><hr><div class="row">';
                break;
            case 'plan':
                echo '<h2>Plany Ćwiczeń <span>('.$count_plans.')</span></h2><hr><div class="row">';
                break;
            //add as many as you need.
        }
	}
	if($post->post_type == 'product') {
   			$product = get_product($post->ID );?>
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
				<div class="obrazek">
					<?php echo $product->get_image('shop_thumbnail'); ?>
					<div class="hover">
						<a href=""><i class="fa fa-eye"></i></a>
					</div>
				</div>
				<h3><?php echo $product->get_title();?></h3>
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
<?php
	} else {
?>							<div class="row">
							<div class="col-md-5">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
							</div>

							<div class="col-md-7">
								<h3><?php the_title();?></h3>
								<p>
<?php the_excerpt();?>
								</p>
							</div>
							</div>
<?php
	}
}
else: ?>
<p>Brak wyników wyszukiwania dla podanej frazy.</p>
<?php endif;?>
		<nav class="paginacja">
					<?php
  if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
		</nav>
		</div>
	</div>
	</div>
	
</div>
	
	

<?php get_footer();?>
<script type="text/javascript">
(function($) {
	$( ".krok" ).click(function(event) {
        event.preventDefault();
      $( ".krok" ).removeClass( "active" );
      $(this).addClass("active");

      var numer_kroku = $(this).data("krok");
      $(".step").hide();
      $("#krok-"+numer_kroku).show();
    });

var plec;
    $( ".plec" ).click(function(event) {
        event.preventDefault();

	      $(".step").hide();
	      $("#krok-2").show();
	      $('.krok').removeClass("active");
	      $('.krok[data-krok=2]').addClass("active");

      	plec = $(this).data("plec");
	    	if (plec=='1'){
	    		$(".obrazek.women").hide();
	    		$(".obrazek.men").show();
	    	} else {
	    		$(".obrazek.men").hide();
	    		$(".obrazek.women").show();
	    	}
    });
    $(".cel").click(function(event) {
    	event.preventDefault();
    	$(".step").hide();
    	$("#krok-3").show();
    	$(".krok").removeClass("active");
    	$('.krok[data-krok=3]').addClass("active");

	    	if (plec=='1'){
	    		$(".obrazek.women").hide();
	    		$(".obrazek.men").show();
	    	} else {
	    		$(".obrazek.men").hide();
	    		$(".obrazek.women").show();
	    	}

    });
    })( jQuery );
</script>