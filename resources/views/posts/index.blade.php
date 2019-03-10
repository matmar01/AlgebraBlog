@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		<div class="panel-heading" style="margin-bottom:5%">
			<a href="{{ route('posts.create') }}" class="btn btn-primary" role="button">
				Dodaj novi post
			</a>
		</div>			
	@foreach ($posts as $key => $post)
		
		<div class="blog-post">
			<a href="{{ route('posts.show',$post->id) }}">
				<h1 class="blog-post-title">{{ $post->title }}</h1>
			</a>
			<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#"> {{ $post->user->name }}</a></p>

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