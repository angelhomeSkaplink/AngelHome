<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Resident Add"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo app('translator')->get("msg.New Resident"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		display:none;
	}
	.content {
		margin-top: 0px;
	}
</style>
<div class="row">
  <div class="col-lg-4">
  </div>
  <div class="col-lg-4">
      <h2 class="text-center">Inquiry Form</h2>
  </div>
  <div class="col-lg-4">
    <h2 class="pull-right" style="padding-right:30px;"><button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></h2>
  </div>
</div>
<div class="row">
	<form action="<?php echo e(action('ProspectiveController@change_pross_records')); ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="PATCH">
	<?php echo e(csrf_field()); ?>

	<div class="col-md-4">
		<div class="box box-primary">
			<?php if(Session::has('msg')): ?>
				<div class="alert alert-danger">
					<strong><?php echo e(Session::get('msg')); ?></strong>
				</div>
			<?php endif; ?>
			<?php 
			    $n = explode(",", $row->pros_name);
			    $m = explode(",",$row->contact_person);
			 ?>
			<div class="box-body">

				<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($row->id); ?>"  />

				<div class="row">
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.First Name"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($n[0]); ?>" readonly />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Middle Name"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($n[1]); ?>" readonly />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Last Name"); ?></label>
						<input type="text" class="form-control" value="<?php echo e($n[2]); ?>" readonly />
					</div>
				</div>
				</div>	
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Phone No"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->phone_p); ?>" name="phone_p" pattern="[0-9]{10}" />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Email"); ?></label>
					<input type="email" class="form-control" value="<?php echo e($row->email_p); ?>" name="email_p"  />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Address"); ?> 1</label>
					<input type="text" class="form-control" value="<?php echo e($row->address_p); ?>" name="address_p"  />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Address"); ?> 2</label>
					<input type="text" class="form-control" value="<?php echo e($row->address_p_two); ?>" name="address_p_two"  />
				</div>

				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.City"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->city_p); ?>" name="city_p" required pattern="[A-Za-z\s]+" />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
				</div>-->
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Zip"); ?></label>
					<input type="number" class="form-control" value="<?php echo e($row->zip_p); ?>" name="zip_p" pattern="[0-9]" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label><?php echo app('translator')->get("msg.First Name"); ?></label>
							<input type="text" class="form-control" value="<?php echo e($m[0]); ?>" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label><?php echo app('translator')->get("msg.Middle Name"); ?></label>
							<input type="text" class="form-control" value="<?php echo e($m[1]); ?>" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label><?php echo app('translator')->get("msg.Last Name"); ?></label>
							<input type="text" class="form-control" value="<?php echo e($m[2]); ?>" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Phone"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->phone_c); ?>" name="phone_c" pattern="[0-9]{10}" />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Email"); ?></label>
					<input type="email" class="form-control" value="<?php echo e($row->email_c); ?>" name="email_c"  />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Address"); ?> 1</label>
					<input type="text" class="form-control" value="<?php echo e($row->address_c); ?>" name="address_c"  />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Address"); ?> 2</label>
					<input type="text" class="form-control" value="<?php echo e($row->address_c_two); ?>" name="address_c_two"  />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.City"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->city_c); ?>" name="city_c" required pattern="[A-Za-z\s]+"/>
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />

				</div>-->
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Zip"); ?></label>
					<input type="number" class="form-control" value="<?php echo e($row->zip_c); ?>" name="zip_c" pattern="[0-9]" />
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Relation"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->relation); ?>" name="relation" id="relation" pattern="[A-Za-z\s]+" />
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Source"); ?></label>
					<input type="text" class="form-control" value="<?php echo e($row->source); ?>" name="source" id="source" pattern="[A-Za-z\s]+"/>
				</div>
				<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Photograph"); ?></label>
						<input type="file" class="form-control" name="service_image" id="service_image" value="<?php echo e($row->service_image); ?>"/>
					</div>
				<div class="form-group has-feedback">
            		<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
            	</div>

				<div class="form-group has-feedback">
                    <a href="<?php echo e(url('sales_pipeline')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
       			</div><br/><br/><br/>

			</div>
		</div>
	</div>
	</form>
</div>
<div class="hidden" id="printableDiv">
  <div class="row">
      <div class="col-lg-12">
        <div class="print-header">
          <div class="row">
            <div class="col-lg-12 text-center">
              <table>
                <tr style="border-bottom:5px solid #333">
                  <td>
                    <?php if($facility->facility_logo == NULL): ?>
                    <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
                    <?php else: ?>
                    <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/<?php echo e($facility->facility_logo); ?>" />
                    <?php endif; ?>
                  </td>
                  <td style="width:90%;" class="text-center">
                    <h3><strong>Inquiry Report</strong></h3>
                    <h4><strong>Facility :: <?php echo e($facility->facility_name); ?></strong></h4>
                    <p><strong><?php echo e($facility->address); ?> <?php echo e($facility->address_two); ?></strong></p>
                    <p><strong><i class="material-icons"> phone</i><?php echo e($facility->phone); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                      <?php echo e($facility->facility_email); ?>

                    </strong></p>
                    <hr style="height:5px;border:none;color:#333;background-color:#333;">
                  </td>
                  <td style="width:5%;"></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h4><strong>Inquirer:
                <?php if($row->service_image == NULL): ?>
                  <img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                <?php else: ?>
                  <img src="hsfiles/public/img/<?php echo e($row->service_image); ?>" class="img-circle" width="40" height="40">
                <?php endif; ?>
                <?php echo e($row->pros_name); ?></strong></h4>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <!-- <h4><strong>Inquirer</strong></h4> -->
      <div class="table-responsive">
        <table class="table">
            <tr>
              <!-- <td> <strong>Name</strong>  :<?php echo e($row->pros_name); ?></td> -->
              <td> <strong>Phone No.</strong>: <?php echo e($row->phone_p); ?> </td>
              <td> <strong>Email</strong>: <?php echo e($row->email_p); ?></td>
              <td> <strong>Address 1</strong>: <?php echo e($row->address_p); ?></td>
            </tr>
            <tr>
              <td> <strong>Address 2</strong>: <?php echo e($row->address_p_two); ?></td>
              <td> <strong>City</strong>: <?php echo e($row->city_p); ?></td>
              <td> <strong>Zip</strong>: <?php echo e($row->zip_p); ?> </td>
            </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="box box-primary">
    <div class="box-body">
      <h4><strong>Contact Person</strong></h4>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <td> <strong>Name</strong>  :<?php echo e($row->contact_person); ?></td>
              <td> <strong>Phone No.</strong>: <?php echo e($row->phone_c); ?> </td>
              <td> <strong>Email</strong>: <?php echo e($row->email_c); ?></td>
            </tr>
            <tr>
              <td> <strong>Address 1</strong>: <?php echo e($row->address_c); ?></td>
              <td> <strong>Address 2</strong>: <?php echo e($row->address_c_two); ?></td>
              <td> <strong>City</strong>: <?php echo e($row->city_c); ?></td>
            </tr>
            <tr>
              <td> <strong>Zip</strong>: <?php echo e($row->zip_c); ?> </td>
              <td></td>
              <td></td>
            </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <h4><strong>Relation:</strong> <?php echo e($row->relation); ?></h4>
      <h4><strong>Source:</strong> <?php echo e($row->source); ?></h4>
    </div>
  </div>

  <div class="print-footer" style="border-top:5px solid #333;">
    <!-- <hr style="height:5px;border:none;color:#333;background-color:#333;"> -->
    <div class="row">

      <div class="col-lg-12 text-center">

        <center><table>
          <tr>
            <td style="width:90%;" class="text-center">
              <h4 ><b>Powered by Senior Safe Technology LLC.</b></h4>
            </td>
          </tr>
        </table></center>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
    window.reload();
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>