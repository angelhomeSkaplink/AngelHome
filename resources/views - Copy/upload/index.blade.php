<html>
	<head>
		<title>Laravel Image Upload with Validation</title>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="w3-card-4 w3-sand" style="width:100%;margin-top:50px;">
	        <div class=" w3-padding-64" style="margin-left: 200px;width:50%;">
	            @if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ $message }}</strong>
					</div>
					<img src="{{ Session::get('path') }}">
				@endif
	            <form role="form" action="{{ url('image-upload') }}" method="post" enctype="multipart/form-data">
	                {{ csrf_field() }}
	                <table class="table">
	                    <tr>
	                        <td>
	                            <div class="form-group">
	                            <label for="image">Select File</label>
	                        </td>
	                        <td>:</td>
	                        <td><input type="file" id="image" name="image"></div></td>
	                    </tr>
	                        
	                    <tr>
	                        <td></td>
	                        <td></td>
	                        <td><button type="submit" class="w3-btn w3-brown">Upload</button></td>
	                    </tr>
	                </table>
	            </form>
	        </div>
	    </div>
	</body>
</html>