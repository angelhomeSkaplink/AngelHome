@extends('layouts.app')

@section('htmlheader_title')
     @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
     @lang("msg.Facility Task Sheet")
@endsection

@section('main-content')
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
</style>
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
	$(document).ready(function(){		
		var id = {{ $id }};
		console.log(id);
		$.ajax({
			url: "/facility_task_graph_data/"+id,
			method: "GET",
			success: function(data) {
				console.log(data);
				var person_required = [];
				var title =[];
				JSON.parse(data).forEach(function(elm,i){
					person_required.push(elm.person_required);
					title.push(elm.title);
					
				})

				//var onClick = function (e) {
					//window.location.replace( "/angel_home/facility_task_reports/"+id)					
				//}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',					
					data: {
						labels: title,
						datasets: [{
							backgroundColor: ["#42a5f5","#ef9a9a","#4B515D","#ab47bc","#7986cb","#26a69a","#795548"],
							data: person_required
						}]
					},
					options: {
						title: {
							display: true,
							text: 'TASK SHEET STATUS'						
						},
						//onClick: onClick					  
					}
				});				
			},			
			
			error: function(data) {
				console.log(data);
			}
		});
	});
</script>

<style type="text/css">
	#chart-container {
		width: auto;
		height: auto;
	}
</style>

<div class="row">
    <div class="col-md-12">	
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div id="chart-container">
					<canvas id="pie-chart" ></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection