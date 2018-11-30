
@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
    Payment History
@endsection

@section('main-content')
<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">resident</th>
								<th class="th-position text-uppercase font-500 font-12">room rent</th>
								<th class="th-position text-uppercase font-500 font-12">service plan</th>
								<th class="th-position text-uppercase font-500 font-12">total payable ammount</th>
								<th class="th-position text-uppercase font-500 font-12">view payment history</th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								<td>{{ $report->pros_name }}</td>								
								<td>{{ $report->price }}</td>
								<?php
									$service_plan_price = DB::table('service_plan')
										->where([['from_range', '<=', $report->total_point],['to_range', '>=', $report->total_point]])
										->orderBy('to_range', 'DESC')
										->first();
								?>
								<td>{{ $service_plan_price->price }}</td>
								<td>{{ $report->price + $service_plan_price->price }}</td>
								<td class="padding-left-35">
									<a href="detail_history/{{ $report->id }}">
								<i class="material-icons gray md-22"> visibility </i></a>
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