<?php get_header();?>
<?php $ud = get_userdata( bp_displayed_user_id() ); ?>
<?php global $bp;?>
<?php 
$profile_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username();
$gallery_url = $bp->root_domain . '/members/' . bp_get_loggedin_user_username() . '/mediapress/';
?>
<div id="headerProfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<?php bp_displayed_user_avatar( 'type=full' ); ?>
				<!-- <img class="thumbnail" src="http://placehold.it/250x250"> -->
			</div>		
			<div class="col-md-9 menu">
				<a href="<?php echo $profile_url;?>">profil</a>
				<?php $gallery_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/mediapress/';?>
				<a href="<?php echo $gallery_url;?>">galeria</a>
				<?php if(bp_is_my_profile()):
				$settings_url = $bp->root_domain . '/members/' . bp_get_displayed_user_username().'/settings/';?>
				<a href="<?php echo $settings_url;?>">ustawienia</a>
				<?php endif;?>
			</div>	
		</div>
	</div>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
<?php
    $goal = get_post_meta($post->ID, 'chart_goal', true);
    $values = get_post_meta($post->ID,'chart_values',true);
    ksort($values);
    $dates = array_keys($values);
    $legends = array();
    foreach ($dates as $date_value) {
		$legends[] = date('d-m-Y',$date_value);
    }
    $new_values = array_values($values);
    $unit = get_post_meta($post->ID,'chart_unit',true);
?>
<div class="container wykres">
	<div class="header">
		<h1><strong><?php the_title();?></strong></h1>
	</div>
	<div class="col-md-12 under"></div>
	<div class="bg">
		<div class="col-md-8">
			<canvas id="chart">

			</canvas>
		</div>
		
		<div class="col-md-4">
		<?php
		global $post, $current_user;
get_currentuserinfo();

if($post->post_author == $current_user->ID) :?>  
			<h2>Aktualizuj wykres</h2>
			<form method="POST">
			<input type="date" name="update_date" required/>
			<input type="text" name="update_value" required/>
			<input type="hidden" name="update_chart" value="1"/>
			<input type="submit" />
			</form>
<?php endif;?>
			<table>
				<tr>
				<?php if($post->post_author == $current_user->ID) :?>  
					<th></th>
				<?php endif;?>
					<th>Data</th>
					<th>Stan</th>
					<th>Postęp</th>
				</tr>
		<?php $last_value = false;?>
		<?php foreach ($values as $key => $value) :
		$new_date = date('d-m-Y',$key);
		?>
				<tr>
				<?php if($post->post_author == $current_user->ID) :?>  
					<td><a href="#" data-id="<?php echo $key;?>" class="remove_date"><i class="fa fa-times"></i></a></td></th>
				<?php endif;?>
					<td><?php echo $new_date;?></td>
					<td><?php echo $value.' '.$unit;?></td>
					<?php
					if($last_value!=false && $last_value < $value):
					$difference = $value-$last_value;
					?>

					<td class="bad"><?php echo "+ ".$difference." ".$unit;?></td>
				<?php elseif($last_value!=false && $last_value > $value):
				$difference = $last_value-$value;
				?>
				<td class="good"><?php echo "- ".$difference." ".$unit;?></td>
				<?php else:?>
					<td><?php echo "0 ".$unit;?></td>
				<?php endif;?>
				</tr>
		<?php $last_value = $value;?>
		<?php endforeach;?>
			</table>
		</div>
	</div>
</div>
<script>
	daty = <?php echo json_encode($legends);?>;
	values = <?php echo json_encode($new_values);?>;
	cel = <?php echo json_encode($goal);?>;
</script>
<?php endwhile;endif;?>
<?php get_footer();?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/Chart.js"></script>  
<script type="text/javascript">
(function($) {
$(".remove_date").click(function(e) {
	e.preventDefault();
	var date_index = $(this).data('id');
	var element = $(this).parent().parent();
$.ajax({
  method: "POST",
  url: ajaxurl,
  data: "action=remove_date&id="+<?php echo $post->ID;?>+"&index="+date_index,
success: function(msg){
    element.fadeOut(600, function(){
            element.remove();
        });
  },
 })
})


 Chart.types.Bar.extend({
        name: 'BarOverlay',
        draw: function (ease) {
            Chart.types.Bar.prototype.draw.apply(this);
            ctx.beginPath();
            ctx.lineWidth = 2;
            ctx.strokeStyle = 'rgba(255, 0, 0, 1.0)';
            ctx.moveTo(35, this.scale.calculateY(100));
            ctx.lineTo(this.scale.calculateX(this.datasets[0].bars.length), this.scale.calculateY(100));
            ctx.stroke();
        }
    });


		var lineChartData = {
			labels : daty,
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(0, 173, 239,0.0)",
					strokeColor : "rgba(0, 173, 239,0)",
					pointColor : "rgba(0, 173, 239,0)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(0, 173, 239,0)",
					data: cel,
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(0, 173, 239,0.2)",
					strokeColor : "rgba(0, 173, 239,1)",
					pointColor : "rgba(0, 173, 239,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(0, 173, 239,1)",
					data : values,
				}
			]

		}


		var ctx = document.getElementById("chart").getContext("2d");
Chart.types.Line.extend({
    name: "LineWithLine",
    initialize: function () {
        Chart.types.Line.prototype.initialize.apply(this, arguments);
    },
    draw: function () {
        Chart.types.Line.prototype.draw.apply(this, arguments);

        var point = this.datasets[0].points[this.options.lineAtIndex]
        var scale = this.scale
        // draw line
        this.chart.ctx.beginPath();
        this.chart.ctx.moveTo(scale.startPoint+13, point.y);
        this.chart.ctx.strokeStyle = '#FFA500';
        this.chart.ctx.lineTo(this.chart.width, point.y);
        this.chart.ctx.stroke();

        // write TODAY
        this.chart.ctx.textAlign = 'center';
        this.chart.ctx.fillText("Cel", scale.startPoint + 35, point.y+10);
    }
});
	var myChart = new Chart(ctx).LineWithLine(lineChartData, {
    datasetFill : false,
    lineAtIndex: 0,
    scaleBeginAtZero: true,
});
 })( jQuery );
</script>