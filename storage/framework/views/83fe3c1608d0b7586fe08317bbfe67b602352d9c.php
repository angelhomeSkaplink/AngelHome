<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>Upload legal document for <?php echo e($name->pros_name); ?></b></p>
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
</style>
<script type="text/javascript">
    function ShowHideDiv() {
        var ms = document.getElementById("ms");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = ms.value == "Married" ? "block" : "none";
    }

	function ShowInsuranceDiv() {
        var personal_responcible = document.getElementById("personal_responcible");
        var financial_matter = document.getElementById("financial_matter");
        financial_matter.style.display = personal_responcible.value == "Others" ? "block" : "none";
		financial_matter1.style.display = personal_responcible.value == "Others" ? "block" : "none";
    }
</script>
<div class="box box-primary padding-bottom-25">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
      <li class="nav-item">
        <a class="nav-link" href="../resposible_personal/<?php echo e($id); ?>">RESPOSIBLE PERSONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../significant_personal/<?php echo e($id); ?>">SIGNIFICANT PERSONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../resident_details/<?php echo e($id); ?>">RESIDENT DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../primary_doctor/<?php echo e($id); ?>">PHYSICIAN & DENTIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pharmacy/<?php echo e($id); ?>">HOSPITAL & PHARMACY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../medical_equipment/<?php echo e($id); ?>">MEDICAL EQUIPMENT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../legal_doc/<?php echo e($id); ?>">LEGAL DOCUMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../insurance/<?php echo e($id); ?>">INSURANCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../funeral_home/<?php echo e($id); ?>">FUNERAL HOME</a>
      </li>
    </ul>
    <div style="margin-top:35px"></div>
        <div class="tab-content" id="myTabContent">
            <div class="">
                <div class="col-md-12">
                    
                        <div class="row">
                            <form action="<?php echo e(action('ScreeningController@add_legal_doc')); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-md-8 col-md-offset-2">
                                    <div class="box box-primary">				
                                        <div class="box-body padding-bottom-15">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>" />
                                                    <div class="form-group has-feedback">
                                                        <input type="text" class="form-control" name="doc_name" maxlength="100" placeholder="Document name" required/>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                    <?php echo app('translator')->get("msg.Upload the document here"); ?>
                                                    <input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="2MB" required/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group has-feedback">
                                                        <p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
                                                        <p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <a href="<?php echo e(url('screening')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                                	
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if(this.files[0].size > 5242880){
        alert("File is too big!");
        this.value = "";
        };
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>