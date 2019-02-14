<?php $__env->startSection('htmlheader_title'); ?>
Edit User Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Edit User Details</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('all_member_list')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
  .wickedpicker{
    z-index:999 !important;
  }
  .content-header
  {
    padding: 2px 0px 1px 20px;
    margin-bottom: -10px;
  }
  .content {
    margin-top: 15px;
  }
</style>
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
  <form action="<?php echo e(action('AddMemberController@update_member_role')); ?>" method="post" enctype="multipart/form-data">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-body" style="height:500px">
          <input type="hidden" class="form-control" name="user_id" value="<?php echo e($role->user_id); ?>" />
          <div class="form-group has-feedback">
            <label>Member Name</label>
            <input type="text" class="form-control" placeholder="Member Name" name="member_name" value="<?php echo e($role->firstname); ?> <?php echo e($role->lastname); ?>" readonly />
          </div>
          <div class="form-group has-feedback">
            <label>User Name</label>
            <input type="text" class="form-control" placeholder="User Name" name="user_name" value="<?php echo e($role->email); ?>" />
          </div>
          <div class="form-group has-feedback">
            <label>Select Role</label><br/>
            <?php
            $roles = DB::table('role')->where('u_id',$role->user_id)->where('status',1)->get();
            $role_arr = array();
            foreach ($roles as $r) {
              array_push($role_arr,$r->id);
            }
            // dd($role_arr);
            ?>
            <label style="padding-right:10px;">
              <input type="checkbox" id="role_ed" name="role[]" value="11" <?php if (in_array(11,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">ED</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="2" <?php if (in_array(2,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">receptionist</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="3" <?php if (in_array(3,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">marketing</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="4"<?php if (in_array(4,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">RCC</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="5"<?php if (in_array(5,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">back-office</span>
            </label>
            <!--<label style="padding-right:10px;">-->
            <!--  <input type="checkbox" name="role[]" value="6"<?php if (in_array(6,$role_arr)): ?>-->
            <!--    checked-->
              <!--<?php endif; ?>>-->
            <!--  <span class="label-text">doctor</span>-->
            <!--</label>-->
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="7"<?php if (in_array(7,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">wellness-director</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="8"<?php if (in_array(8,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">care-taker</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="9"<?php if (in_array(9,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">activity-manager</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="10"<?php if (in_array(10,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">dietacian</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="12"<?php if (in_array(12,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">Med Tech</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="13"<?php if (in_array(13,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">BOM</span>
            </label>
          </div>
          <div class="form-group has-feedback">
            <label>PASSWORD</label><br/>
            <input type="password" class="form-control" name="password" value="<?php echo e($role->password); ?>">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <div class="form-group has-feedback">
						
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" onclick="return Validate()"><?php echo app('translator')->get("msg.Submit"); ?></button>
            		</div>
					<div class="form-group has-feedback">
                        <a href="<?php echo e(url('all_member_list')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
            		</div>
          
        </div>
      </div>
    </div>
    <div class="col-md-10"></div>
  </form>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var $inputs = $('input:checkbox')
        if($('#role_ed').is(':checked')){
            $inputs.not(this).prop('disabled',true);
            $('#role_ed').prop('disabled',false);
        }
    });
    $('#role_ed').click(function(){
    var $inputs = $('input:checkbox')
        if($(this).is(':checked')){
            $inputs.not(this).prop('checked',false);
            $inputs.not(this).prop('disabled',true);
        }else{
          $inputs.prop('disabled',false);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>