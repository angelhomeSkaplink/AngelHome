<?php 
if($data->social_security_resident != ""){
	$soc_sec= decrypt($data->social_security_resident);
}else{
	$soc_sec = "";
}
$qry = DB::table('sales_pipeline')->where('id',$id)->first();
$name = explode(",",$qry->pros_name);
 ?>
    <div class="tab-content" id="myTabContent">
		<div class="col-md-12">
			
				<form action="<?php echo e(action('ScreeningController@add_resident_details')); ?>" method="post">
					<input type="hidden" name="_method" value="PATCH">
					<?php echo e(csrf_field()); ?>

					<div class="col-md-6">
							<div class="panel panel-default">
									<div class="panel-body border padding-7">
						<input type="hidden" class="form-control" placeholder="" name="pros_id" value="<?php echo e($id); ?>"/>
						<div class="has-feedback">
							<label><?php echo app('translator')->get("msg.Name"); ?></label>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group has-feedback">
									<input type="text" class="form-control" name="pros_name[]" value="<?php echo e($name[0]); ?>" />
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group has-feedback">
									<input type="text" class="form-control" name="pros_name[]" value="<?php echo e($name[1]); ?>" />
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group has-feedback">
										<input type="text" class="form-control" name="pros_name[]" value="<?php echo e($name[2]); ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label>Date Of Birth</label>
							<input type="date" class="form-control" placeholder="" name="dob" value="<?php echo e($data->dob); ?>" id="dob"/>
						</div>
						<div class="form-group has-feedback">
							<label>Place of Birth</label>
							<input type="text" class="form-control" placeholder="" name="pob" value="<?php echo e($data->pob); ?>" pattern="[A-Za-z\s]+"/>
						</div>
						<div class="form-group has-feedback">
							<label>Gender</label>
							<select name="gender" id="gender" class="form-control" required >
								<option value="<?php echo e($data->gender); ?>"> <?php echo e($data->gender); ?> </option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group has-feedback">
							<label>Religion</label>
							<input type="text" class="form-control" placeholder="" name="religion" value="<?php echo e($data->religion); ?>" pattern="[A-Za-z\s]+"/>
						</div>
						<div class="form-group has-feedback">
							<label>Marital Status</label>
							<select name="marital" id="marital_status" class="form-control" required >
								<option value="<?php echo e($data->marital); ?>"> <?php echo e($data->marital); ?> </option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
							</select>
						</div>
					</div>
				</div>
					</div>
					<div class="col-md-6">
							<div class="panel panel-default">
									<div class="panel-body border padding-7">
						<div class="form-group has-feedback">
							<label>Height</label>
							<select name="height_resident" id="height_resident"  class="form-control" required >
								<option value="<?php echo e($data->height_resident); ?>"><?php echo e($data->height_resident); ?></option>
								<option value="4.0">4.0</option>
								<option value="4.1">4.1</option>
								<option value="4.2">4.2</option>
								<option value="4.3">4.3</option>
								<option value="4.4">4.4</option>
								<option value="4.5">4.5</option>
								<option value="4.6">4.6</option>
								<option value="4.7">4.7</option>
								<option value="4.8">4.8</option>
								<option value="4.9">4.9</option>
								<option value="4.10">4.10</option>
								<option value="4.11">4.11</option>
								<option value="5.0">5.0</option>
								<option value="5.1">5.1</option>
								<option value="5.2">5.2</option>
								<option value="5.3">5.3</option>
								<option value="5.4">5.4</option>
								<option value="5.5">5.5</option>
								<option value="5.6">5.6</option>
								<option value="5.7">5.7</option>
								<option value="5.8">5.8</option>
								<option value="5.9">5.9</option>
								<option value="5.10">5.10</option>
								<option value="5.11">5.11</option>
								<option value="6.0">6.0</option>
								<option value="6.1">6.1</option>
								<option value="6.2">6.2</option>
								<option value="6.3">6.3</option>
								<option value="6.4">6.4</option>
								<option value="6.5">6.5</option>
								<option value="6.6">6.6</option>
								<option value="6.7">6.7</option>
								<option value="6.8">6.8</option>
								<option value="6.9">6.9</option>
								<option value="6.10">6.10</option>
								<option value="6.11">6.11</option>
								<option value="7.0">7.0</option>
							</select>
						</div>
						<div class="form-group has-feedback">
							<label>Weight</label>
							<select name="weight_resident" id="weight_resident" class="form-control" required >
								<option value="<?php echo e($data->weight_resident); ?>"><?php echo e($data->weight_resident); ?></option>
								<?php for($i=60; $i<=300; $i++){?>
								<option value="<?php echo $i?>"><?php echo $i?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group has-feedback">
							<label>Medicare</label>
							<select name="medicare_resident" id="medicare_resident" class="form-control" required >
								<option value="<?php echo e($data->medicare_resident); ?>"> <?php echo e($data->medicare_resident); ?> </option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						
						<div class="form-group has-feedback">
							<label>VA</label>
							<select name="va_resident" id="va_resident" class="form-control" required >
								<option value="<?php echo e($data->va_resident); ?>"> <?php echo e($data->va_resident); ?> </option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						<div class="form-group has-feedback">
							<label>Other Insurance Name</label>
							<input type="text" class="form-control" placeholder="" name="other_insurance_name_resident" value="<?php echo e($data->other_insurance_name_resident); ?>" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
						</div>
						<div class="form-group has-feedback">
							<label>Social Security</label>
							<input type="text" class="form-control" placeholder="" name="social_security_resident" value="<?php echo e($soc_sec); ?>" required />
						</div>
						<?php if($qry->stage == "MoveIn"): ?>
						<div class="form-group has-feedback">
							<label>Move Out Date</label>
							<input type="date" class="form-control" placeholder="" name="moveout_date" min="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e($qry->moveout_date); ?>" />
						</div>
						<?php endif; ?>
						<div class="col-md-6 text-center">
								<div class="form-group has-feedback">
										<button type="button" class="btn btn-danger btn-flat btn-sm" onclick="history.back()" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></button>
								</div>
						</div>
						<div class="col-md-6 text-center">
								<div class="form-group has-feedback">
									<button type="submit" class="btn btn-success btn-flat btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
								</div>
						</div>
									<br>			
					</div>
				</div>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>

