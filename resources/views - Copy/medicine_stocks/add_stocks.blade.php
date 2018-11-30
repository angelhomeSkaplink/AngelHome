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
<script>
$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'prospect_prescription/'+pros_id,
					type: "GET",
					dataType: "json",
					
					success:function(data) {
						console.log(data);
						var c = '';
						data.forEach(function(u) {	
							c += `<option value="${u.prescription_id}">${u.prescription_id}</option>`
						});
						$("#prescription_id").empty().append(c)
					}
				});
			}					
		});
	});
</script>
<div class="box box-primary" style="padding:15px; margin-top:22px;">
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
							<label>Prospective</label>
							<select name="pros_id" id="pros_id"  class="myselect"  style="width:100%; height: 34px;" required>
								<option value="">Select Prospective</option>
								<?php
									$pros = DB::table('sales_pipeline')->select('pros_name', 'id')->get();
									foreach ($pros as $pros)
									{
										?>
											<option value="{{ $pros->id}}">{{ $pros->pros_name }}</option>
										<?php
									}
								?>
							</select>
						</div>


                        <div class="form-group has-feedback">
							<label>Prescription ID</label>
							<select name="prescription_id" id="prescription_id" class="myselect"  style="width:100%; height: 34px;" required>
								
							</select>
						</div>

						<div class="form-group has-feedback">
							<label>Medicine Name*</label>
							<select name="medicine_name" id="medicine_name" class="myselect" style="width:100%; height: 34px;" required >
								<option value="">Chose Option</option>
								<option value="Lipitort">Lipitort</option>
								<option value="Nexium">Nexium</option>
								<option value="Plavix">Plavix</option>
								<option value="Abilify">Abilify</option>
								<option value="Polycrol Gel">Polycrol Gel</option>
								<option value="Paracetamol">Paracetamol</option>
								<option value="Omez">Omez</option>
							</select>
						</div>

                        <div class="form-group has-feedback">
            				<label>Stock End Date</label>
            				<input type="text" class="form-control" name="course_end_date" id="stock_end_date" autocomplete="off" required>
                            <script type="text/javascript"> $('#stock_end_date').datepicker({format: 'yyyy/mm/dd'});</script>
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

	$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			if(pros_id) {
				$.ajax({
					url: 'prescription_d/'+pros_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$.each(data, function() {
							document.getElementById('prescription_id').value = data.prescription_id;
						});
					}
				});
			}
		});
	});

</script>
@endsection
@section('scripts-extra')

@endsection
