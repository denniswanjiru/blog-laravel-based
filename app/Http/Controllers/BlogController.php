<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class BlogController extends Controller
{
    public function getSingle($slug){
    	$categories = Category::all();
      $populars = Post::with('comments')
          ->get()
          ->take(3)
          ->sortByDesc( function ($popular){
            return $popular->comments->count();
          });
    	$posts = Post::orderBy('created_at', 'desc')->paginate(3);

    	// Store the individual post in a var from the db
    	$post = Post::where('slug', '=', $slug)->first();


    	//return a view and pass in the info stored in the above var
    	return view('blog.single')
          ->withPost($post)
          ->withCategories($categories)
          ->withPosts($posts)
          ->withPopulars($populars);
    }

    // public function getCategory($id)
    // {
    //     $category = Category::find($id);
    //     return view('blog.single')->withCategory($category);
    // }
}
