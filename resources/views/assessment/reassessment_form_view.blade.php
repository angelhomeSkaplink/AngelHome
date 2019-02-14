@extends('layouts.app')

@section('htmlheader_title')
    Reassessment
@endsection

@section('contentheader_title')
   <p class="text-danger"><b>Reassessment</b></p>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}

</style>
<div class="row">	
	<form action="" method="post">					
		<input type="hidden" name="_method" value="PATCH">
		{{ csrf_field() }}
		
		<div class="col-md-12">
			<div class="box box-primary">			
				<div class="box-body padding-bottom-25">			
					<div id="showData"></div>				
				</div>
			</div>
		</div>		
	</form>
</div>
<script>
	
	var assessment_id = "{!! $assessment_id !!}"
	var pros_id = {!! $id !!}
	var myBooks = []
	var myBooks = $.ajax({
			url: "../../find_reassessment/"+assessment_id,
			method: "GET",
			success: function(data) {
				//console.log(data)
				myBooks = JSON.parse(data);
				$.ajax({
					url: "../../find_answer/"+assessment_id+"/"+pros_id,
					method: "GET",
					success: function(data1) {
						console.log("Answerssss "+data1)
						//answers = JSON.parse(data);
						answers = data1;
						questionSet(myBooks,  answers)
					},	
				});
				
			},
		});
	function questionSet(myBooks, answers){
		//console.log('log2',myBooks)
		myBooks = JSON.parse(myBooks.assessment_json)
		var answer = answers
		var col = ['Question', 'Answer'];
		for (var m=0; m < myBooks['pages'].length; m++) {
		var questions = myBooks['pages'][0]['elements'];
		answer = answer['data'];
		var table = document.createElement("table");
		var tr = table.insertRow(-1);               

		for (var i = 0; i < col.length; i++) {
			var th = document.createElement("th");     
			th.innerHTML = col[i];
			tr.appendChild(th);
		}			
		questions.map((question, index) => {
			tr = table.insertRow(-1);
			col.map(val => {
				var tabCell = tr.insertCell(-1);
					if (val === 'Question'){
							tabCell.innerHTML = question.title;
					} else if (val === 'Answer') {
						if (question.type == 'dropdown') {
							var options = "";
							question.choices.map(option => {
								options += `<option value="${option['value']}">${option['text']}</option>`;
							});
							tabCell.innerHTML = `<select > ${options} </select>`;
						} else if (question.type === 'text') {
							tabCell.innerHTML = `<input type='text' />`;
						} else if (question.type === 'comment') {
							tabCell.innerHTML = `<textarea> </textarea>`;
						} else if (question.type === 'radiogroup'){
							var options =  "";
							question.choices.map(option => {
								options += `<input type="radio" name="gender" value="${option['value']}" checked> ${option['text']}<br>`;
							});
							tabCell.innerHTML = options;
						} else if (question.type === 'checkbox') {
							var option =  "";
							question.choices.map(option => {
								options += `<input type="checkbox" name="gender" value="${option['value']}" checked> ${option['text']}<br>`;
							});
							tabCell.innerHTML = options;
						}
					}
				});
			});
			
			var divContainer = document.getElementById("showData");
			divContainer.innerHTML = "";
			divContainer.appendChild(table);
		} 
	}	
	
</script>
@endsection
