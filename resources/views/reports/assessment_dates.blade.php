@extends('layouts.app')

@section('htmlheader_title')
 @lang("msg.Assessment Dues Report")
@endsection


@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Assessment Dues Report")</strong></h3>
	</div>
</div>
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center form-inline">
        <form action="{{ url('assessDateSearch')}}" method="post">
            <input name="_method" type="hidden" value="POST">
            {!! csrf_field() !!}
            <label>@lang("msg.From"):</label>
            <input class="form-control" id="from_date" name="from_date" type="date" required>
            <label>@lang("msg.To"):</label>
            <input class="form-control" id="to_date" name="to_date" type="date" required>
            <button id="submit" class="form-control btn btn-primary" type="submit"><i class="material-icons">search</i></button>
        </form>
    </div>
</div>
@endsection
@section('main-content')
    <div class="col-md-12">
        <div class="box box-primary" >
            <div class="box-body padding-left-22" style="height:420px;">
                @if ($result->isEmpty())
                    <h4 class="text-center">@lang("msg.No Last Assessment Date Found")</h4> 
                @else
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th></th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Name")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Phone")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Email")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Address")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person") @lang("msg.Phone")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Contact Person") @lang("msg.Email")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Period")</th>
                                <th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Assessment Date")</th>
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
                                    <td>{{$item->phone_p}}</td>
                                    <td>{{$item->email_p}}</td>
                                    <td>{{$item->address_p}}, {{$item->city_p}}</td>
                                    <td>{{$n_c[0]}} {{$n_c[1]}} {{$n_c[2]}}</td>
                                    <td>{{$item->phone_c}}</td>
                                    <td>{{$item->email_c}}</td>
                                    <td>{{$item->period}}</td>
                                    <td>{{$item->next_assessment_date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="text-center">{{ $result->links() }}</div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var fromDate = '<?php echo $earlier; ?>';
            var toDate = '<?php echo $next; ?>';
            $('#from_date').val(fromDate);
            $('#to_date').val(toDate);
        });
    </script>
@endsection