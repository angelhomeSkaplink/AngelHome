<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Stocks List
@endsection

@section('contentheader_title')
    Stocks List
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
    <div class="form-group has-feedback pull-right" >
        <a href="{{ url('add_stocks') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom"><i class="material-icons md-14 font-weight-600" > add </i> Add new</a>
    </div>
    <div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="{{ url('renew_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Renew ({{ $count_alert }})</a>
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
                            <th class="th-position text-uppercase font-500 font-12">Pharmacy</th>
                            <th class="th-position text-uppercase font-500 font-12">Delivery Date</th>
                            <th class="th-position text-uppercase font-500 font-12">End Date</th>
                            <th class="th-position text-uppercase font-500 font-12">Pros Name</th>
                            <th class="th-position text-uppercase font-500 font-12">Status</th>
                            <th class="th-position text-uppercase font-500 font-12">Edit</th>
                        </tr>

                        @if(count($stocks) != 0)
                        @foreach($stocks as $stock)
                        <tr>
                            <td class="th-position font-12">
								{{ $stock->medicine_name }}
                                <!--<a href="view_stock_details/{{ $stock->medicine_name }}">{{ $stock->medicine_name }}</a>-->
                            </td>
                            <td class="th-position font-12">{{ $stock->pharmacy_name }}</td>
                            <td class="th-position font-12">{{ $stock->delivery_date }}</td>
                            <td class="th-position font-12">{{ $stock->medicine_end_date }}</td>
                            <td class="th-position font-12">{{ $stock->pros_name }}</td>

                            @if($stock->medi_stock_status == 0)
                            <td class="th-position font-12">Ended</td>
                            @elseif($stock->medi_stock_status == 1)
                            <td class="th-position font-12">Active</td>
                            @endif

                            <td class="th-position font-12">
                                <a href="edit_stocks/{{ $stock->medi_stock_id }}" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="material-icons gray md-22"> border_color</i>
                                </a>
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

@if($count_alert > 0)
<script type="text/javascript">
    alert("You have <?php echo $count_alert; ?> pending stock renewal!");
</script>
@endif

@endsection
