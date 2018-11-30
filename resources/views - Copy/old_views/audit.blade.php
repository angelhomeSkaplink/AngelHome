@extends('layouts.app')

@section('htmlheader_title')
    Audit Trail
@endsection

@section('contentheader_title')
    Audit Trail
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Old Value</th>
								<th>New Value</th>
								<th>User ID</th>
								<th>Date</th>
								<th>Table</th>
							</tr>
							<?php $i=1 ?>
							@foreach ($rows as $row)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $row->action }}</td>
								<td>{{ $row->new_action }}</td>
								<td>{{ $row->id }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->table_name }}</td>
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