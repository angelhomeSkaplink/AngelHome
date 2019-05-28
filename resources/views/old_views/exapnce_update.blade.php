@extends('layouts.app')

@section('htmlheader_title')
    Expences
@endsection

@section('contentheader_title')
   Expences
@endsection

@section('header-extra')

@stop

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Expences
                </div>
                <div class="box-body">
					<form action="../ex_update"  method="post">  
						{!! csrf_field() !!}
                    <table class="table table-bordered">					
                        <tbody>
							<?php 
								$rows = DB::table('servicebooks')->where('status', '1')->orderBy('service_id', 'asc')->get();	
								$i=1;
							?>						
							<tr>
								<td><input type="text" class="form-control" placeholder="" name="expance" id="expance" value="{{ $data }}" readonly /></td>
								<td><input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" data-validation="number" data-validation-error-msg="Numeric Field Only" /></td>
								<td><input type="text" class="form-control" placeholder="Remarks" name="remarks" id="remarks" /></td>
								<td>
									<input type="text" class="form-control" placeholder="Date" name="date" id="date" onkeyup="getdateofretirement();" data-validation="required" data-validation-error-msg="This Field is Required"/>
									<script type="text/javascript"> $('#date').datepicker({format: 'yyyy/mm/dd'});</script>
								</td>
								<td><button type="submit" class="btn btn-primary btn-block btn-flat">Add</button></td>
								@foreach($rows as $r)
							</tr>
							<tr>
								<td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" value="{{ $r->emp_id }}" readonly /></td>
								@endforeach						
							</tr>						
                        </tbody>
                    </table>
                    <hr>
					<!--<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
						</div>
					</div>--> 
					</form>
                </div>               
            </div>
        </div>
    </div>
	
	<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
		$.validate({
		});
	</script>
@endsection
@section('scripts-extra')


@endsection