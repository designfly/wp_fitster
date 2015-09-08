<?php get_header();?>
<?php if(isset($_GET['key'])):?>
<div class="container login">
	<div class="header">
		<h1><strong>Zmień hasło</strong></h1>
	</div>

	<div class="col-md-12">
		<?php wc_print_notices(); ?>
		<div class="col-md-6 register">
			<h2>Resetowanie hasła</h2>
			<div class="row">
				<hr>
			</div>
			<p>Jeżeli zapomniałeś hasło tutaj możesz je zresetować. Podaj swoją nazwę użytkownika lub email.</p>

			<form method="post">
				<label>Nowe hasło <strong>*</strong></label>
				<input type="password" required name="password_1" />
				<label>Powtórz hasło <strong>*</strong></label>
				<input type="password" required name="password_2"/>
				<span><strong>* </strong>Pola wymagane</span>
			    <input type="hidden" name="reset_key" value="<?php echo $_GET['key'];?>" />
			    <input type="hidden" name="reset_login" value="<?php echo $_GET['login'];?>" />
			    <input type="hidden" name="wc_reset_password" value="true" />
			    <?php wp_nonce_field('reset_password'); ?>
			    <input type="submit" value="zmień hasło" />
			</form>
					</div>
	</div>
</div>
<?php else:?>
<div class="container login">
	<div class="header">
		<h1><strong>Przypomnij hasło</strong></h1>
	</div>
	<div class="col-md-12">
		<?php wc_print_notices(); ?>
		<div class="col-md-7 register">
			<h2>Resetowanie hasła</h2>
			<div class="row">
				<hr>
			</div>
			<p>Jeżeli zapomniałeś hasło tutaj możesz je zresetować. Podaj swoją nazwę użytkownika lub email.</p>

			<form method="post">
				<input type="text" name="user_login" required/>
				<input type="hidden" name="wc_reset_password" value="true" />
				<input type="submit" value="resetuj hasło" />
				<?php wp_nonce_field('lost_password');?>
			</form>
		</div>
<?php
$args = array(  
    'post_type' => 'product',  
    'meta_key' => '_featured',  
    'meta_value' => 'yes',  
    'posts_per_page' => 3,
    'orderby' => 'rand'  
);  
  
$featured_query = new WP_Query( $args );  
      
if ($featured_query->have_posts()) :  ?> 
		<div class="col-md-4 col-md-offset-1">
			<h2>sklep</h2>
			<div class="row">
				<hr>
			</div>
			<div class="obrazek">
				<img src="img/produkt.png">
				<div class="hover">
					<a href="#"><i class="fa fa-eye"></i></a>	
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr class="produkt-hr">
			<span class="price">
				200 zł
			</span>
		</div>
<?php endif;?>
	</div>
</div>
<?php endif;?>
<?php get_footer();?>