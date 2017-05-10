<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class LayoutController extends Controller
{
    public function getIndex(){
        $categories = Category::all();
    	$posts = Post::orderBy('created_at', 'desc')->paginate(6);    	
    	return view('layouts.welcome')->withPosts($posts)->withCategories($categories);
    }

    public function getContact(){
        $categories = Category::all();
    	return view('layouts.contact')->withCategories($categories);
    }

    public function postContact(){
    	
    }

}
