<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

   // Route::apiResource('/authors', AuthorsController::class);
});

//Route::post('post', [Controller::class, "storePost"]);
Route::get('post/{post_id?}', [Controller::class, "readPost"]);
Route::put('post/{post}', [Controller::class, 'updatePost']);
Route::delete('post/{post}', [Controller::class, 'deletePost']);

