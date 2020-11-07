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
    Route::get('/post/create',[PostsController::class,'create'])->name('posts.create');
    Route::post('/post/store',[PostsController::class,'store'])->name('posts.store');


//category
    Route::get('/category/index',[CategoriesController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoriesController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoriesController::class,'store'])->name('category.store');

});
