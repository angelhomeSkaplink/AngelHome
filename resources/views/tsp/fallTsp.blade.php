<div>
  <h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Fall
      <span class="pull-right"><span class="btn btn-primary" id="fallTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
        </strong>
  </h3><br/>
   <div class="tab-pane fade active in container" id="tsp_fall" role="tabpanel" aria-labelledby="home-tab">
    <input type="hidden" name="tsp_type[]" value="1">
     <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="date">Fall Date</label>
                 <input type="date" name="fall_date" class="form-control" required/>
             </div>
             <div class="form-group">
                     <label for="time">Fall Time</label>
                     <input type="time" name="fall_time" class="form-control" required />
             </div>
             <div class="form-group">
                     <label for="injury">Injuries <span id="add_more_input" style="cursor:pointer;color:#1a75ff;"><i class="material-icons gray md-22"> add_circle</i> Add More</span></label>
                     <input type="text" name="fall_injury[]" class="form-control" required /><br/>
                     <span class="form-group" id="add_input_area"></span>
             </div>
         </div>
         <div class="col-lg-6">
             <div class="form-group">
                 <h5><strong>What To Chart:</strong></h5>
                 <label for="pain">Pain</label>
                 <input class="form-control" type="text" name="fall_pain" id="" ><br/>
                 <label for="further injuries">Any further injuries identified</label>
                 <input class="form-control" type="text" name="fall_further_injury" id="" ><br/>
                 <label for="transfer">Overall resident ability to transfer</label>
                 <input class="form-control" type="text" name="fall_transfer" id="" ><br/>
                 <label for="mental_status">Resident Mental Status</label>
                 <input class="form-control" type="text" name="fall_mental_status" id=""><br/>
                 <label for="vital signs">Temperature</label>
                 <input class="form-control" type="text" name="fall_temperature" id="" ><br/>
                 <label for="vital signs">Pulse</label>
                 <input class="form-control" type="text" name="fall_pulse" id="" ><br/>
                 <label for="vital signs">Blood Pressure</label>
                 <input class="form-control" type="text" name="fall_bp" id=""><br/>
                 <label for="report">Complete Report</label>
                 <input class="form-control" type="text" name="fall_report" id="">
             </div>
         </div>
     </div>
     <div class="row">
             <div class="col-lg-12">
                 <div class="form-group">
                     <label for="date">Instruction to Care Giver/ Med Aids</label><br/>
                     <ol type="1">
                         <li>Document all shifts – see what to chart</li>
                         <li>Vital Signs – B/P and Pulse at least daily</li>
                         <li>Observe &amp; report to nurse immediately any change in mentation; balance problems; pain;or new injuries</li>
                         <li>Have all direct care givers read and sign this service plan</li>
                     </ol>
                 </div>
             </div>
     </div>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_more_input').click(function(){
                var inputbox='';
                inputbox='<input type="text" name="fall_injury[]" class="form-control" required /><br/>';
                $('#add_input_area').append(inputbox);
            });
        });

        $("#fallTspRemove").click(function(){
          $("#box1").remove();
          $("#1").removeClass("hidden");
          if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
        });
    </script>
