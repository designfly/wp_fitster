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
<!-- 		<div class="row find-plan">
			<h2>Wybrany przez ciebie plan</h2>
			<div>
				<p>Zobacz plany pasujące do Twoich kryteriów wyszukiwania</p>
				<div class="row">
					<div class="col-md-6">
						<div class="obrazek">
							<img src="img/women.jpg">
						</div>
					</div>
					<div class="col-md-6">
						<h4>krok 1</h4>
						<p>
							<span>Płeć:</span> Kobieta
						</p>
						<h4>krok 2</h4>
						<p>
							<span>Cel:</span> Transformacja
						</p>
						<h4>krok 3</h4>
						<p>
							<span>Stopień trudności:</span> Zaawansowany
						</p>

						<button class="usun"><i class="fa fa-times"></i> Resetuj ustawienia wyszukiwania</button>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row plany-cwiczen">
				<h1><?php echo single_cat_title();?></h1>
			<div class="col-md-12"></div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="row">
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
					<hr>
<?php custom_excerpt(45);?>
				</div>
			</div>
		<?php endwhile;?>
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
</script>