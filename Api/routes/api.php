<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// protected routes
// Route::middleware(['cors'])->group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

// // public routes
// Route::middleware(['cors'])->group([], function () {
//     Route::resource('/genres', GenreController::class);
//     Route::resource('/books', BookController::class);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/login', [AuthController::class, 'login']);
// });

// // Route outside the group
// Route::get('/books/search', [BookController::class, 'searchByAuthor'])->name('books.search');

// Protected routes
Route::middleware(['cors', 'auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Public routes
Route::middleware('cors')->group(function () {
    Route::resource('/genres', GenreController::class);
    Route::resource('/books', BookController::class);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Route outside the group
Route::get('/books/search', [BookController::class, 'searchByAuthor'])->name('books.search');

