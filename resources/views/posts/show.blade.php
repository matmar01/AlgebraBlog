@extends('layouts.master')

@section('content')


<div class="col-sm-8 blog-main">
	<div class="blog-post">
		<h1 class="blog-post-title">{{ $post->title }}</h1>
		<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#"> {{ $post->user->name }}</a></p>
		<section>
			{{ $post->body }}
		</section>
		<!-- edit delete i back gumbovi 
		user autentifikacija i validacija -->
	</div>
	@if ( $post->user_id == auth()->id() )
		<form action="{{ route('posts.destroy',$post->id) }}" method="POST">
			{{ method_field('DELETE') }}
			{{ csrf_field() }} 
			<div class="btn-group btn-group-lg">
				<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
				<button class="btn btn-danger">Delete</button>
			</div>
			<div class="btn-group float-right btn-group-lg">	
				<a class="btn btn-primary" href="{{ route('posts.index') }}">Go Back</a>
			</div>
		</form>	
	@else 
		<div class="btn-group btn-group-lg">	
			<a class="btn btn-primary" href="{{ route('posts.index') }}">Go Back</a>
		</div>
	@endif
</div>	

@endsection