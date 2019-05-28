@extends('layouts.app')

@section('htmlheader_title')
    
@endsection

@section('contentheader_title')
    
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Charge Allowance Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="{{action('PostController@update_charge')}}" method="post">

                        {{ csrf_field() }}	
					
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="charge_allo_id"
                            value="{{ $row->charge_allo_id }}" />
					</div>
					<div class="form-group has-feedback">
						<select name="emp_id" id="emp_id" class="form-control" >
							<option value="">{{ $row->emp_id }}</option>
							<?php
								$users = DB::table('employees')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->emp_id}}">{{ $user->emp_id }}</option>									
									<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						Amount
                        <input type="text" class="form-control" name="amount"
                            value="{{ $row->amount }}" required pattern="[0-9]+" Title="Required Field" />
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