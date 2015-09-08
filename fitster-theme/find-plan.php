<?php /* Template Name: Znajdź Plan */  ?>
<?php get_header();?>
<?php
    $gender_options = array(
      'man' => 'Dla Mężczyzn',
      'woman' => 'Dla Kobiet',
      'both' => 'Dla obu Płci'
      );
    $target_options = array(
      'transformacja' => 'Transformacja',
      'fat_lose' => 'Utrata Tłuszczu',
      'muscle' => 'Budowa Mięśni'
    );
    $difficulty_options = array(
      'rookie' => 'Początkujący',
      'intermediate' => 'Średniozaawansowany',
      'advanced' => 'zaawansowany'
      )
    ?>

<div class="container plany">
		<div class="header">
		<h1><strong>fitster</strong></h1>
	</div>
	<div class="col-md-12 naglowek">
	</div>
<div class="bg">
	<?php get_sidebar('plan');?>
	<div class="content col-md-9">
		<?php if($_GET['gender']): ?>
		<div class="row find-plan">
			<h2>Wybrany przez ciebie plan</h2>
			<div>
				<p>Zobacz plany pasujące do Twoich kryteriów wyszukiwania</p>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek">
						<?php if($_GET['gender'] == 'man') :?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
						<?php else: ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
						<?php endif;?>
						</div>
					</div>
					<div class="col-md-6">
						<h4>krok 1</h4>
						<p>
							<span>Płeć:</span> <?php echo $gender_options[$_GET['gender']];?>
						</p>
						<h4>krok 2</h4>
						<p>
							<span>Cel:</span> <?php echo $target_options[$_GET['target']];?>
						</p>
						<h4>krok 3</h4>
						<p>
							<span>Stopień trudności:</span><?php echo $difficulty_options[$_GET['difficulty']];?>
						</p>

						<a class="usun" href="<?php echo get_permalink( get_page_by_path( 'znajdz-plan' ) )?>"><i class="fa fa-times"></i> Resetuj ustawienia wyszukiwania</a>
					</div>
				</div>
			</div>
		</div>
	<?php else:?>
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
					<a href="#" class="plec" data-plec="1"><div class="obrazek">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
						<div class="hover">
							<span>mężczyzna	</span>
						</div>
					</div></a>
				</div>

				<div class="col-md-6">
					<a href="#" class="plec" data-plec="2"><div class="obrazek">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
						<div class="hover">
							<span>kobieta</span>
						</div>
					</div></a>	
				</div>
			</div>

			<!-- krok 2  kobieta-->
			<div id="krok-2" class="step" data-krok="2">
				<p>Określ jaki efekt chcesz osiągnąć</p>
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="cel" data-cel="transformacja"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Transformacja</span>	
							</div>
						</div></a>
						<a href="#" class="cel" data-cel="transformacja"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Transformacja</span>
							</div>
						</div></a>	
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
						<a href="#" class="cel" data-cel="fat_lose"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Utrata Tłuszczu</span>	
							</div>
						</div></a>
						<a href="#" class="cel" data-cel="fat_lose"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Utrata Tłuszczu</span>	
							</div>
						</div></a>
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
						<a href="#" class="cel" data-cel="muscle"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Budowa Mięśni	</span>
							</div>
						</div></a>
						<a href="#" class="cel" data-cel="muscle"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Budowa Mięśni	</span>
							</div>
						</div></a>
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
						<a href="#" class="difficulty" data-difficulty="rookie"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Początkujący</span>	
							</div>
						</div></a>
						<a href="#" class="difficulty" data-difficulty="rookie"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Początkujący</span>	
							</div>
						</div></a>
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
						<a href="#" class="difficulty" data-difficulty="intermediate"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Średnio zaawansowany	</span>
							</div>
						</div></a>
						<a href="#" class="difficulty" data-difficulty="intermediate"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Średnio zaawansowany	</span>
							</div>
						</div></a>
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
						<a href="#" class="difficulty" data-difficulty="advanced"><div class="obrazek women">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/women.jpg">
							<div class="hover">
								<span>Zawansowany</span>	
							</div>
						</div></a>
						<a href="#" class="difficulty" data-difficulty="advanced"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Zawansowany</span>	
							</div>
						</div></a>
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
<?php endif;?>
<?php 
$args = array(
	'post_type'  => 'plan',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key'     => 'plan_gender',
			'value'   => $_GET['gender'],
			'compare' => '=',
		),
		array(
			'key'     => 'plan_cel',
			'value'   => $_GET['target'],
			'compare' => '=',
		),
		array(
			'key'     => 'plan_trudnosc',
			'value'   => $_GET['difficulty'],
			'compare' => '=',
		),
	),
);
$plan_query = new WP_Query( $args ); 
if ( $plan_query->have_posts() ) : ?>
		<div class="row plany-cwiczen">
				<h1>Plany dla ciebie:</h1>
			<div class="row">
<?php while ( $plan_query->have_posts() ) : $plan_query->the_post(); ?>

	
				<div class="col-md-5">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('plan_5col',$attr=array(
								'class' => 'thumbnail'
								));
						} 
					?>	
				</div>

				<div class="col-md-7">
					<h3><?php the_title();?></h3>
<?php custom_excerpt(45);?>
				</div>

		<?php endwhile;?>
				</div>
	<?php else: ?>
		<p>Brak planów ćwiczeń pasujących do podanych kryteriów.</p>
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