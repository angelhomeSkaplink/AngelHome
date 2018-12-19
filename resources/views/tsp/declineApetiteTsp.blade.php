<div>
<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Decline in Appetite or Activities of Daily Living
    <span class="pull-right"><span class="btn btn-primary" id="declineTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
<div class="tab-pane fade active in container" id="tsp_fall" role="tabpanel" aria-labelledby="home-tab">
<input type="hidden" name="tsp_type[]" value="2">
  <div class="row">
      <div class="col-lg-6">
          <h5><strong>Problem/Need:</strong></h5>
          <div class="form-group">
              <label for="symptoms">State Specific Symptoms</label>
              <textarea style="resize:none; height:115px" class="form-control" rows="5" name="decline_symptoms" required /></textarea>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="form-group">
              <h5><strong>What To Chart:</strong></h5>
              <label for="symptoms">Specific ongoing symptoms</label>
              <input class="form-control" type="text" name="decline_ongoing_symptoms" id="" required /><br/>
              <label for="assiatance">Assistance provided to resident</label>
              <input class="form-control" type="text" name="decline_assistance" id="" required /><br/>
              <label for="issue">If appetite issues - intake</label>
              <input class="form-control" type="text" name="decline_appetite_issue" id="" required /><br/>
              <label for="temp">VS – Temperature</label>
              <input class="form-control" type="text" name="decline_temperature" id="" required /><br/>
              <label for="pulse">VS – Pulse</label>
              <input class="form-control" type="text" name="decline_pulse" id="" required /><br/>
              <label for="bp">VS – B/P</label>
              <input class="form-control" type="text" name="decline_bp" id="" required />
          </div>
      </div>
  </div>
  <div class="row">
         <div class="col-lg-12">
             <div class="form-group">
                 <label for="date">Instruction to Care Giver/ Med Aids</label><br/>
                 <ol type="1">
                     <li>Document all shifts – see what to chart</li>
                     <li>Encourage fluid intake if appetite issues</li>
                     <li>Please call / report to nurse immediately if any signs and symptoms that may require transport to hospital or urgent care</li>
                     <li>Provide assist to resident as needed &amp; keep environment safe</li>
                 </ol>
             </div>
         </div>
     </div>
</div>
    <script type="text/javascript">
        $("#declineTspRemove").click(function(){
          $("#box2").remove();
          $("#2").removeClass("hidden");
          if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
        });
    </script>
