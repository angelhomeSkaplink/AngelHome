<?php $__env->startSection('main-content'); ?>

<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
</style>
<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <form action="<?php echo e(action('ScreeningController@add_legal_doc')); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <?php echo e(csrf_field()); ?>

                        <div class="box box-primary">				
                            <div class="box-body padding-bottom-15">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>" />
                                        <label>Document name</label>
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" name="doc_name" maxlength="100" placeholder="" required/>
                                        </div>
                                        <div class="form-group has-feedback">
                                        <label>Upload the document here</label>
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
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="box box-primary" >	
                        <div class="box-body padding-bottom-15" style="height:200px;overflow:scroll">
                            <h4 style="margin:0px;padding-bottom:5px;"><strong><u>Document Uploaded:</u></strong></h4>
                            <?php if($isDoc): ?>
                                <ol>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li style="border-bottom:1px solid #e3e3e3;"> <a href="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" target=_blank> <?php echo e($d->doc_name); ?>  <i class="material-icons">get_app</i></a> <a class="pull-right" href="../delete_doc/<?php echo e($d->doc_id); ?>"><i class="material-icons">delete</i></a> </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </ol>
                            <?php else: ?>
                                <p class="text-center" style="padding-top:50px;color:#999999;">No document found</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
