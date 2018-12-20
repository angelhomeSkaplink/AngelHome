<?php $__env->startSection('htmlheader_title'); ?>
    Facility Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
     <p class="text-danger"><b>Room graph report</b></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
</style>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/chart/Chart.min.js')); ?>"></script>
<script>
	$(document).ready(function(){		
		var id = <?php echo e($id); ?>;
		console.log(id);
		$.ajax({
			url: "/facility_room_graph_data/"+id,
			method: "GET",
			success: function(data) {
				console.log(data);
				var vacant_position = [];
				JSON.parse(data).forEach(function(elm,i){
					vacant_position.push(elm.vacant_position);
				})

				var onClick = function (e) {
					window.location.replace( "../facility_room_reports/"+id)					
				}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',					
					data: {
						labels: ["VACANT","OCCUPIED"],
						datasets: [{
							label: "FACILITY ROOM GRAPH REPORT",
							backgroundColor: ["#42a5f5", "#ef9a9a",],
							data: vacant_position
						}]
					},
					options: {
						title: {
							display: true,
							text: 'FACILITY ROOM STATUS'						
						},
						onClick: onClick					  
					}
				});				
			},			
			
			error: function(data) {
				console.log(data);
			}
		});
	});
</script>

<style type="text/css">
	#chart-container {
		width: auto;
		height: auto;
		border: 1px solid darkred;
	}
</style>

<div class="row">
	<div class="col-md-12">	
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div id="chart-container">
					<canvas id="pie-chart"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>