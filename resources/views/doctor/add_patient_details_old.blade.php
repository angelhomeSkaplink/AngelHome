<!-- Nilutpal Boruah Jr. -->
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Add Medical Information")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b> @lang("msg.Add Medical Information")</b>
    <a href="{{ url('view_patient_details/' . $id) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i>  @lang("msg.All Details")</a></p>
@endsection

@section('main-content')
<style>
	.content-header{
		padding: 0px 0px 0px 20px;
		margin-bottom: 0px;
	}
	.content{
		margin-top: 15px;
	}
	.wickedpicker{
		z-index:999 !important;
	}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="box-body">	
                <form action="{{action('DoctorController@store_patient_medical_info')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
					<div class=""></div>
            		<div class="col-md-4">
            			<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" >
                        <div class="form-group has-feedback">
								<label>@lang("msg.Medicine Name")*</label><br/>
								<div class="autocomplete" style="width:320px;">
									<input id="myInput" type="text" name="medicine_name" autocomplete="off" required >
								</div>
							</div>
                        <div class="form-group has-feedback">
            				<label>@lang("msg.Medicine Start Date")*</label>
            				<input type="text" class="form-control" name="date_of_prescription" id="date_of_prescription" autocomplete="off" required>
                            <script type="text/javascript"> $('#date_of_prescription').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

						<!--<div class="form-group has-feedback">
							<label>Medicine Name*</label>
							<select name="medicine_name" id="medicine_name" class="form-control" onchange = "ShowHideDiv()" required >
								<option value="">Chose Option</option>
								<option value="add">Add New Medicine</option>
								@foreach ($medicines as $medicine)
								<option value="{{ $medicine->medicine_name}}">{{ $medicine->medicine_name }}</option>
								@endforeach
							</select>
						</div>-->
						<div id="othereventShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Medicine Name")</label><br/>
								<input type="text" class="form-control" name="med_name" id="med_name" />
							</div>
						</div>
            			<div class="form-group has-feedback">
            				<label>@lang("msg.Quantity In A Single Dosage")*</label>
            				<input type="text" class="form-control" name="quantity_of_med" required />
            			</div>

						<div class="form-group has-feedback">
            				<label>@lang("msg.Medicine End Date")</label>
            				<input type="text" class="form-control" name="course_date" id="course_date" autocomplete="off">
                            <script type="text/javascript"> $('#course_date').datepicker({format: 'yyyy/mm/dd'});</script>
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
					</div>
					
					<div class="col-md-2"></div>
					<div class="col-md-4">
					    <label>Time to take medicine*</label>
                          <div class="form-group has-feedback">
                            <div class="input-group date" id="datetimepicker3">
                              <input type="time" name="time_to_take_med[]" value="" class="form-control" />
                            </div>
                          </div>
					    
            			<!--<div class="form-group has-feedback">-->
            			<!--	<label>@lang("msg.Time To Take Medicine")*</label>-->
               <!--             <textarea style="resize:none; height:115px" class="form-control" rows="5" name="time_to_take_med" required ></textarea>-->
            			<!--</div>-->
						<!--<div class="form-group has-feedback">
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
						</div>-->
                        <div class="form-check" style="padding-bottom: 30px;">
                            <label style="padding-right:10px;">
                                <input type="hidden" name="all_day" value="0">
                                <input type="checkbox" id="all_day" name="all_day" value="1">
                                <span class="label-text">@lang("msg.All Days")</span>
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
                                <span class="label-text">@lang("msg.Monday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_tuesday" name="on_tuesday" value="0">
                                <input type="checkbox" id="on_tuesday" name="on_tuesday" value="1">
                                <span class="label-text">@lang("msg.Tuesday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_wednesday" name="on_wednesday" value="0">
                                <input type="checkbox" id="on_wednesday" name="on_wednesday" value="1">
                                <span class="label-text">@lang("msg.Wednesday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_thursday" name="on_thursday" value="0">
                                <input type="checkbox" id="on_thursday" name="on_thursday" value="1">
                                <span class="label-text">@lang("msg.Thursday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_friday" name="on_friday" value="0">
                                <input type="checkbox" id="on_friday" name="on_friday" value="1">
                                <span class="label-text">@lang("msg.Friday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_saturday" name="on_saturday" value="0">
                                <input type="checkbox" id="on_saturday" name="on_saturday" value="1">
                                <span class="label-text">@lang("msg.Saturday")</span>
                            </label>
                            <label style="padding-right:10px;">
                                <input type="hidden" id="on_sunday" name="on_sunday" value="0">
                                <input type="checkbox" id="on_sunday" name="on_sunday" value="1">
                                <span class="label-text">@lang("msg.Sunday")</span>
                            </label>
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
    </div>
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
    </script>
@endsection
@section('scripts-extra')

@endsection

