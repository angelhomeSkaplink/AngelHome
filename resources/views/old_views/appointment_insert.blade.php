@extends('layouts.app')

@section('htmlheader_title')
    Appointment Insert
@endsection

@section('contentheader_title')
   Appointment Insert
@endsection

@section('main-content')

<body class="hold-transition register-page">
    <div class="register-box">  
        <div class="register-box-body">
            <p class="login-box-msg">Qualification</p>			
            <form action="appointment_insert" method="post">
                {!! csrf_field() !!}
				<div class="form-group has-feedback">
					<select name="post_id" id="post_id" class="form-control">
						<option value="0">Select Post</option>
						<?php
							$posts = DB::table('posts')->get();							
							foreach ($posts as $post)
							{ 
								?>
									<option value="{{ $post->fld_PostID }}">{{ $post->fld_PostName }}</option>
								<?php 
							} 
						?>											
					</select>
				</div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Rule" name="rule_id" value=""/>
                </div>
				<div class="form-group has-feedback">
					<select name="qualification_id" id="qualification_id" class="form-control">
						<option value="0">Select Qualification</option>
						<?php
							$qualifications = DB::table('qualifications')->get();							
							foreach ($qualifications as $qualification)
							{ 
								?>
									<option value="{{ $qualification->qualification_id }}">{{ $qualification->qualification }}</option>
								<?php 
							} 
						?>											
					</select>
				</div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Status" name="status" value=""/>
                </div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>

@endsection
