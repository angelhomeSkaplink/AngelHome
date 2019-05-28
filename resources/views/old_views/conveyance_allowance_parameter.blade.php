@extends('layouts.app')
@section('htmlheader_title')
   Conveyance Allowance
@endsection
@section('contentheader_title')
    Conveyance Allowance
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>

<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<form action="add_conveyance" method="post">
                {!! csrf_field() !!}				
				<div class="form-group has-feedback">
						<select name="post_id" id="post_id" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Post</option>
							<?php
								$users = DB::table('posts')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->fld_PostID}}">{{ $user->fld_PostName }}</option>
									<?php
								}														
							?>												
						</select>
					</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" data-validation="number" data-validation-error-msg="Numeric Value Only" />
                </div>				
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')
</body>

@endsection
