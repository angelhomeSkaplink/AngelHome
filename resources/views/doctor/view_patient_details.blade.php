<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Medical Information")
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medical Information</strong></h3>
    </div>
    <div class="col-lg-4"> 
        <span class="pull-right">
        <a href="{{ url('patients_list') }}" class="btn btn-success btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
        <a href="{{ url('add_patient_details/'.$id) }}" class="btn btn-primary btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">add</i>Add New</a>
        </span>
    </div>
</div>
@endsection

@section('main-content')

@if(count($qry_data) != 0)
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="th-position text-uppercase font-500 font-12">@lang("msg.Medicine Name")</th>
                                <th class="th-position text-uppercase font-500 font-12">@lang("msg.Quantity")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Frequency")</th>
                                <th class="th-position text-uppercase font-500 font-12">@lang("msg.Time To Take Medicine")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Continue Till")</th>
                                <th class="th-position text-uppercase font-500 font-12">@lang("msg.Apply Medicine On")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Action")</th>
                            </tr>
                            @foreach ($qry_data as $qry_data)
                            <tr>
                                <td>{{ $qry_data->medicine_name }}</td>
    							<td>{{ $qry_data->quantity_of_med }}</td>
    							<td>{{ $qry_data->frequency_in_a_day }}</td>
                                <td>{{ $qry_data->time_to_take_med }}</td>
    							<td>{{ $qry_data->course_date }}</td>
    
                                <td class="th-position font-12">
                                @if($qry_data->on_monday == 1 && $qry_data->on_tuesday == 1 && $qry_data->on_wednesday == 1 && $qry_data->on_thursday == 1 && $qry_data->on_friday == 1 && $qry_data->on_saturday == 1 && $qry_data->on_sunday == 1)
                                    <span>@lang("msg.All Days")</span>
                                @else
                                    @if($qry_data->on_monday == 1)
                                        <span>@lang("msg.Monday") </span>
                                    @endif
                                    @if($qry_data->on_tuesday == 1)
                                        <span>@lang("msg.Tuesday") </span>
                                    @endif
                                    @if($qry_data->on_wednesday == 1)
                                        <span>@lang("msg.Wednesday") </span>
                                    @endif
                                    @if($qry_data->on_thursday == 1)
                                        <span>@lang("msg.Thursday") </span>
                                    @endif
                                    @if($qry_data->on_friday == 1)
                                        <span>@lang("msg.Friday") </span>
                                    @endif
                                    @if($qry_data->on_saturday == 1)
                                        <span>@lang("msg.Saturday") </span>
                                    @endif
                                    @if($qry_data->on_sunday == 1)
                                        <span>@lang("msg.Sunday") </span>
                                    @endif
                                @endif
                                </td>
    
                                <td class="padding-left-22">
                                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Delete" href="{{ url('delete_records/' . $qry_data->pat_medi_id . '/' . $qry_data->pros_id) }}" onclick="return confirm('Are you sure you want to delete this record?');" ><i class="material-icons gray md-22"> delete</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(count($qry_data) == 0)
<div class="box box-primary" style="padding:15px;margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div style="clear:both; margin-top:7px"></div>
                    <span class="font-14">@lang("msg.No Record Found For This Patient")</span>
            </div>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
    function confirmDelete()
    {
        var del = false;
        if(confirm("Delete this record?") == true)
        {
            del = true;
        }
        else
        {
            del = false;
        }
        return del;
    }
</script>

@endsection
@section('scripts-extra')

@endsection
