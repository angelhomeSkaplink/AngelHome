
@extends('layouts.app')

@section('htmlheader_title')
    Personal Detail
@endsection

@section('contentheader_title')
	<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>ADD personal details for {{ $name->pros_name }}</b></p>
@endsection

@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<!--<div class="container">
	<div class="row">
		<div class="panel with-nav-tabs panel-danger">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1danger" data-toggle="tab">Danger 1</a></li>
                    <li><a href="#tab2danger" data-toggle="tab">Danger 2</a></li>
                    <li><a href="#tab3danger" data-toggle="tab">Danger 3</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#tab4danger" data-toggle="tab">Danger 4</a></li>
                            <li><a href="#tab5danger" data-toggle="tab">Danger 5</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</div>-->
<div class="box box-primary padding-bottom-25">			
	<div class="container">
		<div class="row">		
			<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-15px; margin-top:1px">
				<li class="nav-item">
					<a class="nav-link" href="../details/{{ $id }}">PERSONAL DETAILS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../personal_insurance/{{ $id }}">INSURANCE INFORMATION</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contact/{{ $id }}">EMERGENCY CONTACT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../physician/{{ $id }}">PHYSICIAN</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../dentist/{{ $id }}">DENTIST</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="../funeral/{{ $id }}">FUNERAL HOME & PHARMACY</a>
				</li>
			</ul>
		</div>		
		<div style="margin-top:35px"></div>				
		<div class="col-md-10">
			<form action="{{action('PersonalDetailsController@add_others')}}" id="funeral" method="post">
				<input type="hidden" name="_method" value="PATCH">
				{{ csrf_field() }}
				<div class="box-body">				
					<div class="col-md-6">
						<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>						
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Pharmacy" name="pharmacy" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
						</div>								
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Hospital" name="hospital"/>									
						</div>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Allergies" name="allergies" />									
						</div>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="CPR Status" name="cpr_status"/>
						</div>		
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="Phone No" name="pharmacy_phone"/>									
						</div>									
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="Phone No" name="hospital_phone"/>
						</div>																	
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Diagnosis" name="diagnosis"/>									
						</div>							
					</div>				
				</div><br/><br/>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Funeral Home" name="funeral_home" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="Phone No" name="funeral_phone" />									
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
						</div>
						</br></br><br/>	
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
