<?php get_header();?>
<div class="container artykul plan">
	<div class="header">
		<h1><strong>fitster</strong></h1>
	</div>
	<div class="col-md-12 naglowek">
	</div>
	<div class="col-md-12">

<?php get_sidebar('plan');?>
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
				</p>
			</div>

			<div class="szczegoly-plan row">
				<h2><strong>Rozpiska planu</strong></h2>
				<?php $fields = get_post_meta($post->ID, 'plan_treningu');
				if($fields[0]):
					foreach ($fields[0] as $key => $day) : ?>

				<div class="col-md-2 day" data-id="<?php echo $key;?>">
					<div>
						<p>Dzień</p>
						<p><?php echo $key+1;?></p>
					</div>
				</div>						
				
					<?php endforeach; ?>
					<?php foreach ($fields[0] as $key => $day) : ?>
				<div class="col-md-12 details" data-id="<?php echo $key;?>">
					<a class="close-details" href="#"><i class="fa fa-times"></i></a>
					<h2><?php the_title();?> - dzień <?php echo $key+1;?></h2>
					<p><?php echo $day['opis'];?></p>
					<h3>Ćwiczenia</h3>
					<ol>
						<?php if($day['cwiczenia']):?>
							<?php $counter = 0;?>
						<?php foreach ($day['cwiczenia'] as $key => $cwiczenie) : ?>
							<?php if(!empty($cwiczenie['nazwa']) || !empty($cwiczenie['serie']) || !empty($cwiczenie['powtorzenia'])): ?>
						<li><!-- <img src="http://placehold.it/100x70"/> --><?php echo $cwiczenie['nazwa'];?><span>/</span> Ilość serii: <?php echo $cwiczenie['serie'];?><span>/</span> Ilość powtórzeń: <?php echo $cwiczenie['powtorzenia'];?></li>
							<?php $counter++;?>
							<?php endif;?>
						<?php endforeach;?>
						<?php if($counter==0) : ?>
							<li>Brak ćwiczeń w tym dniu</li>
						<?php endif;?>
					<?php endif;?>
					</ol>	
				</div>
				<?php endforeach;?>
				<?php endif;?>
			</div>


<?php comments_template(); ?>


<?php get_template_part('featured-plans');?>


		</div>
	<?php endwhile;endif;?>
	</div>
</div>


<?php get_footer();?>
<script type="text/javascript">
(function($)
	$( ".day" ).click(function(event) {
        event.preventDefault();
      $(".day").hide();
      $(this).show();
      var id = $(this).data('id');
      $( ".details[data-id="+id+"]" ).fadeIn( "slow") ;
      $(this).addClass("active");
    });

	$( ".close-details" ).click(function(event) {
        event.preventDefault();
      $( ".details" ).fadeOut();
      $(".day").removeClass("active");
      $(".day").fadeIn();
    });
    })( jQuery );
</script>