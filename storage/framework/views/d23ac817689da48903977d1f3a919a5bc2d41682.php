


<?php $__env->startSection('htmlheader_title'); ?>
    Events Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Event Details</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<br/>

<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
	.user_info{
		    display: flex;
    justify-content: space-between;
	}
	.modal-title{
				    display: flex;
    justify-content: space-between;
	}
</style>
<script>
	$(document).ready(function(){
        $("#roomModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $.get( 'view_activity/' + id, function( data ) {
				var products  = JSON.parse(data);
				var $template = ''; 		
						
				products.forEach((product, index) => {
					var name = 	product.pros_name.split(",");			
					$template += `
					<div class="user_info">						
						<h4>${name[0]} ${name[1]} ${name[2]}</h4>
						<h4>${product.attenedee_status}</h4>
					</div>
				`;					
					console.log(product);
				});	
				$(".modal-body").html($template);
            });

        });
    });
</script>
<div class="row">
	<div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Event"); ?></b></th>
								<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Date"); ?></b></th>
								<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Venue"); ?></b></th>
								<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.View Attendee"); ?></b></th>
								<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Graph"); ?></b></th>
							</tr>
							<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $side_event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><?php echo e($side_event->event_name); ?></td>								
								<td><?php echo e($side_event->event_date); ?></td>
								<td><?php echo e($side_event->event_place); ?></td>
								<!--<td><a href="view_attendee/<?php echo e($side_event->event_id); ?>" class="btn btn-link">View Attendee</a></td>-->
								<td><button type="button" class="btn btn-link" id="<?php echo e($side_event->event_id); ?>" data-toggle="modal" data-target-id="<?php echo e($side_event->event_id); ?>"  data-target="#roomModal"><i class="glyphicon glyphicon-search"></i></button></td>
								<!--<td><a href="activity_graph/<?php echo e($side_event->event_id); ?>"><i class="material-icons material-icons md-22 gray"> visibility </i></a></td>-->
								<td><a href="attendee_report_graph/<?php echo e($side_event->event_id); ?>"><i class="material-icons material-icons md-22 gray"> visibility </i></a></td>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>	
					<div class="text-center"><?php echo e($events->links()); ?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel"><b>#</b><b><?php echo app('translator')->get("msg.Attendee"); ?></b> <b></b></h4>				
			</div>
			
			<div class="modal-body">
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?php echo app('translator')->get("msg.Close"); ?></span></button><br/>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>