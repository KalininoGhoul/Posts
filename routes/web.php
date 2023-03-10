<?php

namespace App\Http\Controllers;

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

Route::get('/', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('upPost');
Route::get('/categories/{id}/create', [PostController::class, 'create'])->name('createPost');
Route::post('/posts', [PostController::class, 'store'])->name('storePost');
