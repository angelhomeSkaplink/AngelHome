<!--@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')-->
@extends('layouts.app')

@section('htmlheader_title')
    Apply Loan
@endsection

@section('contentheader_title')
     Apply Loan
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
<script>
	function setGrades() {		
		var quiz1 = parseFloat(document.getElementById('quiz1').value);
		var quiz2 = parseFloat(document.getElementById('quiz2').value);
		var quiz3 = parseFloat(document.getElementById('quiz3').value);
		var quiz4 = quiz1 * quiz2/100;		
		var totalPoints = (quiz4 + quiz1);
		var interestAmount = totalPoints/quiz3;
		document.getElementById('interest').value = interestAmount;
		document.getElementById('total').value = totalPoints;
	}
	
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="loan_type_id"]').on('change', function() {
				var loan_type_id = $(this).val();
				console.log(loan_type_id);
				if(loan_type_id) {
					$.ajax({
						url: '/ajax/'+loan_type_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							$.each(data, function(loan_type_id, interest) {
								console.log(interest);
								var interest = interest;
								document.getElementById('interest').value = interest+'%';
							});
						}
					});
				}
				else{
					document.getElementById('interest').value = '0%';
				}
			});
		});
	});
</script>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg"> Apply Loan</p>
			<form action="loaninsert" method="post">
			
                {!! csrf_field() !!}
								
				<div class="form-group has-feedback">
					<select name="loan_type_id" id="loan_type_id" class="form-control">
						<option value="0">Select Loan Type</option>
						<?php
							$users = DB::table('loan_type')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->loan_type_id}}">{{ $user->loan_type }}</option>
								<?php 
							} ?>											
					</select>
				</div>
				<div class="form-group has-feedback">
					Pricipal Amount
                    <input type="text" class="form-control" placeholder="0%" name="interest" id='interest' value='' readonly />
                </div>
				<div class="form-group has-feedback">
					<input name="interest" id="interest" class="form-control">																	
					</select>
				</div>				
				<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    @include('layouts.partials.scripts_auth')
</body>
@endsection
