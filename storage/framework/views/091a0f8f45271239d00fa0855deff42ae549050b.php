<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Skin Problem
    <span class="pull-right"><span class="btn btn-primary" id="skinProblemTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
   <div class="tab-pane fade active in container" id="tsp_skin_problem" role="tabpanel" aria-labelledby="home-tab">
    <input type="hidden" name="tsp_type[]" value="5"> 
    <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="location">Area location:</label>
                 <textarea style="resize:none; height:115px" rows="3" name="area_location" class="form-control"></textarea>
             </div>
             <div class="form-group">
                 <label for="type">Type:</label>
                 <input type="text" name="type_skin_problem" class="form-control">
             </div>
         </div>
         <div class="col-lg-6">
             <div class="form-group">
                 <h5><strong>What To Chart:</strong></h5>
                 <label for="skin_pain">Pain</label>
                 <input class="form-control" type="text" name="pain" id="">
                 <label for="progress">Progress toward healing</label>
                 <input class="form-control" type="text" name="progress_healing" id="">
                 <label for="color_odor">Color, odor &amp; amount of drainage if any</label>
                 <input class="form-control" type="text" name="skin_colour" id="">
                 <label for="complaints">Other complaints by resident</label>
                 <input class="form-control" type="text" name="skin_complaints" id="">
                 <label for="report">Complete Report</label>
                 <input class="form-control" type="text" name="skin_report" id="">
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
  $("#skinProblemTspRemove").click(function(){
    $("#box5").remove();
    $("#5").removeClass("hidden");
    if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
  });
</script>
