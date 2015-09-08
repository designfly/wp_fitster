<?php /* Template Name: Aktywacja Konta */  ?>
<?php
if(!isset($_GET['token'])):
wp_redirect(home_url());
else:
get_header();?>
<div class="container link-aktywacyjny">
	<div class="header">
		<h1><strong>Aktywacja konta</strong></h1>
	</div>
	<div class="col-md-12">
<?php
$token = $_GET['token'];
if(!empty(EmailConfirmation::check($token))) : ?>
		<p>Twoje konto jest aktywne. <a href="<?php echo get_bloginfo('url') . '/login/';?>">Zaloguj się</a></p>
<?php else: ?>
	<p>Konto zostało już aktywowane lub odnośnik jest błędny.</p>
<?php endif;?>
		<div class="col-md-3">
			<a href="shop.php" class="item first">
				<img src="img/shop.png">
				<p>sklep<span class="glyphicon glyphicon-log-in"></span></p>
			</a>
		</div>
		<div class="col-md-3">
			<a href="#" class="item second">
				<img src="img/video.png">
				<p>Artykuły & Wideo<span class="glyphicon glyphicon-log-in"></span></p>
			</a>
		</div>	
		<div class="col-md-3">
			<a href="#" class="item thrid">
				<img src="img/traine.png">
				<p>Plany ćwiczeń<span class="glyphicon glyphicon-log-in"></span></p>
			</a>
		</div>	
		<div class="col-md-3">
			<a href="#" class="item fourth">
				<img src="img/community.png">
				<p>community<span class="glyphicon glyphicon-log-in"></span></p>
			</a>
		</div>	
	</div>
</div>

<?php endif;
?>
<?php get_footer();?>