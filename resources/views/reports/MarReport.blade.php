<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Mar Report
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Mar Reports</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12"></th>
								<th class="th-position text-uppercase font-500 font-12">Resident</th>
								<th class="th-position text-uppercase font-500 font-12">View Report</th>
							</tr>
			  @foreach($join as $r)
			@php
				$n = explode(",",$r->pros_name);
			@endphp
			<tr>
                @if($r->service_image == NULL)
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
								@else
								<td><img src="hsfiles/public/img/{{ $r->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
							<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
                <td>
                    <a href="resident_mar_rep/{{ $r->id }}">
                        <i class="material-icons gray md-22"> remove_red_eye </i>
                    </a></td>
							</tr>
              @endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!--<div class="form-group has-feedback" style="float:right;margin-right:5px;">
				<input type='button' id='btn' value='Print' onclick='printDiv();'>
			</div>-->
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')
<script>
	function printDiv() {
		var divToPrint = document.getElementById('DivIdToPrint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		setTimeout(function() {
		newWin.close();
		}, 10);
	}
</script>
@endsection
