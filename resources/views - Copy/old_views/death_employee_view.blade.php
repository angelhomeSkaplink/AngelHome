@extends('layouts.app')

@section('htmlheader_title')
    Department View
@endsection

@section('contentheader_title')
    Parameter View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Code </th>
								<th>Name</th>
								<th>Date of Death</th>
							</tr>
							@foreach ($deaths as $death)
							<tr>								
								<td>{{ $death->emp_id }}</td>
								<td>{{ $death->emp_id }}</td>
								<td>{{ $death->death_date }}</td>
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