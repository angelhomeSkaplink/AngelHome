@extends('layouts.app')

@section('htmlheader_title')
  Change Your Password
@endsection

@section('contentheader_title')
    @lang("msg.Change Your Password")
@endsection

@section('header-extra')

@endsection

@section('main-content')
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <!--<div class="box-header with-border">

          </div>-->
          <div class="box-body">
            <form action="{{ action('ProfileController@update_password') }}" method="post">
              <input type="hidden" name="_method" value="PATCH">
              {{ csrf_field() }}
              <div class="form-group has-feedback">
                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                <input type="password" id="txtPassword" class="form-control" placeholder="New Password" name="password"
                value="" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$"
				oninvalid="this.setCustomValidity('Required.Password should be Minimum 6 Character Long, Atleast One Number, One Special Character and One Upper Case')"
				oninput="this.setCustomValidity('')"/>
                <span class="fa fa-lock fa-lg form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
                <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Password again"
                name="password_confirmation"
                value="" required />
                <span class="fa fa-lock fa-lg form-control-feedback"></span>
              </div>
			  <div class="form-group has-feedback">
            		<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" onclick="return Validate()">@lang("msg.Update")</button>
				</div>

				<div class="form-group has-feedback">
                    <a href="{{  url('dashboard') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            	</div><br/><br/><br/>
              <!--<div class="form-group has_feedback">
                <button type="submit" class="btn btn-flat" onclick="history.goback()">Cancel</button>
                <button type="submit" class="btn btn-primary btn-flat" onclick="return Validate()">@lang("msg.Change password")</button>
              </div>-->

            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function Validate() {
            var password = document.getElementById("txtPassword").value;
            var confirmPassword = document.getElementById("txtConfirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
@endsection
@section('scripts-extra')

@endsection
