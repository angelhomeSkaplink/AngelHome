@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Info
@endsection

@section('main-content')
<style>	
	.content-header{
		display:none;
	}	
</style>
<script>
$(document).ready(function() {
  $('select[name="id"]').on('change', function() {
    var pros_id = $(this).val();
    console.log(pros_id);
    if(pros_id) {
      $.ajax({
        url: '../reports_pros/'+pros_id,
        type: "GET",
        success:function(data) {
          window.location.replace('../reports_pros/'+pros_id);
        }
      });
    }
  });
});
</script>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary border">
      <div class="box-header with-border col-sm-2 pull-right">
      </div>
      <div class="box-body border padding-top-0 padding-left-right-0">
        <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th class="th-position text-uppercase font-500 font-12">#</th>
                  <th class="th-position text-uppercase font-500 font-13">
                    <select name="id" id="id" class="form-control">
                      <option value="">RESIDENT</option>
                      @foreach ($reports_all as $prospect)
                      <option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
                      @endforeach
                    </select>
                  </th>
                  <th class="th-position text-uppercase font-500 font-12">Phone No</th>
                  <th class="th-position text-uppercase font-500 font-12">Email</th>
                  <th class="th-position text-uppercase font-500 font-12">Address</th>
                  <th class="th-position text-uppercase font-500 font-12">Contact Person</th>
                  <th class="th-position text-uppercase font-500 font-12">Phone No</th>
                  <th class="th-position text-uppercase font-500 font-12">Email</th>
                  <th class="th-position text-uppercase font-500 font-12">Address</th>
                  <th class="th-position text-uppercase font-500 font-12">Work done by</th>
                </tr>
                @foreach ($reports as $report)
                <tr>
                  @if($report->service_image == NULL)
                  <td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
                  @else
                  <td><img src="../hsfiles/public/img/{{ $report->service_image }}" class="img-circle" width="40" height="40"></td>
                  @endif
                  <td>{{ $report->pros_name }}</td>
                  <?php
                  $basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
                    ?>
                    <td>{{ $basic->phone_p }}</td>
                    <td>{{ $basic->email_p }}</td>
                    <td>{{ $basic->address_p }}</td>
                    <td>{{ $basic->contact_person }}</td>
                    <td>{{ $basic->phone_c }}</td>
                    <td>{{ $basic->email_c }}</td>
                    <td>{{ $basic->address_c }}</td>
                  <?php } ?>
                  <?php
                  $user = DB::table('users')->where([['user_id', $report->marketing_id]])->first();{
                    ?>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                  <?php } ?>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('scripts-extra')

  @endsection
