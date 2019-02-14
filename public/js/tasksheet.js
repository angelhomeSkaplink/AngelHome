function ChangeSdate() {    
	if(!$('#eating').is(":checked")){
		document.getElementById("s_date").disabled = true;
		document.getElementById("e_date").disabled = true;
		document.getElementById("person_required").disabled = true;
		document.getElementById("s_time").disabled = true;
		document.getElementById("e_time").disabled = true;
		document.getElementById("special_equipment").disabled = true;
		document.getElementById("frequency").disabled = true;
	}else{
		document.getElementById("s_date").disabled = false;
		document.getElementById("e_date").disabled = false;
		document.getElementById("person_required").disabled = false;
		document.getElementById("s_time").disabled = false;
		document.getElementById("e_time").disabled = false;
		document.getElementById("special_equipment").disabled = false;
		document.getElementById("frequency").disabled = false;
	}
	
	if(!$('#continence').is(":checked")){
		document.getElementById("s_date1").disabled = true;
		document.getElementById("e_date1").disabled = true;
		document.getElementById("person_required1").disabled = true;
		document.getElementById("s_time1").disabled = true;
		document.getElementById("e_time1").disabled = true;
		document.getElementById("special_equipment1").disabled = true;
		document.getElementById("frequency1").disabled = true;
	}else{
		document.getElementById("s_date1").disabled = false;
		document.getElementById("e_date1").disabled = false;
		document.getElementById("person_required1").disabled = false;
		document.getElementById("s_time1").disabled = false;
		document.getElementById("e_time1").disabled = false;
		document.getElementById("special_equipment1").disabled = false;
		document.getElementById("frequency1").disabled = false;
	}

	if(!$('#transferring').is(":checked")){
		document.getElementById("s_date2").disabled = true;
		document.getElementById("e_date2").disabled = true;
		document.getElementById("person_required2").disabled = true;
		document.getElementById("s_time2").disabled = true;
		document.getElementById("e_time2").disabled = true;
		document.getElementById("special_equipment2").disabled = true;
		document.getElementById("frequency2").disabled = true;
	}else{
		document.getElementById("s_date2").disabled = false;
		document.getElementById("e_date2").disabled = false;
		document.getElementById("person_required2").disabled = false;
		document.getElementById("s_time2").disabled = false;
		document.getElementById("e_time2").disabled = false;
		document.getElementById("special_equipment2").disabled = false;
		document.getElementById("frequency2").disabled = false;
	}

	if(!$('#ambulation').is(":checked")){
		document.getElementById("s_date3").disabled = true;
		document.getElementById("e_date3").disabled = true;
		document.getElementById("person_required3").disabled = true;
		document.getElementById("s_time3").disabled = true;
		document.getElementById("e_time3").disabled = true;
		document.getElementById("special_equipment3").disabled = true;
		document.getElementById("frequency3").disabled = true;
	}else{
		document.getElementById("s_date3").disabled = false;
		document.getElementById("e_date3").disabled = false;
		document.getElementById("person_required3").disabled = false;
		document.getElementById("s_time3").disabled = false;
		document.getElementById("e_time3").disabled = false;
		document.getElementById("special_equipment3").disabled = false;
		document.getElementById("frequency3").disabled = false;
	}

	if(!$('#dressing').is(":checked")){
		document.getElementById("s_date4").disabled = true;
		document.getElementById("e_date4").disabled = true;
		document.getElementById("person_required4").disabled = true;
		document.getElementById("s_time4").disabled = true;
		document.getElementById("e_time4").disabled = true;
		document.getElementById("special_equipment4").disabled = true;
		document.getElementById("frequency4").disabled = true;
	}else{
		document.getElementById("s_date4").disabled = false;
		document.getElementById("e_date4").disabled = false;
		document.getElementById("person_required4").disabled = false;
		document.getElementById("s_time4").disabled = false;
		document.getElementById("e_time4").disabled = false;
		document.getElementById("special_equipment4").disabled = false;
		document.getElementById("frequency4").disabled = false;
	}

	if(!$('#bathing').is(":checked")){
		document.getElementById("s_date5").disabled = true;
		document.getElementById("e_date5").disabled = true;
		document.getElementById("person_required5").disabled = true;
		document.getElementById("s_time5").disabled = true;
		document.getElementById("e_time5").disabled = true;
		document.getElementById("special_equipment5").disabled = true;
		document.getElementById("frequency5").disabled = true;
	}else{
		document.getElementById("s_date5").disabled = false;
		document.getElementById("e_date5").disabled = false;
		document.getElementById("person_required5").disabled = false;
		document.getElementById("s_time5").disabled = false;
		document.getElementById("e_time5").disabled = false;
		document.getElementById("special_equipment5").disabled = false;
		document.getElementById("frequency5").disabled = false;
	}

	if(!$('#med_management').is(":checked")){
		document.getElementById("s_date6").disabled = true;
		document.getElementById("e_date6").disabled = true;
		document.getElementById("person_required6").disabled = true;
		document.getElementById("s_time6").disabled = true;
		document.getElementById("e_time6").disabled = true;
		document.getElementById("special_equipment6").disabled = true;
		document.getElementById("frequency6").disabled = true;
	}else{
		document.getElementById("s_date6").disabled = false;
		document.getElementById("e_date6").disabled = false;
		document.getElementById("person_required6").disabled = false;
		document.getElementById("s_time6").disabled = false;
		document.getElementById("e_time6").disabled = false;
		document.getElementById("special_equipment6").disabled = false;
		document.getElementById("frequency6").disabled = false;
	}

	if(!$('#communication').is(":checked")){
		document.getElementById("s_date7").disabled = true;
		document.getElementById("e_date7").disabled = true;
		document.getElementById("person_required7").disabled = true;
		document.getElementById("s_time7").disabled = true;
		document.getElementById("e_time7").disabled = true;
		document.getElementById("special_equipment7").disabled = true;
		document.getElementById("frequency7").disabled = true;
	}else{
		document.getElementById("s_date7").disabled = false;
		document.getElementById("e_date7").disabled = false;
		document.getElementById("person_required7").disabled = false;
		document.getElementById("s_time7").disabled = false;
		document.getElementById("e_time7").disabled = false;
		document.getElementById("special_equipment7").disabled = false;
		document.getElementById("frequency7").disabled = false;
	}
}