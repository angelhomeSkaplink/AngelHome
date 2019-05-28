@extends('layouts.app')

@section('htmlheader_title')
    Stocks List
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Stocks List</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('medicine_stocks_list') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection

@section('main-content')
<style>	
	.content-header
	{
	padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="th-position text-uppercase font-500 font-12">Medicine</th>
                                <th class="th-position text-uppercase font-500 font-12">Pros Name</th>
                                <th class="th-position text-uppercase font-500 font-12">End Date</th>
                                <th class="th-position text-uppercase font-500 font-12">Pharmacy</th>
                                <th class="th-position text-uppercase font-500 font-12">Phone</th>
                                <th class="th-position text-uppercase font-500 font-12">Renew</th>
                            </tr>
    
                            @if(count($pending_stocks) != 0)
                            @foreach($pending_stocks as $stock)
                            <tr>
                                <td class="th-position font-12">{{ $stock->medicine_name }}</td>
                                <td class="th-position font-12">{{ $stock->pros_name }}</td>
                                <td class="th-position font-12">{{ $stock->course_end_date }}</td>
                                <td class="th-position font-12">{{ $stock->pharmacy_name }}</td>
                                <td class="th-position font-12">{{ $stock->pharmacy_phone }}</td>
                                <td class="th-position font-12">
                                    <a href="renewal_complete/{{ $stock->medi_stock_id }}" data-toggle="tooltip" data-placement="bottom" onclick="return confirm_click();">
                                        <i class="material-icons">phone_in_talk</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="th-position font-12">All Clear.<br>No Pending renewals.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

<script type="text/javascript">
    function confirm_click()
    {
        return confirm("Are you sure that this stock has been renewed?");
    }
</script>

@endsection
