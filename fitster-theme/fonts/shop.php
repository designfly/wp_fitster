<?php
	include ('header.php');
?>

<div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/slider-1.jpg" alt="...">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
      <img src="img/slider-2.jpg" alt="...">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
      <img src="img/slider-3.jpg" alt="...">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
  </div>

  <!-- Controls -->
  <!-- <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
<div class="container header-top">
	<h3>Lorem ipsum dolor sit amet.</h3>
	<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
	<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmods.</h3>
</div>

<div class="container shop">
	<div class="col-md-3">
		<div class="kategorie">
			<h2>sklep</h2>
			<hr>
			<select>
				<option>Szukaj według kategorii</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
			</select>

			<select>
				<option>Szukaj według celu</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select>

			<select>
				<option>Szukaj według marki</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select>

			<select>
				<option>Szukaj według składników</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select>
		</div>
	</div>


	<div class="col-md-9 sales">
		<div class="header">
			<h1><strong>promocje</strong></h1>
		</div>
		<div class="promocje">
			<div class="col-md-4">
				<strong>-10%</strong>
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<div class="price">
					<span class="old-price">
						250 zł
					</span>
					<span class="new-price">
						200 zł
					</span>
					<a class="cart" href="">Dodaj do koszyka</a>
				</div>
			</div>
			<div class="col-md-4">
				<strong>-10%</strong>
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<div class="price">
					<span class="old-price">
						250 zł
					</span>
					<span class="new-price">
						200 zł
					</span>
					<a class="cart" href="">Dodaj do koszyka</a>
				</div>
			</div>
			<div class="col-md-4">
				<strong>-10%</strong>
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<div class="price">
					<span class="old-price">
						250 zł
					</span>
					<span class="new-price">
						200 zł
					</span>
					<a class="cart" href="">Dodaj do koszyka</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="best-seller">
			<h2>najczęściej sprzedawane</h2>
			<hr>
			<ul>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
				<li>
					<img src="http://placehold.it/100x100">
					<a href="#">Nazwa produktu</a>
					<span>
						200 zł
					</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9 newsletter">
		<h2>newsletter</h2>
		<input placeholder="Tutaj wpisz swój email" type="text"/>			
		<button><span class="glyphicon glyphicon-envelope"></span></button>
	</div>
	<div class="col-md-9 new">
		<h2>nowe produkty</h2>
		<hr>
		<div class="col-md-4">
			<strong>nowość</strong>
			<div class="img">
				<img src="http://placehold.it/250x250">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-4">
			<strong>nowość</strong>
			<div class="img">
				<img src="http://placehold.it/250x250">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
		<div class="col-md-4">
			<strong>nowość</strong>
			<div class="img">
				<img src="http://placehold.it/250x250">
				<div class="ikony">
					<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
				</div>
			</div>
			<h3>Nazwa produktu</h3>
			<hr>
			<span class="price">
				200 zł
			</span>
			<a class="cart" href="">Dodaj do koszyka</a>
		</div>
	</div>
	
	<div class="col-md-12 polecane-p">
		<div class="polecane">
			<h2>polecane produkty</h2>
			<hr>

			<div class="col-md-3">
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<span class="price">
					200 zł
				</span>
				<a class="cart" href="">Dodaj do koszyka</a>
			</div>
			<div class="col-md-3">
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<span class="price">
					200 zł
				</span>
				<a class="cart" href="">Dodaj do koszyka</a>
			</div>
			<div class="col-md-3">
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<span class="price">
					200 zł
				</span>
				<a class="cart" href="">Dodaj do koszyka</a>
			</div>
			<div class="col-md-3">
				<div class="img">
					<img src="http://placehold.it/250x250">
					<div class="ikony">
						<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
					</div>
				</div>
				<h3>Nazwa produktu</h3>
				<hr>
				<span class="price">
					200 zł
				</span>
				<a class="cart" href="">Dodaj do koszyka</a>
			</div>
		</div>
	</div>

	<div class="col-md-12 p-marki">
		<div class="marki">
			<h2>polecane marki</h2>
			<hr>
			<div class="controls">
		    	<a class="jcarousel-prev" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
		    	<a class="jcarousel-next" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a>
		    </div>
			<div class="jcarousel">
				<ul>
					<li><a href=""><img src="img/marka.png"></a></li>	
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>	
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>
					<li><a href=""><img src="img/marka.png"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-12 p-top">
		<div class="top">
			<div role="tabpanel">

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#top1" aria-controls="top1" role="tab" data-toggle="tab">Top x</a></li>
			    <li role="presentation"><a href="#top2" aria-controls="top2" role="tab" data-toggle="tab">Top x</a></li>
			    <li role="presentation"><a href="#top3" aria-controls="top3" role="tab" data-toggle="tab">Top x</a></li>
			    <li role="presentation"><a href="#top4" aria-controls="top4" role="tab" data-toggle="tab">Top x</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="top1">
			    	<div class="col-md-6">
			    		<div class="img">
			    			<img src="http://placehold.it/330x250">
				    		<div class="ikony">
								<a href=""><span class="glyphicon glyphicon-new-window"></span></a>
							</div>
			    		</div>
			    		<h3>1. Nazwa produktu</h3>
			    		<hr>
			    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    		tempor incididunt ut labore et dolore magna aliqua.</p>
			    		<a class="cart" href="">Dodaj do koszyka</a>
			    	</div>
			    	<div class="col-md-6">
			    		<ul>

			    			<li>2. <a href="#">Nazwa produktu</a></li>
			    			<li>3. <a href="#">Nazwa produktu</a></li>
			    			<li>4. <a href="#">Nazwa produktu</a></li>
			    			<li>5. <a href="#">Nazwa produktu</a></li>
			    			<li>6. <a href="#">Nazwa produktu</a></li>
			    			<li>7. <a href="#">Nazwa produktu</a></li>
			    			<li>8. <a href="#">Nazwa produktu</a></li>
			    			<li>9. <a href="#">Nazwa produktu</a></li>
			    			<li>10. <a href="#">Nazwa produktu</a></li>
			    		</ul>
			    	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="top2">
			    	
			    </div>
			    <div role="tabpanel" class="tab-pane" id="top3">...</div>
			    <div role="tabpanel" class="tab-pane" id="top4">...</div>
			  </div>

			</div>
		</div>
	</div>

</div>

<?php
	include ('footer.php');
?>