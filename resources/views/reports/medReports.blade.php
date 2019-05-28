@extends('layouts.app')

@section('htmlheader_title')
Missed Medication Report
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Missed Medication Report</strong></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 text-center form-inline">
        <form action="{{ url('medicDailyReport')}}" method="post">
            <input name="_method" type="hidden" value="POST">
            {!! csrf_field() !!}
            <label>From:</label>
            <input class="form-control" id="from" name="from" type="date" required>
            <label>To:</label>
            <input class="form-control" id="to" name="to" type="date" required>
            <select class="form-control" name="status" id="status" required>
                <option value="0">Not administered</option>
                <option value="1">Delayed</option>
                <option value="4">Early</option>
                <option value="2">Not Given</option>
                <option value="3">Refused</option>
            </select>
            <button id="submit" class="form-control btn btn-primary" type="submit"><i class="material-icons">search</i></button>
        </form>
    </div>
</div>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body padding-left-22" sstyle="height:420px;">
                @if ($result->isEmpty())
                    <h4 class="text-center">No Data Found</h4>
                @else
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th></th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Name")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Date")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">Medication @lang("msg.Time")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Action Performed On")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Phone")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Email")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Address")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person") @lang("msg.Phone")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person") @lang("msg.Email")</th>
                              </tr>
                            @foreach ($result as $item)
                                @php
                                    $n = explode(",",$item->pros_name);
                                    $n_c = explode(",",$item->contact_person);
                                    if($item->service_image==null){
                                        $image = "538642-user_512x512.png";
                                    }else{
                                        $image = $item->service_image;
                                    }
                                @endphp
                                <tr class="text-center">
                                    <td><img src="https://test.seniorsafetech.com/hsfiles/public/img/{{ $image }}" class='img-circle' width='30' height='30'></td>
                                    <td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
                                    <td>{{$item->mar_date}}</td>
                                    <td>{{$item->time_to_take_med}}</td>
                                    <td>{{$item->action_performed_on}}</td>
                                    <td>{{$item->phone_p}}</td>
                                    <td>{{$item->email_p}}</td>
                                    <td>{{$item->address_p}}, {{$item->city_p}}</td>
                                    <td>{{$n_c[0]}} {{$n_c[1]}} {{$n_c[2]}}</td>
                                    <td>{{$item->phone_c}}</td>
                                    <td>{{$item->email_c}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        <div class="text-center">{{ $result->links() }}</div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').on('click', function(){
      var date = new Date($('#from').val());
      day = date.getDate();
      month = date.getMonth() + 1;
      year = date.getFullYear();
    });
    var from = '<?php echo $from; ?>';
    $('#from').val(from);
    var to = '<?php echo $to; ?>';
    $('#to').val(to);
    var status = '<?php echo $status; ?>'
    $('#status').val(status);
});
</script>
@endsection