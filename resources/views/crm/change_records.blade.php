@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
    <div class="row">
  <div class="col-lg-4 offset-lg-4 text-center">
      <h3><strong>@lang("msg.Inquiry Form")</strong></h3>
  </div>
  <div class="col-lg-4 pull-right">
  <div class="col-md-6">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('change_pro_records/'.$row->id)}}">Sales Pipeline</option>
        <option value="{{url('reschedule/'.$row->id)}}">Appointment Schedule</option>
        <option value="{{url('screening/'.$row->id)}}">Screening</option>
        <option value="{{url('select_assessments/Initial/'.$row->id)}}">Assessment</option>
        <option value="{{url('change_own_room/'.$row->id)}}">Room Book</option>
      </select>
    </div>
    <div class="col-md-6">
        <h2 class="pull-right"><button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></h2>
    </div>
  </div>
</div>
@endsection

@section('main-content')

<div class="row">
	<form action="{{action('ProspectiveController@change_pross_records')}}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="PATCH">
	{{ csrf_field() }}
	<div class="col-md-4">
		<div class="panel panel-default">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			@php
			    $n = explode(",", $row->pros_name);
			    $m = explode(",",$row->contact_person);
			@endphp
			<div class="panel-body border padding-7">
				<h4 class="text-center">@lang("msg.Future Resident")</h4>
				<input type="hidden" class="form-control" name="pros_id" value="{{ $row->id }}"  />

				<div class="row">
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label>@lang("msg.First Name")</label>
					<input type="text" class="form-control" name="pros_name[]" value="{{ $n[0] }}" />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label>@lang("msg.Middle Name")</label>
					<input type="text" class="form-control" name="pros_name[]" value="{{ $n[1] }}" />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group has-feedback">
						<label>@lang("msg.Last Name")</label>
						<input type="text" class="form-control" name="pros_name[]" value="{{ $n[2] }}" />
					</div>
				</div>
				</div>	
				<div class="form-group has-feedback">
					<label>@lang("msg.Phone No")</label>
					<input type="text" class="form-control" value="{{ $row->phone_p }}" name="phone_p" pattern="[0-9]{10}" />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Email")</label>
					<input type="email" class="form-control" value="{{ $row->email_p }}" name="email_p"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Address") 1</label>
					<input type="text" class="form-control" value="{{ $row->address_p }}" name="address_p"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Address") 2</label>
					<input type="text" class="form-control" value="{{ $row->address_p_two }}" name="address_p_two"  />
				</div>

				<div class="form-group has-feedback">
					<label>@lang("msg.City")</label>
					<input type="text" class="form-control" value="{{ $row->city_p }}" name="city_p" required pattern="[A-Za-z\s]+" />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
				</div>-->
				<div class="form-group has-feedback">
					<label>@lang("msg.Zip")</label>
					<input type="number" class="form-control" value="{{ $row->zip_p }}" name="zip_p" pattern="[0-9]" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">				
			<div class="panel-body border padding-7">
				<h4 class="text-center">@lang("msg.Contact Person")</h4>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label>@lang("msg.First Name")</label>
							<input type="text" class="form-control" value="{{ $m[0] }}" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label>@lang("msg.Middle Name")</label>
							<input type="text" class="form-control" value="{{ $m[1] }}" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-feedback">
							<label>@lang("msg.Last Name")</label>
							<input type="text" class="form-control" value="{{ $m[2] }}" name="contact_person[]" required pattern="[A-Za-z\s]+"/>
						</div>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Phone")</label>
					<input type="text" class="form-control" value="{{ $row->phone_c }}" name="phone_c" pattern="[0-9]{10}" />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Email")</label>
					<input type="email" class="form-control" value="{{ $row->email_c }}" name="email_c"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Address") 1</label>
					<input type="text" class="form-control" value="{{ $row->address_c }}" name="address_c"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Address") 2</label>
					<input type="text" class="form-control" value="{{ $row->address_c_two }}" name="address_c_two"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.City")</label>
					<input type="text" class="form-control" value="{{ $row->city_c }}" name="city_c" required pattern="[A-Za-z\s]+"/>
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />

				</div>-->
				<div class="form-group has-feedback">
					<label>@lang("msg.Zip")</label>
					<input type="number" class="form-control" value="{{ $row->zip_c }}" name="zip_c" pattern="[0-9]" />
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body border padding-7">
				<div class="form-group has-feedback">
					<label>@lang("msg.Relation")</label>
					<input type="text" class="form-control" value="{{ $row->relation }}" name="relation" id="relation" pattern="[A-Za-z\s]+" />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Source")</label>
					<input type="text" class="form-control" value="{{ $row->source }}" name="source" id="source" pattern="[A-Za-z\s]+"/>
				</div>
				<div class="form-group has-feedback">
						<label>@lang("msg.Photograph")</label>
						<input type="file" class="form-control" name="service_image" id="service_image" value="{{ $row->service_image }}"/>
					</div>
					<div class="row">
						<div class="col-md-6 text-center">
							<div class="form-group has-feedback">
								<a href="{{  url('sales_pipeline') }}" class="btn btn-danger btn-flat btn-width" style="margin-right:15px">@lang("msg.Cancel")</a>
				 			</div>
						</div>
						<div class="col-md-6 text-center">
							<div class="form-group has-feedback">
            		<button type="submit" class="btn btn-success btn-flat btn-width">@lang("msg.Submit")</button>
            	</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	</form>
</div>
<div class="hidden" id="printableDiv">
  <div class="row">
      <div class="col-lg-12">
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
                    <h3><strong>Inquiry Report</strong></h3>
                    <h4><strong>Facility :: {{ $facility->facility_name }}</strong></h4>
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
          <div class="row">
            <div class="col-lg-12">
              <h4><strong>Inquirer:
                @if($row->service_image == NULL)
                  <img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                @else
                  <img src="hsfiles/public/img/{{ $row->service_image }}" class="img-circle" width="40" height="40">
                @endif
                {{ $row->pros_name }}</strong></h4>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <!-- <h4><strong>Inquirer</strong></h4> -->
      <div class="table-responsive">
        <table class="table">
            <tr>
              <!-- <td> <strong>Name</strong>  :{{ $row->pros_name }}</td> -->
              <td> <strong>Phone No.</strong>: {{ $row->phone_p }} </td>
              <td> <strong>Email</strong>: {{ $row->email_p }}</td>
              <td> <strong>Address 1</strong>: {{ $row->address_p }}</td>
            </tr>
            <tr>
              <td> <strong>Address 2</strong>: {{ $row->address_p_two }}</td>
              <td> <strong>City</strong>: {{ $row->city_p }}</td>
              <td> <strong>Zip</strong>: {{ $row->zip_p }} </td>
            </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="box box-primary">
    <div class="box-body">
      <h4><strong>Contact Person</strong></h4>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <td> <strong>Name</strong>  :{{ $row->contact_person }}</td>
              <td> <strong>Phone No.</strong>: {{ $row->phone_c }} </td>
              <td> <strong>Email</strong>: {{ $row->email_c }}</td>
            </tr>
            <tr>
              <td> <strong>Address 1</strong>: {{ $row->address_c }}</td>
              <td> <strong>Address 2</strong>: {{ $row->address_c_two }}</td>
              <td> <strong>City</strong>: {{ $row->city_c }}</td>
            </tr>
            <tr>
              <td> <strong>Zip</strong>: {{ $row->zip_c }} </td>
              <td></td>
              <td></td>
            </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <h4><strong>Relation:</strong> {{ $row->relation }}</h4>
      <h4><strong>Source:</strong> {{ $row->source }}</h4>
    </div>
  </div>

  <div class="print-footer" style="border-top:5px solid #333;">
    <!-- <hr style="height:5px;border:none;color:#333;background-color:#333;"> -->
    <div class="row">

      <div class="col-lg-12 text-center">
			<table>
          <tr>
            <td style="width:90%;" class="text-center">
              <h4 ><b>Powered by Senior Safe Technology LLC.</b></h4>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
    window.reload();
	}
</script>
@include('quick_link.quicklink')
@endsection
