@extends('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">
	<div class="blog-post">	
		<h1 class="blog-post-title">{{ $post->title }}</h1>
		<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
		<section>
			<p> {{$post->body}} </p>
		</section>
	</div>	
</div>	

@endsection