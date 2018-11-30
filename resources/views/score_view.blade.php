
@extends('layouts.app')

@section('htmlheader_title')
    
@endsection

@section('contentheader_title')
    
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

<div class="row">
	@if($assessment_form_name=='Smoking Assessment')
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">
	Smoking Assessment details
	<button onclick=window.history.back(); class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:125 !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_backspace </i> BACK</button>
	
	</h4>
	
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">						
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Assessment Question</th>								
							<th class="th-position text-uppercase font-500 font-12">Answer</th>	
							<th class="th-position text-uppercase font-500 font-12">Point</th>
						</tr>
						<tr>
							<td>Smoker ?</td>
							<td>Yes</td>
							<td>20</td>
						</tr>
						<tr>
							<td>Cognitive Patterns Memory Memory Problem ?</td>
							<td>Yes</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Cognitive Patterns Decisions Decision Making Impaired ? </td>
							<td>Yes</td>
							<td>10</td>
						</tr>
						<tr>
							<td><label>Total Assessment score</label></td>
							<td></td>
							<td>40</td>								
						</tr>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
	@elseif($assessment_form_name=='Dietary Assessment')
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">
	Dietary Assessment details
	<button onclick=window.history.back(); class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:125 !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_backspace </i> back</button>
	</h4></div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">						
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Assessment Question</th>								
							<th class="th-position text-uppercase font-500 font-12">Answer</th>	
							<th class="th-position text-uppercase font-500 font-12">Point</th>
						</tr>
						<tr>
							<td>Diagnosis ?</td>
							<td>Yes</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Diet Prescription ?</td>
							<td>Yes</td>
							<td>10</td>
						</tr>
						<tr>
							<td><label>Total Assessment score</label></td>
							<td></td>
							<td>20</td>								
						</tr>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
	@elseif($assessment_form_name=='Test')
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">
	Test Assessment details
	<button onclick=window.history.back(); class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:125 !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_backspace </i> back</button>
	</h4></div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">						
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Assessment Question</th>								
							<th class="th-position text-uppercase font-500 font-12">Answer</th>	
							<th class="th-position text-uppercase font-500 font-12">Point</th>
						</tr>
						<tr>
							<td> First Test Question ?</td>
							<td>First Test Answer</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Second Test Question</td>
							<td>Second Test Answer</td>
							<td>10</td>
						</tr>
						<tr>
							<td> Third Test Question ?</td>
							<td>Third Test Answer</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Fourth Test Question</td>
							<td>Fourth Test Answer</td>
							<td>20</td>
						</tr>
						<tr>
							<td><label>Total Assessment score</label></td>
							<td></td>
							<td>50</td>								
						</tr>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
	@endif
</div>
@include('layouts.partials.scripts_auth')

@endsection
