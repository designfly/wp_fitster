<?php get_header();?>
<div class="container plany">
		<div class="header">
		<h1><strong>fitster</strong></h1>
	</div>
	<div class="col-md-12 naglowek">
	</div>
<?php get_sidebar('plan');?>
	<div class="content col-md-9">
<div class="row find-plan">
			<h2>Znajdź plan dla siebie</h2>


			<div class="kroki">
				<h3><a href="#" class="krok active" data-krok="1">Krok 1</a></h3>
				<h3><a href="#" class="krok" data-krok="2">Krok 2</a></h3>
				<h3><a href="#" class="krok" data-krok="3">Krok 3</a></h3>

				<hr class="h3">
			</div>	

			<!-- krok 1 -->
			<div id="krok-1" class="step" data-krok="1">
				<p>Wybierz płeć</p>
				<div class="col-md-6">
					<div class="obrazek">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
						<div class="hover">
							<a href="#" class="plec" data-plec="1">mężczyzna</a>	
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="obrazek">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
						<div class="hover">
							<a href="#" class="plec" data-plec="2">kobieta</a>	
						</div>
					</div>
				</div>
			</div>

			<!-- krok 2  kobieta-->
			<div id="krok-2" class="step" data-krok="2">
				<p>Określ jaki efekt chcesz osiągnąć</p>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="transformacja">Transformacja</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="transformacja">Transformacja</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Transformacja</h4>
						<p>
<?php echo get_option('fitster_transformacja');?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="fat_lose">Utrata Tłuszczu</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="fat_lose">Utrata Tłuszczu</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Utrata tłuszczu</h4>
						<p>
<?php echo get_option('fitster_fat_lose');?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="muscle">Budowa Mięśni</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="cel" data-cel="muscle">Budowa Mięśni</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Budowa Mięśni</h4>
						<p>
<?php echo get_option('fitster_muscle');?> 
						</p>
					</div>
				</div>
			</div>

			<!-- krok 3 - kobieta -->
			<div id="krok-3" class="step" data-krok="3">
				<p>
					Określ swój stopień zaawansowania
				</p>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="rookie">Początkujący</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="rookie">Początkujący</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Początkujący</h4>
						<p>
<?php echo get_option('fitster_rookie');?> 
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="intermediate">Średnio zaawansowany</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="intermediate">Średnio zaawansowany</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Średnio zaawansowany</h4>
						<p>
<?php echo get_option('fitster_intermediate');?> 
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="advanced">Zawansowany</a>	
							</div>
						</div>
						<div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<a href="#" class="difficulty" data-difficulty="advanced">Zawansowany</a>	
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Zaawansowany</h4>
						<p>
<?php echo get_option('fitster_advanced');?>
						</p>
					</div>
				</div>
			</div>
		</div>
<?php 
$args = array(  
    'post_type' => 'plan',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$fa_query = new WP_Query( $args );  
      
if ($fa_query->have_posts()) :  ?> 
		<div class="row plany-cwiczen">
			<div class="header">
				<h1><strong>polecane plany</strong></h1>
			</div>
			<div class="col-md-12">
<?php    while ($fa_query->have_posts()) :  
$fa_query->the_post();  ?>
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
$args = array(  
    'post_type' => 'plan',  
    'posts_per_page' => 3,
);  
  
$na_query = new WP_Query( $args );  
      
if ($na_query->have_posts()) :  ?> 
		<div class="row plany-cwiczen">
			<div class="header">
				<h1><strong>najnowsze plany</strong></h1>
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
$terms = get_terms( 'plany_categories' );
foreach ($terms as $term):
?>
		<div class="row plany-cwiczen">
			<div class="header">
				<h1><strong><?php echo $term->name;?></strong></h1>
			</div>
			<div class="col-md-12">
<?php
				$args = array(
	'post_type' => 'plan',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'plany_categories',
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
			<div class="col-md-12 see">
				<a class="all" href="<?php echo get_term_link($term->slug,'plany_categories');?>">Zobacz Wszystko</a>
			</div>	
			
			</div>
		</div>
	<?php endforeach;?>
	</div>
	
</div>
	
	

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