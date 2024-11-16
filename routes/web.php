<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowerController;

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


Route::controller(ReviewController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/reviews', 'store')->name('store');
    Route::get('/reviews/create', 'create')->name('create');
    Route::get('/reviews/{review}', 'show')->name('show');
    Route::get('/reviews/{review}/edit', 'edit')->name('edit');
    Route::put('/reviews/{review}', 'update')->name('update');
    Route::delete('/reviews/{review}', 'delete')->name('delete');
});
Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/reviews/{review}/comments', 'store')->name('comments.store');
    Route::get('/reviews/{review}/comments/{comment}/edit', 'edit')->name('comments.edit');
    Route::put('/reviews/{review}/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/reviews/{review}/comments/{comment}', 'delete')->name('comments.delete');
});
require __DIR__.'/auth.php';