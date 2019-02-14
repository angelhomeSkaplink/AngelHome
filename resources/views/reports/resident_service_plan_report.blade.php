@extends('layouts.app')

@section('htmlheader_title')
    Resident Service Plan
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Resident Service Plan Graph Report</strong></h3>
	</div>
</div>@endsection

@section('main-content')
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
var backgroundColor = ["#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a1d3f9", "#ffff00", "#1a0000","#009933","#0000cc", "#cc0066", "#86592d"];
	$(document).ready(function(){
		$.ajax({
			url: "/resident_service_plan_graph_data/",
			method: "GET",
			success: function(data) {
        var response = JSON.parse(data);
        console.log(response);
        if(response[1]=='None'){
          $('#bar-chart').addClass('hidden');
          $('#no-data').removeClass('hidden');
        }else{
  				var res_count = [];
          var label = [];
          var bg = [];
          var j=0;
  				response.forEach(function(elm,i){
            if(i%2==0){
              res_count.push(elm);
            }else{
              label.push(elm);
              bg.push(backgroundColor[j]);
              j=j+1;
            }
  				})
          res_count.push(0);
          var onClick = function(c,i) {
                if(i.length>0){
                  e = i[0];
                  console.log(e._index);
                  var plan = this.data.labels[e._index];
                  var count = this.data.datasets[0].data[e._index];
                  console.log(plan);
                  console.log(count);
                  window.location.replace("../residents_in_each_service_plan/"+plan);
                }
          }
  				new Chart(document.getElementById("bar-chart"), {
  					type: 'bar',
  					data: {
  					  labels: label,
  					  datasets: [
  						{
  						  backgroundColor: bg,
  						  data: res_count
  						}
  					  ]
  					},
  					options: {
  					  legend: { display: false },
  					  title: {
  						display: true,
  						text: 'Resident Service Plan Graph Report'
            },
            onClick: onClick
  					}
  				});
        }
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
                       <div class="text-center hidden" id="no-data">
                          <h4 class="text-center" style="padding:60px;color:#b3b3b3 !important;">No data found to depict graph</h4>
                       </div>
        				</div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection
