    
   @if ($print_conf->screening != "0")
    <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
          <h3 style="text-align:center;" ><strong>Screening Record</strong></h3>
        </div>
    </div>
    @if (in_array('resp_per',$screening))
    <div class="row" style="padding-top:5px; ">
        @php
          $data = DB::table('responsible_person_details')->where([['pros_id',$pros_id],['status',1]])->first();
        @endphp
      <div class="col-md-12">
          <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Resposible Person</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                @if($data)
                @php
                $resp_name = explode(",",$data->responsible_person_responsible)
                @endphp
                <div class="table-responsive">
                  <table class="table" >
                      <tr style="border:none !important;">
                      <td>
                        <label class="text-capitalize font-500 font-14">Name : </label>
                        <span class="font-14">{{ $resp_name[0] }} {{ $resp_name[1] }} {{ $resp_name[2] }} </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Address 1 : </label>
                        <span class="font-14">{{ $data->address1_responsible }} </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Address 2 : </label>
                        <span class="font-14">{{ $data->address2_responsible }} </span>
                      </td>
                      </tr>
                      <tr>
                      <td>
                        <label class="text-capitalize font-500 font-14">City : </label>
                        <span class="font-14">{{ $data->city_responsible }} </span>
                      </td>

                      <td>
                        <label class="text-capitalize font-500 font-14">State : </label>
                        <span class="font-14">{{ $data->state_responsible }} </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Zip Code : </label>
                        <span class="font-14">{{ $data->zipcode_responsible }}</span>
                      </td>
                      </tr>
                      <tr>
                      <td>
                        <label class="text-capitalize font-500 font-14">Phone : </label>
                        <span class="font-14"> {{ $data->phone_responsible }} </span>
                      </td>
                      <td>
                          <label class="text-capitalize font-500 font-14">Email : </label>
                          <span class="font-14"> {{ $data->email_responsible }} </span>
                      </td>
                      <td></td>
                      </tr>
                  </table>
                </div>
                <div style="clear:both; margin-top:5px;"></div>
                @else
                <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
                @endif
                </div>
            </div>
          </div>
        </div>
    </div>
    @endif
    
    <!-- Significant person data -->
    @if (in_array('sign_per',$screening))
    <div class="row" style="padding-top:5px; ">
        @php
            $data = DB::table('significant_person_details')->where([['pros_id',$pros_id],['status',1]])->first();
        @endphp
    <div class="col-md-12">

        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Significant Personal Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                @if($data)
                @php
                    $sign_name = explode(",",$data->other_significant_person_significant);
                @endphp
              <div class="table-responsive">
            <table class="table" >
            <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14">{{ $sign_name[0] }} {{ $sign_name[1] }} {{ $sign_name[2] }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Address 1 : </label>
                <span class="font-14">{{ $data->address1_significant }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Address 2 : </label>
                <span class="font-14">{{ $data->address2_significant }} </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->city_significant }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">State : </label>
                <span class="font-14">{{ $data->state_significant }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Zip Code : </label>
                <span class="font-14">{{ $data->zipcode_significant }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"> {{ $data->phone_significant }} </span>
              </td>

              <td>
                  <label class="text-capitalize font-500 font-14">Email : </label>
                  <span class="font-14"> {{ $data->email_significant }} </span>
              </td>
              <td></td>
            </tr>
          </table>
          </div>
          <div style="clear:both; margin-top:5px;"></div>
          @else
              <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
          @endif
          </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- Resident Details Data  -->
    @if (in_array('res_details',$screening))

    <div class="row" style="padding-top:5px; ">
    @php
        $data = DB::table('resident_details')->where([['pros_id',$pros_id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Personal Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          @if($data)
          <div class="table-responsive">
              <table class="table" >
              <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Height : </label>
                <span class="font-14">{{ $data->height_resident }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Weight : </label>
                <span class="font-14">{{ $data->weight_resident }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Gender : </label>
                <span class="font-14">{{ $data->gender }} </span>
              </td>
              </tr>
              <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Date Of Birth : </label>
                <span class="font-14">{{ $data->dob }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Place Of Birth : </label>
                <span class="font-14">{{ $data->pob }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Marital Status : </label>
                <span class="font-14">{{ $data->marital }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Religion : </label>
                <span class="font-14"> {{ $data->religion }} </span>
              </td>

              <td>
                  <label class="text-capitalize font-500 font-14">Social Security : </label>
                  <span class="font-14"> {{ $data->social_security_resident }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Medicare : </label>
                <span class="font-14"> {{ $data->medicare_resident }} </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">VA : </label>
                <span class="font-14"> {{ $data->va_resident }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Other Insurance : </label>
                <span class="font-14"> {{ $data->other_insurance_name_resident }} </span>
              </td>
              <td style="clear:both; margin-top:5px;"></td>
            </tr>
              </table>
            </div>
              @else
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              @endif
          </div>
        </div>
      </div>
    </div>
    </div>
    @endif
   
  <!-- Physician and Doctor Details Data -->
  @if (in_array('doctor',$screening))
  <div class="row" style="padding-top:5px; ">
    @php
      $data = DB::table('primary_doctor_details')->where([['pros_id',$pros_id],['status',1]])->first();
    @endphp
<div class="col-md-12">
  @if($data)
  @php
  $prime = explode(",",$data->primary_doctor_primary);
  $spec = explode(",",$data->specialist_doctor_primary);
  $dent = explode(",",$data->dentist);
  @endphp
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
    <h4 class="font-500 text-uppercase font-15" >Primary Physician Information</h4>
    <div class="form-inline border-top" style="padding-top:10px">
      <div class="table-responsive">
        <table class="table" >
        <tr style="border:none !important;">
          <td >
            <label class="text-capitalize font-500 font-14">Primary Physician : </label>
            <span class="font-14">{{ $prime[0] }} {{ $prime[1] }} {{ $prime[2] }}</span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14">{{ $data->address1_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14">{{ $data->address2_primary }} </span>
          </td>
        </tr>
        <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14">{{ $data->city_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14">{{ $data->state_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14">{{ $data->zipcode_primary }}</span>
          </td>
        </tr>
        <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> {{ $data->phone_primary_doctor }} </span>
          </td>

          <td>
              <label class="text-capitalize font-500 font-14">Email : </label>
              <span class="font-14"> {{ $data->email_primary_doctor }} </span>
          </td>
          <td></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
  </div>
    
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Special Physician Information</h4>
      <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table" >
          <tr style="border:none !important;"> 
          <td>
            <label class="text-capitalize font-500 font-14">Special Physician : </label>
            <span class="font-14">{{ $spec[0] }} {{ $spec[1] }} {{ $spec[2] }}</span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14">{{ $data->specialist_address1_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14">{{ $data->specialist_address2_primary }} </span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14">{{ $data->specialist_city_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14">{{ $data->specialist_state_primary }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14">{{ $data->specialist_zipcode_primary }}</span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> {{ $data->specialist_phone_primary_doctor }} </span>
          </td>
          <td></td><td></td>
          </tr>
          </table>
          </div>
        </div>
    </div>
  </div>
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Denstist Information</h4>
      <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table" >
          <tr style="border:none !important;"> 
          <td>
            <label class="text-capitalize font-500 font-14">Dentist : </label>
            <span class="font-14">{{ $dent[0] }} {{ $dent[1] }} {{ $dent[2] }}</span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14">{{ $data->dentist_address1 }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14">{{ $data->dentist_address2 }} </span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14">{{ $data->dentist_city }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14">{{ $data->dentist_state }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14">{{ $data->dentist_zip }}</span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> {{ $data->dentist_phone }} </span>
          </td>
          <td></td><td></td>
          </tr>
          </table>
          </div>
        </div>
        </div>
      </div>
        @else
        <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Physician and Denstist Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
       </div>
        </div>
        </div>   
        @endif
    </div>
    </div>
    @endif

    <!-- Hospital and Pharmacy Details  -->
    @if (in_array('pharmacy',$screening))
<div class="row" style="padding-top:5px; ">
  @php
    $data = DB::table('pharmacy_details')->where([['pros_id',$pros_id],['status',1]])->first();
  @endphp
    <div class="col-md-12">
      @if($data)
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Hospital Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">
                  <td>
                    <label class="text-capitalize font-500 font-14">Hospital : </label>
                    <span class="font-14">{{ $data->hospital }} </span>
                  </td>
                  <td>
                    <label class="text-capitalize font-500 font-14">Phone: </label>
                    <span class="font-14">{{ $data->phone_hospital }} </span>
                  </td>
              </tr>
            </table>
            </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Pharmacy Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Pharmacy : </label>
                <span class="font-14">{{ $data->pharmacy }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14">{{ $data->phone_pharmacy }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Special Medicine Need : </label>
                <span class="font-14">{{ $data->special_med_needs_pharmacy }} </span>
              </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Mortuary Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
            <div class="table-responsive">
              <table class="table">
                <tr style="border:none !important;">
                  <td>
                    <label class="text-capitalize font-500 font-14">Mortuary : </label>
                    <span class="font-14">{{ $data->mortuary }}</span>
                  </td>
                  <td>
                    <label class="text-capitalize font-500 font-14">Phone : </label>
                    <span class="font-14"> {{ $data->phone2_mortuary }} </span>
                  </td>
                  <td style="clear:both; margin-top:5px;"></td>
                </tr>
              </table>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Hospital and Pharmacy Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
    @endif
    <!-- Medical Equipment Data  -->
    @if (in_array('med_equip',$screening))
    <div class="row" style="padding-top:5px; ">
    @php
    $data = DB::table('medical_equip_supp_resident_need')->where([['pros_id',$pros_id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
    @if($data)
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <div class="table-responsive">
            <table class="table">
              <tr style="border:none !important;">
          <td>
            <label class="text-capitalize font-500 font-14">Inconsistancy Supplies/Type : </label>
            <span class="font-14">{{ $data->inconsistency_supplies_type }} </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">PressureRelief Device Type : </label>
            <span class="font-14">{{ $data->pressure_relief_dev_type }} </span>
          </td>
        </table>
          </div>
        </div>
      </div>
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Medical Equipments Need</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <div class="table-responsive">
            <table class="table">
              <tr style="border:none !important;"> 
              <td>
                <label class="text-capitalize font-500 font-14">Bed Pan: </label>
                <span class="font-14">
                  @if($data->bed_pan_medical == "on")
                    <i class="material-icons">done</i>
                    @else
                    <i class="material-icons">highlight_off</i>
                  @endif
                </span>
              </td>
              <td>
                <label class="text-capitalize font-500 font-14">Protective Pads: </label>
                <span class="font-14">
                  @if($data->protective_pads_medical == "on")
                    <i class="material-icons">done</i>
                    @else
                    <i class="material-icons">highlight_off</i>
                  @endif
                </span>
              </td>
              <td>
                <label class="text-capitalize font-500 font-14">Comode: </label>
                <span class="font-14">
                  @if($data->comode_medical == "on")
                    <i class="material-icons">done</i>
                    @else
                    <i class="material-icons">highlight_off</i>
                  @endif
                </span>
              </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Urinal: </label>
                  <span class="font-14">
                    @if($data->urinal_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Crutches: </label>
                  <span class="font-14">
                    @if($data->crutches_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Walker: </label>
                  <span class="font-14">
                    @if($data->walker_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Wheel Chair: </label>
                  <span class="font-14">
                    @if($data->wheelchair_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Cane: </label>
                  <span class="font-14">
                    @if($data->cane_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Hospital Bed: </label>
                  <span class="font-14">
                    @if($data->hospital_beds_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Trapeze: </label>
                  <span class="font-14">
                    @if($data->trapeze_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Oxygen: </label>
                  <span class="font-14">
                    @if($data->oxygen_medical == "on")
                      <i class="material-icons">done</i>
                      @else
                      <i class="material-icons">highlight_off</i>
                    @endif
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Others: </label>
                  <span class="font-14">
                    {{$data->other_medical}}
                  </span>
                </td>
              </tr>
            </table>    
            </div>
          </div>
        </div>
        <div style="clear:both; margin-top:5px;"></div>
    </div>
        @else
        <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              </div>
            </div>
          </div>
        @endif
        </div>
    </div>
    @endif
        <!-- Insurance Data  -->
        @if (in_array('insurance',$screening))
    <div class="row" style="padding-top:5px; ">
        @php
            $data = DB::table('insurance')->where([['pros_id',$pros_id],['status',1]])->first();
        @endphp
    <div class="col-md-12">
        @if($data)
        @php
            $pers_res = explode(",",$data->personal_responcible);
            $case = explode(",",$data->case_manager);
        @endphp
            <div class="box box-primary border-light-blue">
              <div class="box-body padding-top-5" style="padding-bottom:10px">
                <h4 class="font-500 text-uppercase font-15" >Insurance Information</h4>
                <div class="form-inline border-top" style="padding-top:10px">
                <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">     
                  <td>
                    <label class="text-capitalize font-500 font-14">Social Security : </label>
                    <span class="font-14">{{ $data->ss }} </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Medicare : </label>
                    <span class="font-14">{{ $data->medicare }} </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Supplement Insurance Name  : </label>
                    <span class="font-14">{{ $data->supplemental_insurance_name }} </span>
                  </td>
                  </tr>
                  <tr>
                  <td>
                    <label class="text-capitalize font-500 font-14">Policy : </label>
                    <span class="font-14">{{ $data->policy }} </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Medicaid : </label>
                    <span class="font-14">{{ $data->medicaid }} </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Responsible for Financial Matters : </label>
                    <span class="font-14">{{ $pers_res[0] }} {{ $pers_res[1] }} {{ $pers_res[2] }}</span>
                  </td>
                  </tr>
                  <tr>
                  <td>
                    <label class="text-capitalize font-500 font-14">Case Manager : </label>
                    <span class="font-14"> {{ $case[0] }} {{ $case[1] }} {{ $case[2] }}</span>
                  </td>

                  <td>
                      <label class="text-capitalize font-500 font-14">Case Manager Phone : </label>
                      <span class="font-14"> {{ $data->manager_phone }} </span>
                  </td>
                  <td style="clear:both; margin-top:5px;"></td>
                  </tr>
                  </table>
                  </div>
              </div>
            </div>
            </div>
            @else
            <div class="box box-primary border-light-blue">
                <div class="box-body padding-top-5" style="padding-bottom:10px">
                  <h4 class="font-500 text-uppercase font-15" >Insurance Information</h4>
                  <div class="form-inline border-top" style="padding-top:10px">
                      <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
                  </div>
                </div>
              </div>
            @endif
        </div>
        </div>
        @endif

        <!-- Funeral Home Data -->
  @if (in_array('funeral',$screening))
   <div class="row" style="padding-top:5px; ">
    @php
      $data = DB::table('funeral_home')->where([['pros_id',$pros_id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
    @if($data)
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Funeral Home Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table">
            <tr style="border:none !important;"> 
              <td>
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14">{{ $data->funeral_home }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14">{{ $data->phone }} </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->city }} </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Address : </label>
Success!
                <span class="font-14">{{ $data->address }} </span>
              </td>
              <td style="clear:both; margin-top:5px;"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Funeral Home Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
            <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        </div>
      </div>
    </div>
  @endif
</div>
</div>
@endif
@endif