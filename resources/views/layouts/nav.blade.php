<!--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
	<div class="container"><!-- Onu plavu navigaciju 
		https://v4-alpha.getbootstrap.com/examples/blog 
		i sve u layoutima--><!--
		<a class="navbar-brand" href="{{ url('/') }}">
			{{ config('app.name', 'Laravel') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

			</ul>
			<ul class="navbar-nav ml-auto">
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>-->
<div class="blog-masthead">
	<div class="container">
	@guest 
		<nav class="nav blog-nav">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			@if (Route::has('register')) 
				<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			@endif
		</nav>
	@else
		<nav class="nav blog-nav navbar-expand-lg">
			@if (url()->current() == route('home'))
				<a class='nav-link active' href="{{ route('home') }}">Home</a>
			@else 
				<a class='nav-link' href="{{ route('home') }}">Home</a>
			@endif
			@if (url()->current() == route('posts.index'))
				<a class="nav-link active" href="{{ route('posts.index') }}">Posts</a>
			@else
				<a class='nav-link' href="{{ route('posts.index') }}">Posts</a>
			@endif
			@if (url()->current() == route('users.index'))
				<a class="nav-link active" href="{{ route('users.index') }}">Users</a>
			@else
				<a class='nav-link' href="{{ route('users.index') }}">Users</a>
			@endif
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ 
							Auth::user()->name }}
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>	
				</ul>
			</div>	
		</nav>
	@endguest	
	</div>
</div>