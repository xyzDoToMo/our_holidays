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
    Route::get('/reviews', 'index')->name('index');
    Route::post('/reviews', 'store')->name('store');
    Route::get('/reviews/create', 'create')->name('create');
    Route::get('/reviews/{review}', 'show')->name('show');
    Route::put('/reviews/{review}', 'update')->name('update');
    Route::delete('/reviews/{review}', 'delete')->name('delete');
    Route::get('/reviews/{review}/edit', 'edit')->name('edit');
});
require __DIR__.'/auth.php';