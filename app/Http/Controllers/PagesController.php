<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PagesController extends Controller
{
    public function getIndex(){
      $categories = Category::all();

      $populars = Post::all()
        ->sortByDesc(function ($post) {
          return $post->comments()->count();
      })->take(3);

    	$posts = Post::orderBy('created_at', 'desc')->paginate(6);
    	return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withPopulars($populars);
    }

    public function getContact(){
      $categories = Category::all();
      $populars = Post::all()
        ->sortByDesc(function ($post) {
          return $post->comments()->count();
      })->take(3);
    	return view('pages.contact')->withCategories($categories)->withPopulars($populars);
    }

    // public function postContact(){
    //
    // }

}
