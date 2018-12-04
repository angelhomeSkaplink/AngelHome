<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>New Medication
    <span class="pull-right"><span class="btn btn-primary" id="newMedicationTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
<div class="tab-pane fade active in container" id="tsp_new_medication" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
      <div class="col-lg-6">
          <h5><strong>Problem/Need:</strong></h5>
          <div class="form-group">
              <label for="symptoms">New Medication Order</label>
              <textarea style="resize:none; height:115px" class="form-control" rows="5" name="new_med"></textarea>
          </div>
          <div class="form-group">
              <label for="symptoms">Precautions</label>
              <textarea style="resize:none; height:115px" class="form-control" rows="3" name="precaution"></textarea>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="form-group">
              <h5><strong>What To Chart:</strong></h5>
              <label for="symptoms">Any signs and symptoms of adverse reactions</label>
              <input class="form-control" type="text" name="adverse_symptoms" id="">
              <label for="complaints">Other complaints by resident</label>
              <input class="form-control" type="text" name="med_complaints" id="">
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
  $("#newMedicationTspRemove").click(function(){
    $("#box4").remove();
    $("#4").removeClass("hidden");
  });
</script>
