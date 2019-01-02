<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Add Stock Info")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Add Stock Info</b>
    <a href="{{ url('medicine_stocks_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:135px !important; margin-top: -2px; margin-bottom: 9px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> @lang("msg.Go Back")</a>
    </p>
@endsection

@section('main-content')
<style>	
	.content-header
	{
	padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<script>
$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			if(pros_id) {
				$.ajax({
					url: 'prospect_prescription/'+pros_id,
					type: "GET",
					dataType: "json",
					
					success:function(data) {
						console.log(data.pharmacy);
						$.each(data, function() {	
							document.getElementById('pharmacy').value = data.pharmacy;					
						});
					}
				});
			}					
		});
	});
</script>

<div class="box box-primary" style="padding:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{action('MedicineStockHistoryController@store_stocks')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
            		<div class="col-md-3"></div>					
					<div class="col-md-4">	
						<div class="box-body">
							<div class="form-group has-feedback">
								<label>@lang("msg.Resident")</label>
								<select name="pros_id" id="pros_id"  class="form-control" required>
									<option value="">@lang("msg.Select Resident")</option>
									<?php
										$pros = DB::table('sales_pipeline')->where('facility_id',Auth::user()->facility_id)->select('pros_name', 'id')->get();
										foreach ($pros as $pros)
										{
												$n = explode(",",$pros->pros_name);
											?>
												<option value="{{ $pros->id}}">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</option>
											<?php
										}
									?>
								</select>
							</div>
							<div class="form-group has-feedback">
								<label>@lang("msg.Pharmacy")</label><br/>
								<div class="autocomplete" style="width:300px;">
									<input type="text" id="pharmacy" name="pharmacy_id">
								</div>
							</div>
							
							<div class="form-group has-feedback">
								<label>@lang("msg.Medicine Name")</label><br/>
								<div class="autocomplete" style="width:300px;">
									<input id="myInput" type="text" name="medicine_name" autocomplete="off">
								</div>
							</div>
							
							<div class="form-group has-feedback">
								<label>@lang("msg.Stock End Date")</label>
								<input type="text" class="form-control" name="course_end_date" id="stock_end_date" autocomplete="off" required>
								<script type="text/javascript"> $('#stock_end_date').datepicker({format: 'yyyy/mm/dd'});</script>
							</div>

							<div class="form-group has-feedback">
								<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
							</div>

							<div class="form-group has-feedback">
								<a href="{{  url('medicine_stocks_list') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
							</div><br/><br/><br/>
						</div>
					</div>
            	</form>
            </div>
        </div>
    </div>
</div>
<script>
	function ShowHideDiv() {
		var medicine_name = document.getElementById("medicine_name");
		var othereventShow = document.getElementById("othereventShow");
		othereventShow.style.display = medicine_name.value == "add" ? "block" : "none";
	}
	function ShowpharDiv() {
		var pharmacy_id = document.getElementById("pharmacy_id");
		var otherpharmacyShow = document.getElementById("otherpharmacyShow");
		otherpharmacyShow.style.display = pharmacy_id.value == "0" ? "block" : "none";
	}
</script>
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
		url: 'get_pharmacy',
		type: "GET",
		dataType: "json",
		success:function(data) {			
			
			pharmacy = data;
			console.log(pharmacy);
			autocomplete(document.getElementById("pharmacy"), pharmacy);
		}
	});

	$.ajax({
		url: 'get_medicine',
		type: "GET",
		dataType: "json",
		success:function(data) {			
			
			countries = data;
			console.log(countries);
			autocomplete(document.getElementById("myInput"), countries);
		}
	});
	
	//autocomplete(document.getElementById("myInput"), countries);
</script>

@endsection
@section('scripts-extra')

@endsection
