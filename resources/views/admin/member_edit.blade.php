
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Edit User Details")
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Edit User Details")</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('all_member_list') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
    </div>
</div>
@endsection

@section('main-content')
<style>
  .wickedpicker{
    z-index:999 !important;
  }
  .content-header
  {
    padding: 2px 0px 1px 20px;
    margin-bottom: -10px;
  }
  .content {
    margin-top: 15px;
  }
</style>
@include ('layouts.errors')
<div class="row">
  <form action="{{action('AddMemberController@update_member_role')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-body" style="height:500px">
          <input type="hidden" class="form-control" name="user_id" value="{{ $role->user_id  }}" />
          <div class="form-group has-feedback">
            <label>@lang("msg.Member Name")</label>
            <input type="text" class="form-control" placeholder="Member Name" name="member_name" value="{{ $role->firstname  }} {{$role->lastname}}" readonly />
          </div>
          <div class="form-group has-feedback">
            <label>@lang("msg.User Name")</label>
            <input type="text" class="form-control" placeholder="User Name" name="user_name" value="{{$role->email}}" />
          </div>
          <div class="form-group has-feedback">
            <label>@lang("msg.Designation")</label>
            <select class="form-control" name="designation">
                 <option value="{{$role->staff_position_id}}">{{$role->pos_title}}</option>
              @foreach($facility_desig as $desig)
				 <option value="{{$desig->staff_position_id}}">{{$desig->pos_title}}</option>
			  @endforeach
            </select>
          </div>
          <div class="form-group has-feedback">
            <label>@lang("msg.Select Role")</label><br/>
            <?php
            $roles = DB::table('role')->where('u_id',$role->user_id)->where('status',1)->get();
            $role_arr = array();
            foreach ($roles as $r) {
              array_push($role_arr,$r->id);
            }
            // dd($role_arr);
            ?>
            <label style="padding-right:10px;">
              <input type="checkbox" id="role_ed" name="role[]" value="11" <?php if (in_array(11,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">ED</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="2" <?php if (in_array(2,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.receptionist")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="3" <?php if (in_array(3,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.marketing")</span>
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
              <span class="label-text">@lang("msg.back-office")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="7"<?php if (in_array(7,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.wellness-director")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="8"<?php if (in_array(8,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.care-taker")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="9"<?php if (in_array(9,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.activity-manager")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="10"<?php if (in_array(10,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.dietacian")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="12"<?php if (in_array(12,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">@lang("msg.Med Tech")</span>
            </label>
            <label style="padding-right:10px;">
              <input type="checkbox" name="role[]" value="13"<?php if (in_array(13,$role_arr)): ?>
                checked
              <?php endif; ?>>
              <span class="label-text">BOM</span>
            </label>
          </div>
          <div class="form-group has-feedback">
            <label>@lang("msg.Password")</label><br/>
            <input type="password" class="form-control" name="password" value="{{$role->password}}">
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
						
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" onclick="return Validate()">@lang("msg.Submit")</button>
            		</div>
					<div class="form-group has-feedback">
                        <a href="{{  url('all_member_list') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            		</div>
          
        </div>
      </div>
    </div>
    <div class="col-md-10"></div>
  </form>
</div>
@include('layouts.partials.scripts_auth')
<script type="text/javascript">
    $(document).ready(function(){
        var $inputs = $('input:checkbox')
        if($('#role_ed').is(':checked')){
            $inputs.not(this).prop('disabled',true);
            $('#role_ed').prop('disabled',false);
        }
    });
    $('#role_ed').click(function(){
    var $inputs = $('input:checkbox')
        if($(this).is(':checked')){
            $inputs.not(this).prop('checked',false);
            $inputs.not(this).prop('disabled',true);
        }else{
          $inputs.prop('disabled',false);
        }
    });
</script>
@endsection
