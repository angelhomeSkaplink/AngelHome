
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Attendee
@endsection

@section('main-content')
<style>	
	.content-header	{
		display:none;
	}
	.wickedpicker{
		z-index:999 !important;
	}
	.content {
		margin-top: 0px;
	}
</style>
<script type="text/javascript" language="javascript" src="{{ asset('/js/tasksheet.js') }}"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Title")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Frequency")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Person Required")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Start Time")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.End Time")</th>							
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Start Date")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.End Date")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Equipment")</th>
						</tr>
						<form action="{{action('AttendeeController@store_tasklist')}}" method="post">	
							<input type="hidden" name="_method" value="PATCH">
							{{ csrf_field() }}
							<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}" required />
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="eating" name="eating[]" value="NO">-->
									<input type="checkbox" id="eating" name="title[]" value="EATING"  onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Eating")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time" class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date" autocomplete="off" required disabled />
									<script type="text/javascript"> $('#s_date').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" disabled>
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="continence" name="continence[]" value="NO">-->
									<input type="checkbox" id="continence" name="title[]" value="CONTINENCE" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Continence")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency1" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required1" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time1"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time1"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date1" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date1" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment1" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="transferring" name="transferring[]" value="NO">-->
									<input type="checkbox" id="transferring" name="title[]" value="TRANSFER" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Transfer")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency2" class="form-control" required disabled >
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required2" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time2"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time2"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date2" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date2" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment2" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="ambulation" name="ambulation[]" value="NO">-->
									<input type="checkbox" id="ambulation" name="title[]" value="AMBULATION" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Ambulation")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency3" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required3" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time3"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time3"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date3" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date3" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment3" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="dressing" name="dressing[]" value="NO">-->
									<input type="checkbox" id="dressing" name="title[]" value="DRESSING" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Dressing")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency4" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required4" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time4"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time4"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date4" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date4" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment4" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="bathing" name="bathing" value="NO">-->
									<input type="checkbox" id="bathing" name="title[]" value="BATHING" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Bathing")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency5" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required5" name="person_required[]" disabled required >
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time5"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time5"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date5" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date5" autocomplete="off" disabled/>
									<script type="text/javascript"> $('#e_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment5" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>							
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="med_management" name="med_management" value="NO">-->
									<input type="checkbox" id="med_management" name="title[]" value="MED.-MANAGEMENT" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Med. Management")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency6" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required6" name="person_required[]" disabled required >
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time6"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time6"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date6" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date6" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment6" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="communication" name="communication" value="NO">-->
									<input type="checkbox" id="communication" name="title[]" value="COMMUNICATION" onclick = "ChangeSdate()">
									<span class="label-text">@lang("msg.Communication")</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency7" class="form-control" disabled required>
										<option value=""><label>@lang("msg.Select Frequency")</label></option>
										<option value="Daily"><label>@lang("msg.Daily")</label></option>
										<option value="Alt.Days"><label>@lang("msg.Alt. Days")</label></option>
										<option value="Weekly"><label>@lang("msg.Weekly")</label></option>
										<option value="Monthly"><label>@lang("msg.Monthly")</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required7" name="person_required[]" disabled required>
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time7"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time7"  class="form-control timepicker" disabled />
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date7" autocomplete="off" disabled required />
									<script type="text/javascript"> $('#s_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date7" autocomplete="off" disabled />
									<script type="text/javascript"> $('#e_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment7" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
										<option value=""><label>@lang("msg.Select Equipment")</label></option>
										<option value="Standard/straight cane"><label>@lang("msg.Standard/Straight Cane")</label></option>
										<option value="Offset cane"><label>@lang("msg.Offset Cane")</label></option>
										<option value="Quadripod (four-legged) cane"><label>@lang("msg.Quadripod (Four-Legged) Cane")</label></option>
										<option value="Axillary crutches"><label>@lang("msg.Axillary Crutches")</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>@lang("msg.Forearm (Lofstrand) Crutches")</label></option>
										<option value="Platform crutches"><label>@lang("msg.Platform Crutches")</label></option>
										<option value="Standard walker"><label>@lang("msg.Standard Walker")</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>@lang("msg.Front-Wheeled (Two-Wheeled) Walker")</label></option>
										<option value="Four-wheeled walker (rollator)"><label>@lang("msg.Four-Wheeled Walker (Rollator)")</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>@lang("msg.Standard- Legs On Or Off When Resident Is In It.")</label></option>
										<option value="Tilt and Space"><label>@lang("msg.Tilt and Space")</label></option>
										<option value="Geri Chair"><label>@lang("msg.Geri Chair")</label></option>
										<option value="Electric Wheelchair"><label>@lang("msg.Electric Wheelchair")</label></option>
										<option value="prior to implanting"><label>@lang("msg.Prior To Implanting")</label></option>
										<option value="Transfer pole 1 or 2 person"><label>@lang("msg.Transfer Pole 1 Or 2 Person")</label></option>
										<option value="Adaptive Dining"><label>@lang("msg.Adaptive Dining")</label></option>
										<option value="Adaptive Plate"><label>@lang("msg.Adaptive Plate")</label></option>
										<option value="Adaptive Silverware"><label>@lang("msg.Adaptive Silverware")</label></option>
										<option value="Oxygen Tank or concentrator "><label>@lang("msg.Oxygen Tank Or Concentrator") </label></option>
										<option value="Oxygen C-Pap Machine "><label>@lang("msg.Oxygen C-Pap Machine") </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>@lang("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair")</label></option>
										<option value="Motion Sensor"><label>@lang("msg.Motion Sensor")</label></option>
										<option value="Direction:Right side weakness"><label>@lang("msg.Right Side Weakness")</label></option>
										<option value="Direction:Left side weakness"><label>@lang("msg.Left Side Weakness")</label></option>
										<option value="Direction:No use of Left Side"><label>@lang("msg.Direction:No Use Of Left Side")</label></option>
										<option value="Direction:No use of right side"><label>@lang("msg.Direction:No Use Of Right Side")</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>@lang("msg.Amputee:Left Or Right Leg Or Both") </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>@lang("msg.Amputee:Left Or Right Arm Or Both") </label></option>
									</select>
								</td>
							</tr>
							<tr>
								
								<td></td><td></td><td></td><td></td><td></td><td></td>
								<td>
									<a href="{{  url('tasksheet') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
								</td>
								<td>
									<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
								</td>
							</tr>
						</form>
                    </tbody>
                </table>
				
            </div>                
        </div>
    </div>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>
@endsection
@section('scripts-extra')

@endsection