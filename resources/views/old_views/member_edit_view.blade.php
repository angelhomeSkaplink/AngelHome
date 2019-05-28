@extends('layouts.app')

@section('htmlheader_title')
    User Edit
@endsection

@section('contentheader_title')
    User Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="{{action('MemberController@update_user')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}	
					
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="user_id"
                            value="{{ $row->user_id }}" />
					</div>
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="id"
                            value="{{ $row->id }}" />
					</div>
					<div class="form-group has-feedback">
						First Name
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $row->firstname }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Middle Name
                        <input type="text" class="form-control" name="middlename"
                            value="{{ $row->middlename }}" readonly />
                    </div>
					<div class="form-group has-feedback">
						Last Name
                        <input type="text" class="form-control" name="lastname"
                            value="{{ $row->lastname }}" readonly />
                    </div>
					<div class="form-group has-feedback">
						User Name
                        <input type="text" class="form-control" name="email"
                            value="{{ $row->email }}" />
                    </div>
					<!--<div class="form-group has-feedback">
						Password
                        <input type="text" class="form-control" name="password"
                            value="{{ $row->password }}" />
                    </div>-->
					<div class="form-group has-feedback">
						Role
						<select name="role" id="role" class="form-control">
							<?php if($row->role == 1) { ?>
							<option value="{{ $row->role }}">Admin</option>
							<?php } elseif ($row->role == 2) { ?>
							<option value="{{ $row->role }}">Establishment</option>
							<?php } elseif ($row->role == 3) { ?>
							<option value="{{ $row->role }}">Accounts</option>
							<?php } elseif ($row->role == 4) { ?>
							<option value="{{ $row->role }}">Pension</option>
							<?php } elseif ($row->role == 5) { ?>
							<option value="{{ $row->role }}">Employee</option>
							<?php } elseif ($row->role == 6) { ?>
							<option value="{{ $row->role }}">Operator</option>
							<?php } elseif ($row->role == 7) { ?>
							<option value="{{ $row->role }}">Deputy Secretary</option>
							<?php } elseif ($row->role == 8) { ?>
							<option value="{{ $row->role }}">Secretary</option>
							<?php } elseif ($row->role == 9) { ?>
							<option value="{{ $row->role }}">Chairman</option>
							<?php }?>
							<option value="1">Admin</option>
							<option value="2">Establishment</option>
							<option value="3">Accounts</option>
							<option value="4">Pension</option>	
							<option value="5">Employee</option>
							<option value="6">Operator</option>
							<option value="7">Deputy Secretary</option>	
							<option value="8">Secretary</option>
							<option value="9">Chairman</option>
						</select>
					</div>
					<div class="form-group has-feedback">					
						<select name="status" id="status" class="form-control">
							<?php if($row->status == 1){ ?>
							<option value="{{ $row->status }}">Active</option>	
							<?php } elseif($row->status == 2) {?>
							<option value="{{ $row->status }}">Inactive</option>
							<?php } ?>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div><!-- /.col -->
					</div>
                </form>
            </div>
        </div>
    </div> 	
</div>
@endsection
@section('scripts-extra')

@endsection