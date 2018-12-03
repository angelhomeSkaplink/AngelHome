<h3 style="padding:0px;margin:0px;"><strong>Cast Or Splint</strong></h3><br/>
   
   <div class="tab-pane fade active in" id="tspCastOrSplint" role="tabpanel" aria-labelledby="home-tab">
        <form action="" method="post">
        <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
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
    </form>
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
