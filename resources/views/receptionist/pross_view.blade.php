@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Ifo
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
                <div class="box-header with-border">
                    <a href="{{ url('pross_add') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Prospective Name</th>
								<th>Phone No</th>
								<th>Email</th>
								<th>Benifactor Name</th>
								<th>Relation</th>
								<th>Method of Communication</th>
								<th>Date</th>
							</tr>
							@foreach ($prospectives as $prospective)
							<tr>
								<td>{{ $prospective->prospective_name }}</td>
								<td>{{ $prospective->phone_no }}</td>
								<td>{{ $prospective->email }}</td>
								<td>{{ $prospective->person_name }}</td>
								<td>{{ $prospective->relation }}</td>
								<td>{{ $prospective->moc }}</td>
								<td>{{ $prospective->date }}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>					
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection