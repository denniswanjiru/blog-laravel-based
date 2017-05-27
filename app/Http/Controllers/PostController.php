<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the post in it from the db
        $posts = Post::orderBy('id','desc')->paginate(5);

        //return a view that will display all the post stored in the above var
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //validation
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            ]);

        //store in db
        $user = auth()->user();
        $user_id = $user->id;
        $post = new Post;


        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->user_id = $user_id;
        $post->body = $request->body;

        //Handles Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $location = public_path('images/uploads/posts'.$filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }
        
        $post->save();
        $post->tags()->sync($request->tags, false);

        //success sessions
        Session::flash('success', 'Your Blog was Succesfully Posted!');

        //redirect to show page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // $category = Category::all();
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the pos6t by id in the db and store its data in a var
        $user = auth()->user();
        $user_id = $user->id;
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();
        // $tags2 = array();
        // foreach ($tags as $tag) {
        //     $tags2[$tag->id] = $tag->name;
        // }

        //return a view an pass in the data in the above var
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags)->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        //validation
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body' => 'required',
            ]);

        //store in db
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();
        $post->tags()->sync($request->tags);

        //success sessions
        Session::flash('success', 'Your Blog was Succesfully Updated!');

        //redirect to show page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find post and store it in a var
        $post = Post::find($id);
        $post->tags()->detach();

        //delete the post stored in the above var
        $post->delete();

        //Success flash session
         Session::flash('success', 'Your Blog was Succesfully Deleted!');

        //return a view
          return redirect()->route('posts.index');
    }
}
