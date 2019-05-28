<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
MAR Report
@endsection
@section('contentheader_title')
<div class="row">
  <div class="col-lg-4">
    <h3 class="text-danger"><b>{{ $name->pros_name }} </b></h3>
  </div>
  <div class="col-lg-4 text-center">
    <form action="{{ action('ReportController@mar_monthly_report')}}" method="post">
      <input name="_method" type="hidden" value="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="user_id" value="{{ $name->id }}">
     <div class="row">
       <div class="col-lg-8 col-lg-offset-2">
         <div class="row">
           <div class="col-lg-4" style="padding-right:0px;">
             <select type="text" name="mar_month" class="form-control" placeholder="">
               <option value="01">Jan</option>
               <option value="02">Feb</option>
               <option value="03">Mar</option>
               <option value="04">Apr</option>
               <option value="05">May</option>
               <option value="06">Jun</option>
               <option value="07">Jul</option>
               <option value="08">Aug</option>
               <option value="09">Sep</option>
               <option value="10">Oct</option>
               <option value="11">Nov</option>
               <option value="12">Dec</option>
             </select>
           </div>

           <div class="col-lg-4" style="padding-left:0px;padding-right:0px;">
             <select type="text" name="mar_year" class="form-control" placeholder="">
               <option value="2018">2018</option>
               <option value="2019">2019</option>
               <option value="2020">2020</option>
               <option value="2021">2021</option>
             </select>
           </div>
           <div class="col-lg-4" style="padding-left:0px;">
             <button class="btn btn-default form-control" type="submit" name="submit"><i class="material-icons md-36" style="color:#000;"> search </i></a>
           </div>
         </div>
       </div>
     </div>
   </form>
  </div>
  <div class="col-lg-4">
    	<button class="btn btn-info pull-right" id="printButton" type="submit" onclick="printDiv('printableDiv')">Print<i class="material-icons md-22" aria-hidden="true"> description </i></button>
  </div>
  <h3 style="padding-top:30px;"><strong>Medical Administration Record (MAR)</strong></h3>
</div>
@endsection

@section('main-content')
<style>
.content-header
{
  /* display:none; */
  padding: 2px 0px 1px 20px;
  margin-bottom: -18px;
}
.content {
  margin-top: 15px;
}
.placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
</style>
<style  type = "text/css" media = "screen">
	.print-header{
		display:none;
	}
</style>
<style  type = "text/css" media = "print">
	.print-header{
		display:block;
	}
</style>
<div class="container" style="background-color:#fff;">
<div >

    <!-- Bootstrap core CSS -->

    <!-- TOP BAR -->



    <div class="row" style="overflow-x:auto;">
      <div class="box box-primary border" id="printableDiv">
        <div class="print-header">
        <div class="row">
          <div class="col-lg-12 text-center">
              <h3><strong>Medical Administration Record (MAR)</strong></h3>
               <h4><strong>Facility :: {{ $facility->facility_name }}</strong></h4>
               <p><strong>{{ $facility->address }} {{ $facility->address_two }}</strong></p>
               <p><strong><i class="material-icons"> phone</i>{{ $facility->phone }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                {{ $facility->facility_email }}</strong></p>
                <hr style="height:5px;border:none;color:#333;background-color:#333;">
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <strong>Resient Name: {{ $name->pros_name }}</strong>
            </div>
         </div>
        </div>
       <!--Table-->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="vertical-align : middle;text-align:center;" rowspan="3" class="th-position text-uppercase font-500 font-12">#</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="3"class="th-position text-uppercase font-500 font-12">Drugs/Strenth/Form/Dose</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="3" class="th-position text-uppercase font-500 font-12">Time to Take</th>
              <th colspan="31" class="align-middle th-position text-uppercase font-500 font-12">Month & Year: {{$month}}, {{$year}}</th>
            </tr>
            <tr>
              <?php
                $eachDate =  new Carbon\Carbon($start_month);
              ?>
              @for ($i=1;$i<=$days;$i++)
              <?php
                $eachDateString = $eachDate->toDateString();
                $eachDay = $eachDate->format('D');

              ?>
              <th>{{ $eachDay }}</th>
              <?php
                $eachDate =  new Carbon\Carbon($eachDateString);
                $eachDate = $eachDate->addDays(1);
              ?>
              @endfor
            </tr>
            <tr>
              @for ($i=1;$i<=$days;$i++)
              <th>{{ $i }}</th>
              @endfor
            </tr>
          </thead>
          <tbody>
            @foreach ($result as $r)
            <tr>
              <td></td>
              <td>{{ $r->medicine_name }}</br>
                  {{ $r->quantity_of_med }}
              </td>
              <td>{{ $r->time_to_take_med }}</td>
              <?php
              for ($i=1;$i<=$days;$i++) {
                  $flag =-1;
                  foreach($query as $q) {
                   $date=$q->mar_date;
                   $date = explode('-',$date);
                   $day_no = $date[2];
                     if ($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 0) {
                           $flag=0;
                           break;
                     }elseif ($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 1) {
                            $flag=1;
                            break;
                      }elseif($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 2){
                          $flag=2;
                          break;
                      }elseif($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 3){
                            $flag=3;
                            break;
                      }else{
                          $flag=-1;
                      }
                    if($q->user_id != 0 ){
                    $user_query = DB::table('users')->where('user_id',$q->user_id)->select('firstname','lastname')->first();
                    $firstname=$user_query->firstname;
                    $lastname=$user_query->lastname;
                    }
                  }
                  if($flag==0){
                     echo'<td style="padding:5px;text-align:center;color:gray;"><i class="material-icons md-36" style="margin-top:40%;"> schedule</i></td>';
                  }elseif($flag==1){
                     echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover"data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine given. Action Time: '.$q->action_performed_on.'"><span style="color:green;"><i class="material-icons md-36" style="margin-top:40%;"> offline_pin</i></span></a></td>';
                  }elseif($flag==2){
                     echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine not given.'.$q->reason_desc.' Action Time: '.$q->action_performed_on.'"><span style="color:black;"><i class="material-icons md-36" style="margin-top:40%;"> cancel</i></span></a></td>';
                  }elseif($flag==3){
                      echo'<td style="padding:5px;text-align:center;color:blue;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Refused ! Mail sent to doctor. Action Time: '.$q->action_performed_on.'"><i class="material-icons md-36" style="margin-top:40%;"> email</i></a></td>';
                  }else{
                     echo'<td></td>';
                  }
                }
               ?>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!--Table-->

      </div>
    </div>
  </div>

</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <!-- <script src="js/scrolling-nav.js"></script> -->
  <script type="text/javascript">
  function getdate(){
    var date = new Date();
    document.getElementById("today").innerHTML=date;
  }
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({ container: 'body' });
});
</script>

<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

@endsection
