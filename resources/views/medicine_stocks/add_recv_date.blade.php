<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Add Stock Upto Date
@endsection

@section('contentheader_title')
    Add Stock Upto Date
    <a href="{{ url('medicine_stocks_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i> Go Back</a>
@endsection

@section('main-content')
<div class="box box-primary" style="padding:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{action('MedicineStockHistoryController@stock_recv')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
            		<div class="col-md-3"></div>
					<div class="col-md-4">

                        <input type="hidden" name="medi_stock_id" value="{{ $id }}">

                        <div class="form-group has-feedback">
            				<label>Stock Upto</label>
            				<input type="text" class="form-control" name="stock_upto" id="stock_upto" autocomplete="off" required>
                            <script type="text/javascript"> $('#stock_upto').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

                        <div class="form-group has-feedback">
            				<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
            			</div>
            		</div>
            	</form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>
@endsection
@section('scripts-extra')

@endsection
