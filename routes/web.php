<?php

use App\Http\Controllers\ProductsController;
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
// rotta che manda una view
Route::get('/', function () {
    return view('welcome');
});
/*
 ESEMPI PER CAPIRE IL FUNZIONAMENTO DELLE ROTTE
//rotta per users che manda una determinata stringa
Route::get('/users/', function (){
    return 'ciao';
});

//rotta per users -array(json)
Route::get('/users', function(){
    return ['1', '2', '3'];
});

//rotta per users - json object
Route::get('/users', function(){
    return response()->json([
        'name'=> 'hachemi',
        'corso'=> 'laravel',
    ]);
});

//route to users - function
Route::get('/users',function(){
    return redirect('/');
});
*/

Route::get('/products',
    [ProductsController::class, 'index'])->name('products');
//Route::get('/products/about', [ProductsController::class, 'about']);
//Route::get('/products/{id}', [ProductsController::class, 'show']);

//pattern integer:
//Route::get('products/{name}', [ProductsController::class, 'show'])->where('id', '[0-9]+');

//pattern string:
//Route::get('products/{name}', [ProductsController::class, 'show'])
   // ->where(['name'=>'[a-z]+','id'=> '[0-9]+']);
