@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Aggregated Report Of The Group") {{ $group->group_name }}</b><a href="{{ url('total_revenue') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i>@lang("msg.Back")</a>
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
			url: "facility_aggregated_revenue_graph_data",
			method: "GET",
			success: function(data) {
				console.log(data);
				var month = [];
				var ammount_pay = [];
				JSON.parse(data).forEach(function(elm,i){
					month.push(elm.month);
					ammount_pay.push(elm.ammount_pay);
				})

				var onClick = function (e) {
					window.location.replace( "facility_aggregated_revenue_details")
				}
				
				var chartdata = {
					labels: month,
					
					datasets : [
						{
							label: 'TOTAL REVENUE',
							backgroundColor: '#90caf9',
							borderColor: 'rgba(200, 200, 200, 0.75)',
							hoverBackgroundColor: '#1565c0',
							hoverBorderColor: 'rgba(200, 200, 200, 1)',
							data: ammount_pay,
						}
					]
				};

				var ctx = $("#mycanvas");

				var barGraph = new Chart(ctx, {
					type: 'bar',
					data: chartdata,
					options :{
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
					<canvas id="mycanvas"></canvas>
				</div>    
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection