
@extends('layouts.app')

@section('htmlheader_title')
    GPF Percentage Update
@endsection

@section('contentheader_title')
    GPF Percentage Update
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>

<div class="row">
	<form action="../gpf_update_store" method="post">
		{{ csrf_field() }}
		<div class="col-md-4">
			<div class="box box-primary">
				
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="service_id" value="{{ $row->service_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_id" value="{{ $row->emp_id }}" readonly />
					</div>	
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="dept_id" value="{{ $row->dept_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="post_id" value="{{ $row->post_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_type" value="{{ $row->emp_type }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="application_id" value="{{ $row->application_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="glsi" value="{{ $row->glsi }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="initialpay" value="{{ $row->initialpay }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="city_allowance" value="{{ $row->city_allowance }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="da" value="{{ $row->da }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="basic_pay" value="{{ $row->basic_pay }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="hra" value="{{ $row->hra }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="scaleId" value="{{ $row->scaleId }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_pf_category" value="{{ $row->emp_pf_category }}" readonly />
					</div>
					<div class="form-group has-feedback">
						GPF Amount
						<input type="text" class="form-control" name="gpf_persentage" value="{{ $row->gpf_persentage }}" required pattern="[0-9]+"/>
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="nps_persentage" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="action" value="GPF Percentage Update" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="doa" value="{{$row->doa}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="doj" value="{{$row->doj}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="service_image" value="{{$row->service_image}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="dop" value="{{$row->dop}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="dol" value="{{$row->dol}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="doi" value="{{$row->doi}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="dor" value="{{$row->dor}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="remarks" value="{{$row->remarks}}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="status" value="1" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="casual_pay" value="0" readonly />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
				</div>				
			</div>
		</div>		
	</form>
</div>
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@include('layouts.partials.scripts_auth')

@endsection
