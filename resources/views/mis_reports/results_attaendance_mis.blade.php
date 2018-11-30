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
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th class="hidden-xs">Employee Code</th>
                                
                                <th>In Time</th>
                                <th>Out Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td> {{ date('d-m-Y', strtotime($v->date)) }} </td>
                                <td class="hidden-xs"> {{ $v->emp_id }} </td>
                                
                                <td> {{ date('h:i:s A', strtotime($v->in_time)) }} </td>
                                <td> {{ date('h:i:s A', strtotime($v->out_time)) }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    
                    {!! Form::open(array('route' => 'attendance.mis.download', 'id' => 'attendance.mis.download', 'class' => 'form-horizontal row-border')) !!}
                    <input type="hidden" name="data" value="{{ json_encode($results) }}">
                    <button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop