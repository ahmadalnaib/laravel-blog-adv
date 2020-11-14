<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use phpDocumentor\Reflection\Types\Compound;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::all()->count();
        $categorise=Category::all()->count();
        $tags=Tag::all()->count();
        $users=User::all()->count();
        $trashed=Post::onlyTrashed()->count();
        return view('home',compact('posts'),compact('categorise'))
            ->with('tags',$tags)
            ->with('users',$users)
            ->with('trashed',$trashed)
            ;
    }
}
