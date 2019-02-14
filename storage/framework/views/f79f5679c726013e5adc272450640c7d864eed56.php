<?php $__env->startSection('htmlheader_title'); ?>
   Policy Document
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Policy Document</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
.content-header{
    padding: 2px 0px 1px 20px;
    margin-bottom: -10px;
}
.content{
    margin-top: 15px;
}
.sv_header h3{
    font-size: 1.1em !important;
    font-weight: bold !important;
}
.sv_page_title{
    font-size: 1.1em !important;
}
</style>
<div class="col-md-12">	
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body" style="overflow-y: scroll; height:300px; padding-top:0">
                        <h4 class="text-center">All Policy Documents</h4>
                        <?php if($policy_doc->isEmpty()): ?>
                            No previous Record!
                        <?php else: ?>
                        <?php $__currentLoopData = $policy_doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li style="border-bottom:1px solid #e3e3e3;"> <a href="<?php echo e(asset('policy_doc/'.$doc->doc_file)); ?>" target=_blank> <?php echo e($doc->doc_name); ?><i class="material-icons">get_app</i></a> 
                                <a href="javascript:Dlete(<?php echo e($doc->doc_id); ?>)" class="pull-right"><i class="material-icons">delete</i></a> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <form action="<?php echo e(url('upload_doc')); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <?php echo e(csrf_field()); ?>

                <div class="col-md-8">
                    <div class="box box-primary">				
                        <div class="box-body padding-bottom-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                    <label>Form Name:</label><br>
                                        <input type="text" class="form-control" name="doc_name" maxlength="50" placeholder="policy document form name" value="" required/>
                                    </div>
                                    <div class="form-group has-feedback">
                                    <label>Upload Document:</label><br>
                                        <input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="2MB" required/>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                    <label> Part of On-boarding Document:</label><br>
                                        <select name="on-boarding" id="" class="form-control has-feedback">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
                                        <p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
                                    </div>
                                    <div class="form-group has-feedback pull-right">
                                        <a href="<?php echo e(url('')); ?>" class="btn btn-danger btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
                                        <button type="submit" class="btn btn-success btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </form>
    </div>    
</div>
<script type="text/javascript">
var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if(this.files[0].size > 5242880){
            $.confirm({
            title: 'Too Big!',
            content: 'File Size should be less than 5mb!',
            buttons: {
                Ok: function(){
                }
            }
        });
        this.value = "";
        };
    };
    function Dlete(id){
        $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            buttons: {
                confirm: function(){
                    window.location.replace("delete_policy/"+id);
                },
                cancel: function(){
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>