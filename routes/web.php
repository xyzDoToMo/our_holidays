<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/likes', [LikeController::class, 'index']);
Route::get('/followers', [FollowerController::class, 'index']);

Route::get('/', [CategoryController::class, 'index']);
Route::get('/', [CommentController::class, 'index']);
Route::get('/', [FollowerController::class, 'index']);
Route::get('/', [LikeController::class, 'index']);