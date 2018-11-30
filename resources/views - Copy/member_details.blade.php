@extends('layouts.app')

@section('main-content')
<script type="text/javascript">
      $(document).ready( function() {
        $('#deletesuccess').delay(5000).fadeOut();
      });
</script>

<div class="row">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:300px;">

                    <div class="text-capitalize font-500 font-14" id="deletesuccess">{{ $msg }}</div>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">ID : </label>
                        <span class="font-14">{{ $new_member->id }}</span>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">First Name : </label>
                        <span class="font-14">{{ $new_member->firstname }}</span>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">Middle Name : </label>
                        <span class="font-14">{{ $new_member->middlename }}</span>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">Last Name : </label>
                        <span class="font-14">{{ $new_member->lastname }}</span>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">Username : </label>
                        <span class="font-14">{{ $new_member->email }}</span>

                    <div style="margin-top:10px"></div>
                        <label class="text-capitalize font-500 font-14">Role : </label>
                        @if($new_member->role == 3)
                        <span class="font-14">Marketing</span>
                        @elseif($new_member->role == 2)
                        <span class="font-14">Receptionist</span>
                        @endif
				</div>
			</div>
		</div>
        <a href="{{ action('AddMemberController@all_member_list') }}">Add new record</a>
</div>
@endsection
