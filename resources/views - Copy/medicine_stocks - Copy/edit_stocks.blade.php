<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Edit Stock Info
@endsection

@section('contentheader_title')
    Edit Stock Info
    <a href="{{ url('medicine_stocks_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i> Go Back</a>
@endsection

@section('main-content')

<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{ action('MedicineStockHistoryController@update_stocks') }}" method="post">
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
            		<div class="col-md-6">
                        <input type="hidden" class="form-control" name="medi_stock_id" value="{{ $stocks->medi_stock_id }}" required/>

                        <div class="form-group has-feedback">
            				<label>Pharmacy ID</label>
            				<input type="number" class="form-control" name="pharmacy_id" value="{{ $stocks->pharmacy_id }}" required/>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Medicine Name</label>
            				<input type="text" class="form-control" name="medicine_name" value="{{ $stocks->medicine_name }}" required/>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Delivery Date</label>
            				<input type="text" class="form-control" name="delivery_date" id="delivery_date" autocomplete="off" value="{{ $stocks->delivery_date }}" required>
                            <script type="text/javascript"> $('#delivery_date').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Medicine End Date</label>
            				<input type="text" class="form-control" name="medicine_end_date" id="medicine_end_date" autocomplete="off" value="{{ $stocks->medicine_end_date }}" required>
                            <script type="text/javascript"> $('#medicine_end_date').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

						<div class="form-group has-feedback">
							<label>Stock Status</label>
							<select name="medi_stock_status" id="medi_stock_status" class="myselect" style="width:100%; height: 34px;" required >
								<option value="">Choose Option</option>
								<option value="0">Ended</option>
								<option value="1">Active</option>
							</select>
						</div>

            			<div class="form-group has-feedback">
            				<label>Prospective ID</label>
            				<input type="number" class="form-control" name="pros_id" value="{{ $stocks->pros_id }}" required/>
            			</div>

                        <div class="form-group has-feedback">
            				<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
            			</div>

						<div class="form-group has-feedback">
                            <a href="{{  url('medicine_stocks_list') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
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
