@extends('layouts.app')

@section('htmlheader_title')
    Admin Panel
@endsection

@section('contentheader_title')
    Qualifications
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href={{ url('member') }} class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">User Name</th>
                            <th>Email</th>
							<th>Password</th>
							<th>Role</th>
							<th>Edit</th>
							<th>Delete</th>
                            <th width="1"></th>
                        </tr>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
								<td>{{ $member->password }}</td>
                                <td>{{ $member->role }}</td>
								<td><a href="edit_member/{{ $member-> id }}" class="btn btn-xs btn-simple text-green">Edit</a></td>
								<td><a href="delete_member/{{ $member-> id }}" class="btn btn-xs btn-simple text-green">Delete</a></td>
                            </tr>
                        @endforeach
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