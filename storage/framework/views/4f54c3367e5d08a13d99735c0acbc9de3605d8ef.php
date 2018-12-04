
<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Cast Or Splint
    <span class="pull-right"><span class="btn btn-primary" id="castSplintTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
   <div class="tab-pane fade active in container" id="tspCastOrSplint" role="tabpanel" aria-labelledby="home-tab">
    <input type="hidden" name="tsp_type[]" value="7"> 
    <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="cast">Cast:</label>
                 <input class="form-control" type="text" name="cast" id="">
             </div>
             <div class="form-group">
                 <label for="cast">Splint:</label>
                 <input class="form-control" type="text" name="splint" id="">
             </div>
             <div class="form-group">
                 <label for="type">Injuries:</label>
                 <textarea style="resize:none; height:115px" rows="3" name="cast_injuries" class="form-control"></textarea>
             </div>
             <div class="form-group">
                 <label for="cast">Location:</label>
                 <input class="form-control" type="text" name="cast_location" id="">
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
                         <li>Vital Signs – B/P and Pulse at least daily</li>
                         <li>Observe &amp; report to nurse immediately any change in mentation; balance problems; pain;or new injuries</li>
                         <li>Have all direct care givers read and sign this service plan</li>
                     </ol>
                 </div>
             </div>
     </div>
</div>
<script type="text/javascript">
  $("#castSplintTspRemove").click(function(){
    $("#box7").remove();
    $("#7").removeClass("hidden");
    if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
  });
</script>
