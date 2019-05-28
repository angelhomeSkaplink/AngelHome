@extends('layouts.app')

@section('htmlheader_title')
    Charge Allowance Update
@endsection

@section('contentheader_title')
    Charge Allowance Update
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="../update_charge_allow" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Charge Allowance Update</h3>
				</div>
				<div class="box-body"> 
					{!! csrf_field() !!}
					<input type="hidden" class="form-control" name="charge_allo_id" value="{{ $row->charge_allo_id }}" readonly />
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="emp_id" value="{{ $row->emp_id }}" readonly />
					</div>	
						
					<div class="form-group has-feedback">
						Amount
						<input type="text" class="form-control" name="amount" value="{{ $row->amount }}" />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Go</button>
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