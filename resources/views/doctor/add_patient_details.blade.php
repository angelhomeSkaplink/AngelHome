<!-- Nilutpal Boruah Jr. -->
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Add Medical Information")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Pharmacy</strong></h3>
	</div>
	<div class="col-lg-4">
		<span class="pull-right">
		<a href="{{ url('patients_list') }}" class="btn btn-success btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
		<a href="{{ url('view_patient_details/'.$id) }}" class="btn btn-info btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">details</i>View Details</a>
		</span>
	</div>
</div>
<div class="row">
    <div class="col-md-2 col-md-offset-10" style="padding-right:30px;padding-top:5px;">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('patient_medicine')}}">MAR</option>
        <option value="{{url('resident_mar_rep/'.$id)}}">MAR Report</option>
        <option value="{{url('medicine_stocks_list')}}">Medicine Stock</option>
        <!--<option value="{{url('add_patient_details/'.$id)}}">Pharmacy</option>-->
      </select>
    </div>
</div>
@endsection
	{{-- <p><b> <span class="text-danger" style="text-align:center;"> 
		@php
			$n = explode(",",$name->pros_name);
		@endphp
        @if($name->service_image == NULL)
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
		<img src="../hsfiles/public/img/{{ $name->service_image }}" class="img-circle" width="40" height="40">
	@endif
    
    {{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</span> </b>
    
    <a href="{{ url('view_patient_details/'.$id) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i>  @lang("msg.All Details")</a></p>
    <h4><p style="text-align:center;">Add Medical Information</p></h4>
@endsection --}}

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <!--<div class="container">-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="box-body">	
                <form action="{{action('DoctorController@store_patient_medical_info')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
					<div class=""></div>
            		<div class="col-md-4">
            			<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" >
            			<div class="form-group">
								<label>@lang("msg.Doctor Name")*</label><br/>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">					
											<input type="text" class="form-control" placeholder="First Name*" pattern="[A-Za-z\s]+" name="doctor_name[]" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">					
											<input type="text" class="form-control" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="doctor_name[]" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">					
											<input type="text" class="form-control" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="doctor_name[]" />
										</div>
									</div>
								</div>	
							</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Medicine Name")*</label><br/>
							<div class="form-group">
								<input class="form-control" type="text" name="medicine_name" required >
							</div>
						</div>
                        <div class="form-group has-feedback">
            				<label>@lang("msg.Medicine Start Date")*</label>
            				<input type="text" class="form-control" name="date_of_prescription" id="date_of_prescription" autocomplete="off" required>
                            <script type="text/javascript"> $('#date_of_prescription').datepicker({format: 'yyyy/mm/dd', startDate: new Date()});</script>
            			</div>
						<div class="form-group has-feedback">
            				<label>@lang("msg.Medicine End Date")</label>
            				<input type="text" class="form-control" name="course_date" id="course_date" autocomplete="off">
                            <script type="text/javascript"> $('#course_date').datepicker({format: 'yyyy/mm/dd', startDate: new Date()});</script>
            			</div>
            			<div class="form-group has-feedback">
            				<label>@lang("msg.Quantity In A Single Dosage")*</label>
            				<input type="text" class="form-control" name="quantity_of_med" required />
            			</div>
                        <div class="form-group has-feedback">
                        <label>Administered Via*</label>
                            <select name="apply_on" id="apply_on" class="form-control" required >
                                  <option value="">Choose An Option</option>
                                  <option value="ear">Ear</option>
                                  <option value="eyes">Eyes</option>
                                  <option value="nose">Nose</option>
                                  <option value="mouth">Mouth</option>
                                  <option value="inject">Inject</option>
                                  <option value="IV">IV</option>
                                  <option value="skin">Skin</option>
                            </select>
                          </div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Frequency In A Day")*</label>
							<select name="frequency" id="frequency" onchange="sel()" class="form-control" required >
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
						</div>
						<label>Time to take medicine*</label>
                          <div class="form-group has-feedback">
                            <div class="input-group date" id="datetimepicker3">
                              <input type="time" name="time_to_take_med[]" value="" class="form-control" required />
                            </div>
                          </div>
                          <div class="form-group has-feedback">
						<label>Select Days*</label><br/>
						<label style="padding-right:10px;">
							<input type="checkbox" name="all_day" id="all_day">
							<span class="label-text">All Days</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="1">
							<span class="label-text">Monday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="2">
							<span class="label-text">Tuesday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="3">
							<span class="label-text">Wednesday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="4">
							<span class="label-text">Thursday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="5">
							<span class="label-text">Friday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="6">
							<span class="label-text">Saturday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" value="7">
							<span class="label-text">Sunday</span>
						</label>
					</div>
					</div>
					
					<div class="col-md-2"></div>
					<div class="col-md-4">
                        <div class="form-group has-feedback">
								<label>@lang("msg.Allergy")</label><br/>
								<div class="">
									<input class="form-control" type="text" name="allergy">
								</div>
							</div>
							<div class="form-group has-feedback">
								<label>@lang("msg.Diet")</label><br/>
								<div class="">
									<input class="form-control" type="text" name="diet" >
								</div>
							</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.PRN")*</label><br/>
							<select name="is_prn" id="is_prn" class="form-control" required >
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
						
						<div class="form-group hidden" id="prn_details">
						    <label>@lang("msg.Reason")*</label><br/>
                                <input type="text" id="prn_reason" name="prn_reason" class="form-control" placeholder="Write a brief explaination here" style="resize:none;"><br/>
                            <label>@lang("msg.Parameter")* <span id="add_more_input" style="cursor:pointer;color:#1a75ff;"><i class="material-icons gray md-22"> add_circle</i> Add More</span></label><br/>
                                <input type="text" class="form-control param" name="parameter[]" /><br/>
                                <input type="text" class="form-control param" name="parameter[]" /><br/>
                                <input type="text" class="form-control param" name="parameter[]" /></br>
                                <span class="form-group" id="add_input_area"></span>
                            <label>@lang("msg.Affect After in Minutes")*</label><br/>
                                <select name="effect" id="effect" class="form-control" required />
                                    @php
									    for($i=30;$i<=60;$i++){
									@endphp
										<option value="{{ $i }}">{{ $i }}</option>
									@php
									    }
									@endphp
								</select>
                         </div>
						
            			<div class="form-group has-feedback">
            				<label>@lang("msg.Other Instructions")*</label>
                            <textarea style="resize:none; height:115px" class="form-control" rows="5" name="other_instructions" required></textarea>
            			</div>
						<div style="margin-top:55px"></div>
                        <div class="form-group has-feedback">
            				<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            			</div>
						<div class="form-group has-feedback">
                            <a href="{{  url('patients_list') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            			</div>
						<br/><br/>
            		</div>
            	</form>
				</div>
            </div>
        </div>
    <!--</div>-->
</div>
<script>
	function autocomplete(inp, arr) {
	  /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
	  var currentFocus;
	  /*execute a function when someone writes in the text field:*/
	  inp.addEventListener("input", function(e) {
		  var a, b, i, val = this.value;
		  /*close any already open lists of autocompleted values*/
		  closeAllLists();
		  if (!val) { return false;}
		  currentFocus = -1;
		  /*create a DIV element that will contain the items (values):*/
		  a = document.createElement("DIV");
		  a.setAttribute("id", this.id + "autocomplete-list");
		  a.setAttribute("class", "autocomplete-items");
		  /*append the DIV element as a child of the autocomplete container:*/
		  this.parentNode.appendChild(a);
		  /*for each item in the array...*/
		  for (i = 0; i < arr.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
			  /*create a DIV element for each matching element:*/
			  b = document.createElement("DIV");
			  /*make the matching letters bold:*/
			  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
			  b.innerHTML += arr[i].substr(val.length);
			  /*insert a input field that will hold the current array item's value:*/
			  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
			  /*execute a function when someone clicks on the item value (DIV element):*/
			  b.addEventListener("click", function(e) {
				  /*insert the value for the autocomplete text field:*/
				  inp.value = this.getElementsByTagName("input")[0].value;
				  /*close the list of autocompleted values,
				  (or any other open lists of autocompleted values:*/
				  closeAllLists();
			  });
			  a.appendChild(b);
			}
		  }
	  });
	  /*execute a function presses a key on the keyboard:*/
	  inp.addEventListener("keydown", function(e) {
		  var x = document.getElementById(this.id + "autocomplete-list");
		  if (x) x = x.getElementsByTagName("div");
		  if (e.keyCode == 40) {
			/*If the arrow DOWN key is pressed,
			increase the currentFocus variable:*/
			currentFocus++;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 38) { //up
			/*If the arrow UP key is pressed,
			decrease the currentFocus variable:*/
			currentFocus--;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 13) {
			/*If the ENTER key is pressed, prevent the form from being submitted,*/
			e.preventDefault();
			if (currentFocus > -1) {
			  /*and simulate a click on the "active" item:*/
			  if (x) x[currentFocus].click();
			}
		  }
	  });
	  function addActive(x) {
		/*a function to classify an item as "active":*/
		if (!x) return false;
		/*start by removing the "active" class on all items:*/
		removeActive(x);
		if (currentFocus >= x.length) currentFocus = 0;
		if (currentFocus < 0) currentFocus = (x.length - 1);
		/*add class "autocomplete-active":*/
		x[currentFocus].classList.add("autocomplete-active");
	  }
	  function removeActive(x) {
		/*a function to remove the "active" class from all autocomplete items:*/
		for (var i = 0; i < x.length; i++) {
		  x[i].classList.remove("autocomplete-active");
		}
	  }
	  function closeAllLists(elmnt) {
		/*close all autocomplete lists in the document,
		except the one passed as an argument:*/
		var x = document.getElementsByClassName("autocomplete-items");
		for (var i = 0; i < x.length; i++) {
		  if (elmnt != x[i] && elmnt != inp) {
			x[i].parentNode.removeChild(x[i]);
		  }
		}
	  }
	  /*execute a function when someone clicks in the document:*/
	  document.addEventListener("click", function (e) {
		  closeAllLists(e.target);
	  });
	}

	//var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
	
	$.ajax({
		url: '../get_medicine',
		type: "GET",
		dataType: "json",
		success:function(data) {			
			
			countries = data;
			console.log(countries);
			autocomplete(document.getElementById("myInput"), countries);
		}
	});
	
	//autocomplete(document.getElementById("myInput"), countries);
	$(document).ready(function(){
      $("#frequency").change(function(){
        var inputs = '';
        var val = document.getElementById("frequency").value;
        var i=0;
        for(i = 0; i < val; i++){
          inputs += '<input type="time" name="time_to_take_med[]" value="" class="form-control"/></br></br>';
        }
        document.getElementById('datetimepicker3').innerHTML=inputs;
          $('.timepicker').wickedpicker();
      });
    });
    $(document).ready(function(){
          $('.timepicker').wickedpicker();
    });
	// for PRN 
	$(document).ready(function(){
    $('#is_prn').change(function(){
      var option = document.getElementById('is_prn').value;
      if(option==1){
        $('#prn_details').removeClass("hidden");
        $('#prn_reason').attr('required','required');
        $('.param').attr('required','required');
        $('#effect').attr('required','required');
        $('#effectiveness').attr('required','required');
      }else{
        $('#prn_details').addClass("hidden");
        $('#prn_reason').removeAttr('required','required');
        $('.param').removeAttr('required','required');
        $('#effect').removeAttr('required','required');
        $('#effectiveness').removeAttr('required','required');
      }
    });
    
    $('#add_more_input').click(function(){
            var inputbox='';
            inputbox='<input type="text" class="form-control param" name="parameter[]" /><br/>';
            $('#add_input_area').append(inputbox);
        });
    });
    
    $(document).ready(function(){
        $('#all_day').bind('click',function() {
            $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
        });
        $('input[name="days[]"]').change(function () {
        var selectAll = true;
        $('input[name="days[]"]').each(function (i, obj) {
            if ($(obj).is(':checked') === false) {
                selectAll = false;
                return false;
            }
        });
        $('#all_day').prop('checked', selectAll);
        
    });
    });
    </script>
@include('quick_link.quicklink')
@endsection
@section('scripts-extra')

@endsection

