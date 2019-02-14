<?php $__env->startSection('htmlheader_title'); ?>
    Aging Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Facility Aging Graph Report</strong></h3>
    </div>
    <div class="col-lg-4">
	<a href="<?php echo e(url('aging_report')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
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
		$.ajax({
			url: "/facility_aging_graph_data/"+id,
			method: "GET",
			success: function(data) {
				var ammount_pay = [];
				JSON.parse(data).forEach(function(elm,i){
					ammount_pay.push(elm.ammount_pay);
				})
				
				new Chart(document.getElementById("bar-chart"), {
					type: 'bar',
					data: {
					  labels: ["0-29 DAYS", "30-59 DAYS", "60-89 DAYS", "90+ DAYS"],
					  datasets: [
						{
						  backgroundColor: ["#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
						  //data: [9000,9000,22000,40000]
						  data: ammount_pay
						}
					  ]
					},
					options: {
					  legend: { display: false },
					  title: {
						display: true,
						text: 'FACILITY AGING GRAPH REPORT'
					  }
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
					<canvas id="bar-chart"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>