<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ProfileController;

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

// FollowController
Route::controller(FollowerController::class)->middleware(['auth'])->group(function () {
    Route::post('/users/{user}/follow', 'follow')->name('user.follow');
    Route::post('/users/{user}/unfollow', 'unfollow')->name('user.unfollow');
});

// UserController
Route::controller(UserController::class)->middleware(['web'])->group(function () {
    Route::get('/users/{user}', 'show')->name('user.show');
});

Route::controller(ReviewController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('reviews.index');
    Route::post('/reviews', 'store')->name('reviews.store');
    Route::get('/reviews/create', 'create')->name('reviews.create');
    Route::get('/reviews/{review}', 'show')->name('reviews.show');
    Route::get('/reviews/{review}/edit', 'edit')->name('reviews.edit');
    Route::put('/reviews/{review}', 'update')->name('reviews.update');
    Route::delete('/reviews/{review}', 'delete')->name('reviews.delete');
});
Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/reviews/{review}/comments', 'store')->name('comments.store');
    Route::get('/reviews/{review}/comments/{comment}/edit', 'edit')->name('comments.edit');
    Route::put('/reviews/{review}/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/reviews/{review}/comments/{comment}', 'delete')->name('comments.delete');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/reviews/{review}/like', [LikeController::class, 'like'])->name('reviews.like');
    Route::post('/reviews/{review}/unlike', [LikeController::class, 'unlike'])->name('reviews.unlike');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    require __DIR__.'/auth.php';