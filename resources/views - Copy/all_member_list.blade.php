@extends('layouts.app')
@section('htmlheader_title')
    ANGEL HOME
@endsection

@section('contentheader_title')
    User List
@endsection
@section('main-content')
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border"> 
		
            <div class="box-header with-border col-sm-2 pull-right">
                <a href="{{ action('AddMemberController@add_new_member') }}">
                    <span class="label label-primary font-size-85pc padding-7 custom-lebel" style="left:55px"><i class="material-icons md-15" style="vertical-align:sub !important"> add </i> Add New User</span>
                </a>
            </div>
			
			
			
            <div class="box-body border padding-top-0 padding-left-right-0"> 
                <table class="table">
                    <tbody>
                        <tr>
                            <!-- <th class="th-position text-uppercase font-500 font-12">ID</th> -->
                           <th class="th-position text-uppercase font-500 font-12">Name</th>
                            <th class="th-position text-uppercase font-500 font-12">User Name</th>
                            <th class="th-position text-uppercase font-500 font-12">Role</th>
                        </tr>
                        @foreach($all_records as $rec)
                        <tr>
                            <!-- <td class="th-position text-uppercase font-500 font-12">{{ $rec->id }}</td> -->
                            <td>{{ $rec->firstname }} {{ $rec->middlename }} {{ $rec->lastname }}</td>
                            <td>{{ $rec->email }}</td>
                            @if($rec->role == 3)
                            <td>Marketing</td>
                            @elseif($rec->role == 2)
                            <td>Receptionist</td>
							@elseif($rec->role == 4)
                            <td>RCC</td>
							@elseif($rec->role == 5)
                            <td>Back Office</td>
							@elseif($rec->role == 6)
                            <td>Doctore</td>
							@elseif($rec->role == 7)
                            <td>Wellness Director</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
