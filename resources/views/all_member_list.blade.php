@extends('layouts.app')
@section('htmlheader_title')
    All Member List
@endsection

@section('contentheader_title')
    
	<p class="text-danger"><b>@lang("msg.User List")</b>
	<a href="{{ action('AddMemberController@add_new_member') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:187px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> add </i> Add New User</a>
		
	
	</p>

@endsection
@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
				<table class="table">
					<tbody>
					  <tr>
						<!-- <th class="th-position text-uppercase font-500 font-12">ID</th> -->
						<th class="th-position text-uppercase font-500 font-12">@lang("msg.Name")</th>
						<th class="th-position text-uppercase font-500 font-12">@lang("msg.User Name")</th>
						<th class="th-position text-uppercase font-500 font-12">@lang("msg.Role")</th>
						<th class="th-position text-uppercase font-500 font-12">@lang("msg.Edit")</th>
						<th class="th-position text-uppercase font-500 font-12">@lang("msg.Status")</th>
					  </tr>
					  @foreach($all_records as $rec)
					  <tr>
						<td>{{ $rec->firstname }} {{ $rec->middlename }} {{ $rec->lastname }}</td>
						<td>{{ $rec->email }}</td>
						<td>
							<?php $req = DB::table('role')->select('role.id')->where('role.u_id','=',$rec->user_id)->where('status',1)->get();
								foreach ($req as $r) {
									?>
									<?php if ($r->id == 3): ?>
										| Marketing |
									<?php endif; ?>
									<?php if ($r->id == 2): ?>
										| Receptionist |
									<?php endif; ?>
									<?php if ($r->id == 4): ?>
										| RCC |
									<?php endif; ?>
									<?php if ($r->id == 5): ?>
										| Back Office |
									<?php endif; ?>
									<?php if ($r->id == 6): ?>
										| Doctor |
									<?php endif; ?>
									<?php if ($r->id == 7): ?>
										| Wellness Director |
									<?php endif; ?>
									<?php if ($r->id == 8): ?>
									| Care Taker |
									<?php endif; ?>
									<?php if ($r->id == 9): ?>
									| Activity Manager |
									<?php endif; ?>
									<?php if ($r->id == 10): ?>
									| Dietacian |
									<?php endif; ?>
									<?php if ($r->id == 11): ?>
									| ED |
									<?php endif; ?>
									<?php
								}
							?>
						</td>
						<td><a href="edit_member/{{$rec->user_id}}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
						@if($rec->status==1)
						<td><a href="inactive_member/{{$rec->user_id}}" class="text-success"><b> ACTIVE</b> </a></td>
						@else
							<td><a href="active_member/{{$rec->user_id}}" class="text-danger"><b> INACTIVE </b></a></td>
						@endif
					  </tr>
					  @endforeach
					  
					</tbody>
				</table>
				<div class="text-center">{{ $all_records->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
