<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>Posts</title>
	
</head>
<body>

	<h1>Posts</h1>
	<p>
		
		<ul>
			@foreach ($posts as $key => $post)
				<a href="posts/{{ $post->id }}">	
					<li> {{$post->title}} </li>
				</a>	
				<p> {{$post->body}} </p>
			@endforeach	
		</ul>	
		
		@php
			dd($posts);
		@endphp
		
	</p>
	
</body>
</html>