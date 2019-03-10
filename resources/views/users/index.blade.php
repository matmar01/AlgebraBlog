@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		@if (session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
			{{ session()->get('flash_message') }}
		</div>
		@endif
		
		<div class="panel panel-default">
			<div class="panel-heading" style="margin-bottom:5%">
				<a href="{{ route('users.create') }}" class="btn btn-primary" role="button">
					Dodaj novog korisnika
				</a>
			</div>
			<div class="panel-body">
			@if ($users->count())
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							<th scope="col">E-mail</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td><a href=" {{ route('users.show', $user->id ) }}">{{ $user->id }}</a></td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<form action="{{ route('users.destroy',$user->id) }}" method ="POST">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}                                      
									<button class="btn btn-danger btn-sm">Izbriši</button>
									<a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary btn-sm" role="button">Uredi</a>
								</form>	
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
			<div class="well">
				<h3>U bazi trenutno nema usera.</h3>
			</div>
			@endif	
			</div>
		</div>
	</div>
	
@endsection
