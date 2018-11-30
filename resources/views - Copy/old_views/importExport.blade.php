<html lang="en">
	<head>
		<title>Import - Export Laravel 5</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
	</head>
	<body><br/><br/>
		<div class="container">		
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Import Excelsheet</strong></h3>
			  </div>
			  <div class="panel-body">
					@if ($message = Session::get('success'))
						<div class="alert alert-success" role="alert">
							{{ Session::get('success') }}
						</div>
					@endif
					@if ($message = Session::get('error'))
						<div class="alert alert-danger" role="alert">
							{{ Session::get('error') }}
						</div>
					@endif
					<h3>Import File Form:</h3>
					<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						<input type="file" name="import_file" /></br>
						<div class="form-group has-feedback">
							<select name="post_id" id="post_id" class="form-control">
								<option value="0">Select Post</option>
								<?php
									$users = DB::table('posts')->get();							
									foreach ($users as $user){ ?>
										<option value="{{ $user->fld_PostID}}">{{ $user->fld_PostName }}</option>
								<?php }	?>												
							</select>
						</div>
						{{ csrf_field() }}
						<br/>
						<button class="btn btn-primary">Import CSV or Excel File</button>
					</form><br/>								
				</div>
			</div>
		</div>
	</body>
	<script>
		$(document).ready(function() {  
			$("#post_id").change(function() { 
				alert("Hello!");
			});
		});
	</script>	
</html>