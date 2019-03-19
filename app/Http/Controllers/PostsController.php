<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class PostsController extends Controller {
    
	public function __construct() {
		
		$this->middleware('auth')->except(['index','show']);
		$this->middleware('verified')->except(['index','show']);
		
		}
	
	public function index () {
		
		$posts = Post::latest();
		
		if ($month = request('month')) { //if(isset($_GET['month'])) je isto
			$posts->whereMonth('created_at',Carbon::parse($month)->month);
			}
		if ($year = request('year')) { 
			$posts->whereYear('created_at',$year);
			}
			
		$posts = $posts->get();
		
		return view('posts.index',compact('posts'));
		
		// SELECT year(created_at) as year, monthname(created_at) as month, count(*) as published_posts FROM posts GROUP BY year, month ORDER BY min(created_at) desc

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
			'body' => 'required|min:3|max:65535'
			]);
		/*
		$post->title = request('title');
		$post->body = request('body');
		$post->user_id = auth()->id();
		$post->save();*/
		
		$post = Post::create([
			'title' => request('title'),
			'body' => request('body'),
			'user_id' => auth()->id()
			]);
			
		$tag = request('tag');
		$tag = Tag::where('name',$tag)->get();
		$tag_id = $tag->id;
		$post->tags()->attach($tag_id);
		
		return redirect()->route('posts.index')->withFlashMessage('Post added successfully');
		}
	
	public function destroy($id) {
        $post = Post::find($id);
		$post -> delete();
		
		return redirect()->route('posts.index')->withFlashMessage('Post deleted!');
		}
	
	public function edit($id) {
		$post = Post::find($id);
		
		if($post->user_id == auth()->id()) {
			return view('posts.edit',compact('post'));
			}
		else {
			return redirect()->route('posts.show',compact('post'));
			}	
		}	
	
	public function update($id) {
		$post = Post::find($id);
		
		request()->validate([
			'title' => ['required','min:3','max:255'],
			'body' => 'required|min:3|max:65535'
			]);
			
		$post->title = request('title');
		$post->body = request('body');
		
		$post->save();
		return redirect()->route('posts.index')->withFlashMessage('Post je promijejen!');
		}
	
	
	
	}
