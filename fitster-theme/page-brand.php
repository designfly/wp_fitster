<?php get_header();?>
<div class="container marki">
	<div class="header">
		<h1><strong>Marki</strong></h1>
	</div>

	<div class="col-md-12">
<div class="col-md-3 side-bar">
				<h2>kategoria</h2>
			<div class="row">
				<a href="#" class="all">Wszystkie kategorie</a>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default first">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Kategoria 1
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      	<ul>
				      		<li>
				      			<div class="panel-group" id="accordion-2" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne1">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
									          <i class="fa fa-plus-square-o"></i>Podkategoria 1
									        </a>
									      </h4>
									    </div>
								    <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
								      <div class="panel-body">
								      	<ul>
								      		<li><a href="#">Podpodkategoria</a></li>
								      	</ul>
								      </div>
								    </div>
								  </div>
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingTwo2">
								      <h4 class="panel-title">
								        <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
								          <i class="fa fa-plus-square-o"></i>Podkategoria 2
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo2">
								      <div class="panel-body">
								      	<ul>
								      		<li><a href="#">Podpodkategoria</a></li>
								      	</ul>
								      </div>
								    </div>
								  </div>
								</div>
				      		</li>
				      	</ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default first">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				         	<i class="fa fa-plus-square-o"></i>Kategoria 2
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				        <ul>
				      		<li><a href="#">Podkategoria</a></li>
				      	</ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default first">
				    <div class="panel-heading" role="tab" id="headingThree">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          <i class="fa fa-plus-square-o"></i>Kategoria 3
				        </a>
				      </h4>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				      <div class="panel-body">
				        <ul>
				      		<li><a href="#">Podkategoria</a></li>
				      	</ul>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<h2>opcje</h2>
			<div class="row">
				<h3>Cena (zł)</h3>
				<hr>

				<input placeholder="od"/>
				<span>-</span>
				<input placeholder="do"/>
			</div>

			<div class="row">
				<h3>Marka</h3>
				<hr>
				<ul class="marki">
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
					<li><input type="checkbox"/>Marka</li>
				</ul>
			</div>

			<h2>inne</h2>
			<div class="row">
				<h3>Popularne tagi</h3>
				<hr>
				<div class="tagi">
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
					<a href="">Tag</a>
				</div>
			</div>

			<div class="row last">
				<h3>Ostatnio przeglądane</h3>
				<hr>	
				<div class="img">
					<img src="img/produkt.png">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h4>Nazwa produktu</h4>
				<hr class="linia">
					<div class="price">
					<span>
						200 zł
					</span>
				</div>

				
			</div>
		</div>
		<div class="col-md-9">
			<div class="opcje">
			</div>
<?php
$brands = get_terms('product_brand');
foreach ($brands as $brand) {
    $brands_asc[strtoupper($brand->name)[0]][] = $brand;
}
?>
			<ul class="alfabet">
				<?php foreach ($brands_asc as $letter => $brand) {

					?>
					<li><a href="#brands_<?php echo $letter;?>"><?php echo $letter;?></a></li>
					<?php
				} ?>
			</ul>

<?php 

foreach ($brands_asc as $brands_letter => $brands) {
	$index = 0;
	$cols[$brands_letter] = array();
	foreach ($brands as $key => $brand) {
		$cols[$brands_letter][$index][] = $brand;
		$index++;
		if($index > 3) {
			$index = 0;
		}
	}
}
?>
			<div class="marka-alfabet">
			<?php
			foreach ($cols as $letter => $col) {
				?>
				<div class="litera" id="brands_<?php echo $letter;?>">
					<h2><?php echo $letter;?></h2>
					<hr>
					<?php
					foreach ($col as $key => $brands) {
						?>
						<div class="col-md-3">
						<ul>
						<?php
						foreach ($brands as $brand) {
							?>
							<li><a href="<?php echo get_term_link($brand->slug,'product_brand');?>"><?php echo $brand->name;?></a></li>
							<?php
						}
						?>
						</ul>
						</div>
						<?php 
					}
					?>
				</div>				
				<?php
			}
			?>

			</div>

		</div>
	</div>
</div>
<?php get_footer();?>