@extends('layouts.app')

@section('htmlheader_title')
   Balance Leave
@endsection

@section('contentheader_title')
    Balance Leave
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
                            <th>Employee Id</th>
                            <th>Casual Leave</th>
							<th>Earn Leave</th>
							<th>Chaild Care Leave</th>
                        </tr>
                        <tr>
							<td>{{ $emp_id }}</td>
                            <td>{{ $total_cl_leave }}</td>
                            <td>{{ $total_el_leave }}</td>
							<td>{{ $total_cc_leave }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                {{--<div class="box-footer clearfix">--}}
                    {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--<li><a href="#">«</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">»</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
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
@endsection