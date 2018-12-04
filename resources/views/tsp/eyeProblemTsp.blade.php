<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Eye Problem
    <span class="pull-right"><span class="btn btn-primary" id="eyeProblemTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
   <div class="tab-pane fade active in container" id="tspCastOrSplint" role="tabpanel" aria-labelledby="home-tab">
     <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="cast">Eye Problem Characterized By:</label>
                 <input class="form-control" type="text" name="eye_problem" id="">
             </div>
             <div class="form-group">
                 <label for="cast">Precautions:</label>
                 <input class="form-control" type="text" name="eye_pracaution" id="">
             </div>
         </div>
         <div class="col-lg-6">
             <div class="form-group">
             <h5><strong>What To Chart:</strong></h5>
             <label for="pain">Pain</label>
             <input class="form-control" type="text" name="cast_pain" id="">
             <label for="further injuries">Any injuries or skin issues identified</label>
             <input class="form-control" type="text" name="cast_injury" id="">
             <label for="transfer">Any injuries or skin issues identified –</label>
             <input class="form-control" type="text" name="cast_injury" id="">
             <label for="mental_status">Overall resident ability to transfer</label>
             <input class="form-control" type="text" name="cast_transfer" id="">
             </div>
         </div>
     </div>
     <div class="row">
             <div class="col-lg-12">
                 <div class="form-group">
                     <label for="instruction">Instruction to Care Giver/ Med Aids</label><br/>
                     <ol type="1">
                         <li>Document all shifts – see what to chart</li>
                         <li>Observe &amp; report to nurse immediately any change in skin; balance problems; or increased pain</li>
                         <li>Have all direct care givers read and sign this service plan</li>
                         <li>Pad areas around the cast or splint that are causing skin irritation</li>
                         <li>Follow directions from physician / nurse – treat as ordered</li>
                     </ol>
                 </div>
             </div>
     </div>
</div>
<script type="text/javascript">
  $("#eyeProblemTspRemove").click(function(){
    $("#box8").remove();
    $("#8").removeClass("hidden");
  });
</script>
