<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>About us</title>
	
</head>
<body>

	<h1>AboutUs</h1>
	<p>
		{{$user['name']}}
	</p>
	<p>
		<ul>
			@foreach ($user as $key => $value)
				<li> {{ $key . ' - ' . $value }} </li>
			@endforeach	
		</ul>		
	</p>
	
</body>
</html>