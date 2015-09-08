<?php get_header();?>
<div class="container artykul">
	<div class="header">
		<h1><strong>Artykuły</strong></h1>
	</div>
	<div class="col-md-12 naglowek">
	</div>
	<div class="col-md-12 bg">

<?php get_sidebar('article');?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
		<div class="col-md-9">
			<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<div class="breadcrumbs">','</div>');
} ?>

					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_top');
						} 
					?>			
			<h1 class="title"><?php the_title();?></h1>
			<hr>

			<div class="post-info">
				<span><?php echo get_the_date();?></span> 
				<span class="divider">/</span>
				<span><a href="#"><?php the_author();?></a></span>
				<span class="divider">/</span>
				<?php
					$comments_count = get_comments_number();
					$modulo = $comments_count % 10;
					if($modulo == 1) {
						$comments = $comments_count.' komentarz';
					} elseif($modulo > 1 && $modulo < 5) {
						$comments = $comments_count.' komentarze';
					} else {
						$comments = $comments_count.' komentarzy';
					}
					?>
				<span><a href="#"><?php echo $comments;?></a></span>
			</div>

			<div class="tags">
				<?php the_tags(''); ?>
			</div>

			<div class="post">
				<?php the_content();?>
			</div>
			<?php comments_template(); ?>
<!-- 						<div class="komentarz">
				<div class="row">
					<h2>Komentarze <strong>(1)</strong></h2>
					<hr>
				</div>
				<img src="img/user-1.jpg">
				<a href="#">Użytkownik</a>
				<span> - 04.05.2015:</span>
				<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
				</p>
			</div>
			<div class="komentarz">
				<img src="img/user-1.jpg">
				<a href="#">Użytkownik</a>
				<span> - 04.05.2015:</span>
				<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
				</p>
			</div> -->
<?php get_template_part('featured-articles'); ?>
		</div>
<?php endwhile;endif;?>
	</div>
</div>


<?php get_footer();?>
<script type="text/javascript">
(function($) {
	var daty = [];
	for (var i = 0; i<20; i++) {
		var data = new Date();
		data.setDate(data.getDate()+i);
		daty.push(data.getDate()+"-"+(data.getMonth()+1)+'-'+data.getFullYear());
		
	};
	var dataCel = [];
	  	for (var i = 0; i<20; i++) {
			dataCel.push(0);
		};

		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : daty,
			datasets : [
				{
					label: "Cel",
					fillColor : "rgba(244, 208, 63,0.2)",
					strokeColor : "rgba(244, 208, 63,1)",
					pointColor : "rgba(244, 208, 63,0)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(244, 208, 63,1)",
					data : dataCel,
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(0, 173, 239,0.2)",
					strokeColor : "rgba(0, 173, 239,1)",
					pointColor : "rgba(0, 173, 239,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(0, 173, 239,1)",
					data : [0]
				}
			]

		}


$('#dodajWykres').on('shown.bs.modal', function (event) {
		var ctx = document.getElementById("chart").getContext("2d");
		wykres = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
});
 })( jQuery );
</script>