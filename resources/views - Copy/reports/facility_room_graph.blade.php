@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    Room status
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
	$(document).ready(function(){		
		var id = {{ $id }};
		console.log(id);
		$.ajax({
			url: "/angel_home/facility_room_graph_data/"+id,
			method: "GET",
			success: function(data) {
				console.log(data);
				var vacant_position = [];
				JSON.parse(data).forEach(function(elm,i){
					vacant_position.push(elm.vacant_position);
				})

				var onClick = function (e) {
					window.location.replace( "/angel_home/facility_room_reports/"+id)					
				}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',					data: {
					  labels: ["VACANT", "OCCUPIED"],
					  datasets: [{
						label: "FACILITY ROOM STATUS",
						backgroundColor: ["#ef9a9a", "#42a5f5"],
						data: vacant_position
					  }]
					},
					options: {
					  title: {
						display: true,
						text: 'FACILITY ROOM STATUS'						
					  },
					  onClick: onClick					  
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
		width: 750px;
		height: auto;
	}
</style>

<div class="row">
    <div class="col-md-12">	
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div id="chart-container">
					<canvas id="pie-chart"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection