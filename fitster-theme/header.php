<html lang="pl" style="margin:0 !important;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SliceWeb">
    <!-- Czcionki -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ranga' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?id=2" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/yamm.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/js/raty/jquery.raty.css"/>
<?php wp_head();?>
</head>
<body>
<nav class="navbar navbar-fixed-top yamm">
	<div class="first-level">
		<div class="container">
			<div class="left">
				<a href="<?php echo get_option('fitster_fb');?>"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo get_option('fitster_yt');?>"><i class="fa fa-youtube"></i></a>
				<a href="<?php echo get_option('fitster_in');?>"><i class="fa fa-instagram"></i></a>
				<a href="<?php echo get_option('fitster_gp');?>"><i class="fa fa-google-plus"></i></a>
				<a href="<?php echo get_option('fitster_tw');?>"><i class="fa fa-twitter"></i></a>
			</div>
			<div class="right">
				<?php if ( !is_user_logged_in() ) : ?>
				<span>Witaj na stronie Fitster</span>
				<a href="<?php echo get_permalink( get_page_by_path( 'login' ) );?>">Zaloguj się</a>
			<?php else:
			 $user = wp_get_current_user();
			?>

				<span>Witaj <?php echo $user->user_login;?></span>
				<a href="<?php echo wp_logout_url( get_permalink() ); ?>">Wyloguj się</a>
			<?php endif;?>
			</div>
		</div>
	</div>
<?php 
global $woocommerce;
$cart_url = $woocommerce->cart->get_cart_url(); ?>
	<div class="second-level">
		<div class="container">
			<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></a>
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
			<div class="searchField">
				<select name="limit">
					<option value="all">Wszystko</option>
					<option value="product">Produkty</option>
					<option value="article">Artykuły i Wideo</option>
					<option value="plan">Plany ćwiczeń</option>
				</select>
				<input type="text" placeholder="Szukana fraza" name="s"/>
				<button><i class="fa fa-search"></i></button>
			</form>
<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
	<a href="<?php echo $cart_url;?>" class="koszyk"><i class="fa fa-shopping-cart"></i><?php echo WC()->cart->get_cart_subtotal(); ?></a>
            <?php else: ?>
                <a href="<?php echo $cart_url;?>" class="koszyk"><i class="fa fa-shopping-cart"></i>  0,00 PLN</a>
            <?php endif;?>
			</div>
		</div>
	</div>
  <div class="container">
	    <div class="navbar-header">
	    	<div class="opcje">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
	     	 <a href="<?php echo $cart_url; ?>"><button type="button" class="navbar-toggle collapsed">
	        	<i class="fa fa-shopping-cart"></i>
		      </button></a>
		       <a href="#"><button type="button" class="navbar-toggle collapsed">
		       <i class="fa fa-user"></i>
		      </button></a>
	     </div>
	      <a class="navbar-brand" href="<?php home_url(); ?>"><img  class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		   <ul class="nav navbar-nav ">
	        <li class="dropdown yamm-fw">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">sklep <i class="fa fa-chevron-down"></i></a>
	          <ul class="dropdown-menu">
		      	<li>
		      		<div class="yamm-content">
		      			<div class="col-md-3">
		      				<ul>
		      					<li><a class="link" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>" data-id="0">Sklep</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'shop' ) );?>" data-id="1">Promocje</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'brand' ) );?>" data-id="2">Marki</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'kategoria-produktu' ) );?>" data-id="3">Kategorie</a></li>
		      					<li><a class="link" href="<?php echo $cart_url; ?>" data-id="0">Koszyk (<?php echo sizeof( WC()->cart->get_cart());?>)</a></li>
		      					<?php 
if( function_exists( 'YITH_WCWL' ) ){
    $wishlist_url = YITH_WCWL()->get_wishlist_url();
}
		      					?>
		      					<li><a class="link" href="<?php echo $wishlist_url;?>" data-id="0">Lista Życzeń (<?php echo yith_wcwl_count_products();?>)</a></li>
		      				</ul>
		      			</div>
		      			<div class="col-md-9 tresc">
		      				<div class="part" data-id="0">
<?php     
			$args = array( 'post_type' => 'product','posts_per_page' => 3, 'orderby' =>'date','order' => 'DESC' );
   			$loop = new WP_Query( $args );		      					
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			$product = get_product($loop->post->ID );?>
				<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					$sale_percent =100 - ($sale_price*100/$regular_price);
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
					<a href="<?php echo $product->get_permalink()?>"><div class="obrazek">
						<?php echo woocommerce_get_product_thumbnail('shop_single');?>
						<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
					</div></a>
					<h3><a href="<?php echo $product->get_permalink()?>"><?php echo $product->get_title();?></a></h3>
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

		      				<div class="part" data-id="1">
		      					<?php
			$sale = wc_get_product_ids_on_sale();
$args = array(  
    'post_type' => 'product',  
    'posts_per_page' => 3,
    'orderby' => 'rand', 
    'post__in' => $sale,
);  
  
   			$loop = new WP_Query( $args );		      					
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			$product = get_product($loop->post->ID );?>
				<div class="col-md-4">
					<?php if($product->is_on_sale()) :?>
					<?php 
					$sale_price = $product->get_sale_price();
					$regular_price = $product->get_regular_price();
					if($regular_price == 0) {
						$sale_percent = 100;
					} else {
						$sale_percent =100 - ($sale_price*100/$regular_price);	
					}
					
					?>
					<strong><?php echo -round($sale_percent)."%";?></strong>
				<?php endif; ?>
					<a href="<?php echo $product->get_permalink()?>"><div class="obrazek">
						<?php echo woocommerce_get_product_thumbnail('shop_single');?>
						<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
					</div></a>
					<h3><a href="<?php echo $product->get_permalink()?>"><?php echo $product->get_title();?></a></h3>
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

		      				<div class="part" data-id="2">
		      					<div class="col-md-3">
		      						<ul>
<?php
$brands = get_terms( 'product_brand', array(
    'number'            => '40', 
)); 
$index = 1;
$count = count($brands);
foreach ($brands as $brand) :?>
<li><a href="<?php echo get_term_link($brand->slug,'product_brand');?>"><?php echo $brand->name;?></a></li>
	<?php 
	if($index % 10 == 0) : ?>
		      		 </ul>
		      		</div>
	<?php if($index<$count) : ?>
		      					<div class="col-md-3">
		      						<ul>
<?php endif;endif;
	$index++;
	endforeach;

	?>

		      				</div>
		      			</div>
		      				<div class="part" data-id="3">
		      					<div class="col-md-3">
		      						<ul>
<?php
$brands = get_terms( 'product_cat', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '40', 
    'parent' => '0'
)); 
$index = 1;
$count = count($brands);
foreach ($brands as $brand) :?>
<li><a href="<?php echo get_term_link($brand->slug,'product_cat');?>"><?php echo $brand->name;?></a></li>
	<?php 
	if($index % 10 == 0) : ?>
		      		 </ul>
		      		</div>
	<?php if($index<$count) : ?>
		      					<div class="col-md-3">
		      						<ul>
<?php endif;endif;
	$index++;
	endforeach;

	?>

		      				</div>
		      			</div>
		      		</div>
		      	</li>
	          </ul>
	        </li>
	        <li class="dropdown yamm-fw">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">artykuły i wideo <i class="fa fa-chevron-down"></i></a>
	          <ul class="dropdown-menu">
		      	<li>
		      		<div class="yamm-content">
		      			<div class="col-md-3">
		      				<ul>
		      					<li><a class="link" href="<?php echo get_post_type_archive_link('article'); ?>" data-id="0">Artykuły</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'kategoria-artykulu' ) );?>" data-id="1">Kategorie</a></li>
		      				<?php
$cats = get_terms( 'article_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '3', 
    'parent' => '0'
)); 
$i = 2;
?>
<?php foreach ($cats as $cat) :?>
								<li><a href="<?php echo get_term_link($cat->slug,'article_categories');?>" class="link" data-id="<?php echo $i;?>"><?php echo $cat->name;?></a></li>
<?php $i++;?>
<?php endforeach;?>
		      				</ul>
		      			</div>
		      			<div class="col-md-9 tresc">
		      				<div class="part" data-id="0">
								

<?php 
$args = array(  
    'post_type' => 'article',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  
while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
								<div class="col-md-4">
					<a href="<?php the_permalink(); ?>">
						<div class="obrazek artykulZdjecie">
							<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
						<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
						</div>
					</a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<hr>
				<p><?php the_excerpt();?></p>

								</div>
							<?php endwhile;endif;wp_reset_query();?>
		      				</div>

		      				<div class="part" data-id="1">
		      					<div class="col-md-3">
		      						<ul>
<?php
$brands = get_terms( 'article_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '30', 
    'parent' => '0'
)); 
$index = 1;
$count = count($brands);
foreach ($brands as $brand) :?>
<li><a href="<?php echo get_term_link($brand->slug,'article_categories');?>"><?php echo $brand->name;?></a></li>
	<?php 
	if($index % 10 == 0) : ?>
		      		 </ul>
		      		</div>
	<?php if($index<$count) : ?>
		      					<div class="col-md-3">
		      						<ul>
<?php endif;endif;
	$index++;
	endforeach;

	?>
		      					</div>
		      				</div>
		      				<?php
$cats = get_terms( 'article_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '3', 
    'parent' => '0'
)); 
$i = 2;
?>
<?php foreach ($cats as $cat) :?>
								<div class="part" data-id="<?php echo $i;?>">
<?php 
$args = array(
	'post_type' => 'article',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'article_categories',
			'field'    => 'slug',
			'terms'    => $cat->slug,
		),
	
	),
);
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  
while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
								<div class="col-md-4">
					<a href="<?php the_permalink() ; ?>">
					<div class="obrazek artykulZdjecie">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
						<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
					</div>
					</a>
				<h3><?php the_title();?></h3>
				<hr>
				<p><?php the_excerpt();?></p>

								</div>
							<?php endwhile;endif;wp_reset_query();?>
								</div>
<?php $i++;?>
<?php endforeach;?>
		      				
		      			</div>
		      		</div>
		      	</li>
	          </ul>
	        </li>
	        <li class="dropdown yamm-fw">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">plany ćwiczeń<i class="fa fa-chevron-down"></i></a>
	          <ul class="dropdown-menu">
		      	<li>
		      		<div class="yamm-content">
		      			<div class="col-md-3">
		      				<ul>
		      					<li><a class="link" href="<?php echo get_post_type_archive_link('plan'); ?>" data-id="0">Plany Treningowe</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'znajdz-plan' ) );?>" data-id="0">Znajdź Plan</a></li>
		      					<li><a class="link" href="<?php echo get_permalink( get_page_by_path( 'kategoria-planu' ) );?>" data-id="1">Kategorie</a></li>
		      				<?php
$cats = get_terms( 'plany_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '3', 
    'parent' => '0'
)); 
$i = 2;
?>
<?php foreach ($cats as $cat) :?>
								<li><a href="<?php echo get_term_link($cat->slug,'plany_categories');?>" class="link" data-id="<?php echo $i;?>"><?php echo $cat->name;?></a></li>
<?php $i++;?>
<?php endforeach;?>		      				
		      				</ul>
		      			</div>
		      			<div class="col-md-9 tresc">
		      				<div class="part" data-id="0">
<?php 
$args = array(  
    'post_type' => 'plan',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  
while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
								<div class="col-md-4">
					<a href="<?php the_permalink() ; ?>">
						<div class="obrazek artykulZdjecie">
							<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
					<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
						</div>
					</a>
				<h3><a href="<?php the_permalink() ; ?>"><?php the_title();?></a></h3>
				<hr>
				<p><?php the_excerpt();?></p>

								</div>
							<?php endwhile;endif;wp_reset_query();?>
		      				</div>

		      				<div class="part" data-id="1">
		      					<div class="col-md-3">
		      						<ul>
<?php
$brands = get_terms( 'plany_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '3', 
    'parent' => '0'
)); 
$index = 1;
$count = count($brands);
foreach ($brands as $brand) :?>
<li><a href="<?php echo get_term_link($brand->slug,'plany_categories');?>"><?php echo $brand->name;?></a></li>
	<?php 
	if($index % 10 == 0) : ?>
		      		 </ul>
		      		</div>
	<?php if($index<$count) : ?>
		      					<div class="col-md-3">
		      						<ul>
<?php endif;endif;
	$index++;
	endforeach;

	?>
		      					</div>
		      				</div>
<?php
$cats = get_terms( 'plany_categories', array(
    'orderby'           => 'count', 
    'order'             => 'DESC',
    'number'            => '3', 
    'parent' => '0'
)); 
$i = 2;
?>
<?php foreach ($cats as $cat) :?>
								<div class="part" data-id="<?php echo $i;?>">
<?php 
$args = array(
	'post_type' => 'plan',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'plany_categories',
			'field'    => 'slug',
			'terms'    => $cat->slug,
		),
	
	),
);
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  
while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
								<div class="col-md-4">
					<a href="<?php the_permalink();?>">
					<div class="obrazek artykulZdjecie">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>
					<div class="hover">
							<i class="fa fa-eye"></i>
						</div>
					</div>
					</a>
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<hr>
				<p><?php the_excerpt();?></p>

								</div>
							<?php endwhile;endif;wp_reset_query();?>
								</div>
<?php $i++;?>
<?php endforeach;?>
		      			</div>
		      		</div>
		      	</li>
	          </ul>
	        </li>
	        <li><a href="<?php echo esc_url( home_url( '/forums/' ) ); ?>">Forum</a></li>
	        <li><a href="<?php echo esc_url( home_url( '/galerie/' ) ); ?>">Galerie</a></li>
	        <?php if ( is_user_logged_in() ) : ?>
	        <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Moje Konto','woothemes'); ?>"><i class="fa fa-user"></i>Moje konto</a></li>
	      	<?php endif;?>
	      </ul>
	    </div>
  </div>
</nav>	
<?php if (!is_buddypress() && !is_account_page() && !is_bbpress() && !is_singular( 'wykres' )) : ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
<?php 
$counter = 0;
$loop = new WP_Query( 
                        array( 
                        'post_type' => 'sw_slider',
                         'posts_per_page' => -1 ) 
                         ); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="item <?php if($counter == 0) { echo 'active';}?>">
                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                          the_post_thumbnail(); 
                        }
                        ?>
                    </div>
                    <?php $counter++; ?>
                  <?php endwhile; wp_reset_query(); ?>
                </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif;?>