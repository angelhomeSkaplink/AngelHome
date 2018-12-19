


<?php $__env->startSection('htmlheader_title'); ?>
   Assessment Forms
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b>assessments</b>
	<a href="../../select_assessments/<?php echo e($id); ?>" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; margin-top: -2px; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> back</a>
	</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
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
<script>
	var assessment = <?php echo $assessment; ?> 
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div>
					<div id="surveyElement"></div>
					<input type="hidden" class="form-control" id="pros_id" name="pros_id" value="<?php echo e($id); ?>" />
					<input type="hidden" id="csrf" name="_token" value="<?php echo e(csrf_token()); ?>">
					<!-- Survey Content end -->
				</div>				
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script>
	var pros_id = <?php echo $id; ?>

	var assessment_id = <?php echo $assessment; ?>

	var storageName = "SurveyJS_LoadState";
	var timerId = 0;
	function loadState(survey) {		
		$.ajax({
			url: "../../find_assessment/"+assessment_id.assessment_id+"/"+pros_id,
			method: "GET",
			success: function(data) {
				var data = JSON.parse(data);
				storageSt = data.assessment_json;			
				var res = {};
				if (storageSt)
					res = JSON.parse(storageSt);					
				else 
					res = {
						currentPageNo: 0,
						data: {
						},
						id: <?php echo $id; ?>

					};
				
				if (res.currentPageNo) 
					survey.currentPageNo = res.currentPageNo;
				if (res.data) 
					survey.data = res.data;
				if (res.id) 
					survey.id = res.id;
			},
		});
	}		
	function saveState(survey) {
		var res = {
			currentPageNo: survey.currentPageNo,
			data: survey.data,
			id: survey.id
		};
		window
			.localStorage
			.setItem(storageName, JSON.stringify(res));
		
		var surveyId = assessment_id.assessment_id;	
		var prosId = <?php echo $id; ?>;
		var csrf = $('#csrf').val();
		var url =  "../../save_temporary_json";
		var answer = JSON.stringify(res.data);
		answer = JSON.parse(answer);
		$.post( url,{ 
			surveyId: surveyId, 
			answer: {data:answer},
			score: 0,
			point: 0,
			prosId: prosId,
			_token: csrf			
		})
		console.log("You are Here "+JSON.stringify(res));
	}
	survey
		.onCurrentPageChanged
		.add(function (survey, options) {
			saveState(survey);
		});
	survey
		.onComplete
		.add(function (survey, options) {
			clearInterval(timerId);
			saveState(survey);
		});

	loadState(survey);

	timerId = window.setInterval(function () {
		saveState(survey);
	}, 100000000000);
	survey.render("surveyElement");
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>