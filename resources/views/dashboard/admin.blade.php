<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2" >
                <div class="panel zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#29a3a3;padding-top:40px;color:#fff;">
                        Tile 1
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-default zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#003300;padding-top:40px;color:#fff;">
                        Tile 2
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#337ab7;padding-top:40px;color:#fff;">
                        Tile 3
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#804000;padding-top:40px;color:#fff;">
                        Tile 4
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#4d004d;padding-top:40px;color:#fff;">
                        Tile 5
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary zoom">
                    <div class="panel-body box-body text-center" style="height:100px;background-color:#ff6666;padding-top:40px;color:#fff;">
                        Tile 6
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="facility_room_graph/{{ $id }}">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> ROOM REPORT</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        <div id="cchart-container">
                                <canvas id="pie-chart" style="width:200px !important; height:auto !important;"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                <a href="">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> DIET MENU</strong></h4>
                    </div>
                </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        Menu Content
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="activity_calendar">
                    <div class="panel-heading wiget-head text-center">
                        <h4><strong> ACTIVITY CALENDAR</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body make-scrollable">
                    <?php 
                        $todayWithDay= date("D d-m-Y", time());
                        $today= date("Y-m-d", time());
                        $data = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->where('event_date',$today)->get();
                        // $data = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->get();
                    ?>    
                    <h4 class="text-center" style="margin-top:0px;"><u>{{ $todayWithDay }}</u></h4>
                    @if($data->isEmpty())
                        <h4 class="text-center" style="padding-top:50px;"><span style="color:#b3b3b3;">No event found</span></h4>
                    @else
                        @foreach ($data as $e)
                            <div style="border-bottom:1px solid #e3e3e3;">
                            <span class="" style="color:#999999;"> <i class="material-icons">access_time</i> {{ $e->event_time }}</span> 
                                <h5> 
                                <span style="color:#337ab7;">{{ $e->event_name}}:</span>
                                <span style="padding-left:2px;color:#999999;padding-top:0px;text-transform:lowercase;">{{ $e->event_description}}</span>
                                </h5>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="appointment_schedule">
                    <div class="panel-heading wiget-head text-center" style="">
                        <h4><strong> APPOINTMENTS</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body make-scrollable">
                        <?php
                        $today= date("Y-m-d", time());
                        $appointments = DB::table('appointment')
                                ->where('appointment.status', 1)
                                ->where('appointment_date', $today)
                                ->Join('sales_pipeline', 'appointment.pros_id', '=', 'sales_pipeline.id')
                                ->where('sales_pipeline.facility_id', Auth::user()->facility_id)
                                ->select('sales_pipeline.pros_name', 'sales_pipeline.service_image', 'sales_pipeline.id', 'appointment.appoiuntment_id', 'appointment.pros_id', 'appointment.appointment_date', 'appointment.appointment_time')->get();
                        ?>
                        @if($appointments->isEmpty())
                        <h4 class="text-center" style="padding-top:50px;"><span style="color:#b3b3b3;">No appointment found</span></h4>
                        @endif
                        @foreach ($appointments as $a)
                        <div class="row" style="border-bottom:1px solid #e3e3e3;padding:5px;">
                            <div class="col-lg-3">
                            @if($a->service_image == NULL)
                                <img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                                @else
                                <img src="hsfiles/public/img/{{ $a->service_image }}" class="img-circle" width="40" height="40">
                            @endif
                            </div>
                            <div class="col-lg-9">
                                <p style="padding-top:10px;">{{$a->pros_name}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> WIDGET TITLE</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        Content
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> WIDGET TITLE</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        Content
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> WIDGET TITLE</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        Content
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default zoom">
                    <a href="">
                    <div class="panel-heading wiget-head text-center"> 
                        <h4><strong> WIDGET TITLE</strong></h4>
                    </div>
                    </a>
                    <div class="panel-body box-body text-center make-scrollable">
                        Content
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript" language="javascript" src="{{ asset('/js/chart/Chart.min.js') }}"></script>
<script>
	$(document).ready(function(){		
		var id = {{ $id }};
		console.log(id);
		$.ajax({
			url: "/facility_room_graph_data/"+id,
			method: "GET",
			success: function(data) {
				console.log(data);
				var vacant_position = [];
				JSON.parse(data).forEach(function(elm,i){
					vacant_position.push(elm.vacant_position);
				})

				var onClick = function (e) {
					window.location.replace( "../facility_room_reports/"+id)					
				}
				new Chart(document.getElementById("pie-chart"), {
					type: 'pie',					
					data: {
						labels: ["VACANT","OCCUPIED"],
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