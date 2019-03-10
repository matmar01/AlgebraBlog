<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller {
    
	public function __construct() {
		
		$this->middleware('auth')->except(['index','show']);
		
		}
	
	public function index () {
		
		$posts = Post::latest()->get();
	
		return view('posts.index',compact('posts'));
	
		}
	public function show($id) {
		
		//DB::table('posts')->find($id);
		$post = Post::find($id);
		
		return view('posts.show',compact('post'));
		
		}
		
	public function create() {
        return view ('posts.create');
		}
	
	public function store() {
		//$post = new Post();
		
		request()->validate([
			'title' => ['required','min:3','max:255'],
			'body' => 'required|min:3'
			]);
		/*
		$post->title = request('title');
		$post->body = request('body');
		$post->user_id = auth()->id();
		$post->save();*/
		
		Post::create([
			'title' => request('title'),
			'body' => request('body'),
			'user_id' => auth()->id()
			]);
		
		return redirect()->route('posts.index');
		}
	
	public function destroy($id) {
        $post = Post::find($id);
		$post -> delete();
		
		return redirect()->route('posts.index')->withFlashMessage('Post deleted!');
		}
	
	public function edit($id) {
		$post = Post::find($id);
        return view ('posts.edit',compact('post'));
		}
	
	public function update($id) {
		$post = Post::find($id);
		
		request()->validate([
			'title' => ['required','min:3','max:255'],
			'body' => 'required|min:3'
			]);
			
		$post->title = request('title');
		$post->body = request('body');
		
		$post->save();
		return redirect()->route('posts.index')->withFlashMessage('Post je promijejen!');
		}
	
	}
