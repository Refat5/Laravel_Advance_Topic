<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('post', [PostController::class, 'index'])->name('post.index');

Route::delete('post/{id}', [PostController::class, 'delete'])->name('post.delete');

Route::get('post/restore/one/{id}', [PostController::class, 'restore'])->name('post.restore');

Route::get('post/restore_all', [PostController::class, 'restore_all'])->name('post.restore_all');
