<div id="home-plany">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1>Plany</h1>
			</div>
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
								<span>Budowa Mięśni</span>	
							</div>
						</div></a>
						<a href="#" class="cel" data-cel="muscle"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Budowa Mięśni</span>	
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
								<span>Średnio zaawansowany</span>	
							</div>
						</div></a>
						<a href="#" class="difficulty" data-difficulty="intermediate"><div class="obrazek men">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/men.jpg">
							<div class="hover">
								<span>Średnio zaawansowany</span>	
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

		</div>
	</div>
</div>