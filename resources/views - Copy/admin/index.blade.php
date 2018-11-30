@extends('layouts.app')

@section('htmlheader_title')
    Admin Panel
@endsection

@section('contentheader_title')
    All Users
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
					<?php if(Auth::user()->role == '1'){ ?>					
                    <a href={{ url('/member') }} class="btn btn-primary btn-block btn-flat">Add a new User</a></br>
					<?php } ?>
                </div>				
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>First name</th>
							<th>Middle Name</th>
                            <th>Last name</th>
                            <th>User Name</th>
                            <th>Role</th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstname }}</td>
								<td>{{ $user->middlename }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
								<?php if($user->role == 1){ ?>
                                <td>Admin</td>
								<?php } elseif($user->role == 2) {?>
								<td>Establishment</td>
								<?php } elseif($user->role == 3) {?>
								<td>Accounts</td>
								<?php } elseif($user->role == 4) {?>
								<td>Pension</td>
								<?php } elseif($user->role == 5) {?>								
								<td>Employee</td>
								<?php } elseif($user->role == 6) { ?>
								<td>Operator</td>
								<?php } elseif($user->role == 7) { ?>
								<td>Deputy Secretary</td>
								<?php } elseif($user->role == 8) { ?>
								<td>Secretary</td>
								<?php } elseif($user->role == 9) { ?>
								<td>Chairman</td>
								<?php } ?>
								<td><a href="edit_user/{{ $user-> id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="delete_user/{{ $user-> id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>                               
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection