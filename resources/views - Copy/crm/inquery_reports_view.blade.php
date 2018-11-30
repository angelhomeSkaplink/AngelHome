
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Inquiry Reports
@endsection

@section('main-content')
    <div class="row">
		<form action="inquiery_reports" method="post" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="col-md-2">
				<div class="form-group has-feedback">
					<label class="sm-heading">From Date</label>
					<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
					<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>			
			</div>
			<div class="col-md-2">
				<div class="form-group has-feedback">
					<label class="sm-heading">To Date</label>
					<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
					<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group has-feedback">
					<label>Prospectives</label><br/>
					<select name="id" id="id" class="myselect" style="width:100%; height: 34px;">
						<option value="">Select Prospective</option>
						@foreach ($prospectives as $prospective)
						<option value="{{ $prospective->id}}">{{ $prospective->pros_name }}</option>
						@endforeach
					</select>
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group has-feedback">
					<label class="sm-heading">Sales Stage </label>
					<select name="sales_stage" id="sales_stage" class="form-control" >
						<option value="">Select Sales Stage</option>
						<option value="Discovery">Discovery</option>
						<option value="Tour">Tour</option>
						<option value="Re-Tour">Re-Tour</option>
						<option value="Signing">Signing</option>
						<option value="Move In">Move In</option>
					</select>
				</div>			
			</div>
			<div class="col-md-2">
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
	</script>
	<div class="row">
	<br/>
        <div class="col-md-12">	
		<h4 class="font-15">Prospects Report from {{ $from }} to {{ $to }}</h4> 	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Date</th>
								<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
								<th class="th-position text-uppercase font-500 font-12">Note</th>
								<th class="th-position text-uppercase font-500 font-12">Method of Communication</th>
								<th class="th-position text-uppercase font-500 font-12">work done by</th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								<td><a href="view_records/{{ $report->id }}" style="text-decoration:underline; color:#333">{{ $report->pros_name }}</a></td>
								<td>{{ $report->phone_p }}</td>
								<td>{{ $report->date }}</td>
								<td>{{ $report->sales_stage }}</td>
								<td>{{ $report->notes }}</td>
								<td>{{ $report->moc }}</td>	
								<?php 
									$user = DB::table('users')->where([['user_id', $report->marketing_id]])->first();{
								?>
								<td>{{ $user->firstname }} {{ $user->lastname }}</td>
								<?php } ?>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="prospect_date_btween_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($reports) }}">
						<button class="btn btn-info pull-right" style="margin-top:15px; margin-bottom:15px; margin-right:7px" type="submit">Export Data to Excel <i class="material-icons md-22" aria-hidden="true"> description </i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection