@extends('layouts.app')

@section('htmlheader_title')
    Employee Attendance MIS Report
@endsection

@section('contentheader_title')
    Employee Attendance MIS Report
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                	 {!! Form::open(array('route' => 'attendance.mis.view', 'id' => 'attendance.mis.view', 'class' => 'form-horizontal row-border', 'method' => 'GET')) !!}
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group {{ $errors->has('emp_id') ? 'has-error' : ''}}">
                            {!! Form::label('employee_id', '', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-8">
                              {!! Form::select('emp_id', $employees, null, ['class' => 'form-control required', 'id' => 'emp_id', 'placeholder' => 'All Employees', 'autocomplete' => 'off']) !!}
                            </div>
                            {!! $errors->first('emp_id', '<span class="help-inline">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('date_from') ? 'has-error' : ''}}">
                          {!! Form::label('date_from', '', array('class' => 'col-md-4 control-label')) !!}
                          <div class="col-md-8">
                            {!! Form::text('date_from', null, ['class' => 'form-control required', 'id' => 'date_from', 'placeholder' => 'All Dates']) !!}
                          </div>
                          {!! $errors->first('date_from', '<span class="help-inline">:message</span>') !!}
                        </div>
                      </div>

                      <div class="col-md-6">
                        
                        <div class="form-group {{ $errors->has('date_to') ? 'has-error' : ''}}">
                          {!! Form::label('date_to', '', array('class' => 'col-md-4 control-label')) !!}
                          <div class="col-md-8">
                            {!! Form::text('date_to', null, ['class' => 'form-control required', 'id' => 'date_to', 'placeholder' => 'All Dates']) !!}
                          </div>
                          {!! $errors->first('date_to', '<span class="help-inline">:message</span>') !!}
                        </div>
                      </div>

                    </div>



					{!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
					<button type="submit" class="btn btn-success">VIEW MIS REPORT <i class="fa  fa-chevron-right" aria-hidden="true"></i> </button>
                    {!!form::close()!!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scipts-extra')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/javascript/zebra_datepicker.js"></script>
<script>
$('#date_from').Zebra_DatePicker({
  //direction: true,
  pair: $('#date_to')
});

$('#date_to').Zebra_DatePicker({
  //direction: 1
});
</script>
@stop

@section('header-extra')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/css/default.css">
@stop