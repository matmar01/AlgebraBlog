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

	
	/*$posts = DB::table('posts')->get();
	
	$posts = Post::all();
	
	return view('posts.index',compact('posts'));
	*/
/*
Route::get('/posts','PostsController@index')->name('posts');

Route::get('/posts/{post}','PostsController@show')->name('posts.show');
	
Route::get('/posts/create','PostsController@create')->name('posts.create');	

Route::post('/posts','PostsController@store')->name('posts.store');
*/
	
	/*$post = DB::table('posts')->find($id);
	
	$post = Post::find($id);
	
	return view('posts/show',compact('post'));
	});*/

/*Route::get('/users','UsersController@index');

Route::get('/users/create','UsersController@create')->name('users.create');

Route::post('/users','UsersController@store');

Route::get('/users/{user}','UsersController@show');

Route::get('/users/{user}/edit','UsersController@edit');

Route::put('/users/{user}','UsersController@update');

Route::delete('/users/{user}','UsersController@destroy');*/

Route::resource('users','UsersController')->middleware('verified');

Route::resource('posts','PostsController');

Auth::routes(['verify' => 'true']);

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/posts/{post}/comment','CommentController@store')->middleware('auth');

