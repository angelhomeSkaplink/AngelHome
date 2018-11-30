
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
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Title</th>
							<th class="th-position text-uppercase font-500 font-12">Frequency</th>
							<th class="th-position text-uppercase font-500 font-12">person required</th>
							<th class="th-position text-uppercase font-500 font-12">Start Time</th>
							<th class="th-position text-uppercase font-500 font-12">end time</th>							
							<th class="th-position text-uppercase font-500 font-12">Start Date</th>
							<th class="th-position text-uppercase font-500 font-12">end date</th>
							<th class="th-position text-uppercase font-500 font-12">special equipment</th>
						</tr>
						<form action="{{action('AttendeeController@store_tasklist')}}" method="post">	
							<input type="hidden" name="_method" value="PATCH">
							{{ csrf_field() }}
							<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}" required />
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="eating" name="eating[]" value="NO">-->
									<input type="checkbox" id="eating" name="eating[]" value="YES">
									<span class="label-text">Eating</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="continence" name="continence[]" value="NO">-->
									<input type="checkbox" id="continence" name="continence[]" value="YES">
									<span class="label-text">continence</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date1" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date1" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="transferring" name="transferring[]" value="NO">-->
									<input type="checkbox" id="transferring" name="transferring[]" value="YES">
									<span class="label-text">transfer</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date2" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date2" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="ambulation" name="ambulation[]" value="NO">-->
									<input type="checkbox" id="ambulation" name="ambulation[]" value="YES">
									<span class="label-text">ambulation</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date3" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date3" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="dressing" name="dressing[]" value="NO">-->
									<input type="checkbox" id="dressing" name="dressing[]" value="YES">
									<span class="label-text">dressing</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date4" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date4" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="bathing" name="bathing" value="NO">-->
									<input type="checkbox" id="bathing" name="bathing[]" value="YES">
									<span class="label-text">bathing</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date5" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date5" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>							
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="med_management" name="med_management" value="NO">-->
									<input type="checkbox" id="med_management" name="med_management[]" value="YES">
									<span class="label-text">Med. Management</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date6" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date6" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
									</select>
								</td>
							</tr>
							<tr>
								<input class="form-control" type="hidden" id="frequency" name="count_row[]" value="1">
								<td>
									<label style="padding-right:10px;">
									<!--<input type="hidden" id="communication" name="communication" value="NO">-->
									<input type="checkbox" id="communication" name="communication[]" value="YES">
									<span class="label-text">communication</span>
								</td>
								<td>
									<select name="frequency[]" id="frequency" class="form-control">
										<option value=""><label>Select Frequency</label></option>
										<option value="Daily"><label>Daily</label></option>
										<option value="Alt.Days"><label>Alt. Days</label></option>
										<option value="Weekly"><label>Weekly</label></option>
										<option value="Monthly"><label>Monthly</label></option>
									</select>
								</td>
								<td>
									<input class="form-control" type="text" id="person_required" name="person_required[]">
								</td>
								<td class='input-group date' id='datetimepicker3'>
									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" name="e_time[]" id="e_time"  class="form-control timepicker"/>
								</td>
								<td>
									<input type="text" class="form-control" name="s_date[]" id="s_date7" autocomplete="off"/>
									<script type="text/javascript"> $('#s_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<input type="text" class="form-control" name="e_date[]" id="e_date7" autocomplete="off"/>
									<script type="text/javascript"> $('#e_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
								</td>
								<td>
									<select name="special_equipment[]" id="special_equipment" class="myselect" style="width:100%; height: 34px;" onchange="calculateEndTime();">
										<option value=""><label>Select Equipment</label></option>
										<option value="Standard/straight cane"><label>Standard/straight cane</label></option>
										<option value="Offset cane"><label>Offset cane</label></option>
										<option value="Quadripod (four-legged) cane"><label>Quadripod (four-legged) cane</label></option>
										<option value="Axillary crutches"><label>Axillary crutches</label></option>
										<option value="Forearm (Lofstrand) crutches"><label>Forearm (Lofstrand) crutches</label></option>
										<option value="Platform crutches"><label>Platform crutches</label></option>
										<option value="Standard walker"><label>Standard walker</label></option>
										<option value="Front-wheeled (two-wheeled) walker"><label>Front-wheeled (two-wheeled) walker</label></option>
										<option value="Four-wheeled walker (rollator)"><label>Four-wheeled walker (rollator)</label></option>
										<option value="Standard- Legs on or off when resident is in it."><label>Standard- Legs on or off when resident is in it.</label></option>
										<option value="Tilt and Space"><label>Tilt and Space</label></option>
										<option value="Geri Chair"><label>Geri Chair</label></option>
										<option value="Electric Wheelchair"><label>Electric Wheelchair</label></option>
										<option value="prior to implanting"><label>prior to implanting</label></option>
										<option value="Transfer pole 1 or 2 person"><label>Transfer pole 1 or 2 person</label></option>
										<option value="Adaptive Dining"><label>Adaptive Dining</label></option>
										<option value="Adaptive Plate"><label>Adaptive Plate</label></option>
										<option value="Adaptive Silverware"><label>Adaptive Silverware</label></option>
										<option value="Oxygen Tank or concentrator "><label>Oxygen Tank or concentrator </label></option>
										<option value="Oxygen C-Pap Machine "><label>Oxygen C-Pap Machine </label></option>
										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label>Tab Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label>Pad Alarm Bed or wheelchair or stationary chair</label></option>
										<option value="Motion Sensor"><label>Motion Sensor</label></option>
										<option value="Direction:Right side weakness"><label>Right side weakness</label></option>
										<option value="Direction:Left side weakness"><label>Left side weakness</label></option>
										<option value="Direction:No use of Left Side"><label>Direction:No use of Left Side</label></option>
										<option value="Direction:No use of right side"><label>Direction:No use of right side</label></option>
										<option value="Amputee:Left or Right Leg or both "><label>Amputee:Left or Right Leg or both </label></option>
										<option value="Amputee:Left or Right Arm or Both "><label>Amputee:Left or Right Arm or Both </label></option>
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