<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Http\Middleware\checkPostOwner;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('posts',[PostController::class,'index'])->name('posts.index');

Route::get('users',[userController::class,'index'])->name('users.index');



Route::get("posts/create",[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('posts',[PostController::class,'store'])->name('posts.store');



Route::get('posts/{id}',[PostController::class,'show'])->where('id', '[0-9]+')->name('posts.show');


Route::get('posts/{id}/edit',[PostController::class,'edit'])->where('id', '[0-9]+')->name('posts.edit')->middleware(checkPostOwner::class);
Route::put('/posts/{id}', [PostController::class, 'update'])->where('id', '[0-9]+')->name('posts.update');

Route::get('posts/trash',[PostController::class,'trash'])->name('posts.trash');

Route::delete('posts/{id}', [PostController::class,'destroy'])->where('id', '[0-9]+')->name('posts.destroy')->middleware(checkPostOwner::class);


Route::post('/posts/{id}/restore', [PostController::class,'restore'])->name('posts.restore');
Route::delete('/posts/{id}/delete-permanently', [PostController::class,'deletePermanently'])->name('posts.delete-permanently');

Route::fallback(fn() => 'Route not found');

require __DIR__.'/auth.php';
