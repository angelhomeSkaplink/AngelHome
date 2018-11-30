@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>aggregated room report of the group {{ $group->group_name }}</b><a href="{{ url('room_reports') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i>back</a>
	</p>
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
		$.ajax({
			url: "facility_aggregated_room_graph_data",
			method: "GET",
			success: function(data) {
				console.log(data);
				var vacant_position = [];
				JSON.parse(data).forEach(function(elm,i){
					vacant_position.push(elm.vacant_position);
				})

				var onClick = function (e) {
					window.location.replace( "facility_aggregated_room_status")					
				}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',					
					data: {
						labels: ["OCCUPIED","VACANT"],
						datasets: [{
							label: "FACILITY ROOM GRAPH REPORT",
							backgroundColor: ["#42a5f5", "#ef9a9a",],
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
		width: auto;
		height: auto;
		border: 1px solid darkred;
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