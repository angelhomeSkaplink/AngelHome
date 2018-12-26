@extends('layouts.app')

@section('htmlheader_title')
    Notes
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
    <h4><p style="text-align:center;"><strong>Notes</strong></p></h4>
@endsection

  @section('main-content')
  <div class="" style="padding:10px;margin-top:-20px;">
    <div class="panel-group" id="accordion">
      @foreach ($notes as $note)
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#{{$note->id}}">
              <h4><strong><span style="color:#fff;">{{$note->date}}  {{$note->time}}</span></strong></h4>
              </a>
            </h4>
          </div>
          <div id="{{$note->id}}" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>NOTE</strong>
                        </div>
                        <div class="panel-body">
                            <?php $user_name = DB::table('users')->where('user_id',$note->recorder)->select('users.firstname','users.lastname')->first(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                  <p> <strong> NOTE DATE:</strong> {{$note->date}} </p>
                                  <p> <strong> Record Collected By:</strong> {{$user_name->firstname}} {{$user_name->lastname}} </p>
                                  <p> <strong> Note:</strong> {{ $note->notes }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
  @endsection


  @section('scripts-extra')
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
  @endsection
