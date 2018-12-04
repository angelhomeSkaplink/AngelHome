<h3 style="padding:0px;margin:0px;"><strong>Gastrointestinal Problem</strong></h3><br/>
   
   <div class="tab-pane fade active in" id="tspGastro" role="tabpanel" aria-labelledby="home-tab">
        <form action="" method="post">
        <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <h5><strong>Problem/Need:</strong></h5>
                <div class="form-group">
                    <label for="cast">Gastrointestinal Problem Characterized By:</label>
                    <input class="form-control" type="text" name="gastro_problem" id="">
                </div>
                <div class="form-group">
                    <label for="cast">Precautions:</label>
                    <input class="form-control" type="text" name="gastro_pracaution" id="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <h5><strong>What To Chart:</strong></h5>
                <label for="pain">Pain</label>
                <input class="form-control" type="text" name="gastro_pain" id="">
                <label for="further injuries">Ongoing symptoms such as nausea, vomiting, diarrhea or constipation</label>
                <input class="form-control" type="text" name="gastro_symptoms" id="">
                <label for="transfer">Appetite</label>
                <input class="form-control" type="text" name="gastro_appetite" id="">
                <label for="mental_status">Weight if obtained</label>
                <input class="form-control" type="text" name="gastro_weight" id="">
                <label for="mental_status">Color &amp; amount of vomiting, diarrhea if any</label>
                <input class="form-control" type="text" name="gastro_vomit" id="">
                <label for="mental_status">Temperature, pulse, respirations, and B/P</label>
                <input class="form-control" type="text" name="gastro_temp" id="">
                <label for="mental_status">Other complaints by resident or other symptoms</label>
                <input class="form-control" type="text" name="gastro_complaints" id="">
                </div> 
            </div>
        </div>
    </form>
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
