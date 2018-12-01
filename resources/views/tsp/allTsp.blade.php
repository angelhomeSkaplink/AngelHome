@extends('layouts.app')

@section('htmlheader_title')
    All Residents
@endsection

@section('contentheader_title')
    <strong>All Residents</strong>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
				
            <div class="box-header with-border col-sm-2 pull-right">
                    
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
                            <th class="th-position text-uppercase font-500 font-12">###</th>
							<th class="th-position text-uppercase font-500 font-12">TSP</th>
							<th class="th-position text-uppercase font-500 font-12">Add</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Fall</td>
                        <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href="../fall_tsp/{{ $id }}"><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Decline in Appetite or Activities of Daily Living</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Increase In Pain</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>New Medication</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Skin Problem Of Any Type</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Problem</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Respiratory Problem</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Cast Or Splint</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Eye Problem</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Gastrointenstinal Problem</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Urinary Tract Infection</td>
                            <td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href=""><i class="material-icons gray md-22"> add_circle</i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
@endsection