<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Increase In Pain
    <span class="pull-right"><span class="btn btn-primary" id="increasePainTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
<div class="tab-pane fade active in container" id="tsp_increase_pain" role="tabpanel" aria-labelledby="home-tab">
<input type="hidden" name="tsp_type[]" value="3">
<div class="row">
    <div class="col-lg-6">
    <h5><strong>Problem/Need:</strong></h5>
    <div class="form-group">
        <label for="symptoms">State Pain Location</label>
        <input class="form-control" type="text" name="increase_pain_loc">
    </div>
    <div class="form-group">
        <label for="symptoms">Symptoms</label>
        <textarea style="resize:none; height:115px" class="form-control" rows="5" name="increase_symptoms"></textarea>
    </div>
    </div>
      <div class="col-lg-6">
          <div class="form-group">
              <h5><strong>What To Chart:</strong></h5>
              <label for="pain type">Pain type, location, and other characteristics: </label>
              <textarea class="form-control" style="resize:none; height:115px" rows="3" name="increase_pain_type" id=""></textarea><br/>
              <label for="limb">If limb pain, color, bruising, swelling and other symptoms </label>
              <textarea class="form-control" style="resize:none; height:115px" rows="3" name="increase_swelling_bruising" id=""></textarea><br/>
              <label for="assiatance">VS - Pulse</label>
              <input class="form-control" type="text" name="increase_pain_pulse" id=""><br/>
              <label for="assiatance">VS - B/P</label>
              <input class="form-control" type="text" name="increase_pain_bp" id="">
          </div>
      </div>
  </div>
  <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="date">Instruction to Care Giver/ Med Aids</label><br/>
                    <ol type="1">
                        <li>Document all shifts – see what to chart</li>
                        <li>Treat as ordered</li>
                        <li>Please call / report to nurse immediately if any signs and symptoms that may require transport to hospital or urgent care</li>
                    </ol>
                </div>
            </div>
    </div>
  </div>

<script type="text/javascript">
  $("#increasePainTspRemove").click(function(){
    $("#box3").remove();
    $("#3").removeClass("hidden");
    if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
  });
</script>
