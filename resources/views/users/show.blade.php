@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		<div class="panel panel-default">
			<div class="panel-body">
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
						<tr>
							<td>{{ $user->id }}</td>
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
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection