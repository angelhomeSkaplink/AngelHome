@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Facility Aging Graph Report")</b>
	<a href="{{ url('aging_report') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i> @lang("msg.Back")</a>
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
			url: "facility_aggregated_aging_graph_data",
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
						  //data: [9000,9000,22000,40000]
						  data: ammount_pay
						}
					  ]
					},
					options: {
					  legend: { display: false },
					  title: {
						display: true,
						text: 'FACILITY AGING GRAPH REPORT'
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
					<canvas id="bar-chart"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection