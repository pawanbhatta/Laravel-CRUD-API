<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Person;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/product', function(){

//     $product = [
//         'name'=>'Wai Wai',
//         'price'=>20,
//         'description'=>'This is a good noodle.'
//     ];
//     return $product;
// });

// Route::get('/person/{person}', function(Person $person){
//     return $person;
// });

// Route::get('/person/{person}', 'PersonController@show');
// Route::get('/product/{product}', 'ProductController@show');

Route::prefix('v1')->group(function(){
    
    Route::apiResource('/person', 'Api\v1\PersonController')
    ->only(['show', 'store', 'update', 'destroy']);


    Route::apiResource('/people', 'Api\v1\PersonController')
    ->only('index');

    Route::apiResource('/product', 'Api\v1\ProductController')
    ->only(['show', 'store', 'update', 'destroy']);

    Route::apiResource('/products', 'Api\v1\ProductController')
    ->only('index');
});