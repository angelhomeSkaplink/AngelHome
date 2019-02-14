@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
</style>
<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
					<div class="col-md-12">
						<div class="box box-body">
							<form action="{{action('ScreeningController@add_pharmacy')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>Hospital</label>
										<input type="text" class="form-control" placeholder="" name="hospital" value="{{$data->hospital}}" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
									</div>
									<div class="form-group has-feedback">
										<label>Pharmacy</label>
										<input type="text" class="form-control" placeholder="" name="pharmacy" value="{{ $data->pharmacy }}" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
									</div>
									<div class="form-group has-feedback">
										<label>Mortuary</label>
										<input type="text" class="form-control" placeholder="" name="mortuary" value="{{ $data->mortuary }}"/>
									</div>
									<div class="form-group has-feedback">
										<label>Special Medical Needs</label>
										<input type="text" class="form-control" placeholder="" name="special_med_needs_pharmacy" value="{{ $data->special_med_needs_pharmacy }}" />
									</div>
								</div>
								<div class="col-md-6">
								    <div class="form-group has-feedback">
										<label>Hospital Phone No</label>
										<input type="number" class="form-control" placeholder="" name="phone_hospital" value="{{ $data->phone_hospital }}"/>
									</div>
									<div class="form-group has-feedback">
										<label>Pharmacy Phone No</label>
										<input type="number" class="form-control" placeholder="" name="phone_pharmacy" value="{{ $data->phone_pharmacy }}"/>
									</div>
									<div class="form-group has-feedback">
										<label>Mortuary Phone</label>
										<input type="number" class="form-control" placeholder="" name="phone2_mortuary" value="{{ $data->phone2_mortuary }}"/>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
								</br></br><br/>
								</div>
							</form>
						</div>
					</div>
  </div>
</div>
