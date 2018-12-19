
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
     <p class="text-danger"><b>sales report of each facility</b><a href="{{ url('facility_aggregated_sales_report') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:230px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i> aggregated group report</a>
	</p>
@endsection

@section('main-content')
<style>	
	.content-header{
		padding: 2px 0px 0px 20px;
		margin-bottom: -18px;
	}	
</style>
<!--<div class="row">
	<form action="inquiery_reports" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">From Date</label>
				<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
				<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">To Date</label>
				<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
				<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>			
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> Search
				</button>
			</div>			
		</div>
	</form>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>-->
<div class="row">
    <div class="col-md-12">	
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Facility")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Address")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Email")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Details")</th>
						</tr>
						@foreach ($facilities as $facility)
						<tr>
							<td>{{ $facility->facility_name }}</a></td>
							<td>{{ $facility->address }}</td>
							<td>{{ $facility->phone }}</td>
							<td>{{ $facility->facility_email }}</td>
							<td class="padding-left-45"><a href="facility_sales_reports_detail/{{ $facility->id }}">
								<i class="material-icons material-icons md-22 gray"> visibility </i></a>
							</td>		
						</tr>
						@endforeach
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection