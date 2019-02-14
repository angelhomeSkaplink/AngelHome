<?php $__env->startSection('htmlheader_title'); ?>
    Events Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Sales Reports</strong></h3>
	</div>
	<?php
		$us = Auth::user()->user_id;
		$roles = DB::table('role')->where('u_id',$us)->where('status',1)->get();
		$role_arr = array();
		foreach ($roles as $r) {
			array_push($role_arr,$r->id);
		}
	?>	
	<div class="col-lg-4">
		<?php if(in_array(1,$role_arr) || in_array(11,$role_arr)): ?>
			<a href="<?php echo e(url('new_event_add_form')); ?>" class="btn btn-success btn-sm pull-right"><i class="material-icons">add</i>Add New Event</a>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<br/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
<style>	
	/*.content-header{
		display:none;
	} */	
	.content {
		margin-top: 0px;
	}
	.border {
		border: 1px solid #ab8383 !important;
	}
</style>
<!--<div class="row margin-left-right-15">
	<form action="<?php echo e(action('RoomController@search_event')); ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
		<?php echo e(csrf_field()); ?>

		
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading"><?php echo app('translator')->get("msg.SELECT event"); ?></label>
				
				<select name="event_name" id="event_name" class="form-control" >
					<option value=""> <?php echo app('translator')->get("msg.SELECT event"); ?></option>
					<?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<option value="<?php echo e($venue->event_name); ?>"> <?php echo e($venue->event_name); ?> </option>	
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
					
			</div>			
		</div>
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading"><?php echo app('translator')->get("msg.SELECT venue"); ?></label>					
				<select name="event_place" id="event_place" class="form-control" >
					<option value=""> <?php echo app('translator')->get("msg.SELECT venue"); ?> </option>
					<?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($venue->event_place); ?>"> <?php echo e($venue->event_place); ?> </option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>						
				</select>
				
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> <?php echo app('translator')->get("msg.Search"); ?>
				</button>
			</div>			
		</div>
		<?php if(Auth::user()->role == '1'): ?>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<a href="<?php echo e(url('new_event_add_form')); ?>"><span class="label label-primary font-size-85pc padding-7 custom-lebel"> <i class="material-icons md-15" style="vertical-align:sub !important"> add </i> <?php echo app('translator')->get("msg.Add New Event"); ?></a>					
           
			</div>			
		</div>
		<?php endif; ?>
	</form>
</div>-->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="panel-body"><?php echo $calendar->calendar(); ?> <?php echo $calendar->script(); ?> </div> 					
            </div>
        </div>
    </div>
	<div class="col-md-6" >
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0" style="height: 502px;">
                <table class="table">
                    <tbody>
						<?php if($side_events->isEmpty()): ?>
						<tr>
							<th class="text-danger"><b><?php echo app('translator')->get("msg.No Scheduled Event For This Month"); ?> </b></th>
						</tr>
						<?php endif; ?>
						<?php if(!$side_events->isEmpty()): ?>
						<tr>
							<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Event"); ?></b></th>
							<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Date"); ?></b></th>
							<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Venue"); ?></b></th>
							<?php if(in_array(11,$role_arr)): ?>
							<th class="th-position text-uppercase font-400 font-13"><b><?php echo app('translator')->get("msg.Attendee"); ?></b></th>
							<?php endif; ?>
						</tr>
							
						<?php $__currentLoopData = $side_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $side_event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td>&#x<?php echo e($side_event->emoji_code); ?>;<?php echo e($side_event->event_name); ?></td>								
							<td><?php echo e($side_event->event_date); ?></td>
							<td><?php echo e($side_event->event_place); ?></td>
							<?php if(in_array(11,$role_arr)): ?>
							<td><a href="attendee/<?php echo e($side_event->event_id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">Attendee</a></span></td>
							<?php endif; ?>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>						
                    </tbody>
					<?php endif; ?>
                </table>	
				<div class="text-center"><?php echo e($side_events->links()); ?></div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>