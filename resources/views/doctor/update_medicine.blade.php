@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Update Medical Information")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Update Details</strong></h3>
	</div>
	<div class="col-lg-4">
		<span class="pull-right">
		<a href="{{ url('view_patient_details/'.$id) }}" class="btn btn-info btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
		</span>
	</div>
</div>
@endsection

@section('main-content')
@php
		$freq_arr = [];
		foreach ($freq_data as $key => $value) {
			array_push($freq_arr, $value->time_to_take);
		}
		$freq_arr = implode(",",$freq_arr);
@endphp
<script>
	$( document ).ready(function() {
		var administered = "{{ $data->apply_on }}";
		var freq = "{{ $data->frequency_in_a_day }}";
		var mon = "{{ $data->on_monday }}";
		var tue = "{{ $data->on_tuesday }}";
		var wed = "{{ $data->on_wednesday }}";
		var thu = "{{ $data->on_thursday }}";
		var fri = "{{ $data->on_friday }}";
		var sat = "{{ $data->on_saturday }}";
		var sun = "{{ $data->on_sunday }}";
		var isPRN = "{{ $data->is_prn }}";
		var param = "{{ $data->parameter }}";
		var freq = "{{ $data->frequency_in_a_day }}";
		var effect = "{{$data->effect_time}}";
		var data = "{{ $freq_arr }}";
		data = data.split(",");
		data_len = data.length - 1;
		for (let index = 0; index < data_len; index++) {
			var inputbox='';
						i = index+1;
            inputbox='<input type="time" id="time_to_take' + i + '" class="form-control" name="time_to_take_med[]" style="margin-top: 10px;" required /> <br/>';
            $('#add_time_take').append(inputbox);
		}
		for (let index = 0; index < data.length; index++) {
			$('#time_to_take' + index).val(data[index]);
		}
		$('#effect').val(effect);
		var param = param.split(",");		
		var param_len = param.length - 3;
		for (let index = 0; index < param_len; index++) {
			var inputbox='';
						i = index+3;
            inputbox='<input type="text" id="param' + i + '" class="form-control param" name="parameter[]" /><br/>';
            $('#add_input_area').append(inputbox);
		}
		for (let index = 0; index < param.length; index++) {
			$('#param' + index).val(param[index]);
		}
		$('#time_to_take').val("10:55:00");
		$('#apply_on').val(administered);
		$('#frequency').val(freq);
		if(mon == 1 && tue == 1 && wed == 1 && thu == 1 && fri == 1 && sat == 1 && sun == 1 )
		{
			$( "#all_day" ).prop( "checked", true );
			$( "#mon" ).prop( "checked", true );
			$( "#tue" ).prop( "checked", true );
			$( "#wed" ).prop( "checked", true );
			$( "#thu" ).prop( "checked", true );
			$( "#fri" ).prop( "checked", true );
			$( "#sat" ).prop( "checked", true );
			$( "#sun" ).prop( "checked", true );
		}
		else{
			if(mon == 1){
			$( "#mon" ).prop( "checked", true );
			}
			if(tue == 1){
			$( "#tue" ).prop( "checked", true );
			}
			if(wed == 1){
			$( "#wed" ).prop( "checked", true );
			}
			if(thu == 1){
			$( "#thu" ).prop( "checked", true );
			}
			if(fri == 1){
			$( "#fri" ).prop( "checked", true );
			}
			if(sat == 1){
			$( "#sat" ).prop( "checked", true );
			}
			if(sun == 1){
			$( "#sun" ).prop( "checked", true );
			}
		}
		$('#is_prn').val(isPRN);
		if(isPRN==1){
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
			// $('#effect').attr("disabled",true);
			// $('#is_prn').attr("disabled",true);
			
	});
</script>	
@php
		$name = explode(",",$data->doctor_name);
@endphp
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
					<form action="{{url('update_record')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
					<div class=""></div>
					<input type="hidden" class="form-control" name="med_id" value="{{ $med_id }}" >
            		<div class="col-md-4">
            			<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" >
            			<div class="form-group">
								<label>@lang("msg.Doctor Name")*</label><br/>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">					
										<input type="text" class="form-control" placeholder="First Name*" pattern="[A-Za-z\s]+" value="{{ $name[0] }}" name="doctor_name[]" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">					
											<input type="text" class="form-control" placeholder="Middle Name" pattern="[A-Za-z\s]+" value="{{ $name[1] }}" name="doctor_name[]" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">					
											<input type="text" class="form-control" placeholder="Last Name*" pattern="[A-Za-z\s]+" value="{{ $name[2] }}" name="doctor_name[]" />
										</div>
									</div>
								</div>	
							</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Medicine Name")*</label><br/>
							<div class="form-group">
								<input class="form-control" type="text" name="medicine_name" value="{{ $data->medicine_name }}" required >
							</div>
						</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Medicine Start Date")*</label>
								<input type="text" class="form-control" name="date_of_prescription" value="{{ $data->date_of_prescription }}" id="date_of_prescription" readonly>
						</div>
						<div class="form-group has-feedback">
            				<label>@lang("msg.Medicine End Date")</label>
						<input type="text" class="form-control" name="course_date" id="course_date" value="{{ $data->course_date }}" autocomplete="off">
						<script type="text/javascript"> $('#course_date').datepicker({format: 'yyyy-mm-dd', startDate: new Date()});</script>
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.Quantity In A Single Dosage")*</label>
					<input type="text" class="form-control" value="{{$data->quantity_of_med}}" name="quantity_of_med" required />
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
								<input type="time" name="time_to_take_med[]" id="time_to_take0" value="" class="form-control" required />
								<span class="form-group" id="add_time_take"></span>
								</div>
							</div>
						<div class="form-group has-feedback">
						<label>Select Days*</label><br/>
						<label style="padding-right:10px;">
							<input type="checkbox" name="all_day" id="all_day">
							<span class="label-text">All Days</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="mon" value="1">
							<span class="label-text">Monday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="tue" value="2">
							<span class="label-text">Tuesday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="wed" value="3">
							<span class="label-text">Wednesday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="thu" value="4">
							<span class="label-text">Thursday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="fri" value="5">
							<span class="label-text">Friday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="sat" value="6">
							<span class="label-text">Saturday</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="days[]" id="sun" value="7">
							<span class="label-text">Sunday</span>
						</label>
					</div>
					</div>
					
					<div class="col-md-2"></div>
					<div class="col-md-4">
                        <div class="form-group has-feedback">
								<label>@lang("msg.Allergy")</label><br/>
								<div class="">
								<input class="form-control" type="text" value="{{$data->allergy}}" name="allergy">
								</div>
							</div>
							<div class="form-group has-feedback">
								<label>@lang("msg.Diet")</label><br/>
								<div class="">
								<input class="form-control" type="text" name="diet" value="{{$data->diet}}" >
								</div>
							</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.PRN")*</label><br/>
							<select name="is_prn" id="is_prn" class="form-control" >
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
						
						<div class="form-group hidden" id="prn_details">
							<label>@lang("msg.Reason")*</label><br/>
						<input type="text" id="prn_reason" name="prn_reason" class="form-control" placeholder="Write a brief explaination here" value="{{$data->prn_reason}}" style="resize:none;"><br/>
								<label>@lang("msg.Parameter")* <span id="add_more_input" style="cursor:pointer;color:#1a75ff;"><i class="material-icons gray md-22"> add_circle</i> Add More</span></label><br/>
										<input type="text" id="param0" class="form-control param" name="parameter[]" /><br/>
										<input type="text" id="param1" class="form-control param" name="parameter[]" /><br/>
										<input type="text" id="param2" class="form-control param" name="parameter[]" /><br/>
										<span class="form-group" id="add_input_area"></span>
								<label>@lang("msg.Affect After in Minutes")*</label><br/>
									<select name="effect" id="effect" class="form-control" required >
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
						<textarea style="resize:none; height:115px" class="form-control" rows="5" name="other_instructions" required>{{ $data->other_instructions }}</textarea>
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
          inputs += '<input type="time" name="time_to_take_med[]" value="" class="form-control" required/></br></br>';
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
@endsection
@section('scripts-extra')

@endsection

