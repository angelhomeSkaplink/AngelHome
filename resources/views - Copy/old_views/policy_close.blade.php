@extends('layouts.app')

@section('htmlheader_title')
    Policy Close
@endsection

@section('contentheader_title')
    Policy Close
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">  
	<form action="{{action('PostController@close_policy')}}" method="post"> 
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body"> 
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="asset_id" value="{{ $row->asset_id }}" />
					</div>
					<div class="form-group has-feedback">
						Policy No
						<input type="text" class="form-control" name="policy_no" value="{{ $row->policy_no }}" readonly />
					</div>					
					<div class="form-group has-feedback">
						Amount
						<input type="text" class="form-control" name="ammount" value="{{ $row->ammount }}" readonly />
					</div>
					<div class="form-group has-feedback">	
						Maturity date
						<input type="text" class="form-control" name="" id="" value="{{ $row->policy_date }}" readonly />
					</div>
					<div class="form-group has-feedback">	
						Closing date
						<input type="text" class="form-control" name="policy_date" id="policy_date"  />
						<script type="text/javascript"> $('#policy_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						Remark
						<input type="text" class="form-control" name="remarks" value="{{ $row->remarks }}" />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div>
					</div>				
				</div>
			</div>
		</div> 
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection