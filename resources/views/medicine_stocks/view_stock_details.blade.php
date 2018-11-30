<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Stocks List
@endsection

@section('contentheader_title')
    Stocks List
    <div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="{{ url('medicine_stocks_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>

@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">

            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="th-position text-uppercase font-500 font-12">Medicine</th>
                            <th class="th-position text-uppercase font-500 font-12">Start Date</th>
                            <th class="th-position text-uppercase font-500 font-12">End Date</th>
                            <th class="th-position text-uppercase font-500 font-12">Resident</th>
                            <th class="th-position text-uppercase font-500 font-12">Apply medicine on</th>
                        </tr>

                        @if(count($stocks) != 0)
                        @foreach($stocks as $stock)
                        <tr>
                            <td class="th-position font-12">{{ $stock->medicine_name }}</td>
                            <td class="th-position font-12">{{ $stock->delivery_date }}</td>
                            <td class="th-position font-12">{{ $stock->medicine_end_date }}</td>
                            <td class="th-position font-12">{{ $stock->pros_name }}</td>
                            <td class="th-position font-12">
                            @if($stock->on_monday == 1 && $stock->on_tuesday == 1 && $stock->on_wednesday == 1 && $stock->on_thursday == 1 && $stock->on_friday == 1 && $stock->on_saturday == 1 && $stock->on_sunday == 1)
                                <span>All Days</span>
                            @else
                                @if($stock->on_monday == 1)
                                    <span>Monday </span>
                                @endif
                                @if($stock->on_tuesday == 1)
                                    <span>Tuesday </span>
                                @endif
                                @if($stock->on_wednesday == 1)
                                    <span>Wednesday </span>
                                @endif
                                @if($stock->on_thursday == 1)
                                    <span>Thursday </span>
                                @endif
                                @if($stock->on_friday == 1)
                                    <span>Friday </span>
                                @endif
                                @if($stock->on_saturday == 1)
                                    <span>Saturday </span>
                                @endif
                                @if($stock->on_sunday == 1)
                                    <span>Sunday </span>
                                @endif
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="th-position font-12">No Records Found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection
