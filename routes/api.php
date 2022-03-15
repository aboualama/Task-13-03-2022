<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\UserController; 
use  App\Http\Controllers\Api\CategoryController;    

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
 

Route::group(['middleware' => ['api']], function () {
    Route::post('login', [UserController::class,'login']);
});

 
Route::group(['middleware' => ['auth:api', 'verified']], function () { 

    Route::get('/categories', [CategoryController::class,'get_categories']);
    Route::post('/posts', [CategoryController::class,'get_posts']);
    Route::get('/post/{id}', [CategoryController::class,'show_post']);
 
});
