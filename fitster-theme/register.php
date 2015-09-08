<?php /* Template Name: Strona Rejestracji */  ?>
<?php session_start();?>
<?php get_header(); ?>
<div class="container login">
	<div class="header">
		<h1><strong>Zarejestruj się</strong></h1>
	</div>

	<div class="col-md-12">
		<div class="col-md-6 register">
			<h2>Dane konta</h2>
			<div class="row">
				<hr>
			</div>
			<p>Stworzenie konta zajmie Ci tylko kilka sekund!</p>
			<?php 
			foreach ($_SESSION['errors'] as $key => $value) :?>
				<div class="alert-danger"><?php echo $value;?></div>
			<?php endforeach;?>
			<?php $_SESSION['errors'] = array(); ?>
			<?php if(isset($_GET['register']) || $_GET['register'] == true) : ?>
			<div class="alert alert-success" role="alert">Sprawdź swoją skrzynkę pocztową i Aktywuj swoje konto.</div>
		<?php endif;?>
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>">
				<label>Login <strong>*</strong></label>
				<input type="text" name="user_login" required/>
				<label>Adres Email <strong>*</strong></label>
				<input type="email"  name="user_email" required />
				<label>Hasło <strong>*</strong></label>
				<input type="password" required name="password"/>
				<label>Powtórz Hasło <strong>*</strong></label>
				<input type="password" required name="repeat_password"/>
				<!-- <label>Prawdziwe imię</label>
				<input type="text" />
				<label>Data urodzenia <strong>*</strong></label>
				<input type="date"/>

				<label>Płeć <strong>*</strong></label>
				<input type="radio" name="plec"/>
				<label class="last">Kobieta </label> <br>
				
				<input type="radio" name="plec"/>
				<label class="last">Mężczyzna </label><br>
				 -->
				<input type="checkbox" required name="regulamin"/>
				<label class="last">Akceptuje regulamin <strong>*</strong></label><br>

				<span><strong>* </strong>Pola wymagane</span>
					<input type="submit" name="user-submit" value="Zarejestruj się" class="user-submit"/>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
					<input type="hidden" name="user-cookie" value="1" />
			</form>
		</div>

		<div class="col-md-6">
			<h2>Dlaczego warto założyć konto?</h2>
			<div class="row">
				<hr>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<h2>Co nowego?</h2>
			<div class="row">
				<hr>
			</div>
		</div>
	</div>
</div>

<?php
	include ('footer.php');
?>