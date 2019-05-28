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
	//$(document).ready(function() {  
		//$(document).ready(function() {
			//$('select[name="loan_type_id"]').on('change', function() {
				//var loan_type_id = $(this).val();
				//console.log(loan_type_id);
				//if(loan_type_id) {
					//$.ajax({
						//url: '/interest/'+loan_type_id,
						//type: "GET",						
						//dataType: "json",
						//success:function(data) {
							//$.each(data, function(loan_type_id, interest) {
								//console.log(interest);
								//var interest = interest;
								//document.getElementById('interest').value = interest+'%';
							//});
						//}
					//});
				//}
				//else{
					//document.getElementById('interest').value = '0%';
				//}
			//});
		//});
	//});

	//function setGrades(){		
		//var loan_ammount = parseFloat(document.getElementById('loan_ammount').value); // Loan Amount
		//var interest_annum = parseFloat(document.getElementById('interest').value); // Per Annum Interest Persentage
		//var interest = interest_annum/100;  //Interest Per Month Persentage
		//var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
		//var monthly_interest = interest/12;
		//var top = Math.pow((1 + monthly_interest), no_of_instalment);
		//var bottom = top - 1;
		//var sp = top/bottom;
		//var emi = ((loan_ammount * monthly_interest) * sp);		
		//console.log(emi);
		//document.getElementById('interest_amount').value = emi;
		//totalAmount = emi * no_of_instalment;
		//document.getElementById('total').value = totalAmount;
	//}	
</script>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg"> Apply Loan</p>
			<form action="loaninsert" method="post">
                {!! csrf_field() !!}
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="emp_id" value="{{ $row->emp_id}}" readonly />
                </div>				
				<div class="form-group has-feedback">
					<select name="loan_type_id" id="loan_type_id" class="form-control" required >
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
					Loan Amount 
                    <input type="text" class="form-control" placeholder="Loan Amount" name="loan_ammount" id='loan_ammount' value='' onkeyup='setGrades();' required pattern="[0-9]+" Title="Numeric Value Only"/>
                </div>				
                
				<div class="form-group has-feedback">
					Applied On
                    <input type="text" class="form-control" placeholder="" name="applied_on" value="<?php echo date("y/m/d") ?>" readonly />
                </div>
				<div class="form-group has-feedback">
					Applied For
                    <input type="text" class="form-control" placeholder="Applied For" name="applied_for" pattern="[A-Za-z\s]+" Title="Alphabate character Only"/>
                </div>				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="fld_DeptID" value="{{ $row->fld_DeptID}}" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Status" name="status" value="1" readonly />
                </div>
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
