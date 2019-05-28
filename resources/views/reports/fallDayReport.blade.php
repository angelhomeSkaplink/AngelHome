
@extends('layouts.app')

@section('htmlheader_title')
    Day Of Week and Shift Summary
@endsection

@section('contentheader_title')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var from = '<?php echo $earlier ?>'
    var to = '<?php echo $next ?>'
    $('#from_date').val(from);
    $('#to_date').val(to);
    pullData(); 
      $('#search').click(function(e){
        e.preventDefault();
        pullData();
      });
      $('#barChart').click(function(e){
        e.preventDefault();
        showGraph();
      });
  });
  function showGraph(){
    $('#loaderImage').removeClass('hidden');
    $('#toHide').addClass('hidden');
    $('#no_data').addClass('hidden');  
    $('#barChartDiv').addClass('hidden');  
        var from_date = $("input[name=from_date]").val();
        var to_date = $("input[name=to_date]").val();
        var backgroundColor = ["#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a1d3f9", "#ffff00", "#1a0000","#009933","#0000cc", "#cc0066", "#86592d"];
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'../fall_day_data',
            data:{from_date : from_date, to_date:to_date},
            success:function (data) {
                console.log(data);
                $('#loaderImage').addClass('hidden');
                
                $('#barChartDiv').removeClass('hidden');
                var response = JSON.parse(data);
              if(response[1]=='None'){
                $('#bar-chart').addClass('hidden');
                $('#no-data').removeClass('hidden');
              }
              else{

                var res_count1 = [];
								var label1 = [];
								var bg1 = [];
								var res_count2 = [];
								var label2 = [];
								var bg2 = [];
								response[0].forEach(function(elm,i){
									label1.push(elm.Label);
									res_count1.push(elm.CountGraph);
									bg1.push(backgroundColor[i]);
								})
								response[1].forEach(function(elm,i){
									label2.push(elm.Label);
									res_count2.push(elm.CountGraph);
									bg2.push(backgroundColor[i]);
								})
                var onClick = function (e) {
                    pullData(); 					
                    }
                new Chart(document.getElementById("bar-chart1"), {
                    type: 'bar',
                    data: {
                        labels: label1,
                        datasets: [
                        {
                            backgroundColor: bg1,
                            data: res_count1
                        }
                        ]
                    },
                    options: {
                        legend: { display: false },
                        scales :{ xAxes: [{
          					      ticks: { autoSkip: true },
														maxBarThickness: 60,
          					      }],
													yAxes:[{
														ticks: { beginAtZero: true },
													}],
          					     },
                        title: {
                        display: true,
                        text: 'FALLS FOR MONTH BY DAY OF THE WEEK'
                        },
                    onClick: onClick
                    }
                });
								new Chart(document.getElementById("bar-chart2"), {
                    type: 'bar',
                    data: {
                        labels: label2,
                        datasets: [
                        {
                            backgroundColor: bg2,
                            data: res_count2
                        }
                        ]
                    },
                    options: {
                        legend: { display: false },
                        scales :{ xAxes: [{
          					      ticks: { autoSkip: true },
											maxBarThickness: 60,
          					      }],
													yAxes:[{
														ticks: { beginAtZero: true },
													}],
          					     },
                        title: {
                        display: true,
                        text: 'FALLS FOR MONTH BY SHIFT'
                        },
                    onClick: onClick
                    }
                });
            }    
            }
        });
  }
  function pullData(){
    $('#loaderImage').removeClass('hidden');
    $('#barChartDiv').addClass('hidden');
    $('#toHide').addClass('hidden');
	$('#no_data').addClass('hidden');
    $('#resultTable').addClass('hidden');
        var from_date = $("input[name=from_date]").val();
        var to_date = $("input[name=to_date]").val();
        $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

        });

    $.ajax({

    type:'POST',

    url:'../fall_day_data',

    data:{from_date : from_date, to_date:to_date},

    success:function(data){
        $('#loaderImage').addClass('hidden');
        // $('#barChartDiv').addClass('hidden');
        $('#toHide').removeClass('hidden');
        $('#resultTable').removeClass('hidden');
        console.log(data);
        var response = JSON.parse(data);
        
        var responseText1 = document.getElementById('ajaxResult1');
				var responseText2 = document.getElementById('ajaxResult2');
        if (response[1]=='None') {
            $('#no_data').removeClass('hidden');
            $('#toHide').addClass('hidden');
        }
        else{   
            $('#no_data').addClass('hidden');
            $('#toHide').removeClass('hidden');
            responseText1.innerHTML = '';
            for (let index = 0; index < response[0].length; index++) {
            const element1 = response[0][index];
						responseText1.innerHTML +=
             `<tr>
                <td class="text-center">`+element1['Label']+`</td>
                <td class="text-center">`+element1['Count']+`</td>
                <td class="text-center">`+element1['Percentage']+`%</td>
             </tr>`
						}
						responseText2.innerHTML = '';
						for (let index = 0; index < response[1].length; index++) {
            const element2 = response[1][index];
						 responseText2.innerHTML +=
             `<tr>
                <td class="text-center">`+element2['Label']+`</td>
                <td class="text-center">`+element2['Count']+`</td>
                <td class="text-center">`+element2['Percentage']+`%</td>
             </tr>`

            }
        }
        
    }

    });
  }
</script>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
	    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Day Of Week and Shift Summary")</strong></h3>
    </div>
    <div class="col-lg-4 form-inline" style="padding-right:30px;">
        <span class="pull-right" style="padding-right:30px;">
            <button id="barChart" class="btn btn-success btn-sm" style="margin-right:15px;border-radius:5px;"><i class="material-icons">bar_chart</i>@lang("msg.View Graph")</button>
            <button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i>@lang("msg.Print")</button>
        </span>
    </div>
</div> 
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center form-inline">
            <input class="form-control" id="from_date" name="from_date" type="date" required>
            <input class="form-control" id="to_date" name="to_date" type="date" required>
            <button id="search" class="form-control btn btn-primary btn-submit" type="button"><i class="material-icons">search</i></button>
    </div>
</div>

@endsection

@section('main-content')

<style type="text/css">
	#chart-container {
		width: auto;
		height: auto;
		border: 1px solid darkred;
	}
</style>
<style>
    th,td {
        white-space:nowrap;
    }
    th{
        font-weight:bold !important;
    }
</style>
<style  type = "text/css" media = "screen">
	.print-header{ display:none; }
	.print-footer{ display:none; }
</style>
<style  type = "text/css" media = "print">
	.print-header{ display:block; }
	.print-footer{ display:block; }
</style>
<div class="container hidden" id="loaderImage">
    <div class="text-center box box-body"  style="height:430px;">
        <img id="" src="{{asset("hsfiles/public/img/preloaders.gif")}}" alt="">
    </div>
</div>
<div id="no_data" class="box text-center hidden"><h4 class="text-center" style="padding:60px;color:#b3b3b3 !important;">@lang("msg.Nothing To Preview")</h4></div>
<div id="toHide" class="container hidden">
    <div id="printableDiv" style="height:430px;">
        <div class="print-header">
					<div class="row">
						<div class="col-lg-12 text-center">
							<table>
								<tr style="border-bottom:5px solid #333">
									<td>
										@if($facility->facility_logo == NULL)
										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
										@else
										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility->facility_logo }}" />
										@endif
									</td>
									<td style="width:90%;" class="text-center">
										<h3><strong>@lang("msg.Day Of Week and Shift Summary")</strong></h3>
										<h4><strong>@lang("msg.Facility") :: {{ $facility->facility_name }}</strong></h4>
										<p><strong>{{ $facility->address }} {{ $facility->address_two }}</strong></p>
										<p><strong><i class="material-icons"> phone</i>{{ $facility->phone }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
											{{ $facility->facility_email }}
										</strong></p>
										<hr style="height:5px;border:none;color:#333;background-color:#333;">
									</td>
									<td style="width:5%;"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="box box-primary border hidden" id="resultTable">
					<div class="row">
					<div class="col-lg-6 text-center">
						<div class="box box-primary border padding-7">
							<div class="box-body border padding-top-0 padding-left-right-0 table-responsive">
							    <h4 class="text-center"><strong>@lang("msg.Falls By Day Of The Week")</strong></h4>
							    <hr>
								<table class="table table-hover" >
										<thead class="thead-light">
												<tr>
														<th class="text-center th-position text-uppercase font-500 font-12">@lang("msg.Day of Week")</th>
														<th class="text-center th-position text-uppercase font-500 font-12">#@lang("msg.By Day")</th>
														<th class="text-center th-position text-uppercase font-500 font-12">%@lang("msg.By Day")</th>
												</tr>
										</thead>
										<tbody class="table-striped" id="ajaxResult1">
										</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6 text-center">
						<div class="box box-primary border padding-7">
							<div class="box-body border padding-top-0 padding-left-right-0 table-responsive">
							    <h4 class="text-center"><strong>@lang("msg.Falls By Shift")</strong></h4>
							    <hr>
								<table class="table table-hover">
										<thead class="thead-light">
												<tr>
														<th class="text-center th-position text-uppercase font-500 font-12">@lang("msg.Shift")</th>
														<th class="text-center th-position text-uppercase font-500 font-12">#@lang("msg.By Shift")</th>
														<th class="text-center th-position text-uppercase font-500 font-12">%@lang("msg.By Shift")</th>
												</tr>
										</thead>
										<tbody class="table-striped" id="ajaxResult2">
										</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				</div>
        <div class="print-footer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table>
                        <tr>
                            <td style="width:90%;" class="text-center">
                                <h4><b>@lang("msg.Powered by") Senior Safe Technology LCC.</b></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="barChartDiv">
    <div class="col-md-6">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div id="chart-container">
    		     <canvas id="bar-chart1"></canvas>
                   <div class="text-center hidden" id="no-data">
                      <h4 class="text-center" style="padding:60px;color:#b3b3b3 !important;">@lang("msg.No Data Found To Depict Graph")</h4>
                   </div>
    			</div>
            </div>
        </div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
				<div id="chart-container">
					 <canvas id="bar-chart2"></canvas>
					 <div class="text-center hidden" id="no-data">
							<h4 class="text-center" style="padding:60px;color:#b3b3b3 !important;">@lang("msg.No Data Found To Depict Graph")</h4>
					 </div>
				</div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload(true);
	}
</script>
@endsection