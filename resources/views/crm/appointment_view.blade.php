@extends('layouts.app')

@section('htmlheader_title')
Appointment Schedule 
@endsection

@section('contentheader_title')
	<p class="text-danger"><b>Appointment Schedule</b>
	</p>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-700 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="FUTURE RESIDENT">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Appointment Date</th>
    							<th class="th-position text-uppercase font-500 font-12">Appointment Time</th>
    							<th class="th-position text-uppercase font-500 font-12">Reschedule Appointment</th>
    						</tr>
								@foreach ($appointments as $appointment)
								@php
									$n=explode(",",$appointment->pros_name);
								@endphp
    						<tr>
    							@if($appointment->service_image == NULL)
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							@else
    							<td><img src="hsfiles/public/img/{{ $appointment->service_image }}" class="img-circle" width="40" height="40"></td>
    							@endif
    							<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>								
    							<td>{{ $appointment->appointment_date }}</td>
    							<td>{{ $appointment->appointment_time }}</td>
    							<td class="padding-left-82"><a href="reschedule/{{ $appointment->appoiuntment_id }}"><i class="material-icons gray md-22">schedule </i></a></td>
    						</tr>
    						@endforeach
                           </tbody>
                    </table>
                </div>
				<div class="text-center">{{ $appointments->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
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
				  $(inp).on('change', function() {	
					var pros_id = $(this).val();
					console.log(pros_id);
					if(pros_id) {
						$.ajax({
							url: 'search_appointment/'+pros_id,
							type: "GET",
							success:function(data) {
								window.location.replace('search_appointment/'+pros_id);
							}
						});
					}
					
					$(this).unbind('change')
				  });	
				  $(inp).change();
				  //console.log($(inp).val());
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
	
	$.ajax({
		url: 'get_resident_list',
		type: "GET",
		dataType: "json",
		success:function(data) {
			countries = data;
			autocomplete(document.getElementById("myInput"), countries);
			
		}
	});
</script>
@endsection