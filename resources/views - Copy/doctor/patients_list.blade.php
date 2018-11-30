@extends('layouts.app')

@section('htmlheader_title')
    List of Patients
@endsection

@section('contentheader_title')
    List of Patients
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">

            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="th-position text-uppercase font-500 font-12">Prospective</th>
                            <th class="th-position text-uppercase font-500 font-12">Contact</th>
                            <th class="th-position text-uppercase font-500 font-12">Address</th>
                            <th class="th-position text-uppercase font-500 font-12">Contact Person</th>
                            <th class="th-position text-uppercase font-500 font-12">Add Details</th>
                            <th class="th-position text-uppercase font-500 font-12">View Details</th>
                        </tr>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->pros_name }}</td>
                            <td>{{ $patient->phone_p }}</td>
                            <td>{{ $patient->city_p }}</td>
                            <td>{{ $patient->contact_person }}</td>
                            <td class="padding-left-35">
                                <a href="add_patient_details/{{ $patient->id }}" title="Add Details">
                                    <i class="material-icons gray md-22"> add_circle</i>
                                </a>
                            </td>
							
                            <td class="padding-left-35">
                                <a href="view_patient_details/{{ $patient->id }}" title="View Details">
                                    <i class="material-icons gray md-22"> visibility</i>
                                </a>
                            </td>
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
