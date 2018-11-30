@extends('layouts.app')

@section('htmlheader_title')
    Employee Salary Increment
@endsection

@section('contentheader_title')
    Employee Salary Increment
@endsection

@section('header-extra')

@stop

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Employee Salary Increment
                </div>
                <div class="box-body">					
                    <table class="table table-bordered">
					@if(Session::has('msg'))
						<div class="alert alert-danger">
							<strong>{{ Session::get('msg') }}</strong>
						</div>
					@endif
					{!! Form::open(array('route' => 'pension.increment_update', 'id' => 'pension.increment_update')) !!}
						<div class="col-md-4">
							<div class="form-group has-feedback">
								<input type="text" class="form-control" placeholder="Date of Increment" name="doi" id="doi" required />
								<script type="text/javascript"> $('#doi').datepicker({format: 'yyyy/mm/dd'});</script> 
							</div>
						</div>
						<thead>
							<tr>
                                <th><input type="checkbox" name="check_all" id="select_all" class="minimal"> Check All </th>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>Name</th>
							</tr>
                        </thead>
                        <tbody>
						<?php 
							$rows = DB::table('servicebooks')->where('status', '1')->orderBy('service_id', 'asc')->get();	
							$i=1;
						?>
						@foreach($rows as $r)
						<tr>
							<td><input type="checkbox" name="check[]" value="{{$r->emp_id}}" id="check_all" class="minimal checkbox" checked></td>
							<td><input type="text" class="form-control" placeholder="" name="sl_no[]" id="sl_no" value="{{ $i++ }}" readonly /></td>
							<td><input type="text" class="form-control" placeholder="" name="emp_id[]" id="emp_id" value="{{ $r->emp_id }}" readonly /></td>
							<?php $employee = DB::table('employees')->where('emp_id', $r->emp_id)->first(); ?>
							<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name  }} {{ $employee->emp_l_name  }}</td>
						</tr>
						@endforeach
                        </tbody>
                    </table>
                    <hr>
                    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                    {!! Form:: submit('Increment', ['class' => 'btn btn-success btn-lg']) !!}
                    {!!form::close()!!}
                    
                </div>
               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
<script>
	$(".checkbox").prop('checked', true);
	$("#select_all").prop('checked', true);
	$("#select_all").change(function(){  //"select all" change
		$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
	});

	//".checkbox" change
	$('.checkbox').change(function(){
		//uncheck "select all", if one of the listed checkbox item is unchecked
		if(false == $(this).prop("checked")){ //if this item is unchecked
			$("#select_all").prop('checked', false); //change "select all" checked status to false
		}
		//check "select all" if all checkbox items are checked
		if ($('.checkbox:checked').length == $('.checkbox').length ){
			$("#select_all").prop('checked', true);
		}
	});
</script>

@endsection