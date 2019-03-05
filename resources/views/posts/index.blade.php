@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		@foreach ($posts as $key => $post)
		
		<div class="blog-post">
			<h2 class="blog-post-title">{{ $post->title }}</h2>
			<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}<a href="#"> Mark</a></p>

			<section>
				{{ $post->body }}
			</section>
			
		</div><!-- /.blog-post -->
		
	@endforeach		
	
		<nav class="blog-pagination">
			<a class="btn btn-outline-primary" href="#">Older</a>
			<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
		</nav>	
	</div>	
@endsection