<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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




        /*  admin topics pages */
Route::get('/admin/topics' ,[TopicController::class , 'index'])->name('admin.topics.index')->middleware('auth') ;
Route::get('/admin/topics/create' , [TopicController::class , 'create'])->name('admin.topics.create')->middleware('auth');
Route::post('/admin/topics' , [TopicController::class , 'store'])->name('admin.topics.store')->middleware('auth') ;
Route::get('/admin/topics/{topic}/edit' , [TopicController::class ,'edit'])->name('admin.topics.edit')->middleware('auth') ;
Route::put('/admin/topics/{topic}' , [TopicController::class , 'update'])->name('admin.topics.update')->middleware('auth') ;
Route::delete('/admin/topics/{topic}' , [TopicController::class , 'destroy'])->name('admin.topics.destroy')->middleware('auth');
        /* admin users page */
Route::get('/admin/users' , [UserController::class , 'index' ])->name('admin.users.index')->middleware('auth') ;
Route::get('/admin/users/create' , [UserController::class , 'create'])->name('admin.users.create')->middleware('auth') ;
Route::post('/admin/users' , [UserController::class , 'store'])->name('admin.users.store')->middleware('auth') ;
Route::get('/admin/users/{user}/edit' , [UserController::class , 'edit'])->name('admin.users.edit')->middleware('auth') ;
Route::put('/admin/users/{user}' , [UserController::class , 'update'])->name('admin.users.update')->middleware('auth') ;
Route::delete('/admin/users/{user}' , [UserController::class , 'destroy'])->name('admin.users.destroy')->middleware('auth');
        /* Admin posts pages */
Route::get('/admin/posts' , [PostController::class , 'index'])->name('admin.posts.index')->middleware('auth');
Route::get('/admin/posts/create' , [PostController::class , 'create'])->name('admin.posts.create')->middleware('auth') ;
Route::get('/admin/posts/create' , [PostController::class , 'create'])->name('admin.posts.create')->middleware('auth') ;
Route::post('/admin/posts' , [PostController::class , 'store'])->name('admin.posts.store')->middleware('auth') ;
Route::get('/admin/posts/{post}/edit' , [PostController::class , 'edit'])->name('admin.posts.edit')->middleware('auth') ;
Route::put('/admin/posts/{post}' , [PostController::class , 'update'])->name('admin.posts.update')->middleware('auth') ;
Route::delete('/admin/posts/{post}' , [PostController::class , 'destroy'])->name('admin.posts.destroy')->middleware('auth') ;
        /* Guests pages */
Route::get('/' , [GuestController::class , 'index' ])->name('posts.index') ;
Route::get('/posts' , [GuestController::class , 'index' ])->name('posts.index') ;
Route::get('/posts/{post}' , [GuestController::class , 'show'])->name('posts.show') ;
Route::get('/topics/{topic}' , [GuestController::class , 'getTopic'])->name('topics.show');
Route::get('/users/register' , [UserController::class , 'register'])->name('users.register')->middleware('guest');
Route::post('/users' , [UserController::class ,'insertUser'])->name('users.insert');
Route::get('/users/login' , [UserController::class , 'login'])->name('users.login')->middleware('guest') ;
Route::post('/users/authenticate' , [UserController::class , 'authenticate'])->name('users.authenticate') ;
Route::post('/logout' , [UserController::class , 'logout'])->name('users.logout')->middleware('auth') ;


