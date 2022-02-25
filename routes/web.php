<?php

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

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Image;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Rutas generales
Route::get('/home', [HomeController::class,'index'])->name('home');

//Rutas usuarios
Route::get('/configuration', [UserController::class, 'config'])->name('config');
Route::get('/user/avatar/{filename}', [UserController::class, 'getImage'])->name('user.avatar');
Route::get('/profile/{id}', [UserController::class,'userProfile'])->name('user.profile');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/discover/users/{search?}', [UserController::class, 'index'])->name('user.users');

//Rutas Likes
Route::get('/user/likes', [LikeController::class, 'authUserLikes'])->name('user.likes');
Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save');
Route::get('/dislike/{image_id}', [LikeController::class, 'dislike'])->name('like.delete');

//Rutas Imagenes
Route::get('/upload/post', [ImageController::class, 'create'])->name('post.create');
Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
Route::get('/post/{id}', [ImageController::class, 'detail'])->name('image.detail'); 
Route::get('/delete/image/{id}', [ImageController::class, 'delete'])->name('image.delete');
Route::get('/post/edit/{id}', [ImageController::class, 'edit'])->name('image.edit');
Route::post('/post/save', [ImageController::class, 'savePost'])->name('post.save');
Route::post('/post/update', [ImageController::class, 'update'])->name('post.update');

//Rutas Comentarios
Route::get('/comment/delete{id}', [CommentController::class, 'delete'])->name('comment.delete');
Route::post('/comment/save', [CommentController::class, 'save'])->name('comment.save');