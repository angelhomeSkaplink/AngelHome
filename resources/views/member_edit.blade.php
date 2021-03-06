
@extends('layouts.app')

@section('htmlheader_title')
    edit user details
@endsection

@section('contentheader_title')
   edit user details
@endsection

@section('main-content')

<div class="row">
	<form action="{{action('AddMemberController@update_member_role')}}" method="post" enctype="multipart/form-data">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:500px">
					<input type="hidden" class="form-control" name="user_id" value="{{ $role->user_id  }}" />
					<div class="form-group has-feedback">
						<label>Member Name</label>
						<input type="text" class="form-control" placeholder="User Name" name="user_name" value="{{ $role->firstname  }} {{$role->lastname}}" readonly />
					</div>
          <div class="form-group has-feedback">
						<label>Select Role</label><br/>
            <?php
            $roles = DB::table('role')->where('u_id',$role->user_id)->where('status',1)->get();
            $role_arr = array();
            foreach ($roles as $r) {
              // code...
              array_push($role_arr,$r->id);
            }
            // dd($role_arr);
              ?>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="2" <?php if (in_array(2,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">marketing</span>
    						</label>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="3" <?php if (in_array(3,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">receptionist</span>
    						</label>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="4"<?php if (in_array(4,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">RCC</span>
    						</label>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="5"<?php if (in_array(5,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">back-office</span>
    						</label>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="6"<?php if (in_array(6,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">doctor</span>
    						</label>
                <label style="padding-right:10px;">
    								<input type="checkbox" name="role[]" value="7"<?php if (in_array(7,$role_arr)): ?>
                      checked
                    <?php endif; ?>>
    								<span class="label-text">wellness-director</span>
    						</label>
					</div>
        <div class="form-group has-feedback">
          <label>PASSWORD</label><br/>
          <input type="password" class="form-control" name="password" value="{{$role->password}}">
        </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="col-md-6">
						<div class="form-group has-feedback">
                <input type="button" class="btn btn-block btn-flat" value="Cancel" onclick="history.back()">
						</div>
					</div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-10"></div>
	</form>
</div>
    @include('layouts.partials.scripts_auth')

@endsection
