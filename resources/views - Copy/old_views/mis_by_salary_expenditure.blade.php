@extends('layouts.app')
@section('htmlheader_title')
    MIS report by Salary Statement
@endsection
@section('contentheader_title')

MIS report by Salary Statement
@endsection
@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<style>
    @media print
    {
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
<div id="printableArea">  
	<div class="row">
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
					<div class="alert alert-success">
						<b>MIS By Salary Expenditure</b><br/>
					</div>
					@if(count($sdata)>0)
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th colspan="11"></th>
								<th colspan="11" style="text-align:center">Deduction</th>
								
							</tr>
							<tr>
								<th>C</th>
								<th>NAME</th>
								<th>INITIAL PAY</th>
								<!--<th>PAY BAND</th>-->
								<th>BASIC PAY</th>
								<!--<th>DA</th>
								<th>HRA</th>
								<th>MA</th>
								<th>CONV</th>
								<th>CA</th>
								<th>CHA</th>
								<th>GROSS SALARY</th>
								<th>GPF</th>
								<th>HB AVD</th>
								<th>KSS</th>
								<th>GIS</th>
								<th>LIC (SSS)</th>
								<th>P Tax</th>
								<th>C.P.S</th>
								<th>I Tax</th>
								<th>WELFARE</th>
								<th>UNION FEE</th>
								<th>FESTIVAL</th>
								<th>TOTAL DEDUC-TION</th>
								<th>NET PAY</th>-->
							</tr>
														
							<?php $i = 1; ?>
							@foreach ($sdata as $emp)
									<?php
										$initial_pay = $emp->initial_pay;
									?>
									<tr>
										<td>{{ $initial_pay }}</td>
										
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
							@endforeach
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif
                        </tbody>
                    </table>
					<!--<div class="col-md-8" style="margin-top:20px;">
						<input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" />						
					</div>	
					<form action="statement_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode() }}">
						<input type="hidden" name="data1" value="{{ json_encode() }}">
						<button class="btn btn-info" type="submit" style="margin-top:20px;">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>-->
                </div>                
            </div>
        </div>
    </div>
</div>
<script>
	function printDiv(printpage)
	{
		var headstr = "<html><head><title>Salary Slip</title></head><body>";
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
