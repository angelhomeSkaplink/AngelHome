
@extends('layouts.app')

@section('htmlheader_title')
    Revision
@endsection

@section('contentheader_title')
    Revision
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="fld_PostID"]').on('change', function() {
				var post_id = $(this).val();
				console.log(post_id);
				if(post_id) {
					$.ajax({
						url: 'post_name/'+post_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							$.each(data, function() {	
							console.log(data);
								document.getElementById('fld_PostName').value = data.fld_PostName;
								document.getElementById('fld_GradePay').value = data.fld_GradePay;
								document.getElementById('fld_OriginalClause').value = data.fld_OriginalClause;
								document.getElementById('fld_NewClause').value = data.fld_NewClause;
								document.getElementById('fld_SanctionNo').value = data.fld_SanctionNo;
								document.getElementById('fld_SanctionDate').value = data.fld_SanctionDate;
								document.getElementById('current_scale').value = data.fld_PayScale;
								document.getElementById('fld_IncramentPercent').value = data.fld_IncramentPercent;
								document.getElementById('fld_DateOfIncreament').value = data.fld_DateOfIncreament;
							});
						}
					});
				}					
			});
		});
	});
</script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Revision</p>
            <form action="revision_update" method="post">
				<div class="form-group has-feedback">
					<select name="fld_PostID" id="fld_PostID" class="form-control">
						<option value="0">Select Post</option>
						<?php
							$users = DB::table('posts')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->fld_PostID}}">{{ $user->fld_PostName }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>
				<input type="hidden" name="fld_QualificationID" id="" value="1">	
				<input type="hidden" name="fld_PostName" id="fld_PostName">
				<input type="hidden" name="fld_TotalPost" id="" value="1">
				<input type="hidden" name="fld_GradePay" id="fld_GradePay">
				<input type="hidden" name="fld_OriginalClause" id="fld_OriginalClause">
				<input type="hidden" name="fld_NewClause" id="fld_NewClause">
				<input type="hidden" name="fld_SanctionNo" id="fld_SanctionNo">
				<input type="hidden" name="fld_SanctionDate" id="fld_SanctionDate">
				<div class="form-group has-feedback">
					Current Scale
                    <input type="text" class="form-control" placeholder="" name="current_scale" id="current_scale" value="" readonly />
                </div>
				<div class="form-group has-feedback">
					New Scale
                    <input type="text" class="form-control" placeholder="" name="fld_PayScale" id="fld_PayScale" value="" />
                </div>
				<input type="hidden" name="fld_IncramentPercent" id="fld_IncramentPercent">
				<input type="hidden" name="fld_DateOfIncreament" id="fld_DateOfIncreament">
				<input type="hidden" name="fld_Status" value="1">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
