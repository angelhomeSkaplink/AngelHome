@extends('layouts.app')

@section('htmlheader_title')
    Scale Edit
@endsection

@section('contentheader_title')
    Scale Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Scale Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="{{action('PostController@update_scale')}}" method="post">

                        {{ csrf_field() }}	
					
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="scale_id"
                            value="{{ $row->scale_id }}" />
					</div>
					<div class="form-group has-feedback">
						Lower limit
                        <input type="text" class="form-control" name="payScale_lower_limit"
                            value="{{ $row->payScale_lower_limit }}" required pattern="[0-9]+" Title="Required Field" />
					</div>
					<div class="form-group has-feedback">
						Uper Limit
                        <input type="text" class="form-control" name="payScale_uper_limit"
                            value="{{ $row->payScale_uper_limit }}" required pattern="[0-9]+" Title="Required Field" />
					</div>
					<div class="form-group has-feedback">
						Grade Pay
                        <input type="text" class="form-control" name="grade_pay"
                            value="{{ $row->grade_pay }}" required pattern="[0-9]+" Title="Required Field" />
                    </div>
					
					
					<div class="form-group has-feedback">					
						<select name="grade" id="grade" class="form-control" required>
							<option value="{{ $row->grade }}">{{ $row->grade }}</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
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