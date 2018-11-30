@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    total revenue
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
	$(document).ready(function(){		
		var id = {{ $id }};
		$.ajax({
			url: "/angel_home/get_graph_data/"+id,
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
					window.location.replace( "/angel_home/facility_reports/"+id)
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
		width: 900px;
		height: auto;
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