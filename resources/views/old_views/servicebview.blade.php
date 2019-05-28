@extends('layouts.app')

@section('htmlheader_title')
    Pay Fixation Record
@endsection

@section('contentheader_title')
    Pay Fixation Record
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">DA</th>
							<th style="width: 10px">Basic Pay</th>                       
                            <th width="1">View Details</th>
                        </tr>
                        @foreach ($row as $employee)
                            <tr>
								<td>{{ $employee->da }}</td>
								<td>{{ $employee->basic_pay }}</td>
                               
								<td>
                                    <a href="../view/{{ $employee->service_id }}" class="btn btn-xs btn-simple text-green">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>                
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
@endsection