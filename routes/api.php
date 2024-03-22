<?php

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::get('/allUsers', [\App\Http\Controllers\API\AuthController::class, 'allUsers']);

// get data news
Route::get('/allNews', [\App\Http\Controllers\API\NewsController::class, 'index']);
// get data news by id
Route::get('/news/{id}', [\App\Http\Controllers\API\NewsController::class, 'show']);

// get data category
Route::get('/allCategory', [\App\Http\Controllers\API\CategoryController::class, 'index']);
// get data category by id
Route::get('/category/{id}', [\App\Http\Controllers\API\CategoryController::class, 'show']);

// get data carousel
Route::get('/carousel', [\App\Http\Controllers\API\FrontEndController::class, 'index']);
