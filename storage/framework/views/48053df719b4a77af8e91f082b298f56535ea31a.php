<h3 style="padding:0px;margin:0px;"><strong>Increase In Pain</strong></h3><br/>
<div class="tab-pane fade active in" id="increasePain" role="tabpanel" aria-labelledby="home-tab">
        <form action="" method="post">
        <input type="hidden" name="_method" value="PATCH">
            <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-lg-6">
                <h5><strong>Problem/Need:</strong></h5>
                <div class="form-group">
                    <label for="symptoms">State Pain Location</label>
                    <input class="form-control" type="text" name="pain_location">
                </div> 
                <div class="form-group">
                    <label for="symptoms">Symptoms</label>
                    <textarea style="resize:none; height:115px" class="form-control" rows="5" name="symptoms"></textarea>
                </div>                                                 
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <h5><strong>What To Chart:</strong></h5>
                    <label for="pain type">Pain type, location, and other characteristics: </label>
                    <textarea class="form-control" style="resize:none; height:115px" rows="3" name="pain_char" id=""></textarea>
                    <label for="limb">If limb pain, color, bruising, swelling and other symptoms </label>
                    <textarea class="form-control" style="resize:none; height:115px" rows="3" name="limb_pain" id=""></textarea>
                    <label for="assiatance">VS - Pulse and B/P</label>
                    <input class="form-control" type="text" name="pain_VS" id="">
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
                        <li>Treat as ordered</li>
                        <li>Please call / report to nurse immediately if any signs and symptoms that may require transport to hospital or urgent care</li>                                  
                    </ol>
                </div>
            </div>
    </div>
