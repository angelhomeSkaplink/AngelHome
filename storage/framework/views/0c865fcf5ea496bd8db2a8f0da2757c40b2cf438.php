<?php $__env->startSection('htmlheader_title'); ?>
    TSP
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<style media="screen">
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  position: absolute;
  z-index: 999;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div class="row" style="padding:0px;margin:0px;">
    <div class="col-lg-12 text-center">
        <h3 style="padding:0px;margin:0px;"><strong>Temporary Service Plan(TSP)</strong></h3>
    </div>
</div>
<div class="row">
	<div class="col-lg-4">
		<h3 style="margin:0px;padding:0px;"><?php if($residents->service_image == NULL): ?>
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
		<img src="../hsfiles/public/img/<?php echo e($residents->service_image); ?>" class="img-circle" width="40" height="40">
	<?php endif; ?><b><span class="text-danger"><?php echo e($residents->pros_name); ?> </span></b></h3>
	</div>
  <div class="col-lg-8">
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
    </div>
  </div>
</div>
<div style="margin-top:20px;">
    <div class="tab-content">
        <div class="box box-primary" style="padding-top:5px;padding-bottom:5px;margin-bottom:0px;">
          <form action="<?php echo e(action('ReportController@mar_monthly_report')); ?>" method="post">
            <input name="_method" type="hidden" value="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="user_id" value="<?php echo e($residents->id); ?>">
            <div class="row" style="padding:20px;">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="Date">TSP Date</label>
                  <input class="form-control" type="date" name="tsp_date" value="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-10">
                    <label for="tsp_type">TSP Type:</label>
                    <select type="text" name="tsp_type" id="tsp_type" class="form-control" placeholder="">
                                      <option value="0" id="0">Select TSP</option>
                                      <option value="1" id="1">Fall</option>
                                      <option value="2" id="2">Decline in Appetite or Activities of Daily Living</option>
                                      <option value="3" id="3">Increase in Pain</option>
                                      <option value="4" id="4">New Medication</option>
                                      <option value="5" id="5">Skin Problem of Any Type</option>
                                      <option value="6" id="6">Respiratory Problem</option>
                                      <option value="7" id="7">Cast Or Splint</option>
                                      <option value="8" id="8">Eye Problem</option>
                                      <option value="9" id="9">Gastrointestinal Problem</option>
                                      <option value="10" id="10">Urinary Tract Infection</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <span class="btn btn-primary form-control" id="addTsp" style="margin-top:20px;"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> <font color="#fff">Add</font></span>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div style="margin-top:-10px;padding-top:0px;">
        <form class="" action="" method="post">
          <div class="tab-content" id="myTabContent">

          </div>
        </form>
    </div>
<script type="text/javascript">
        $(document).ready(function(){
            $("#addTsp").click(function () {
                var tsp_type = $("#tsp_type").val();
                var tsp = '<div class="box box-primary" id="box'+ tsp_type + '">';
                console.log(tsp);
                if(tsp_type != 0){
                  $('#'+tsp_type).addClass("hidden");
                  $('#myTabContent').append($(tsp).load('/'+tsp_type));
                  $("#tsp_type").val(0);
                }else{
                  setTimeout(function(){ alert("Please Select One"); }, 3000);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>