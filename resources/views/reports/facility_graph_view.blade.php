@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Total Revenue Graph Report</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('total_revenue') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
		$.ajax({
			url: "/get_graph_data/"+id,
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
					window.location.replace( "../facility_reports/"+id)
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