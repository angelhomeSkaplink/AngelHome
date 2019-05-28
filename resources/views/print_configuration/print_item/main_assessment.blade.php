    {{-- main assessment --}}
    @if ($print_conf->initial_assess == 1)
    <div class="row" style="padding-top:5px;" id="main_assess">
        @php
          $data = DB::table('responsible_person_details')->where([['pros_id',$pros_id],['status',1]])->first();
        @endphp
        <div class="col-md-12">
          <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
               <h3 style="text-align:center"><strong>Main Assessment</strong></h3>
              <div class="form-inline border-top" style="padding-top:10px">
                <div class="table-responsive ">
                  <table class="table table-striped">
                    <tbody>
                        @foreach($final as $qa)
                      <tr class="Active">
                        <td><h4><strong>Question: {{$qa->qs}}</strong></h4></td>	
                                    </tr>  
                      <tr>
                        <td><h6><strong>Answer:</strong> {{$qa->ans}}</h6></td>
                                    </tr>
                      @endforeach                           
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif