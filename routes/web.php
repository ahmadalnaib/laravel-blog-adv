<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-*/*//*/*/*/*/*/*/*/*/*/*//*/***/*/*//////////////////**/*/*//*///////
//out route


Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
//    posts
    Route::get('/posts',[PostsController::class,'index'])->name('posts.index');
    Route::get('/post/create',[PostsController::class,'create'])->name('posts.create');
    Route::get('/post/edit/{id}',[PostsController::class,'edit'])->name('posts.edit');
    Route::post('/post/store',[PostsController::class,'store'])->name('posts.store');
    Route::get('/post/delete/{id}',[PostsController::class,'destroy'])->name('posts.delete');
    Route::get('/post/hdelete/{id}',[PostsController::class,'hdelete'])->name('posts.hdelete');
    Route::get('/post/trashed',[PostsController::class,'trashed'])->name('posts.trashed');
    Route::put('/post/update/{id}',[PostsController::class,'update'])->name('posts.update');
    Route::get('/post/restore/{id}',[PostsController::class,'restore'])->name('posts.restore');


//category
    Route::get('/category',[CategoriesController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoriesController::class,'create'])->name('category.create');
    Route::get('/category/edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
    Route::post('/category/store',[CategoriesController::class,'store'])->name('category.store');
    Route::get('/category/delete/{id}',[CategoriesController::class,'destroy'])->name('category.delete');
    Route::put('/category/update/{id}',[CategoriesController::class,'update'])->name('category.update');


//    tags
    Route::get('/tags',[TagController::class,'index'])->name('tags.index');
    Route::get('/tag/create',[TagController::class,'create'])->name('tags.create');
    Route::get('/tag/edit/{id}',[TagController::class,'edit'])->name('tags.edit');
    Route::post('/tag/store',[TagController::class,'store'])->name('tags.store');
    Route::get('/tag/delete/{id}',[TagController::class,'destroy'])->name('tags.delete');
    Route::put('/tag/update/{id}',[TagController::class,'update'])->name('tags.update');


//    users
    Route::get('/user',[UsersController::class,'index'])->name('users.index');
    Route::get('/user/create',[UsersController::class,'create'])->name('users.create');
    Route::get('/user/edit/{id}',[UsersController::class,'edit'])->name('users.edit');
    Route::post('/user/store',[UsersController::class,'store'])->name('users.store');
    Route::get('/user/delete/{id}',[UsersController::class,'destroy'])->name('users.delete');
    Route::get('/user/hdelete/{id}',[UsersController::class,'hdelete'])->name('users.hdelete');
    Route::get('/user/trashed',[UsersController::class,'trashed'])->name('users.trashed');
    Route::put('/user/update/{id}',[UsersController::class,'update'])->name('users.update');
    Route::get('/user/restore/{id}',[UsersController::class,'restore'])->name('users.restore');
});
