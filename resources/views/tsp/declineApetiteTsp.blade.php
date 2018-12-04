<div>
<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Decline in Appetite or Activities of Daily Living
    <span class="pull-right"><span class="btn btn-primary" id="declineTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
<div class="tab-pane fade active in container" id="tsp_fall" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
      <div class="col-lg-6">
          <h5><strong>Problem/Need:</strong></h5>
          <div class="form-group">
              <label for="symptoms">State Specific Symptoms</label>
              <textarea style="resize:none; height:115px" class="form-control" rows="5" name="symptoms"></textarea>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="form-group">
              <h5><strong>What To Chart:</strong></h5>
              <label for="symptoms">Specific ongoing symptoms</label>
              <input class="form-control" type="text" name="ongoing_symptoms" id="">
              <label for="assiatance">Assistance provided to resident</label>
              <input class="form-control" type="text" name="assistance" id="">
              <label for="issue">If appetite issues - intake</label>
              <input class="form-control" type="text" name="appetite_issue" id="">
              <label for="vs">VS – Temperature, Pulse and B/P</label>
              <input class="form-control" type="text" name="vs" id="">
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
        $(document).ready(function(){
            $('#add_more_input').click(function(){
                var inputbox='';
                inputbox='<input type="text" name="injury[]" class="form-control"><br/>';
                $('#add_input_area').append(inputbox);
            });
        });

        $("#declineTspRemove").click(function(){
          $("#box2").remove();
          $("#2").removeClass("hidden");
        });
    </script>
