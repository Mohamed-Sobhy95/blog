<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Test;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use GuzzleHttp\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class,'show'])->name('post');

Route::get('/register',[RegistrController::class,'create'])->middleware('guest');

Route::post('/register',[RegistrController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');

Route::post('/posts/{post:slug}/comments',[PostCommentController::class,'store']);
Route::post('newsletter',NewsLetterController::class);

Route::middleware('can:admin')->group(function(){

    Route::get('admin/posts/create',[AdminPostController::class , 'create']);
    Route::post('admin/posts',[AdminPostController::class , 'store'])->middleware('can:admin');

    Route::get('admin/posts',[AdminPostController::class,'index']);
    Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit']);

    Route::patch('admin/posts/{post}',[AdminPostController::class,'update'])->middleware('admin');
    Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy'])->middleware('admin');
});

// Route::resource('test',Test::class)->except('create');

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// })->name('category');

// Route::get('/users/{author:username}', function (User $author) {

//     return view('posts,index', [
//         'posts' => $author->posts,
//         'categories' => Category::all()

//     ]);
// })->name('authors');
