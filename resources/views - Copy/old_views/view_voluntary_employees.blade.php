@extends('layouts.app')

@section('htmlheader_title')
    List of Retired Employees
@endsection

@section('contentheader_title')
    Retired Employees
@endsection

@section('header-extra')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/css/default.css">
<link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    List of Retired Employees
                </div>
                <!-- /.box-header -->
               
                <div class="box-header with-border">
                    {!! Form::open(array('route' => 'pension.settle', 'id' => 'pension.settle')) !!}
                    <div class="col-md-4">
                        <div class="control-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('mothyear', 'Select Month/Year', array('class' => 'control-label')) !!}
                            <div class="controls">
                            {!! Form::text('mothyear', null, ['class' => 'monthyear col-md-12 form-control', 'id' => 'mothyear', 'placeholder' => 'Select month and year', 'autocomplete' => 'off', 'title' => 'Select month and year', 'required' => 'true']) !!}
                          </div>
                          {!! $errors->first('mothyear', '<span class="help-inline">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="control-group {{ $errors->has('da') ? 'has-error' : ''}}">
                            {!! Form::label('da', 'DA%', array('class' => 'control-label')) !!}
                            <div class="controls">
                            {!! Form::text('da', $da, ['class' => 'col-md-5 form-control', 'id' => 'da', 'placeholder' => 'Enter DA', 'autocomplete' => 'off', 'title' => 'Enter DA amount', 'required' => 'true']) !!} 
                          </div>
                          {!! $errors->first('da', '<span class="help-inline">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="control-group {{ $errors->has('medical') ? 'has-error' : ''}}">
                            {!! Form::label('medical', 'Medical', array('class' => 'control-label')) !!}
                            <div class="controls">
                            {!! Form::text('medical', $medical, ['class' => 'col-md-5 form-control', 'id' => 'medical', 'placeholder' => 'Enter Medical', 'autocomplete' => 'off', 'title' => 'Enter Medical', 'required' => 'true']) !!}
                          </div>
                          {!! $errors->first('medical', '<span class="help-inline">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
							<tr>
                                <!-- <th>#</th> -->
                                <th> <input type="checkbox" name="check_all" id="select_all" class="minimal"> Check All </th>
								<th>Employee Code</th>
								<th>Date of Retirement</th>
                                <th>Pension Order Number</th>
                                <th>Pension Order Date</th>
                                <th>Basic</th>
                                <th>Pension Amount</th>
                                <th>Pension Type</th>
                                <th>Calculated Pension Amount</th>
								<!-- <th>Details</th> -->
							</tr>
                        </thead>
                        <tbody>
                            <?php  $count = 1; ?>
                            

							@foreach ($employees as $k => $employee)
                            <?php $indx = $k+1; ?>
                            <tr>
                                <td><input type="checkbox" name="check_all" class="minimal checkbox" checked></td>
                                <td>{{ $employee->emp_id }}</td>
                                <td>{{ $employee->v_retirement_date}}</td>
                                
                                <td>{!! Form::text('pension_order_number[]', null, ['class' => 'col-md-8 form-control', 'id' => 'pension_order_number_'.($k+1), 'placeholder' => 'Pension Order Number', 'autocomplete' => 'off', 'title' => 'Pension Order Number', 'required' => 'true']) !!}
                                </td>

                                <td>{!! Form::text('pension_order_date[]', null, ['class' => 'datepicker col-md-8 form-control', 'id' => 'pension_order_date'.($k+1), 'placeholder' => 'Pension Order Date', 'autocomplete' => 'off', 'title' => 'Pension Order Date', 'required' => 'true']) !!}
                                </td>

                                <!-- <td>{!! Form::text('pension_order_datesss[]', null, ['class' => 'datepicker col-md-8 form-control', 'id' => ' pension_order_date_'.($k+1), 'placeholder' => 'Pension Order Date', 'autocomplete' => 'off', 'title' => 'Pension Order Date', 'required' => 'true']) !!}
                                </td> -->

                                <td>{!! Form::number('basic[]', null, ['class' => 'col-md-8 form-control basic', 'id' => 'basic_'.($k+1), 'placeholder' => 'Basic', 'autocomplete' => 'off', 'title' => 'Enter 50% of the last basic salary', 'step' => '0.01', 'required' => 'true', 'onkeyup' => "calculateTotal($indx)"]) !!}
                                </td>

                                <td>{!! Form::number('pension_amount[]', null, ['class' => 'col-md-8 form-control pension_amount', 'id' => 'pension_amount_'.($k+1), 'placeholder' => 'Pension Amount', 'autocomplete' => 'off', 'step' => '0.01', 'title' => 'Enter calculated pension amount', 'required' => 'true', 'onkeyup' => "calculateTotal($indx)"]) !!}
                                </td>

                                <?php 
                                    $pension_types['SP'] = 'SP'; 
                                    $pension_types['FP'] = 'FP'; 
                                ?>
                                <td>{!! Form::select('pension_type[]', $pension_types, null, ['class' => 'col-md-8 form-control', 'id' => 'pension_type', 'autocomplete' => 'off', 'title' => 'Select Pension Type', 'required' => 'true']) !!}
                                </td>

                                <td>{!! Form::number('total_pension[]', null, ['class' => 'col-md-8 form-control', 'id' => 'total_pension_'.($k+1), 'placeholder' => 'Total Pension', 'autocomplete' => 'off', 'title' => 'Total Pension Amount', 'step' => '0.01', 'required' => 'true', 'readonly' => true]) !!}
                                </td>

                                <td> {!! Form::hidden('emp_id[]', $employee->emp_id) !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <hr>
                    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                    {!! Form:: submit('Settle Pension', ['class' => 'btn btn-success btn-lg']) !!}
                    {!!form::close()!!}
                    
                </div>               
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('scripts-extra')
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/javascript/zebra_datepicker.js"></script>
<script>
$('.monthyear').Zebra_DatePicker({
  format: 'Y-m'
});
$('.datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});
$(".date-picker").datepicker();
//basic
$('.basic').keyup(function() {
    if($('#da').val() == '') {
        alert('Enter DA amount and Medical to calculate total pension');
        $('#da').focus();
    }else if( $('#medical').val() == '' ) {
        alert('Enter DA amount and Medical to calculate total pension');
        $('#medical').focus();
    }
});

var $da      = $('#da').val();
var $medical = $('#medical').val();

function calculateTotal(index) {
    var $total = 0;
    var $basic = 0;
    var $pension = 0;

    if( $('#basic_'+index).val() !='' &&  typeof $('#basic_'+index).val() != 'undefined' ) {
        $basic = $('#basic_'+index).val();
    }

    if( $('#pension_amount_'+index).val() !='' && typeof $('#pension_amount_'+index).val() != 'undefined' ) {
        $pension = $('#pension_amount_'+index).val();
    }

    //$total = parseFloat($pension)+parseFloat($basic*($da/100)) + parseFloat($medical);
    $total = parseFloat($pension)+parseFloat($basic*($da/100)) + parseFloat($medical);
    console.log(Math.round($total));
    $('#total_pension_'+index).val( Math.round($total) );
}
</script>
@endsection