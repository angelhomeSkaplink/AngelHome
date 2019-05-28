@extends('layouts.app')

@section('htmlheader_title')
    Bundle Print Configuration
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Bundle Print Order</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="{{ url('print_configuration') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
 </div>
</div>
{{-- <script src="https://raw.githubusercontent.com/SortableJS/Sortable/master/Sortable.min.js"/> --}}
<style type="text/css">
  ul{
      list-style:none;
  }
  .blue-background-class {
	background-color: #C8EBFB;
}
  .box{
      background-color:rgb(89, 89, 89) !important;margin:0.5px;
      color:#fff;
      padding:20px;
      font-weight:bold;
      font-size:1.2em;
      cursor: move;
  }
</style>
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:rgb(49, 68, 84) !important;">
                <h4 style="color:aliceblue !important;"><strong>Current Print Order</strong></h4>
            </div>
            <div class="panel-body">
                <div class="row">                   
                    <div class="col-lg-10 col-lg-offset-1">
                        <div id="simple-list" class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><strong>Drag and Drop Element to Set Print Order</strong></h4> 
                                </div>
                                <div class="panel-body">
                                    <form  action="save_print_order" method="post">
                                        <input type="hidden" name="_method" value="post">
                                        {{ csrf_field() }}
                                    <div id="example1" class="list-group col">
                                        @php $i=1; @endphp
                                        @foreach($elm_order as $e)
                                        <div class="list-group-item box">
                                            @if($e =='initial')
                                                {{$i++}}. {{"Main Assessment"}}
                                                <input type="hidden" name="{{$e}}" value="{{$e}}">
                                            @elseif($e=='screening')
                                                {{$i++}}. {{"Screening Record"}}
                                                <input type="hidden" name="{{$e}}" value="{{$e}}">
                                            @elseif($e=='policy_doc')
                                                {{$i++}}. {{"Policy Document"}}
                                                <input type="hidden" name="{{$e}}" value="{{$e}}">
                                            @elseif($e=='legal_doc')
                                                {{$i++}}. {{"Legal Document"}}
                                                <input type="hidden" name="{{$e}}" value="{{$e}}">
                                            @else
                                                {{$i++}}. {{"Lease Signing Document"}}
                                                <input type="hidden" name="{{$e}}" value="{{$e}}">
                                            @endif
                                        </div>   
                                        @endforeach                            
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success pull-right">Set Print Order</button>
                                        <a href="{{ url('print_configuration') }}" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</a>
                                    </div>
                                </form>
                                </div>
                            </div>                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    
new Sortable(example1, {
	animation: 150,
	ghostClass: 'blue-background-class'
});
   
    
    </script>
    @endsection