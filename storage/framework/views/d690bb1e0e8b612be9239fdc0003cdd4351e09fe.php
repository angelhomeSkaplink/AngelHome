<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    List of Patients
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b>List of Patients for the date of <?php echo e($current_date); ?></b></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">Resident</th>
								<th class="th-position text-uppercase font-500 font-12">Medicine</th>
								<th class="th-position text-uppercase font-500 font-12">Quantity</th>
								<th class="th-position text-uppercase font-500 font-12">Due Time</th>
								<th class="th-position text-uppercase font-500 font-12">MAR Action</th>
								<th class="th-position text-uppercase font-500 font-12">Affect Time</th>
								<th class="th-position text-uppercase font-500 font-12">Prn Action</th>
                                <th class="th-position text-uppercase font-500 font-12">Administered By</th>
                                <th class="th-position text-uppercase font-500 font-12">Action Time</th>
							</tr>
							<?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php
								$history = DB::table('medicine_history')->where('pat_medi_id', $medicine->pat_medi_id)
                  					  ->where('mar_date',$current_date)
									  ->select('med_history_id','time_to_take_med','effect_after','user_id','pat_medi_id','status','action_performed_on','reason_title','reason_desc')->first();
									  if($history){
                                        $due_time=date('h:i A', strtotime($medicine->time_to_take_med));
                            ?>
							<tr>
								<?php if($medicine->service_image == NULL): ?>
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
								<?php else: ?>
								<td><img src="hsfiles/public/img/<?php echo e($medicine->service_image); ?>" class="img-circle" width="40" height="40"></td>
								<?php endif; ?>
								<td><?php echo e($medicine->pros_name); ?></td>
								<td><?php echo e($medicine->medicine_name); ?></td>
								<td><?php echo e($medicine->quantity_of_med); ?></td>
								<td><?php echo e($due_time); ?></td>
								<?php
									if($history->status==0){
								?>
								<td class="padding-left-72">
                  <div class="dropdown">
                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                       MAR Action
                     </button>
                     <div class="dropdown-menu">
                       <form class="" action="<?php echo e(action('DoctorController@add_history')); ?>" method="post">
                         <input name="_method" type="hidden" value="POST">
                         <?php echo csrf_field(); ?>

                         <input type="hidden" name="pat_medi_id" value="<?php echo e($medicine->pat_medi_id); ?>" />
                         <input type="hidden" name="status" value="<?php echo e($medicine->is_prn); ?>"/>
                         <input type="hidden" name="reason_title" value=""/>
                         <input type="hidden" name="reason_desc" value=""/>
                         <button class="dropdown-item" name="submit" type="submit" >Given</button>
                       </form>
                       <a class="dropdown-item" href="#"  onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Not Given</a>
                       <a class="dropdown-item" href="#"  onclick="document.getElementById('email-modal').style.display='block'" class="w3-button w3-black">Refused</a>
                     </div>
                   </div>
                   <div id="email-modal" class="w3-modal w3-animate-opacity">
                     <form action="send" method="post" enctype = "multipart/form-data">
                       <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="pat_medi_id" value="<?php echo e($medicine->pat_medi_id); ?>" />
                     <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container" style="background-color:#000;">
                          <span onclick="document.getElementById('email-modal').style.display='none'"
                          class="w3-button w3-large w3-display-topright" style="color:#fff;">&times;</span>
                           <h3><span style="color:#fff;"><i class="material-icons">email</i> Mail to Doctor</span></h3>
                        </header>
                        <div class="w3-container text-muted" style="padding-top:10px;">
                          <div class="form-group" style="padding:20px;">
                            <div><input class="form-control" type="email" name="to" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="To" value="" required/></div>
                            <div style="margin-top:5px;margin-bottom:5px;"><input class="form-control" type="text" name="subject" placeholder="Subject" value="" required /></div>
                            <div><textarea class="form-control" name="msg_body" rows="8" placeholder="Message body" style="resize:none" requireds></textarea></div>
                          </div>
                        </div>
                        <footer class="w3-container" style="background-color:#f1f1f1;color:#fff;">
                          <span class="pull-right" style="padding:10px;">
                            <button name="submit" type="submit" class="btn btn-success">Send</button>
                            <span class="btn btn-default" onclick="document.getElementById('email-modal').style.display='none'">Cancel</span>
                           </span>
                        </footer>
                     </div>
                   </form>
                   </div>
                   <div id="id01" class="w3-modal w3-animate-opacity">
                     <form action="<?php echo e(action('DoctorController@add_history')); ?>" method="post">
                       <input name="_method" type="hidden" value="POST">
                       <?php echo csrf_field(); ?>

                       <input type="hidden" name="pat_medi_id" value="<?php echo e($medicine->pat_medi_id); ?>" />
                       <input type="hidden" name="status" value="2"/>
                     <div class="w3-modal-content w3-animate-zoom w3-card-4">
                       <header class="w3-container" style="background-color:#000;">
                         <span onclick="document.getElementById('id01').style.display='none'"
                         class="w3-button w3-large w3-display-topright" style="color:#fff;">&times;</span>
                         <h3><span style="color:#fff;">Medicine not given</span></h3>
                       </header>
                       <div class="w3-container text-muted" style="padding-top:10px;">
                         <div class="form-group">
                           <label for="select" style="text">Please select why the medicine was not given-</label>
                           <select class="form-control" name="reason_title" id="reason_option" required>
                             <option value="Home">Home</option>
                             <option value="Work/ADT">Work/ADT</option>
                             <option value="ER/Hospital">ER/Hospital</option>
                             <option value="Medication not available">Medication not available</option>
                             <option value="Held by MD">Held by MD</option>
                             <option value="Other">Other</option>
                           </select>
                         </div>
                         <div class="" id="temp">

                         </div>
                         <div class="form-group hidden" id="reasonTextContainer">
                            <textarea id="desc_req" name="reason_desc" rows="5" class="form-control" placeholder="Write a brief explaination here" style="resize:none;"></textarea>
                         </div>
                       </div>
                       <footer class="w3-container" style="background-color:#f1f1f1;color:#fff;">
                         <span class="pull-right" style="padding:10px;">
                           <button name="submit" type="submit" class="btn btn-success">Mark as Complete</button>
                           <span class="btn btn-default" onclick="document.getElementById('id01').style.display='none'">Cancel</span>
                          </span>
                       </footer>
                     </div>
                    </form>

                   </div>
				</td>
				<td>
				    <?php echo e(date('h:i A', strtotime($history->effect_after))); ?>

				</td>
                <td>----------</td>
                <td>----------</td>
                <td>----------</td>
					<?php } else {
                    $user_query = DB::table('users')->where('user_id',$history->user_id)->select('firstname','lastname')->first();
                    $action_time_12format=date('h:i A', strtotime($history->action_performed_on));
                    if($history->status==1){
                      $earlyMarTime = strtotime($history->time_to_take_med) - 60*60;
                      $lateMarTime = strtotime($history->time_to_take_med) + 60*60;
                      $action_time = strtotime($history->action_performed_on);
                      if($action_time>$earlyMarTime && $action_time<$lateMarTime){
                        ?>
                        <td style="padding:10px;text-align:left; color:green;">
                          <i class="material-icons md-36"> offline_pin</i>
                        </td>
                      <?php
                      }else{
                      ?>
                      <td style="padding:10px;text-align:left; color:orange;">
                        <i class="material-icons md-36"> check_circle_outline </i>
                      </td>
                  <?php
                    }
                }elseif($history->status==2){
                  ?>
                  <td style="padding:10px;text-align:left; color:black;">
                    <i class="material-icons md-36"> cancel</i>
                  </td>
                <?php
              }elseif($history->status==3){ ?>
                <td style="padding:10px;text-align:left; color:blue;">
                  <i class="material-icons md-36"> email</i>
                </td>
              <?php }else{
              ?>
                <td style="padding:10px;text-align:left; color:blue;">
                  <i class="material-icons md-36">hourglass_empty</i>
                </td>
              <?php
              }
              ?>
              <td><?php
				if($medicine->is_prn ==1){
			   ?>
			   <?php echo e(date('h:i A', strtotime($history->effect_after))); ?>

				<?php
			    }else{
			    	?> Non-PRN
					<?php } ?>
					</td>
                <td>
                    <?php 
                      if($history->status==1 && $history->effect_after != null){
                    ?>
                        <?php echo e($history->reason_title); ?>

                    <?php 
                      }else if($history->status==4){
                    ?>
                    <div class="dropdown">
                     <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                       PRN Action
                     </button>
                     <div class="dropdown-menu">
                         <a class="dropdown-item" href="#" id="not_affect" onclick="document.getElementById('prn_not_affected_modal').style.display='block'" class="w3-button w3-black">Not affected</a>
                         <a class="dropdown-item" href="#" id="affect" onclick="document.getElementById('prn_affected_modal').style.display='block'" class="w3-button w3-black">Affected</a>
                     </div>
                   </div>
                   <div id="prn_affected_modal" class="w3-modal w3-animate-opacity">
                     <form action="<?php echo e(action('DoctorController@add_prn_history')); ?>" method="post">
                       <input name="_method" type="hidden" value="POST">
                       <?php echo csrf_field(); ?>

                       <input type="hidden" name="pat_medi_id" value="<?php echo e($medicine->pat_medi_id); ?>" />
                       <input type="hidden" name="status" value="1"/>
                     <div class="w3-modal-content w3-animate-zoom w3-card-4">
                       <header class="w3-container" style="background-color:#000;">
                         <span onclick="document.getElementById('prn_affected_modal').style.display='none'"
                         class="w3-button w3-large w3-display-topright" style="color:#fff;">&times;</span>
                         <h3><span style="color:#fff;">Describe</span></h3>
                       </header>
                       <input type="hidden" name="reason_title" id="reason_title" value="Affected">
                       <div class="w3-container text-muted" style="padding-top:10px;">
                         <div class="form-group" id="">
                            <textarea id="desc_req" name="reason_desc" rows="5" class="form-control" placeholder="Write a brief explaination here" style="resize:none;" required></textarea>
                         </div>
                       </div>
                       <footer class="w3-container" style="background-color:#f1f1f1;color:#fff;">
                         <span class="pull-right" style="padding:10px;">
                           <button name="submit" type="submit" class="btn btn-success">Mark as Complete</button>
                           <span class="btn btn-default" onclick="document.getElementById('prn_affected_modal').style.display='none'">Cancel</span>
                          </span>
                       </footer>
                     </div>
                    </form>
                   </div>
                   
                   <div id="prn_not_affected_modal" class="w3-modal w3-animate-opacity">
                     <form action="<?php echo e(action('DoctorController@add_prn_history')); ?>" method="post">
                       <input name="_method" type="hidden" value="POST">
                       <?php echo csrf_field(); ?>

                       <input type="hidden" name="pat_medi_id" value="<?php echo e($medicine->pat_medi_id); ?>" />
                       <input type="hidden" name="status" value="1"/>
                     <div class="w3-modal-content w3-animate-zoom w3-card-4">
                       <header class="w3-container" style="background-color:#000;">
                         <span onclick="document.getElementById('prn_not_affected_modal').style.display='none'"
                         class="w3-button w3-large w3-display-topright" style="color:#fff;">&times;</span>
                         <h3><span style="color:#fff;">Describe</span></h3>
                       </header>
                       <input type="hidden" name="reason_title" id="reason_title" value="Not Affected">
                       <div class="w3-container text-muted" style="padding-top:10px;">
                         <div class="form-group" id="">
                            <textarea id="desc_req" name="reason_desc" rows="5" class="form-control" placeholder="Write a brief explaination here" style="resize:none;" required></textarea>
                         </div>
                       </div>
                       <footer class="w3-container" style="background-color:#f1f1f1;color:#fff;">
                         <span class="pull-right" style="padding:10px;">
                           <button name="submit" type="submit" class="btn btn-success">Mark as Complete</button>
                           <span class="btn btn-default" onclick="document.getElementById('prn_not_affected_modal').style.display='none'">Cancel</span>
                          </span>
                       </footer>
                     </div>
                    </form>
                   </div>
                   <?php } ?>
                </td>
                <td><?php echo e($user_query->firstname); ?> <?php echo e($user_query->lastname); ?></td>
                <td><?php echo e($action_time_12format); ?></td>
								<?php } ?>
							</tr>
						<?php } ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
			<!--<div class="form-group has-feedback" style="float:right;margin-right:5px;">
				<input type='button' id='btn' value='Print' onclick='printDiv();'>
			</div>-->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p><strong>Note:- <br> </strong> <i class="material-icons md-36"> offline_pin</i>  Given in due time <strong>::</strong> <i class="material-icons md-36">  check_circle_outline </i>  Given either early or late <strong>::</strong> <i class="material-icons md-36"> hourglass_empty</i> PRN action pending <strong>::</strong> <i class="material-icons md-36"> cancel</i> Not given <strong>::</strong> <i class="material-icons md-36"> email</i> Refused-Mail sent to Doctor</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('DivIdToPrint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		setTimeout(function() {
		newWin.close();
		}, 10);
	}

  $(document).ready(function(){
    $('#reason_option').change(function(){
      var option = document.getElementById('reason_option').value;
      console.log(option);
      if(option==='Medication not available' || option==='Held by MD' || option==='Other'){
        $('#reasonTextContainer').removeClass("hidden");
        $('#desc_req').attr('required','required');
      }else{
        $('#reasonTextContainer').addClass("hidden");
        $('#desc_req').removeAttr('required','required');
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>