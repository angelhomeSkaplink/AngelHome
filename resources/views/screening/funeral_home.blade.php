<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
			<form action="{{action('ScreeningController@add_funeralhome')}}" method="post">
				<input type="hidden" name="_method" value="PATCH">
				{{ csrf_field() }}
				<div class="box box-body">
					<div class="col-md-6">
						<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>
						<label>NAME</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_home" value="{{ $data->funeral_home }}" pattern="[A-Za-z\s]+" required />
						</div>
						<label>PHONE</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" name="funeral_phone" value="{{ $data->phone }}" required />
						</div>
					</div>
					<div class="col-md-6">
					    <label>City</label>
					    <div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_city" value="{{ $data->city }}" pattern="[A-Za-z\s]+" required />
						</div>
						<label>Address</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_address" value="{{ $data->address }}" required />
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
						</div>
						<div class="form-group has-feedback">
							<a type="button" href="{{ url('screening/'.$id) }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
						</div>
						<br><br><br/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
