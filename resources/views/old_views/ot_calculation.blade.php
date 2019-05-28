@extends('layouts.app')
@section('htmlheader_title')
    OT Generation
@endsection
@section('contentheader_title')
    OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21

@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="row">
	<form action="generate_ot" method="post">
        {!! csrf_field() !!}		
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl.No</th>
								<th>Employee Code</th>
								<th>No of Days</th>
								<th>Over Time</th>
							</tr>
							<?php $i = 1; ?>
							@if(count($calculations)>0)
							@foreach ($calculations as $calculation)
							<tr>								
								<?php 
									$out_time = substr($calculation->out_time, 0, 2);
									$over_time = $out_time - 51;
									
								?>
								<td>{{ $i++ }}</td>
								<td>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="emp_id[]" value="{{ $calculation->emp_id }}" readonly />
									</div>
								</td>
								<td>
								<?php if($calculation->month=='January' || $calculation->month=='March' || $calculation->month=='May' || $calculation->month=='July' || $calculation->month=='August' || $calculation->month=='October' || $calculation->month=='December' ){ ?>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="working_days[]" value="31" readonly />
									</div>									
								<?php } elseif($calculation->month=='February'){ ?>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="working_days[]" value="28" readonly />
									</div>
								<?php } else{?>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="working_days[]" value="30" readonly />
									</div>
								<?php } ?>
								</td>
								<td>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="ot_hours[]" value="<?php echo $over_time; ?>" readonly />
									</div>
								</td>
								<?php 
									$employee = DB::table('employees')->where('emp_id', $calculation->emp_id)->get();
									foreach($employee as $emp){
										if($emp->emp_type=='Casual'){
											echo $amount = 20*$over_time;
										}
										else{
											$posts = DB::table('posts')->where([['fld_PostID', $emp->post_id], ['fld_Status', '1']])->get();
											foreach($posts as $post){
												if($post->fld_PostID==21){
													if($calculation->month=='January' || $calculation->month=='March' || $calculation->month=='May' || $calculation->month=='July' || $calculation->month=='August' || $calculation->month=='October' || $calculation->month=='December'){
														$time = ((4560/31)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													elseif($calculation->month=='February'){
														$time = ((4560/28)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													else{
														$time = ((4560/30)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}													
												}
												elseif($post->fld_PostID==16 || $post->fld_PostID==17 || $post->fld_PostID==18 || $post->fld_PostID==19 || $post->fld_PostID==20){
													if($calculation->month=='January' || $calculation->month=='March' || $calculation->month=='May' || $calculation->month=='July' || $calculation->month=='August' || $calculation->month=='October' || $calculation->month=='December'){
														$time = ((5200/31)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													elseif($calculation->month=='February'){
														$time = ((5200/28)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													else{
														$time = ((5200/30)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
												}
												elseif($post->fld_PostID==1 || $post->fld_PostID==2 || $post->fld_PostID==3 || $post->fld_PostID==4 || $post->fld_PostID==5 || $post->fld_PostID==6 || $post->fld_PostID==7 || $post->fld_PostID==8 || $post->fld_PostID==9 || $post->fld_PostID==10 || $post->fld_PostID==11 || $post->fld_PostID==12 || $post->fld_PostID==13 || $post->fld_PostID==14 || $post->fld_PostID==15){
													if($calculation->month=='January' || $calculation->month=='March' || $calculation->month=='May' || $calculation->month=='July' || $calculation->month=='August' || $calculation->month=='October' || $calculation->month=='December'){
														$time = ((8000/31)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													elseif($calculation->month=='February'){
														$time = ((8000/28)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
													else{
														$time = ((8000/30)/7);
														echo $amount = sprintf("%.2f",$time*$over_time);
													}
												}
											}
										}
									?>									
								<td>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="amount[]" value="<?php echo $amount; ?>" readonly />
									</div>
								</td>
								<input type="hidden" class="form-control" placeholder="" name="month[]" value="{{ $calculation->month }}" />
								<input type="hidden" class="form-control" placeholder="" name="year[]" value="{{ $calculation->year }}" />
								<?php }	
								?>
							</tr>							
							@endforeach	
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif							
                        </tbody>						
                    </table>
					<div class="col-xs-8"></div> 
					<div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Generate OT Rtgs</button>
					</div>
				<div>
            </div>
        </div>
	</form>
</div>

    @include('layouts.partials.scripts_auth')
@endsection
