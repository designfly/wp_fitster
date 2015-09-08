<?php get_header();?>
<div id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 naglowek">
				<div class="header">
					<h1><strong>fitster</strong></h1>
				</div>
			</div>
		</div>	
		<div class="bg">
		
			<div id="opis-portalu-home" class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sztanga.png">
						<h2>Ćwiczenia</h2>
						<p><?php echo get_option('fitster_cwiczenia');?></p>
					</div>	
					<div class="col-md-6">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/biceps.png">
						<h2>Treningi</h2>
						<p><?php echo get_option('fitster_treningi');?></p>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/broccoli.png">
						<h2>odżywianie</h2>
						<p><?php echo get_option('fitster_odzywianie');?></p>
					</div>	
					<div class="col-md-6">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/proteins.png">
						<h2>suplementacja</h2>
						<p><?php echo get_option('fitster_suplementacja');?></p>
					</div>	
				</div>				
			</div>
			<!-- <div class="col-md-4">
				<div class="header">
					<h1>Społeczność</h1>
				</div>
				<div class="aktywnosc">
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
				</div>
				<?php if ( !is_user_logged_in() ) : ?>
				<div class="rejestracja-home">
					<h3><strong>Stwórz konto</strong></h3>
					<hr>
					<span>Z nami osiągniesz swoje cele!</span>
					<a href="<?php echo get_permalink( get_page_by_path( 'register' ) );?>">Zarejestruj się</a>
				</div>
			<?php endif;?>
			</div> -->
		</div>
	</div>
</div>

<div id="home-sklep">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1>Sklep</h1>
			</div>
			
			<h2>Odwiedź nasz sklep</h2>
			<hr>
			<span><?php echo get_option('fitster_our_shop');?></span>
		
		<div class="col-md-3">
			<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>" class="item first">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/shop.png">
				<p>Przejdź do sklepu <span class="glyphicon glyphicon-log-in"></span></p>
			</a>
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
			<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			$product = get_product($loop->post->ID );?>
				<div class="col-md-3 produkt">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
					<div class="obrazek">
						<?php echo woocommerce_get_product_thumbnail('shop_single');?>
						<div class="hover">
							<a href="<?php echo $product->get_permalink()?>"><i class="fa fa-eye"></i></a>
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
			<?php endwhile;?>
			<?php wp_reset_query(); ?>	
	</div>
	</div>
</div>

<?php 
get_template_part('wybor-planu');
?>
<div class="home-artykuly">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1>Plany Ćwiczeń</h1>
			</div>
			<div class="row">
<?php
$args = array(  
    'post_type' => 'plan',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 4,
    'orderby' => 'rand'  
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
				<div class="col-md-3">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
					<h2><?php the_title();?></h2>
					<span><?php echo get_the_date();?></span>
					<?php the_excerpt();?>
				</div>
<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php 
$terms = get_terms( 'article_categories' );
foreach ($terms as $term):
?>
<div class="home-artykuly">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1><?php echo $term->name;?></h1>
			</div>
			<div class="row">
<?php
				$args = array(
	'post_type' => 'article',
	'tax_query' => array(
		array(
			'taxonomy' => 'article_categories',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	'posts_per_page' => 3,
	),
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
				<div class="col-md-3">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
					<h2><?php the_title();?></h2>
					<span><?php echo get_the_date();?></span>
					<?php the_excerpt();?>
				</div>
<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php if ( !is_user_logged_in() ) : ?>
<div id="home-rejestracja">
	<div class="container">
		<div class="col-md-12 naglowek">
			<div class="header">
				<h1>Społeczność	</h1>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<h2>Dołącz do nas - załóż konto!</h2>
				<hr>
				<span>Jakie możliwości otwiera przed Tobą założenie konta?</span>
			</div>
			<div class="row mozliwosci">
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc1');?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc2');?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc3');?></p>
				</div>
			</div>
			<a class="zarejestruj" href="<?php echo get_permalink( get_page_by_path( 'register' ) );?>">zarejestruj się</a>
		</div>

		<!-- <div class="col-md-4 users">
				<h3>nasi</h3>	
				<h3><strong>użytkownicy</strong></h3>

				<a class="all" href="#">Zobacz wszystkich</a>
				<div class="controls">
		    		<a class="jcarousel-prev" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/previous.png"></a>
		    		<a class="jcarousel-next" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/next.png"></a>
		    	</div>
		</div>	
		<div class="col-md-8">
			<div class="jcarousel">
				<ul>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					
				</ul>
			</div>
		</div> -->
	</div>
</div>
<?php endif;?>
<?php get_footer();?>



<script type="text/javascript">
(function($) {
	$( ".krok" ).click(function(event) {
        event.preventDefault();
      var aktualny_krok = $(".krok.active").data("krok");
      var numer_kroku = $(this).data("krok");
      if(numer_kroku-aktualny_krok > 1) {
      	return false;
      }
      $( ".krok" ).removeClass( "active" );
      $(this).addClass("active");
      $(".step").hide();
      $("#krok-"+numer_kroku).show();
    });
var url = <?php echo "'".get_permalink( get_page_by_path( 'znajdz-plan' ) )."'";?>;
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
	    		url = url+'?gender=man';
	    	} else {
	    		$(".obrazek.men").hide();
	    		$(".obrazek.women").show();
	    		url = url+'?gender=woman';
	    	}
    });
    $(".cel").click(function(event) {
    	event.preventDefault();
    	var cel = $(this).data('cel');
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
	    url = url+'&target='+cel;

    });
       $(".difficulty").click(function(event) {
    	event.preventDefault();
    	var difficulty = $(this).data('difficulty');
	    url = url+'&difficulty='+difficulty;
	    window.location.href = url;
    });
            })( jQuery );

</script>