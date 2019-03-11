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
				<h3 class="panel-title">Dodavanje novog korisnika</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('users.store') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="naziv">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Upišite username">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Upišite email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Upišite password">
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm password</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ponovite password">
					</div>
					<button type="submit" class="btn btn-primary">Dodaj</button>
					<a href="{{ route('users.index')}}" class="btn btn-danger" role="button">Odustani</a>
					<div class="form-group">
						@include('layouts.errors')
					</div>	
				</form>
			</div>
		</div>
	</div>
	
@endsection
