<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    // Route::apiResource('/authors', AuthorsController::class);
});*/

Route::post('post', [PostController::class, "storePost"]);
Route::get('post/{post?}', [PostController::class, "readPost"]);
Route::put('post/{post}', [PostController::class, 'updatePost']);
Route::delete('post/{post}', [PostController::class, 'deletePost']);

Route::prefix('user')->group(function () {
    Route::post('', [UserController::class, "createUser"]);
    Route::get('{user?}', [UserController::class, "findUser"]);
    Route::put('{user}', [UserController::class, 'updateUser']);
    Route::delete('{deleteuser}', [UserController::class, 'deleteUser']);
});

    Route::post('author', [AuthorsController::class, 'newAuthor']);
    Route::get('author', [AuthorsController::class, 'findAuthor']);
    Route::put('author/{modifyauthor}', [AuthorsController::class, 'modifyAuthor']);
    Route::delete('author', [AuthorsController::class, 'deleteAuthor']);
