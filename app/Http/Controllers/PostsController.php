<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorises=Category::all();
        return view('posts.create',compact('categorises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title"=>'required',
            "content"=>'required',
            'category_id'=>'required',
            "photo"=>"required|image"
        ]);

        $photo=request('photo');
        $photo_new_name=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$photo_new_name);

        $post=Post::create([
            "title"=>request('title'),
            "content"=>request('content'),
            'category_id'=>request('category_id'),
            "photo"=>"uploads/posts/".$photo_new_name,
            'slug'=>str_slug($request->title),

//            when we need use slug use helpers
//        composer require laravel/helpers

        ]);

        $request->session()->flash('msg', 'Post created');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
