
@extends('layouts.app')

@section('htmlheader_title')
    Events Details
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Event Details</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<br/>

<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
	.user_info{
		    display: flex;
    justify-content: space-between;
	}
	.modal-title{
				    display: flex;
    justify-content: space-between;
	}
</style>
<script>
	$(document).ready(function(){
        $("#roomModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $.get( 'view_activity/' + id, function( data ) {
				var products  = JSON.parse(data);
				var $template = ''; 		
						
				products.forEach((product, index) => {
					var name = 	product.pros_name.split(",");			
					$template += `
					<div class="user_info">						
						<h4>${name[0]} ${name[1]} ${name[2]}</h4>
						<h4>${product.attenedee_status}</h4>
					</div>
				`;					
					console.log(product);
				});	
				$(".modal-body").html($template);
            });

        });
    });
</script>
<div class="row">
	<div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Event")</b></th>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Date")</b></th>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Venue")</b></th>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.View Attendee")</b></th>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Graph")</b></th>
							</tr>
							@foreach ($events as $side_event)
							<tr>
								<td>{{ $side_event->event_name }}</td>								
								<td>{{ $side_event->event_date }}</td>
								<td>{{ $side_event->event_place }}</td>
								<!--<td><a href="view_attendee/{{ $side_event->event_id }}" class="btn btn-link">View Attendee</a></td>-->
								<td><button type="button" class="btn btn-link" id="{{ $side_event->event_id }}" data-toggle="modal" data-target-id="{{ $side_event->event_id }}"  data-target="#roomModal"><i class="glyphicon glyphicon-search"></i></button></td>
								<!--<td><a href="activity_graph/{{ $side_event->event_id }}"><i class="material-icons material-icons md-22 gray"> visibility </i></a></td>-->
								<td><a href="attendee_report_graph/{{ $side_event->event_id }}"><i class="material-icons material-icons md-22 gray"> visibility </i></a></td>

							</tr>
							@endforeach
                        </tbody>
                    </table>	
					<div class="text-center">{{ $events->links() }}</div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel"><b>#</b><b>@lang("msg.Attendee")</b> <b></b></h4>				
			</div>
			
			<div class="modal-body">
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang("msg.Close")</span></button><br/>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')

@endsection