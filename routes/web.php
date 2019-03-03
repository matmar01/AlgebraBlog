<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App\Post;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/about', function () {
	$user = array(
		'name' => 'Aleksandar',
		'age' => 34,
		'job' => 'developer',
		'marital_status' => 'no thanks'
		);	
    //return view('about',['user2' => $user]);
	//return view('about')->with(['user2' => $user]);
	return view('about',compact('user'));
});*/

Route::get('/posts','PostsController@index');
	
	/*$posts = DB::table('posts')->get();
	
	$posts = Post::all();
	
	return view('posts.index',compact('posts'));
	*/

Route::get('/posts/{id}','PostsController@show');
	
	/*$post = DB::table('posts')->find($id);
	
	$post = Post::find($id);
	
	return view('posts/show',compact('post'));
	});*/

/*Route::get('/users','UsersController@index');

Route::get('/users/create','UsersController@create')->name('users.create');

Route::post('/users','UsersController@store');

Route::get('/users/{user}','UsersController@edit');

Route::get('/users/{user}/edit','UsersController@show');

Route::put('/users/{user}','UsersController@update');

Route::delete('/users/{user}','UsersController@destroy');*/

Route::resource('users','UsersController');

