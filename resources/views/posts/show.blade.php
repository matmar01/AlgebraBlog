@extends('layouts.master')

@section('content')


<div class="col-sm-8 blog-main">
	<div class="blog-post">
	@if (session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
			{{ session()->get('flash_message') }}
		</div>
	@endif
		<h1 class="blog-post-title">{{ $post->title }}</h1>
		<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#"> {{ $post->user->name }}</a></p>
		@if(count($post->tags))
		<section>
			<h6 style="display:inline;">Tags: </h6>
			@foreach ($post->tags as $tag)
				<a href="{{ route('tags',$tag) }}">
					{{ $tag->name }}
				</a>
			@endforeach
		</section>
		@endif
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
	<hr/>
	{{-- Add a comment --}}
	
	<div class="card">
		<div class="card-block">
			<form action="/posts/{{ $post->id }}/comment" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea name="body" class="form-control" placeholder="Your comment here"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add comment</button>
				</div>
			</form>
		</div>
	</div>
	
	<hr/>
	
	@if (count($post->comments))
		<div class="comments">
			<h3>Comments:</h3>
			@foreach ($post->comments as $comment)
				<dl>
					<dt class="list-group-item">
						{{ $comment->body }}
					</dt>
					<dd class="list-group-item">
						Commented by 
						<b>{{ $comment->user->name }}</b>
						,
						<i>{{ $comment->created_at->diffForHumans() }}</i>
					</dd>
				</dl>
			@endforeach
		</div>
	@else 
		<p>
			This post still doesn't have any comments
		</p>
	@endif
</div>	
<!-- Mailgun 
https://signup.mailgun.com/new/signup 
migracija, model ,kontroler za kategorije i ispis u create i show
category_post pivoticu
-->
@endsection