<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;

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
    Route::put('/post/update/{id}',[PostsController::class,'update'])->name('posts.update');


//category
    Route::get('/category',[CategoriesController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoriesController::class,'create'])->name('category.create');
    Route::get('/category/edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
    Route::post('/category/store',[CategoriesController::class,'store'])->name('category.store');
    Route::get('/category/delete/{id}',[CategoriesController::class,'destroy'])->name('category.delete');
    Route::put('/category/update/{id}',[CategoriesController::class,'update'])->name('category.update');

});
