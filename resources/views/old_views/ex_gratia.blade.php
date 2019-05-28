@extends('layouts.app')
@section('htmlheader_title')
    Ex Gratia
@endsection
@section('contentheader_title')
    Ex Gratia
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<style>
    @media print{
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
<div class="row" id="printableArea">
	<form action="insert_ex_gratia"  method="post">	
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
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>Ex Gratia Amount</th>
							</tr>
							@foreach ($views as $employee)							
                            <tr>
                                <td><input type="text" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>
								<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>
								<?php							
									if($employee->basic_pay<10000){
										$ex_gratia = $employee->basic_pay;
									}
									else{
										$ex_gratia = 10000;
									}
								?>								
								<?php  ?>	
								<td><input type="text" class="form-control" placeholder="" name="amount[]" value="{{ $ex_gratia }}" readonly /></td>
							</tr>							
							@endforeach													
							<div class="row">                    
								<div class="col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
								</div>
							</div>
							<div class="col-md-8" style="margin-top:20px;"><input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" /></div>
                        </tbody>
                    </table>
                </div>                
            </div>            
        </div>
	</form>
</div>

<script>
	function printDiv(printpage)
	{
		var headstr = "<html><head><title>Ex Gratia</title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
</script>

@include('layouts.partials.scripts_auth')
@endsection
