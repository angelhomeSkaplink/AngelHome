@extends('layouts.app')

@section('htmlheader_title')
    Conveyance Allowance Edit
@endsection

@section('contentheader_title')
    Conveyance Allowance Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="../update_conveyance" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Conveyance Allowance Edit</h3>
				</div>
				<div class="box-body"> 
					{!! csrf_field() !!}						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="conveyance_allowance_parameter_id" value="{{ $row->conveyance_allowance_parameter_id }}" />
					</div>	
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="post_id" value="{{ $row->post_id }}" />
					</div>
					<div class="form-group has-feedback">
						Post
						<select name="post_id" id="post_id" class="form-control">							
							<?php
								$post = DB::table('posts')->where('fld_PostID', $row->post_id)->first();
								{
								?>
									<option value="<?php echo $post->fld_PostID ?>"><?php echo $post->fld_PostName ?></option>
							<?php } ?>
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
						Amount
						<input type="text" class="form-control" name="amount" value="{{ $row->amount }}" />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Go</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection