@extends('layouts.app')

@section('htmlheader_title')
    Qualification Edit
@endsection

@section('contentheader_title')
    Qualification Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Qualification Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="../update_qualification" method="post">
					<input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}	
					
					<div class="form-group has-feedback">						
                        <input type="hidden" class="form-control" name="qualification_id"
                            value="{{ $row->qualification_id }}" />
					</div>
					<div class="form-group has-feedback">
						Qualification
                        <input type="text" class="form-control" name="qualification"
                            value="{{ $row->qualification }}" required />
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