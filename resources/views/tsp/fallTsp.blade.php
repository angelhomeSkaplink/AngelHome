<h3 style="padding:0px;margin:0px;"><strong>Fall</strong></h3><br/>
   
   <div class="tab-pane fade active in" id="tsp_fall" role="tabpanel" aria-labelledby="home-tab">
        <form action="" method="post">
        <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <h5><strong>Problem/Need:</strong></h5>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="fall_date" class="form-control">
                </div> 
                <div class="form-group">
                        <label for="time">Fall Time</label>
                        <input type="time" name="fall_time" class="form-control">
                </div>
                <div class="form-group">
                        <label for="injury">Injuries <span id="add_more_input" style="cursor:pointer;color:#1a75ff;"><i class="material-icons gray md-22"> add_circle</i> Add More</span></label>
                        <input type="text" name="injury[]" class="form-control"><br/>
                        <span class="form-group" id="add_input_area"></span>
                </div>                                                   
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <h5><strong>What To Chart:</strong></h5>
                    <label for="pain">Pain</label>
                    <input class="form-control" type="text" name="fall_pain" id="">
                    <label for="further injuries">Any further injuries identified</label>
                    <input class="form-control" type="text" name="further_injury" id="">
                    <label for="transfer">Overall resident ability to transfer</label>
                    <input class="form-control" type="text" name="transfer" id="">
                    <label for="mental_status">Resident Mental Status</label>
                    <input class="form-control" type="text" name="mental_status" id="">
                    <label for="vital signs">Vital Signs</label>
                    <input class="form-control" type="text" name="vital_signs" id="">
                    <label for="report">Complete Report</label>
                    <input class="form-control" type="text" name="report" id="">
                </div> 
            </div>
        </div>
    </form>
    <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="date">Instruction to Care Giver/ Med Aids</label><br/>
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
        $(document).ready(function(){
            $('#add_more_input').click(function(){               
                var inputbox='';
                inputbox='<input type="text" name="injury[]" class="form-control"><br/>';
                $('#add_input_area').append(inputbox);
            });
        });       
    </script>
