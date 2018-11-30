
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')

@endsection

@section('main-content')

<style>

/* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
	width: 27px;
}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */

    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
    /* Taking the difference out of the padding */
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
	text-indent: 0;
}

</style>

<script type="text/javascript">
    function ShowHideDiv() {
        var ms = document.getElementById("ms");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = ms.value == "Married" ? "block" : "none";
    }

	function ShowInsuranceDiv() {
        var personal_responcible = document.getElementById("personal_responcible");
        var financial_matter = document.getElementById("financial_matter");
        financial_matter.style.display = personal_responcible.value == "Others" ? "block" : "none";
		financial_matter1.style.display = personal_responcible.value == "Others" ? "block" : "none";
    }
</script>

<!--<div class="row">
	<div class="col-md-12">-->
		<div class="box box-primary">

			<div class="container">

				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
					<li class="nav-item active">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RESPONSIBLE PERSONAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">SIGNIFICANT PERSONAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">RESIDENT DETAILS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="physician-tab" data-toggle="tab" href="#physician" role="tab" aria-controls="physician" aria-selected="physician">PRIMARY DOCTOR</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="dentist-tab" data-toggle="tab" href="#dentist" role="tab" aria-controls="dentist" aria-selected="dentist">PHARMACY</a>
					<li class="nav-item">
						<a class="nav-link" id="funeral-tab" data-toggle="tab" href="#funeral" role="tab" aria-controls="funeral" aria-selected="funeral">MEDICAL EQUIPMENT</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="mental-tab" data-toggle="tab" href="#mental" role="tab" aria-controls="mental" aria-selected="mental">MENTAL STATUS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="bathing-tab" data-toggle="tab" href="#bathing" role="tab" aria-controls="bathing" aria-selected="bathing">BATHING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="dressing-tab" data-toggle="tab" href="#dressing" role="tab" aria-controls="dressing" aria-selected="dressing">DRESSING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="toileting-tab" data-toggle="tab" href="#toileting" role="tab" aria-controls="toileting" aria-selected="toileting">TOILETING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="transfer" aria-selected="transfer">AMBULATION/TRANSFER</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="grooming-tab" data-toggle="tab" href="#grooming" role="tab" aria-controls="grooming" aria-selected="grooming">PERSONAL GROOMING/HYGIENE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="feeding-tab" data-toggle="tab" href="#feeding" role="tab" aria-controls="feeding" aria-selected="feeding">FEEDING/NUTRITION</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="communucation-tab" data-toggle="tab" href="#communucation" role="tab" aria-controls="communucation" aria-selected="communucation">COMMUNICATION ABILITIES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="night-tab" data-toggle="tab" href="#night" role="tab" aria-controls="night" aria-selected="night">NIGHT NEED</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="exiting-tab" data-toggle="tab" href="#exiting" role="tab" aria-controls="exiting" aria-selected="exiting">EMERGENCY EXITING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="fuctioning-tab" data-toggle="tab" href="#fuctioning" role="tab" aria-controls="fuctioning" aria-selected="fuctioning">OVERALL LEVEL OF FUNCTIONING</a>
					</li>
				</ul>
				<div style="margin-top:10px"></div>
				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						
						<table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Name </th>
								<th class="th-position text-uppercase font-500 font-12">Address 1</th>
								<th class="th-position text-uppercase font-500 font-12">Address 2</th>
								<th class="th-position text-uppercase font-500 font-12">City</th>
								<th class="th-position text-uppercase font-500 font-12">State</th>
								<th class="th-position text-uppercase font-500 font-12">Zip Code</th>
								<th class="th-position text-uppercase font-500 font-12">Phone</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">Address</th>
							</tr>
						<tr>
								<td>{{ $reports_1->responsible_person_responsible }}</td>
								<td>{{ $reports_1->address1_responsible }}</td>
								<td>{{ $reports_1->address2_responsible }}</td>
								<td>{{ $reports_1->city_responsible }}</td>
								<td>{{ $reports_1->state_responsible }}</td>
								<td>{{ $reports_1->zipcode_responsible }}</td>
								<td>{{ $reports_1->phone_responsible }}</td>
								<td>{{ $reports_1->email_responsible }}</td>
								<td>{{ $reports_1->state_responsible }}</td>							
							</tr>
														
						</tbody>
                    </table>
						
						

                           <!-- <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Name : </label>
        						<span class="font-14">{{ $reports_1->responsible_person_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Address 1 : </label>
        						<span class="font-14">{{ $reports_1->address1_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Address 2 : </label>
        						<span class="font-14">{{ $reports_1->address2_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">City : </label>
        						<span class="font-14">{{ $reports_1->city_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">State : </label>
        						<span class="font-14">{{ $reports_1->state_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Zipcode : </label>
        						<span class="font-14">{{ $reports_1->zipcode_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Phone : </label>
        						<span class="font-14">{{ $reports_1->phone_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">City : </label>
        						<span class="font-14">{{ $reports_1->email_responsible }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">State : </label>
        						<span class="font-14">{{ $reports_1->state_responsible }}</span> -->
					</div>


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					
					<table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Name </th>
								<th class="th-position text-uppercase font-500 font-12">Address 1</th>
								<th class="th-position text-uppercase font-500 font-12">Address 2</th>
								<th class="th-position text-uppercase font-500 font-12">City</th>
								<th class="th-position text-uppercase font-500 font-12">State</th>
								<th class="th-position text-uppercase font-500 font-12">Zip Code</th>
								<th class="th-position text-uppercase font-500 font-12">Phone</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								
							</tr>
						<tr>
								<td>{{ $reports_1->other_significant_person_significant }}</td>
								<td>{{ $reports_1->address1_significant }}</td>
								<td>{{ $reports_1->address2_significant }}</td>
								<td>{{ $reports_1->city_significant }}</td>
								<td>{{ $reports_1->state_significant }}</td>
								<td>{{ $reports_1->zipcode_significant }}</td>
								<td>{{ $reports_1->phone_significant }}</td>
								<td>{{ $reports_1->email_significant }}</td>							
							</tr>
														
						</tbody>
                    </table>
                        <!--<div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Name : </label>
        						<span class="font-14">{{ $reports_1->other_significant_person_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Address 1 : </label>
        						<span class="font-14">{{ $reports_1->address1_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Address 2 : </label>
        						<span class="font-14">{{ $reports_1->address2_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">City : </label>
        						<span class="font-14">{{ $reports_1->city_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">State : </label>
        						<span class="font-14">{{ $reports_1->state_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Zip : </label>
        						<span class="font-14">{{ $reports_1->zipcode_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Phone : </label>
        						<span class="font-14">{{ $reports_1->phone_significant }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Email : </label>
        						<span class="font-14">{{ $reports_1->email_significant }}</span>
                        </div> -->
                    </div>


                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					
					<table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Height </th>
								<th class="th-position text-uppercase font-500 font-12">Address 1</th>
								<th class="th-position text-uppercase font-500 font-12">Social Security</th>
								<th class="th-position text-uppercase font-500 font-12">Medicare</th>
								<th class="th-position text-uppercase font-500 font-12">VA</th>
								<th class="th-position text-uppercase font-500 font-12">Other Insurance Name</th>
								
								
							</tr>
						<tr>
								<td>{{ $reports_1->height_resident }}</td>
								<td>{{ $reports_1->weight_resident }}</td>
								<td>{{ $reports_1->social_security_resident }}</td>
								<td>{{ $reports_1->medicare_resident }}</td>
								<td>{{ $reports_1->va_resident }}</td>
								<td>{{ $reports_1->other_insurance_name_resident }}</td>
															
							</tr>
														
						</tbody>
                    </table>
                       <!-- <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Height : </label>
        						<span class="font-14">{{ $reports_1->height_resident }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Address 1 : </label>
        						<span class="font-14">{{ $reports_1->weight_resident }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Social Security : </label>
        						<span class="font-14">{{ $reports_1->social_security_resident }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Medicare : </label>
        						<span class="font-14">{{ $reports_1->medicare_resident }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">VA : </label>
        						<span class="font-14">{{ $reports_1->va_resident }}</span>

                            <div style="margin-top:10px"></div>
        						<label class="text-capitalize font-500 font-14">Other Insurance Name : </label>
        						<span class="font-14">{{ $reports_1->other_insurance_name_resident }}</span>
                        </div> -->
                    </div> 


                    <div class="tab-pane fade" id="physician" role="tabpanel" aria-labelledby="physician-tab">
					<table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Primary Doctor Name </th>
								<th class="th-position text-uppercase font-500 font-12">Address 1</th>
								<th class="th-position text-uppercase font-500 font-12">Address 2</th>
								<th class="th-position text-uppercase font-500 font-12">City</th>
								<th class="th-position text-uppercase font-500 font-12">State</th>
								<th class="th-position text-uppercase font-500 font-12">Zip Code</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Medical Diagnosis</th>
								<th class="th-position text-uppercase font-500 font-12">Other Medical/Physical Problems</th>
							</tr>
						<tr>
								<td>{{ $reports_1->primary_doctor_primary }}</td>
								<td>{{ $reports_1->address1_primary }}</td>
								<td>{{ $reports_1->address2_primary }}</td>
								<td>{{ $reports_1->city_primary }}</td>
								<td>{{ $reports_1->state_primary }}</td>
								<td>{{ $reports_1->zipcode_primary }}</td>
								<td>{{ $reports_1->phone_primary_doctor }}</td>
								<td>{{ $reports_1->medical_diagnosis }}</td>
								<td>{{ $reports_1->other_m_p_prob_primary }}</td>
														
							</tr>
														
						</tbody>
                    </table>
					
					
                       <!-- <div class="col-md-4"><br/>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Primary Doctor Name : </label>
                            <span class="font-14">{{ $reports_1->primary_doctor_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Address 1 : </label>
                            <span class="font-14">{{ $reports_1->address1_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Address 2 : </label>
                            <span class="font-14">{{ $reports_1->address2_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">City : </label>
                            <span class="font-14">{{ $reports_1->city_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">State : </label>
                            <span class="font-14">{{ $reports_1->state_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Zip : </label>
                            <span class="font-14">{{ $reports_1->zipcode_primary }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Phone No. : </label>
                            <span class="font-14">{{ $reports_1->phone_primary_doctor }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Medical Diagnosis : </label>
                            <span class="font-14">{{ $reports_1->medical_diagnosis }}</span>

                        <div style="margin-top:10px"></div>
                            <label class="text-capitalize font-500 font-14">Other Medical/Physical Problems : </label>
                            <span class="font-14">{{ $reports_1->other_m_p_prob_primary }}</span>

                        </div> -->
                    </div>


                    <div class="tab-pane fade" id="dentist" role="tabpanel" aria-labelledby="dentist-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Pharmacy Name : </label>
                                <span class="font-14">{{ $reports_1->pharmacy }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Pharmacy Phone No. : </label>
                                <span class="font-14">{{ $reports_1->phone_pharmacy }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Mortuary Name : </label>
                                <span class="font-14">{{ $reports_1->mortuary }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Mortuary Phone : </label>
                                <span class="font-14">{{ $reports_1->phone2_mortuary }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Medical Needs : </label>
                                <span class="font-14">{{ $reports_1->special_med_needs_pharmacy }}</span>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="funeral" role="tabpanel" aria-labelledby="funeral-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Inconsistency Supplies/Type : </label>
                                <span class="font-14">{{ $reports_1->inconsistency_supplies_type }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Pressure Releif Devices Type : </label>
                                <span class="font-14">{{ $reports_1->pressure_relief_dev_type }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Bed Pan : </label>
                                @if($reports_1->bed_pan_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Comode : </label>
                                @if($reports_1->comode_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Urinal : </label>
                                @if($reports_1->urinal_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Cruthches : </label>
                                @if($reports_1->crutches_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Walker : </label>
                                @if($reports_1->walker_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Wheelchair : </label>
                                @if($reports_1->wheelchair_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Cane : </label>
                                @if($reports_1->cane_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Hospital Bed : </label>
                                @if($reports_1->hospital_beds_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Trapeze : </label>
                                @if($reports_1->trapeze_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Oxygen : </label>
                                @if($reports_1->oxygen_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Protective Pads : </label>
                                @if($reports_1->protective_pads_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Other : </label>
                                <span class="font-14">{{ $reports_1->other_medical }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="mental" role="tabpanel" aria-labelledby="mental-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Oriented : </label>
                                <span class="font-14">{{ $reports_1->oriented }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Oriented Note : </label>
                                <span class="font-14">{{ $reports_1->oriented_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Wanders : </label>
                                <span class="font-14">{{ $reports_1->wanders }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Wanders Note : </label>
                                <span class="font-14">{{ $reports_1->wanders_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">History Of Mental Illness : </label>
                                <span class="font-14">{{ $reports_1->history_mental_ill }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">History of mental illness note : </label>
                                <span class="font-14">{{ $reports_1->history_mental_ill_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Memory Lapses : </label>
                                <span class="font-14">{{ $reports_1->memory_lapses }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Memory Lapses Note : </label>
                                <span class="font-14">{{ $reports_1->memory_lapses_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Danger To Society : </label>
                                <span class="font-14">{{ $reports_1->danger_to_s_o }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Danger To Society Note : </label>
                                <span class="font-14">{{ $reports_1->danger_to_s_o_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Behaviors : </label>
                                <span class="font-14">{{ $reports_1->behaviors }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Behaviors Note : </label>
                                <span class="font-14">{{ $reports_1->behaviors_note }}</span>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="bathing" role="tabpanel" aria-labelledby="bathing-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment : </label>
                                <span class="font-14">{{ $reports_2->spec_equip }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment Note : </label>
                                <span class="font-14">{{ $reports_2->spec_equip_note }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="dressing" role="tabpanel" aria-labelledby="dressing-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Choose Own Clothes : </label>
                                <span class="font-14">{{ $reports_2->choose_own_clothes }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Choose Own Clothes Note : </label>
                                <span class="font-14">{{ $reports_2->choose_own_clothes_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_dressing }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_dressing_note }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="toileting" role="tabpanel" aria-labelledby="toileting-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Physical Assistance : </label>
                                <span class="font-14">{{ $reports_2->physical_assist }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Physical Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->physical_assist_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Incontinence Supplies : </label>
                                <span class="font-14">{{ $reports_2->incont_supplies }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Incontinence Supplies Note : </label>
                                <span class="font-14">{{ $reports_2->incont_supplies_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Agree To Wear : </label>
                                <span class="font-14">{{ $reports_2->agree_to_wear }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Agree To Wear Note : </label>
                                <span class="font-14">{{ $reports_2->agree_to_wear_note }}</span>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tired Easy : </label>
                                <span class="font-14">{{ $reports_2->tired_easy }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tired Easy Note : </label>
                                <span class="font-14">{{ $reports_2->tired_easy_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Walking : </label>
                                <span class="font-14">{{ $reports_2->walking_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Walking Note : </label>
                                <span class="font-14">{{ $reports_2->walking_ambu_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_ambu_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tranfers : </label>
                                <span class="font-14">{{ $reports_2->transfers_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Transfers Note : </label>
                                <span class="font-14">{{ $reports_2->transfers_ambu_note }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Aware Of Needs : </label>
                                <span class="font-14">{{ $reports_2->aware_of_needs }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Aware Of Needs Note : </label>
                                <span class="font-14">{{ $reports_2->aware_of_needs_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_groom }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_groom_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment : </label>
                                <span class="font-14">{{ $reports_2->special_equip_groom }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment Note : </label>
                                <span class="font-14">{{ $reports_2->special_equip_groom_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Feed Self : </label>
                                <span class="font-14">{{ $reports_2->feed_self }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Feed Self Note : </label>
                                <span class="font-14">{{ $reports_2->feed_self_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Allergies : </label>
                                <span class="font-14">{{ $reports_2->allergies_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Allergies Note : </label>
                                <span class="font-14">{{ $reports_2->allergies_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment : </label>
                                <span class="font-14">{{ $reports_2->spec_equip_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment Note : </label>
                                <span class="font-14">{{ $reports_2->spec_equip_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Limitation : </label>
                                <span class="font-14">{{ $reports_2->limitation_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Limitation Note : </label>
                                <span class="font-14">{{ $reports_2->limitation_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Diet : </label>
                                <span class="font-14">{{ $reports_2->special_diet }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Diet Note : </label>
                                <span class="font-14">{{ $reports_2->special_diet_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Good Appetite : </label>
                                <span class="font-14">{{ $reports_2->good_appetite }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Good Appetite Note : </label>
                                <span class="font-14">{{ $reports_2->good_appetite_note }}</span>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="communucation" role="tabpanel" aria-labelledby="communucation-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Speech : </label>
                                <span class="font-14">{{ $reports_2->speech_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Speech Note : </label>
                                <span class="font-14">{{ $reports_2->speech_comm_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Vision : </label>
                                <span class="font-14">{{ $reports_2->vision_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Vision Note : </label>
                                <span class="font-14">{{ $reports_2->vision_comm_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Hearing : </label>
                                <span class="font-14">{{ $reports_2->hearing_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Hearing Note : </label>
                                <span class="font-14">{{ $reports_2->hearing_comm_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="night" role="tabpanel" aria-labelledby="night-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Sleep-Well : </label>
                                <span class="font-14">{{ $reports_2->sleep_well }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Sleep-Well Note : </label>
                                <span class="font-14">{{ $reports_2->sleep_well_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Assistance At Night : </label>
                                <span class="font-14">{{ $reports_2->assist_at_night }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Assistance At Night Note : </label>
                                <span class="font-14">{{ $reports_2->assist_at_night_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="exiting" role="tabpanel" aria-labelledby="exiting-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_emer }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_emer_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Equipment Need : </label>
                                <span class="font-14">{{ $reports_2->equip_need_emer }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Equipment Need Note : </label>
                                <span class="font-14">{{ $reports_2->equip_need_emer_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Activity and Preferences : </label>
                                <span class="font-14">{{ $reports_2->activity_pref_emer }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="fuctioning" role="tabpanel" aria-labelledby="fuctioning-tab">
                        <div class="col-md-4"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Overall Functioning : </label>
                                <span class="font-14">{{ $reports_2->level_ov }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Other Comments/Needs/Concerns : </label>
                                <span class="font-14">{{ $reports_2->other_concerns }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Preliminary Acceptable For Transfer Into This Facility? : </label>
                                <span class="font-14">{{ $reports_2->pre_acceptable }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Reason : </label>
                                <span class="font-14">{{ $reports_2->reasons }}</span>
                        </div>
                    </div>


				</div>
		</div>
	</div>

@include('layouts.partials.scripts_auth')

@endsection
