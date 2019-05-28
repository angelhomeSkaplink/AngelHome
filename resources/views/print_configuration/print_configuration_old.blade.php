@extends('layouts.app')

@section('htmlheader_title')
    Bundle Print Configuration
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Bundle Print Configuration</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="/dashboard" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
 </div>
</div>
@endsection

@section('main-content')
<style media="screen">
  :checked + span{
    color: #000080;
  }
  input[type=checkbox]:checked + span .material-icons::before{
    content:"print";
    color: #000080;
  }
  input[type=checkbox] + span .material-icons::before{
    content:"print_disabled";
  }
</style>
<div class="row" >
  <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
          <h4 style="color:aliceblue !important;"><strong> Bundle Print Items</strong>
          @if($config->print_config_id !=0)
            <span class="pull-right" style="margin-top:-10px;"><a href="{{ url('print_order') }}" class="btn btn-primary"><i class="material-icons"> settings</i><span style="font-size:1.1em;padding-left:5px;text-transform:none"><strong>Print Order</strong></span></a></span>
          @endif
          </h4>
        </div>
        <div class="panel-body">
          <form action="save_print_configuration" method="post">
            <input type="hidden" name="_method" value="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <i class="material-icons">library_books</i><span style="font-size:1.2em;padding-left:5px;"><strong>Initial Assessment</strong></span>
                      </div>
                      <div class="body">
                        <ul style="list-style:none;padding:20px;">
                          <li>
                            <div class="form-check">
                              <label>
                                <input type="checkbox" id="main_assessment" name="main_assessment" value="main_assessment"/>
                                <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;"><strong>Main Assessment</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons"></i></span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <i class="material-icons">library_books</i><span style="font-size:1.2em;padding-left:5px;"><strong>Screening Record</strong>
                            <span class="form-check pull-right"><label><input type="checkbox" id="screen_check" name="">
                            <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Select All</strong></span></label>
                            </span>
                          </span>
                        </div>
                        <div class="panel-body">
                            <ul style="list-style:none;">
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="resp_per" class="screening" name="resp_per" value="resp_per">
                                    <span class="label-text">
                                      <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Responsible Personnel</strong></span>
                                      <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="sign_per" class="screening" name="sign_per" value="sign_per">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Significant Personnel</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="res_details" class="screening" name="res_details" value="res_details">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Resident Details</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="doctor" class="screening" name="doctor" value="doctor">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Physician and Dentist</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="pharmacy" class="screening" name="pharmacy" value="pharmacy">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Hospital and Pharmacy</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="med_equip" class="screening" name="med_equip" value="med_equip">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Medical Equipment</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="insurance" class="screening" name="insurance" value="insurance">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Insurance</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                              <li>
                                <div class="form-check">
                                  <label>
                                    <input type="checkbox" id="funeral" class="screening" name="funeral" value="funeral">
                                    <span class="label-text">
                                    <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Funeral</strong></span>
                                    <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                                  </span>
                                  </label>
                                </div>
                              </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <i class="material-icons">description</i><span style="font-size:1.2em;padding-left:5px;"><strong>Policy Documents</strong>
                        <span class="form-check pull-right"><label><input type="checkbox" id="policy_all" name="">
                            <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Select All</strong></span></label>
                        </span>
                      </span>
                  </div>
                  <div class="panel-body">
                      @php
                      $docs = DB::table('documents')->where([['facility_id',Auth::user()->facility_id],['doc_type',"policy_doc"]])->get();

                      @endphp
                      @if($docs->isEmpty())
                        <span>There is no document</span>
                      @else
                      <div class="row">
                      @foreach($docs as $d)
                        <div class="col-lg-6">
                          <div class="form-check">
                            <label>
                              <input type="checkbox" id="{{$d->id}}" class="policy" name="{{$d->id}}" value="{{$d->doc_type}}">
                              <span class="label-text">
                              <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>{{ $d->doc_name }}</strong></span>
                              <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                            </span>
                            </label>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                  </div>
              </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <i class="material-icons">description</i><span style="font-size:1.2em;padding-left:5px;"><strong>Legal Documents</strong>
                        <span class="form-check pull-right"><label><input type="checkbox" id="legal_all" name="">
                            <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Select All</strong></span></label>
                        </span>
                    </span>
                  </div>
                  <div class="panel-body">
                    @php
                      $docs = DB::table('documents')->where([['facility_id',Auth::user()->facility_id],['doc_type',"legal_doc"]])->get();
                      @endphp
                      @if($docs->isEmpty())
                        <span>There is no document</span>
                      @else
                      <div class="row">
                      @foreach($docs as $d)
                        <div class="col-lg-6">
                          <div class="form-check">
                            <label>
                              <input type="checkbox" id="{{$d->id}}" class="legal" name="{{$d->id}}" value="{{$d->doc_type}}">
                              <span class="label-text">
                              <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>{{ $d->doc_name }}</strong></span>
                              <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                            </span>
                            </label>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <i class="material-icons">description</i>
                    <span style="font-size:1.2em;padding-left:5px;"><strong>Lease Signing Documents</strong>
                        <span class="form-check pull-right"><label><input type="checkbox" id="lease_all" name="">
                            <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>Select All</strong></span></label>
                        </span>
                    </span>
                  </div>
                  <div class="panel-body">
                   @php
                      $docs = DB::table('documents')->where([['facility_id',Auth::user()->facility_id],['doc_type',"lease_signing"]])->get();
                      @endphp
                      @if($docs->isEmpty())
                        <span>There is no document</span>
                      @else
                      <div class="row">
                      @foreach($docs as $d)
                        <div class="col-lg-6">
                          <div class="form-check">
                            <label>
                              <input type="checkbox" id="{{$d->id}}" class="lease" name="{{$d->id}}" value="{{$d->doc_type}}">
                              <span class="label-text">
                              <span style="font-size:1.2em;padding-right:10px;text-transform:none;" class="label-text"><strong>{{ $d->doc_name }}</strong></span>
                              <span style="color:#8c8c8c;"><i class="material-icons blue"></i></span>
                            </span>
                            </label>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 form-inline">
                <button type="submit" class="btn btn-success pull-right">Save Settings</button>
            </form>
            @if($config->print_config_id!=0)
            <form class="" action="reset_print_configuration" method="post">
                <input type="hidden" name="_method" value="post">
                {{ csrf_field() }}
                <input type="hidden" name="print_config_id" value="{{$config->print_config_id}}">
                <button type="submit" class="btn btn-default pull-right" style="margin-right:5px;">Reset</button>
            </form>
            @else
                <a href="dashboard/" class="btn btn-default pull-right" style="margin-right:5px;">Cancel</a>
            @endif
              </div>
            </div>

        </div>
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script type="text/javascript">
    $(document).ready(function(){
      var flag = "<?php echo $config->print_config_id;?>";
      if(flag!=0){
        var initial = "<?php echo $config->initial_assess ;?>";
        var screening = "<?php echo $config->screening ;?>";
        var policy_doc = "<?php echo $config->policy_doc ;?>";
        var legal_doc = "<?php echo $config->legal_doc ;?>";
        var lease_signing_doc = "<?php echo $config->lease_signing_doc ;?>";
        screening = screening.split(",");
        policy_doc = policy_doc.split(",");
        legal_doc = legal_doc.split(",");
        lease_signing_doc = lease_signing_doc.split(",");
        if(initial == 1){
          $('#main_assessment').prop('checked',true);
        }
        screening.forEach(function(e){
          $('#'+e).prop('checked',true);
        });
        policy_doc.forEach(function(e){
          $('#'+e).prop('checked',true);
        });
        legal_doc.forEach(function(e){
          $('#'+e).prop('checked',true);
        });
        lease_signing_doc.forEach(function(e){
          $('#'+e).prop('checked',true);
        });
      }
      $("#screen_check").click(function () {
            $(".screening").prop('checked', $(this).prop('checked'));
        });

        $(".screening").change(function(){
            if (!$(this).prop("checked")){
                $("#screen_check").prop("checked",false);
            }
        });
        $("#policy_all").click(function () {
            $(".policy").prop('checked', $(this).prop('checked'));
        });

        $(".policy").change(function(){
            if (!$(this).prop("checked")){
                $("#policy_all").prop("checked",false);
            }
        });
        $("#legal_all").click(function () {
            $(".legal").prop('checked', $(this).prop('checked'));
        });

        $(".legal").change(function(){
            if (!$(this).prop("checked")){
                $("#legal_all").prop("checked",false);
            }
        });
        $("#lease_all").click(function () {
            $(".lease").prop('checked', $(this).prop('checked'));
        });

        $(".lease").change(function(){
            if (!$(this).prop("checked")){
                $("#lease_all").prop("checked",false);
            }
        });
    });
</script>
@endsection
