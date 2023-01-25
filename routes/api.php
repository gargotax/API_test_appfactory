<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::apiResource('company', CompanyController::class);
//Route::get('employee/{employee}', [EmployeeController::class, 'show']);
//Route::put('employee/{employee}', [EmployeeController::class, "update"]);
Route::apiResource('employee', EmployeeController::class);
Route::get('isCollegue/{employee1}/{employee2}', [Controller::class, 'isCollegue']);

Route::get('collegue/{employee}', [EmployeeController::class, 'collegue']);

Route::get('employee/age/{age1}/{age2}', [EmployeeController::class, 'employeeAge']);

Route::get('company/state/{state}', [CompanyController::class, 'stateCompany']);
Route::get('company2/state', [CompanyController::class, 'statoAzienda']);
Route::get('filterCompany', [CompanyController::class, 'filterCompany']);


