<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index(Category $category) {
		
		$posts = $category->posts;

		return view('posts.index',compact('posts'));
		}
	}
