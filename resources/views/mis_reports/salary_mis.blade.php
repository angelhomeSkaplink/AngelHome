@extends('layouts.app')

@section('htmlheader_title')
    Employee Salary MIS Report
@endsection

@section('contentheader_title')
    Employee Salary Deduction MIS Report
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                	 {!! Form::open(array('route' => 'salary.mis.view', 'id' => 'salary.mis.view', 'class' => 'form-horizontal row-border', 'method' => 'GET')) !!}
                    @include('mis_reports.salary_form')

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