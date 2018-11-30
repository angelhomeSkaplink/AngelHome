<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    Policy
@endsection

@section('contentheader_title')
    Policy
    @if(count($qry_data) == 0 )
    <div class="form-group has-feedback" style="float:right;">
        <a href="{{  url('create_policy') }}" class="btn btn-primary btn-block btn-flat btn-width">Create</a>
    </div>
    @else
    <div class="form-group has-feedback" style="float:right;">
        <a href="{{  url('edit_policy') }}" class="btn btn-primary btn-block btn-flat btn-width">Edit</a>
    </div>
    @endif
@endsection

@section('main-content')

@if(count($qry_data) == 0 )
<div class="box box-primary" style="padding:15px;margin-top:25px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">No Policies created</label>
                </div>

            </div>
        </div>
    </div>
</div>
@else
<div class="box box-primary" style="padding:15px;margin-top:25px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Policy Title : </label>
                    <span class="font-14">{{ $qry_data[0]->policy_title }} </span>
                </div>

                <div class="row" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Effective from : </label>
                    <span class="font-14">{{ $qry_data[0]->pol_effected_date }} </span>
                </div>

                <div class="row" style="padding-left: 0; padding-right:0">
                    <span class="font-14">{{ $qry_data[0]->policy_desc }} </span>
                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('scripts-extra')

@endsection
