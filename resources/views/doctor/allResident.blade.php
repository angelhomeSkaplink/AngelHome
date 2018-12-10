@extends('layouts.app')

@section('htmlheader_title')
    All Residents
@endsection

@section('contentheader_title')
	All Residents
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
				
            <div class="box-header with-border col-sm-2 pull-right">
                    
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">#</th>
							<th class="th-position text-uppercase font-500 font-13">Resident</th>
							<th class="th-position text-uppercase font-500 font-12">Check-Up</th>
						</tr>
						@foreach ($residents as $r)
						<tr>
							@if($r->service_image == NULL)
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="hsfiles/public/img/{{ $r->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $r->pros_name }}</td>
							<td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href="checkup/{{ $r->id }}"><i class="material-icons gray md-22"> add_circle</i></a></td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
@endsection