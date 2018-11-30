<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    List of Patients
@endsection

@section('contentheader_title')
    List of Patients
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Medicine</th>
								<th class="th-position text-uppercase font-500 font-12">Quantity</th>
								<th class="th-position text-uppercase font-500 font-12">Time</th>
								<th class="th-position text-uppercase font-500 font-12">Action</th>
							</tr>
							@foreach ($medicines as $medicine)
							<tr>
								<td>{{ $medicine->pros_name }}</td>
								<td>{{ $medicine->medicine_name }}</td>
								<td>{{ $medicine->quantity_of_med }}</td>
								<td>{{ $medicine->time_to_take_med }}</td>
								<?php
									$history = DB::table('medicine_history')->where([['pat_medi_id', $medicine->pat_medi_id], ['history_date', date("Y-m-d",time())]])->first();
									if($history==NULL){
								?>
								<td class="padding-left-72">
									<a href="add_history/{{ $medicine->pat_medi_id }}" data-toggle="tooltip" data-placement="bottom" title="Add Details">
										<i class="material-icons gray md-22"> check_box_outline_blank</i>
									</a>
								</td>
								<?php } else {?>
								<td class="padding-left-72">
									<a href="" data-toggle="tooltip" data-placement="bottom" title="Add Details">
										<i class="material-icons gray md-22"> beenhere</i>
									</a>
								</td>
								<?php } ?>
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
