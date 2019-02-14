@extends('layouts.app')

@section('htmlheader_title')
Attendee Report Graph
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Attendee Report Graph</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('activity_report') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">details</i>Back</a>
    </div>
</div>
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
		// console.log(id);
		$.ajax({
			url: "/attendee_report_graph_data/"+id,
			method: "GET",
			success: function(data) {
				// console.log(data);
				var attenedee_number = [];
				JSON.parse(data).forEach(function(elm,i){
					attenedee_number.push(elm.attenedee_number);
				})

				var onClick = function (e) {
					// window.location.replace( "/angel_home/facility_room_reports/"+id)
          window.location.replace()
				}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',
					data: {
						labels: ["ACTIVE","PASSIVE","ABSENT","ABSORBED"],
						datasets: [{
							label: "EVENTS ATTENDEE STATUS",
							backgroundColor: ["#42a5f5", "#ef9a9a","#efa123","#12efac"],
							data: attenedee_number
						}]
					},
					options: {
						title: {
							display: true,
							text: 'EVENTS ATTENDEE STATUS'
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
