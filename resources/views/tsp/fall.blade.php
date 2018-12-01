@extends('layouts.app')

@section('htmlheader_title')
    Fall TSP
@endsection

@section('contentheader_title')
    Fall TSP
@endsection

@section('main-content')

<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form action="" method="post">
					<input type="hidden" name="_method" value="PATCH">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="fall_date" class="form-control">
                            </div> 
                            <div class="form-group">
                                    <label for="date">Fall Time</label>
                                    <input type="time" name="fall_time" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="date">Injuries <span id="add_more_input" style="cursor:pointer;color:#1a75ff;"><i class="material-icons gray md-22"> add_circle</i> Add More</span></label>
                                    <input type="text" name="injury[]" class="form-control"><br/>
                                    <span class="form-group" id="add_input_area"></span>
                            </div>                                                   
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <label for="date">What to Chart</label><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Pain</span><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Any further injuries identified </span><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Overall resident ability to transfer /walk / use devices if using</span><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Resident mental status</span><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Vital signs – B/P and Pulse at least daily</span><br/>
                                    <input type="checkbox" name="chart[]" value="0">
                                    <span class="label-text">Complete incident report</span><br/>
                            </div> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                        <a href="#" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm">Cancel</a>
                                </div>
                                <div class="form-group has-feedback">
                                        <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" style="margin-right:15px">Save</button>
                                </div>                                
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
@endsection
@section('scripts-extra')
@endsection
