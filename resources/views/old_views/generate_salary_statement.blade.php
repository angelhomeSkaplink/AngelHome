@extends('layouts.app')
@section('htmlheader_title')
    Salary
@endsection
@section('contentheader_title')
    OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21

@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="row">
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Claims</th>								
								<th></th>
								<th>Deductions</th>
								<th></th>
							</tr>
							<tr>								
								<td>
									GPF Deduction
								</td>
								<td>
								2	
								</td>
								<td>								
								3
								</td>
								<td>								
								4
								</td>
							</tr>
							<tr>
								<td>
									NPS Deduction
								</td>
							</tr>
							<tr>
								<td>
									Festival Deduction
								</td>
							</tr>
							<tr>
								<td>
									House Building Loan
								</td>
							</tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>

    @include('layouts.partials.scripts_auth')
@endsection
