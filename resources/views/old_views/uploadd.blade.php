<html>
<head>file</head>
<body>

<form action="imgup" enctype="multipart/form-data" method="post">
	<input type="text" class="form-control" placeholder="First Name" name="demo" value=""/></br>
	<input type="file" class="form-control" placeholder="First Name" name="img" value=""/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>