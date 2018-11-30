<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Create Policy
@endsection

@section('contentheader_title')
    Create Policy
    <div class="form-group has-feedback" style="float:right;">
        <a href="{{  url('view_policy') }}" class="btn btn-primary btn-block btn-flat btn-width">View</a>
    </div>
@endsection

@section('main-content')

<div class="box box-primary" style="padding:15px;margin-top:25px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="{{action('DoctorController@store_policy_details')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
            		<div class="col-md-6">

                        <div class="form-group has-feedback">
            				<label>Policy Title</label>
            				<input type="text" class="form-control" name="policy_title" required/>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Policy Description</label>
                            <textarea style="resize:none;" class="form-control" rows="10" name="policy_description" required></textarea>
            			</div>

                        <div class="form-group has-feedback">
            				<label>Effective Date</label>
            				<input type="text" class="form-control" name="pol_effected_date" id="pol_effected_date" autocomplete="off" required>
                            <script type="text/javascript"> $('#pol_effected_date').datepicker({format: 'yyyy/mm/dd'});</script>
            			</div>

                        <div class="form-group has-feedback" style="float:left;">
                            <a href="{{  url('/dashboard') }}" class="btn btn-primary btn-block btn-flat btn-width">Cancel</a>
            			</div>
                        <div class="form-group has-feedback">
            				<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
            			</div>
            		</div>

            	</form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection
