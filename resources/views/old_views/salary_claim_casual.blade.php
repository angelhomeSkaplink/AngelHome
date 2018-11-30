@extends('layouts.app')
@section('htmlheader_title')
    Salary
@endsection
@section('contentheader_title')
    Salary
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="row">
	<form action="insert_sallary_casual"  method="post">
	
		{!! csrf_field() !!}
		
        <div class="col-md-12">			
            <div class="box box-primary">
				<div class="col-md-4">
					<div class="required">
						<div class="form-group has-feedback">
							<b>Month</b>
							<select required x-moz-errormessage="Please Select an item from the list" name="month" id="month" class="form-control">
								<option value="">Select month</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="required">
						<div class="form-group has-feedback">
							<b>Year</b>
							<select required x-moz-errormessage="Please Select an item from the list" name="year" id="year" class="form-control">
								<option value="">Select Year</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
							</select>
						</div>
					</div>
				</div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							@foreach ($views as $employee)							
                            <tr>
                                <td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								<td><input type="hidden" class="form-control" placeholder="" name="status" id="status" value="1" readonly />
								<td><input type="hidden" class="form-control" placeholder="" name="salary[]" id="status" value="{{ $employee->casual_pay }}" readonly />								
							</tr>
							@endforeach							
							<div class="row">                    
								<div class="col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
								</div>
							</div>
                        </tbody>
                    </table>
                </div>                
            </div>            
        </div>
	</form>
</div>

@include('layouts.partials.scripts_auth')
@endsection
