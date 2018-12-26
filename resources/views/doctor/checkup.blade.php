@extends('layouts.app')

@section('htmlheader_title')
    Vital Statistics
@endsection
@section('contentheader_title')
@php
    $n = explode(",",$name->pros_name);
@endphp
    <p><b> <span class="text-danger" style="text-align:center;"> 
        @if($name->service_image == NULL)
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
		<img src="../hsfiles/public/img/{{ $name->service_image }}" class="img-circle" width="40" height="40">
	@endif
    
    {{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</span> </b>
    <h4><p style="text-align:center;"><strong>Vital Statistics</strong></p></h4>
@endsection
@section('main-content')
@if(count($errors))
<div class="form-group">
    <div class="alert alert-danger">
      <ul>
          <li><b>At least one field is required</b></li>
      </ul>
    </div>
</div>
@endif

<div class="card">
    <div class="card-body px-lg-5 pt-0">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="height:500px; padding-top:0">
                    <form action="{{action('DoctorController@storeCheckup')}}" method="post">
                        <input name="_method" type="hidden" value="POST">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback">
                            <input type="hidden" class="form-control" value="{{ $id }}" name="res_id" required readonly />
                        </div>					
                        <div class="form-group has-feedback">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Sugar</label>
                            <input type="text" class="form-control" name="sugar"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Pressure</label>
                            <input type="text" class="form-control" name="pressure"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Temperature</label>
                            <input type="text" class="form-control" name="temperature"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>O2 Stats</label>
                            <input type="text" class="form-control" name="o2_stat"/>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Save</button>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="{{  url('all_res_checkup') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="overflow-y: scroll; height:500px; padding-top:0">
                    <h4><strong>Previous Records</strong></h4>
                    @php
                        if($checkups->isEmpty()){
                            echo "No previous Record!";
                        }
                    @endphp
                    @foreach ($checkups as $check)
                    @php
                        $user_name = DB::table('users')->where('user_id',$check->recorder)->select('users.firstname','users.lastname')->first();
                        $array = [];
                        if (!$check->weight=="") {
                            array_push($array,"wt");
                        }
                        if (!$check->sugar=="") {
                            array_push($array,"bs");
                        }
                        if (!$check->pressure=="") {
                            array_push($array,"bp");
                        }
                        if (!$check->temperature=="") {
                            array_push($array,"tp");
                        }
                        if (!$check->o2_stat=="") {
                            array_push($array,"o2");
                        }
                        $array = implode(", ",$array);
                    @endphp
                    <div class="panel-heading">
                    <li><a href="#modal" data-toggle="modal" data-target="#modalRegister{{$check->id}}"> {{$check->date}} </a>  {{$check->time}} <br/><strong>By:</strong> {{$user_name->firstname}} {{$user_name->lastname}} <br/><strong>Paramemter: </strong>{{ $array }}</li>
                    </div>
                    <div id="modalRegister{{$check->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align-last: center"><strong>Date: </strong>{{$check->date}}</h4>
                                        <h6 class="modal-title" style="text-align-last: center"><strong>Record Collected By:</strong> {{$user_name->firstname}} {{$user_name->lastname}}</h6>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel-body">
                                            <div class="row">
                                                  <p> <strong> Weight:</strong> {{ $check->weight }} </p>
                                                  <p> <strong> Blood Sugar:</strong> {{ $check->sugar }} </p>
                                                  <p> <strong> Blood Pressure:</strong> {{ $check->pressure }} </p>
                                                  <p> <strong> Temperature:</strong> {{ $check->temperature }} </p>
                                                  <p> <strong> O2 Stats:</strong> {{ $check->o2_stat }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="modal{{}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align-last: center">{{$check->date}}</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    
                    <div class="row">
                          <p> <strong> Weight:</strong> {{ $query->weight }} </p>
                          <p> <strong> Blood Sugar:</strong> {{ $query->sugar }} </p>
                          <p> <strong> Blood Pressure:</strong> {{ $query->pressure }} </p>
                          <p> <strong> Temperature:</strong> {{ $query->temperature }} </p>
                          <p> <strong> O2 Stats:</strong> {{ $query->o2_stat }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection