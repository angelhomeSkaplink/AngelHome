<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Add Stock Info
@endsection

@section('contentheader_title')
    Add Stock Info
    <a href="{{ url('medicine_stocks_list') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:115px !important"><i class="material-icons md-14 font-weight-600"> details </i> Go Back</a>
@endsection

@section('main-content')
<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{action('MedicineStockHistoryController@store_stocks')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
            		<div class="col-md-3"></div>
					<div class="col-md-4">
                        
						<div class="form-group has-feedback">
							<label>Pharmacy</label>
							<select name="pharmacy_id" id="pharmacy_id" class="myselect"  style="width:100%; height: 34px;" required>
								<option value="0">Select Pharmacy</option>
								<?php
									$farmacy= DB::table('facility_pharmacy')->get();							
									foreach ($farmacy as $farmacy)
									{ 
										?>
											<option value="{{ $farmacy->facility_pharmacy_id}}">{{ $farmacy->pharmacy_name }}</option>
										<?php
									}														
								?>												
							</select>
						</div>

						<div class="form-group has-feedback">
							<label>Medicine Name*</label>
							<select name="medicine_name" id="medicine_name" class="myselect" style="width:100%; height: 34px;" required >
								<option value="">Chose Option</option>
								<option value="Lipitor">Lipitort</option>
								<option value="Nexium">Nexium</option>
								<option value="Plavix">Plavix</option>
								<option value="Abilify">Abilify</option>
								<option value="Before Dinner">Polycrol Gel</option>
								<option value="Paracetamol">Paracetamol</option>
								<option value="Omez">Omez</option>
							</select>
						</div>

                        <div class="form-group has-feedback">
            				<label>Delivery Date</label>
            				<input type="text" class="form-control" name="delivery_date" id="delivery_date" autocomplete="off" required>
                            <script type="text/javascript"> $('#delivery_date').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Medicine End Date</label>
            				<input type="text" class="form-control" name="medicine_end_date" id="medicine_end_date" autocomplete="off" required>
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
							<label>Resident Name</label>
							<select name="pros_id" id="pros_id" class="myselect"  style="width:100%; height: 34px;" required>
								<option value="0">Select Resident</option>
								<?php
									$users = DB::table('sales_pipeline')->get();							
									foreach ($users as $user)
									{ 
										?>
											<option value="{{ $user->id}}">{{ $user->pros_name }}</option>
										<?php
									}														
								?>												
							</select>
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
