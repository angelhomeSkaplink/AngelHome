
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
    @lang("msg.New Resident")
@endsection

@section('main-content')
<style>	
	.content-header
	{
		display:none;
	}
	.content {
		margin-top: 0px;
	}
</style>
<div class="row">	
	<form action="{{action('ProspectiveController@change_pro_record')}}" method="post" enctype="multipart/form-data">					
	<input type="hidden" name="_method" value="PATCH">
	{{ csrf_field() }}
	<div class="col-md-4">
		<div class="box box-primary">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			<div class="box-body">					
				
				<input type="hidden" class="form-control" name="pros_id" value="{{ $row->pros_id }}"  />
				<?php $name = DB::table('sales_pipeline')->where('id', $row->pros_id)->first(); ?>
				<div class="form-group has-feedback">
					<label>@lang("msg.Name")</label>
					<input type="text" class="form-control" value="{{ $name->pros_name }}" readonly />
				</div>				
				<div class="form-group has-feedback">
					<label>@lang("msg.Phone No")</label>
					<input type="text" class="form-control" value="{{ $row->phone_p }}" name="phone_p" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"  />
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
					<input type="text" class="form-control" value="{{ $row->city_p }}" name="city_p" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />						
				</div>-->
				<div class="form-group has-feedback">
					<label>@lang("msg.Zip")</label>
					<input type="number" class="form-control" value="{{ $row->zip_p }}" name="zip_p" pattern="[0-9]" Title="Numeric Value."  />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group has-feedback">
					<label>@lang("msg.Contact Person")</label>
					<input type="text" class="form-control" value="{{ $row->contact_person }}" name="contact_person" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div> 
				<div class="form-group has-feedback">
					<label>@lang("msg.Phone")</label>
					<input type="text" class="form-control" value="{{ $row->phone_c }}" name="phone_c" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"  />
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
					<input type="text" class="form-control" value="{{ $row->city_c }}" name="city_c" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
						
				</div>-->
				<div class="form-group has-feedback">
					<label>@lang("msg.Zip")</label>
					<input type="number" class="form-control" value="{{ $row->zip_c }}" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
				</div>
					
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group has-feedback">
					<label>@lang("msg.Relation")</label>
					<input type="text" class="form-control" value="{{ $row->relation }}" name="relation" id="relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Source")</label>
					<input type="text" class="form-control" value="{{ $row->source }}" name="source" id="source" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>	
				<div class="form-group has-feedback">
						<label>@lang("msg.Photograph")</label>
						<input type="file" class="form-control" name="service_image" id="service_image" value="{{ $name->service_image }}"/>
					</div>
				<div class="form-group has-feedback">
            		<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            	</div>

				<div class="form-group has-feedback">
                    <a href="{{  url('sales_stage_pipeline') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
       			</div><br/><br/><br/>

			</div>
		</div>
	</div>
	</form>
</div>

    @include('layouts.partials.scripts_auth')

@endsection
