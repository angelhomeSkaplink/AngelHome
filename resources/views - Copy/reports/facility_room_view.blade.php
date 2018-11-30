
@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    Facility List
@endsection

@section('main-content')
    
<div class="row">
	<br/>
    <div class="col-md-12">	
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>				
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Facility</th>
							<th class="th-position text-uppercase font-500 font-12">Address</th>
							<th class="th-position text-uppercase font-500 font-12">Phone no</th>
							<th class="th-position text-uppercase font-500 font-12">Email</th>
							<th class="th-position text-uppercase font-500 font-12">View room details</th>
						</tr>
						@foreach ($facilities as $facility)
						<tr>
							<td>{{ $facility->facility_name }}</a></td>
							<td>{{ $facility->address }}</td>
							<td>{{ $facility->phone }}</td>
							<td>{{ $facility->email }}</td>
							<td class="padding-left-45"><a href="facility_room_graph/{{ $facility->id }}">
								<i class="material-icons material-icons md-22 gray"> visibility </i></a>
							</td>		
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