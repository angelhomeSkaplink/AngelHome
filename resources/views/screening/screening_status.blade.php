
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_data/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">next</a>
    </div>
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_status/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >MENTAL STATUS</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Oriented : </label>
						<span class="font-14">{{ $reports_1->oriented }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Oriented Note : </label>
						<span class="font-14">{{ $reports_1->oriented_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Wanders : </label>
						<span class="font-14">{{ $reports_1->wanders }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Wanders Note : </label>
						<span class="font-14">{{ $reports_1->wanders_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">History Of Mental Illness : </label>
						<span class="font-14">{{ $reports_1->history_mental_ill }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">History of mental illness note : </label>
						<span class="font-14">{{ $reports_1->history_mental_ill_note }}</span>
					</div>

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Memory Lapses  : </label>
						<span class="font-14"> {{ $reports_1->memory_lapses }} </span>
					</div>	

    				<div class="col-md-6" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Memory Lapses Note : </label>
                        <span class="font-14"> {{ $reports_1->memory_lapses_note }} </span>
					</div>	
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Danger To Society : </label>
                        <span class="font-14"> {{ $reports_1->danger_to_s_o }} </span>
					</div>
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Danger To Society Note  : </label>
                        <span class="font-14"> {{ $reports_1->danger_to_s_o_note }} </span>
					</div>
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Behaviors : </label>
                        <span class="font-14"> {{ $reports_1->behaviors }} </span>
					</div>
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Behaviors Note : </label>
                        <span class="font-14"> {{ $reports_1->behaviors_note }} </span>
					</div>
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >BATHING</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Assistance : </label>
						<span class="font-14">{{ $reports_2->need_assist }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->need_assist_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Special Equipment : </label>
						<span class="font-14">{{ $reports_2->spec_equip }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->spec_equip_note }} </span>
					</div>	

                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
