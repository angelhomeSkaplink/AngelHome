<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Stocks List
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Stocks List</b>
        <?php
            $count_alert = 0;
            foreach ($stocks as $stock)
            {
                if ($stock->stock_alert == 1) {
                    $count_alert += 1;
                }
            }
            // echo "<p>".$count_alert."</p>";
        ?>
       <a href="{{ url('add_stocks') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; margin-top: -2px; margin-bottom: 9px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600" > add </i> Add new</a>
       <a href="{{ url('renew_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:90px !important; margin-top: -2px; margin-bottom: 9px !important; margin-right: 10px;">Renew ({{ $count_alert }})</a>
    </p>
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
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
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
                                <th class="th-position text-uppercase font-500 font-12">Pharmacy</th>
                                <th class="th-position text-uppercase font-500 font-12">Order Date</th>
                                <th class="th-position text-uppercase font-500 font-12">Course Upto</th>
                                <th class="th-position text-uppercase font-500 font-12">###</th>
                                <th class="th-position text-uppercase font-500 font-12">Resident</th>
                                <th class="th-position text-uppercase font-500 font-12">Order Status</th>
                                <th class="th-position text-uppercase font-500 font-12">Received?</th>
                                <th class="th-position text-uppercase font-500 font-12">Stock Upto</th>
                            </tr>
    
                            @if(count($stocks) != 0)
                            @foreach($stocks as $stock)
                            @php
                                $n = explode(",",$stock->pros_name);
                            @endphp
                            <tr>
                                <td class="th-position font-12">
                                    <!-- <a href="view_stock_details/{{ $stock->medicine_name }}">{{ $stock->medicine_name }}</a> -->
                                    {{ $stock->medicine_name }}
                                </td>
                                <td class="th-position font-12">{{ $stock->pharmacy_id }}</td>
                                <td class="th-position font-12">{{ $stock->stock_order_date }}</td>
                                <td class="th-position font-12">{{ $stock->course_end_date }}</td>
                                @if($stock->service_image == NULL)
    								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="30" height="30"></td>
    								@else
    								<td><img src="hsfiles/public/img/{{ $stock->service_image }}" class="img-circle" width="30" height="30"></td>
    								@endif
                                <td class="th-position font-12">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    
                                @if($stock->order_status == 0)
                                <td class="th-position font-12">Request Sent</td>
                                @elseif($stock->order_status == 1)
                                <td class="th-position font-12">Approved</td>
                                @elseif($stock->order_status == 2)
                                <td class="th-position font-12">Delivered</td>
                                @elseif($stock->order_status == 3)
                                <td class="th-position font-12">Cancelled</td>
                                @endif
    
                                <td class="th-position font-12">
                                    @if($stock->order_status == 0)
                                        ------
                                    @elseif($stock->order_status == 1)
                                    <a href="add_recv_date/{{ $stock->medi_stock_id }}" data-toggle="tooltip" data-placement="bottom">
                                        <i class="material-icons gray md-22"> check_box</i>
                                    </a>
                                    @elseif($stock->order_status == 2)
                                        Order Complete
                                    @elseif($stock->order_status == 3)
                                        N/A
                                    @endif
                                </td>
    
                                <td class="th-position font-12">
                                    @if($stock->order_status == 0)
                                        ------
                                    @elseif($stock->order_status == 1)
                                        ------
                                    @elseif($stock->order_status == 2)
                                        {{ $stock->stock_upto }}
                                    @elseif($stock->order_status == 3)
                                        N/A
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
</div>

@endsection
@section('scripts-extra')

@if($count_alert > 0)
<script type="text/javascript">
    alert("You have <?php echo $count_alert; ?> pending stock renewal!");
</script>
@endif

<script type="text/javascript">
    function confirm_click()
    {
        return confirm("Are you sure the stock is Delivered?");
    }
</script>

@endsection
