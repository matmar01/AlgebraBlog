@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		@if (session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
			{{ session()->get('flash_message') }}
		</div>
		@endif
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Create a new Post</h3>
			</div>		
			<hr>
			<div class="panel-body">
				<form method="POST" action=" {{ route('posts.update',$post->id) }} ">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" required name="title" value="{{  $post->title }}">
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
						<label for="body">Body</label>
						<textarea class="form-control" id="body" name="body" required placeholder="Upišite novi post" rows="6">{{  $post->body }}</textarea>
					</div>
					@isset ($categories) 
						<div class="radio {{ $errors->has('category') ? 'has-error' : '' }}">
							<label for="radio">Categories:</label><br/>
							@foreach ($categories as $category)
								<label class="custom-control-radio">
									<input type="radio" name="category" id="category" value="{{ $category->id }}" {{ $category->posts->contains($post->id) ? 'checked=checked' : ''}}>
									{{ $category->name }}
								</label>
							@endforeach
						</div>
					@endisset
				
					<br/>
					
					<label for="tags">Tags:</label><br/> 
					
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTag" style="float:right;">
						Add New Tag
					</button>
					<div class="d-block my-3">
						@foreach($tags as $tag)
                         <label class="custom-control overflow-checkbox">
                              <input type="checkbox" value="{{ $tag->id }}" name="tags[]" class="overflow-control-input" 
							  {{ $tag->posts->contains($post->id ) ? 'checked' : '' }}>
                              <span class="overflow-control-indicator"></span>
                              <span class="overflow-control-description">{{ $tag->name }}</span>
                         </label>
                         @endforeach
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Publish</button>
						<a href="{{ route('posts.show',$post->id)}}" class="btn btn-danger" role="button">Back</a>
					</div>	
					
					@include('layouts.errors')
					
				</form>
			</div>
		</div>
		
		<!-- Modal -->
		@include('tags.modal')
	</div>

@endsection