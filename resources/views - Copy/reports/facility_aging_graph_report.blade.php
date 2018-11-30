@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    AGING GRAPH
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
	$(document).ready(function(){		
		var id = {{ $id }};
		$.ajax({
			url: "/angel_home/facility_aging_graph_data/"+id,
			method: "GET",
			success: function(data) {
				var ammount_pay = [];
				JSON.parse(data).forEach(function(elm,i){
					ammount_pay.push(elm.ammount_pay);
				})
				
				new Chart(document.getElementById("bar-chart"), {
					type: 'bar',
					data: {
					  labels: ["0-29 DAYS", "30-59 DAYS", "60-89 DAYS", "90+ DAYS"],
					  datasets: [
						{
						  backgroundColor: ["#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
						  data: [9000,9000,22000,40000]
						}
					  ]
					},
					options: {
					  legend: { display: false },
					  title: {
						display: true,
						text: 'AGING REPORT'
					  }
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
					<canvas id="bar-chart"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection