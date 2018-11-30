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
                <div class="box-body table-responsive">
                	<?php 
                        $count = 1; 
                        $gpf_deduction = 0;
                        $nps_deduction = 0;
                        $festival_deduction = 0;
                        $house_building_deduction = 0;
                        $car_loan_deduction = 0;
                        $motor_cycle_deduction = 0;
                        $group_deduction = 0;
                        $salary_saving_deduction = 0;
                        $professional_tax_deduction = 0;
                        $income_tax_deduction = 0;
                        $welfare_deduction = 0;
                        $other_deduction = 0;
                        $union_fee = 0;
                        $kss = 0;
                        $glsi = 0;
                        $total_deduction = 0;
                    ?>

                    <table class="table table-striped table-bordered table-advance table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="hidden-xs">Employee Code</th>
                                <th>GPF Deduction</th>
                                <th>NPS Deduction</th>
                                <th>Festival Deduction</th>
                                <th>House Building Deduction</th>
                                <th>Car Loan Deduction</th>
                                <th>Motor Cycle Deduction</th>
                                <th>Group Deduction</th>
                                <th>Salary Saving Deduction</th>
                                <th>Professional Tax Deduction</th>
                                <th>Income Tax Deduction</th>
                                <th>Welfare Deduction</th>
                                <th>Other Deduction</th>
                                <th>Union Fee</th>
                                <th>KSS</th>
                                <th>GLSI</th>
                                <th>Total Deduction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <?php $gpf_deduction    += $v->gpf_deduction; 
                                $gpf_deduction          += $v->gpf_deduction; 
                                $nps_deduction += $v->nps_deduction;
                                $festival_deduction  += $v->festival_deduction;
                                $house_building_deduction  += $v->house_building_deduction;
                                $car_loan_deduction += $v->car_loan_deduction;
                                $motor_cycle_deduction     += $v->motor_cycle_deduction;
                                $group_deduction            += $v->group_deduction;
                                $salary_saving_deduction       += $v->salary_saving_deduction;
                                $professional_tax_deduction          += $v->professional_tax_deduction; 
                                $income_tax_deduction += $v->income_tax_deduction;
                                $welfare_deduction  += $v->welfare_deduction;
                                $other_deduction  += $v->other_deduction;
                                $union_fee += $v->union_fee;
                                $kss     += $v->kss;
                                $glsi            += $v->glsi;
                                $total_deduction       += $v->total_deduction;
                            ?>
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td class="hidden-xs"> {{ $v->emp_id }} </td>
                                <td> {{ $v->gpf_deduction }} </td>
                                <td> {{ $v->nps_deduction }} </td>
                                <td> {{ $v->festival_deduction }} </td>
                                <td> {{ $v->house_building_deduction }} </td>
                                <td> {{ $v->car_loan_deduction }}</td>
                                <td> {{ $v->motor_cycle_deduction }}</td>
                                <td> {{ $v->group_deduction }}</td>
                                <td> {{ $v->salary_saving_deduction }}</td>
                                <td> {{ $v->professional_tax_deduction }} </td>
                                <td> {{ $v->income_tax_deduction }} </td>
                                <td> {{ $v->welfare_deduction }} </td>
                                <td> {{ $v->other_deduction }} </td>
                                <td> {{ $v->union_fee }}</td>
                                <td> {{ $v->kss }}</td>
                                <td> {{ $v->glsi }}</td>
                                <td> {{ $v->total_deduction }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                        <thead>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ $gpf_deduction }}</td>
                                <td>{{ $nps_deduction }}</td>
                                <td>{{ $festival_deduction }}</td>
                                <td>{{ $house_building_deduction }}</td>
                                <td>{{ $car_loan_deduction }}</td>
                                <td>{{ $motor_cycle_deduction }}</td>
                                <td>{{ $group_deduction }}</td>
                                <td>{{ $salary_saving_deduction }}</td>
                                <td>{{ $professional_tax_deduction }}</td>
                                <td>{{ $income_tax_deduction }}</td>
                                <td>{{ $welfare_deduction }}</td>
                                <td>{{ $other_deduction }}</td>
                                <td>{{ $union_fee }}</td>
                                <td>{{ $kss }}</td>
                                <td>{{ $glsi }}</td>
                                <td>{{ $total_deduction }}</td>
                            </tr>
                        </thead>
                    </table>
                    
                    {!! Form::open(array('route' => 'salarydeduction.mis.download', 'id' => 'salarydeduction.mis.download', 'class' => 'form-horizontal row-border')) !!}
                    <input type="hidden" name="data" value="{{ json_encode($results) }}">
                    <button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop