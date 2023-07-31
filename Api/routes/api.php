<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected routes
Route::middleware(['cors', 'auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Public routes
Route::middleware('cors')->group(function () {
    Route::apiResource('/genres', GenreController::class);
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/orders', OrderController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserCon::class);

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Route outside the group
Route::get('/books/search', [BookController::class, 'searchByAuthor'])->name('books.search');

