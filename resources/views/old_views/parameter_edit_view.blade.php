@extends('layouts.app')

@section('htmlheader_title')
    Parameter Value Edit
@endsection

@section('contentheader_title')
   Parameter Value Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Parameter Value Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="{{action('ParameterController@parameter_update')}}" method="post">
                       
					   {{ csrf_field() }}	
					
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="id" value="{{ $row->id }}" />
					</div>
					<div class="form-group has-feedback">
						Parameter Type
						<select name="parameter_id" id="parameter_id" class="form-control">							
							<?php
								$qualification = DB::table('parameters')->where('parameter_id', $row->parameter_id)->first();
								{
								?>
									<option value="<?php echo $qualification->parameter_id ?>"><?php echo $qualification->parameter_type ?></option>
							<?php } ?>
							<?php
								$users = DB::table('parameters')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->parameter_id}}">{{ $user->parameter_type }}</option>
									<?php
								}														
							?>												
						</select>
					</div>		
					<div class="form-group has-feedback">
						Parameter Value
                        <input type="text" class="form-control" name="value" value="{{ $row->value }}" />
					</div>
					<div class="form-group has-feedback">
						Effective From
                        <input type="text" class="form-control" name="effective_from" id="effective_from" value="{{ $row->effective_from }}" />
						<script type="text/javascript"> $('#effective_from').datepicker({format: 'yyyy/mm/dd'});</script>
				   </div>					
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div> 	
</div>
@endsection
@section('scripts-extra')

@endsection