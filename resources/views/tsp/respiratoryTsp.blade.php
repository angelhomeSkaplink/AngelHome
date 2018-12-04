<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>respiratory Problem
    <span class="pull-right"><span class="btn btn-primary" id="respiratoryTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
   <div class="tab-pane fade active in" id="tsp_respiratory" role="tabpanel" aria-labelledby="home-tab">
     <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="location">Respiratory problem characterized by:</label>
                 <textarea style="resize:none; height:115px" rows="3" name="respiratory" class="form-control"></textarea>
             </div>
             <div class="form-group">
                 <label for="type">Precautions:</label>
                 <textarea style="resize:none; height:115px" rows="3" name="resp_precautions" class="form-control"></textarea>
             </div>
         </div>
         <div class="col-lg-6">
             <div class="form-group">
                 <h5><strong>What To Chart:</strong></h5>
                 <label for="resp_pain">Chest or other Pain</label>
                 <input class="form-control" type="text" name="resp_pain" id="">
                 <label for="resp_symptoms">Ongoing symptoms such as cough, shortness of breath, congestion</label>
                 <input class="form-control" type="text" name="resp_symptoms" id="">
                 <label for="appetite">Appetite</label>
                 <input class="form-control" type="text" name="appetite" id="">
                 <label for="resp_colour">Color &amp; amount sputum if present</label>
                 <input class="form-control" type="text" name="resp_colour" id="">
                 <label for="resp_temp">Temperature, pulse,respirations, and B/P</label>
                 <input class="form-control" type="text" name="resp_temp" id="">
                 <label for="resp_antibiotic">If on antibiotic any adverse symptoms</label>
                 <input class="form-control" type="text" name="resp_antibiotic" id="">
                 <label for="resp_complaints">Other complaints by resident or other symptoms</label>
                 <input class="form-control" type="text" name="resp_complaints" id="">
             </div>
         </div>
     </div>
     <div class="row">
             <div class="col-lg-12">
                 <div class="form-group">
                     <label for="instruction">Instruction to Care Giver/ Med Aids</label><br/>
                     <ol type="1">
                         <li>Document all shifts – see what to chart</li>
                         <li>Treat as ordered</li>
                         <li>Provide good oral hygiene</li>
                         <li>Provide extra fluids and encourageresident to drink</li>
                         <li>Please call / report to nurse immediatelyif increasing shortness of breath orcongestion, change in mental status,increase in symptoms, change in vitalsigns (fever, etc.), potential adverse reactions to antibiotic</li>
                         <li>Have Kleenex available for resident</li>
                         <li>Encourage resident to wash hands</li>
                         <li>Have all direct care givers read and sign this service plan</li>
                     </ol>
                 </div>
             </div>
     </div>
</div>
<script type="text/javascript">
  $("#respiratoryTspRemove").click(function(){
    $("#box6").remove();
    $("#6").removeClass("hidden");
  });
</script>
