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
				<h3 class="panel-title">Editiranje novog korisnika</h3>
			</div>		
			<div class="panel-body">
				<form action=" {{ route('users.update',$user->id) }} " method="POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="naziv">Username je {{ $user->name }}</b></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Upišite novi username">
					</div>
					<div class="form-group">
						<label for="email">Email je {{ $user->email }}</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Upišite novi email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Upišite novi password">
					</div>
					<button type="submit" class="btn btn-primary">Updataj</button>
					<a href="{{ route('users.index')}}" class="btn btn-danger" role="button">Odustani</a>
					<div class="form-group">
						@include('layouts.errors')
					</div>	
				</form>
			</div>
		</div>
	</div>

@endsection
