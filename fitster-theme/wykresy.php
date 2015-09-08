<?php
	include ('header.php');
?>

<div id="headerProfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="thumbnail" src="http://placehold.it/250x250">
			</div>		
			<div class="col-md-9 menu">
				<a href="#">tablica</a>
				<a href="#">galeria</a>
				<a href="#">ustawienia</a>
			</div>	
		</div>
	</div>
</div>

<div class="container goal">
	<div class="header">
		<h1><strong>Twoje cele</strong></h1>
	</div>
	<div class="col-md-12 under"></div>
	<div class="bg">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3 addChart">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#dodajWykres">
				<i class="fa fa-plus"></i>
				<br>
				<span>Dodaj nowy</span>
			</button>
		</div>
		<div class="modal fade bs-example-modal-lg" id="dodajWykres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Dodawanie wykresu</h4>
		      </div>
		      <div class="modal-body">
		        <div class="col-md-4">
		        	<h2>Nazwa wykresu</h2>
		        	<input type="text" placeholder="Wykres 1" /><br>
		        	<label>Jednostka</label> 
		        	<select>
		        		<option value="none">---</option>
		        		<option value="cm">cm</option>
		        		<option value="kg">kg</option>
		        	</select><br>
		        	<div class="cel">
		        		<h2>Stan obecny</h2>
			        	<input class="present" type="text" /> 
			        	<label></label>
			        	<h2>Twój cel</h2>
			        	<input class="future" type="text" /> 
			        	<label></label>
		        	</div>
		        </div>
		        <div class="col-md-8">
		        	<canvas id="myfirstcanvas">
		        	</canvas>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>

<?php
	include ('footer.php');
?>

<script type="text/javascript">
(function($) {
	$('select').on('change', function() {
	  if( this.value != 'none'){
	  	$('.cel').slideDown();
	  	$('.cel label').html(this.value);
	  }else{
	  	$('.cel').slideUp();
	  }
	});
 })( jQuery );
</script>
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
		var ctx = document.getElementById("myfirstcanvas").getContext("2d");
		wykres = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
});
	$( ".future" ).change(function() {
	  	for (var i = 0; i<20; i++) {
			wykres.datasets[0].points[i].value = this.value;
		};

		wykres.update();
	});
	$( ".present" ).change(function() {
			wykres.datasets[1].points[0].value = this.value;

		wykres.update();
	});
 })( jQuery );
</script>
