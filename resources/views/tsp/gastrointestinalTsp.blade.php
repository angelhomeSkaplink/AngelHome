<h3 style="padding:20px;margin:0px;background-color:#f2f2f2;"><strong>Gastrointestinal Problem
    <span class="pull-right"><span class="btn btn-primary" id="gastrointestinalTspRemove"> <i class="material-icons md-36" style="color:#fff;"> remove_circle </i> Discard</span></span>
      </strong>
</h3><br/>
   <div class="tab-pane fade active in container" id="tsp_fall" role="tabpanel" aria-labelledby="home-tab">
    <input type="hidden" name="tsp_type[]" value="9">
     <div class="row">
         <div class="col-lg-6">
             <h5><strong>Problem/Need:</strong></h5>
             <div class="form-group">
                 <label for="gastro_problem">Gastrointestinal Problem Characterized By:</label>
                 <input class="form-control" type="text" name="gastro_problem" id="" required />
             </div>
             <div class="form-group">
                 <label for="gastro_pracaution">Precautions:</label>
                 <input class="form-control" type="text" name="gastro_pracaution" id="" required />
             </div>
         </div>
         <div class="col-lg-6">
             <div class="form-group">
             <h5><strong>What To Chart:</strong></h5>
             <label for="gastro_pain">Pain</label>
             <input class="form-control" type="text" name="gastro_pain" id=""><br/>
             <label for="gastro_symptoms">Ongoing symptoms</label>
             <input class="form-control" type="text" name="gastro_symptoms" id=""><br/>
             <label for="gastro_appetite">Appetite</label>
             <input class="form-control" type="text" name="gastro_appetite" id=""><br/>
             <label for="gastro_weight">Weight if obtained</label>
             <input class="form-control" type="text" name="gastro_weight" id=""><br/>
             <label for="gastro_amt_drainage">Color &amp; amount of vomiting, diarrhea if any</label>
             <input class="form-control" type="text" name="gastro_amt_drainage" id=""><br/>
             <label for="gastro_temp">Temperature</label>
             <input class="form-control" type="text" name="gastro_temp" id=""><br/>
             <label for="gastro_pulse">Pulse</label>
             <input class="form-control" type="text" name="gastro_pulse" id=""><br/>
             <label for="gastro_respirations">Respirations</label>
             <input class="form-control" type="text" name="gastro_respirations" id=""><br/>
             <label for="gastro_bp">B/P</label>
             <input class="form-control" type="text" name="gastro_bp" id=""><br/>
             <label for="gastro_complaints">Other complaints by resident or other symptoms</label>
             <input class="form-control" type="text" name="gastro_complaints" id="">
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
                         <li>Provide extra fluids and encourage resident to drink</li>
                         <li>Please call / report to nurse immediately if increasing abdominal pain, change in mental status, increase in symptoms, change in vital signs (fever, etc.)</li>
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
                inputbox='<input type="text" name="injury[]" class="form-control"><br/>';
                $('#add_input_area').append(inputbox);
            });
        });

        $("#gastrointestinalTspRemove").click(function(){
          $("#box9").remove();
          $("#9").removeClass("hidden");
          if($.trim($("#myTabContent").html())==''){
            $("#buttonSet").remove();
          }
        });
    </script>
