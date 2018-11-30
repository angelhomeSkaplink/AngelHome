@extends('layouts.app')

@section('htmlheader_title')
    Employee Salary MIS Report
@endsection

@section('contentheader_title')
    Employee Salary Claim MIS Report
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                	<?php 
                        $count = 1; 
                        $basic_pay = 0;
                        $dearness_allowance = 0;
                        $hra = 0;
                        $medical_allowance = 0;
                        $conveyance_allowance = 0;
                        $city_allowance = 0;
                        $others = 0;
                        $gross_salary = 0;
                    ?>

                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="hidden-xs">Employee Code</th>
                                <th>Basic pay</th>
                                <th>DA</th>
                                <th>HRA</th>
                                <th>Medical Allowance</th>
                                <th>Conveyance Allowance</th>
                                <th>City Allowance</th>
                                <th>Others</th>
                                <th>Gross</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <?php $basic_pay    += $v->basic_pay; 
                                $basic_pay          += $v->basic_pay; 
                                $dearness_allowance += $v->dearness_allowance;
                                $hra                += $v->hra;
                                $medical_allowance  += $v->medical_allowance;
                                $conveyance_allowance += $v->conveyance_allowance;
                                $city_allowance     += $v->city_allowance;
                                $others             += $v->others;
                                $gross_salary       += $v->gross_salary;
                            ?>
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td class="hidden-xs"> {{ $v->emp_id }} </td>
                                <td> {{ $v->basic_pay }} </td>
                                <td> {{ $v->dearness_allowance }} </td>
                                <td> {{ $v->hra }} </td>
                                <td> {{ $v->medical_allowance }} </td>
                                <td> {{ $v->conveyance_allowance }}</td>
                                <td> {{ $v->city_allowance }}</td>
                                <td> {{ $v->others }}</td>
                                <td> {{ $v->gross_salary }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                        <thead>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ $basic_pay }}</td>
                                <td>{{ $dearness_allowance }}</td>
                                <td>{{ $hra }}</td>
                                <td>{{ $medical_allowance }}</td>
                                <td>{{ $conveyance_allowance }}</td>
                                <td>{{ $city_allowance }}</td>
                                <td>{{ $others }}</td>
                                <td>{{ $gross_salary }}</td>
                            </tr>
                        </thead>
                    </table>
                    
                    {!! Form::open(array('route' => 'salary.mis.download', 'id' => 'salary.mis.download', 'class' => 'form-horizontal row-border')) !!}
                    <input type="hidden" name="data" value="{{ json_encode($results) }}">
                    <button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop