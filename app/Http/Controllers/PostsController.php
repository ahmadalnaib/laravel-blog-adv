<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
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
        $tags=Tag::all();
        return view('posts.index',compact('posts'),compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        $categorises=Category::all();

        if($categorises->count() ===0)
        {
            return redirect()->route('category.create');
        }

        if($tags->count() ===0)
        {
            return redirect()->route('tags.create');
        }

        return view('posts.create',compact('categorises'),compact('tags'));
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
            "photo"=>"required|image",
            "tags"=>"required",
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

//        for tages
        //The attach function only adds records to the Pivot table.
        //Insert related models when working with many-to-many relations
        $post->tags()->attach($request->tags);

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
        $tags=Tag::all();
        $categorises=Category::all();
        $post=Post::findOrFail($id);

        return view('posts.edit', compact('post'), compact('categorises'))->with('tags',$tags);
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
        $post=Post::findOrFail($id);

        $request->validate([
            "title"=>'required',
            "content"=>'required',
            'category_id'=>'required',

        ]);
        if($request->hasFile('photo')){
            $photo=request('photo');
            $photo_new_name=time().$photo->getClientOriginalName();
            $photo->move('uploads/posts/',$photo_new_name);

            $post->photo='uploads/posts/'.$photo_new_name;
        }

        $post->update([
            $post->title= request('title') ,
            $post->content= request('content') ,
            $post->category_id=>request('category_id'),
            $post->save()
        ]);
         //The sync function replaces the current records with the new records. This is very useful for updating a model.
        $post->tags()->sync($request->tags);

        $request->session()->flash('msg', 'Task was successful!');
        return redirect()->route('posts.index');
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
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('msg','Category deleted');
    }


    public function trashed()
    {
        //
        $posts=Post::onlyTrashed()->get();
        return view('posts.trashed',compact('posts'));
    }

    public function hdelete($id)
    {
        //
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back()->with('msg','Post deleted');
    }

    public function restore($id)
    {
        //
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('posts.index')->with('msg','Post deleted');
    }
}
