<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Add Medical Information
@endsection

@section('contentheader_title')
    Add Medical Information
    <a href="{{ url('view_patient_details/' . $id) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i> All Details</a>
@endsection

@section('main-content')

<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{action('DoctorController@store_patient_medical_info')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
            		<div class="col-md-6">
            			<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" >

                        <div class="form-group has-feedback">
            				<label>Date of prescription*</label>
            				<input type="text" class="form-control" name="date_of_prescription" id="date_of_prescription" autocomplete="off" required>
                            <script type="text/javascript"> $('#date_of_prescription').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

						<div class="form-group has-feedback">
							<label>Medicine Name*</label>
							<select name="medicine_name" id="medicine_name" class="myselect" style="width:100%; height: 34px;" required >
								<option value="">Chose Option</option>
								<option value="Lipitor">Lipitort</option>
								<option value="Nexium">Nexium</option>
								<option value="Plavix">Plavix</option>
								<option value="Abilify">Abilify</option>
								<option value="Before Dinner">Polycrol Gel</option>
								<option value="Paracetamol">Paracetamol</option>
								<option value="Omez">Omez</option>
							</select>
						</div>

            			<div class="form-group has-feedback">
            				<label>Quantity in a single dosage*</label>
            				<input type="text" class="form-control" name="quantity_of_med" required/>
            			</div>

						<div class="form-group has-feedback">
            				<label>Course Time*</label>
            				<input type="text" class="form-control" name="course_date" id="course_date" autocomplete="off" required>
                            <script type="text/javascript"> $('#course_date').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>
					</div>

					<div class="col-md-6">
            			<div class="form-group has-feedback">
							<label>Frequency in a day*</label>
							<select name="frequency_in_a_day" id="frequency_in_a_day" class="form-control" required >
								<option value="">Chose Option</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="form-group has-feedback">
							<label>Time to take medicine*</label>
							<select name="time_to_take_med" id="time_to_take_med" class="form-control" required >
								<option value="">Chose Option</option>
								<option value="Before Breakfast">Before Breakfast</option>
								<option value="After Breakfast">After Breakfast</option>
								<option value="Before Lunch">Before Lunch</option>
								<option value="After Lunch">After Lunch</option>
								<option value="Before Dinner">Before Dinner</option>
								<option value="After Dinner">After Dinner</option>
							</select>
						</div>

                        <div class="form-check" style="padding-bottom: 30px;">
                            <label style="padding-right:10px;">
                                <input type="checkbox" id="all_day">
                                <span class="label-text">All Days</span>
                                <script type="text/javascript">
                                    $('#all_day').click(function()
                                    {
                                        $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
                                    });
                                </script>
                            </label>

                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_monday" name="on_monday" value="0">
                                <input type="checkbox" id="on_monday" name="on_monday" value="1">
                                <span class="label-text">Monday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_tuesday" name="on_tuesday" value="0">
                                <input type="checkbox" id="on_tuesday" name="on_tuesday" value="1">
                                <span class="label-text">Tuesday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id=on_wednesday name="on_wednesday" value="0">
                                <input type="checkbox" id=on_wednesday name="on_wednesday" value="1">
                                <span class="label-text">Wednesday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_thursday" name="on_thursday" value="0">
                                <input type="checkbox" id="on_thursday" name="on_thursday" value="1">
                                <span class="label-text">Thursday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_friday" name="on_friday" value="0">
                                <input type="checkbox" id="on_friday" name="on_friday" value="1">
                                <span class="label-text">Friday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_saturday" name="on_saturday" value="0">
                                <input type="checkbox" id="on_saturday" name="on_saturday" value="1">
                                <span class="label-text">Saturday</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_sunday" name="on_sunday" value="0">
                                <input type="checkbox" id="on_sunday" name="on_sunday" value="1">
                                <span class="label-text">Sunday</span>
                            </label>
                        </div>

            			<div class="form-group has-feedback">
            				<label>Other Instructions</label>
                            <textarea style="resize:none; height:115px" class="form-control" rows="5" name="other_instructions"></textarea>
            			</div>

							<div style="margin-top:55px"></div>

                        <div class="form-group has-feedback">
            				<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
            			</div>

						<div class="form-group has-feedback">
                            <a href="{{  url('patients_list') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
            			</div>
            		</div>
            	</form>
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
