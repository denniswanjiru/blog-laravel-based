<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $post_id){
      
        $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'comment' => 'required|max:2000'
        ]);
        
        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was successfully added!');

        return redirect()->route('blog.single', [$post->slug]);
    }
}
