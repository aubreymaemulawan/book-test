<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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


//Bus
Route::match(['get','post',], 'book/list', [BookController::class,'list']);
Route::match(['get','post',], 'book/items', [BookController::class,'items']);
Route::match(['get','post',], 'book/create', [BookController::class,'create']);
Route::match(['get','post',], 'book/update', [BookController::class,'update']);
Route::match(['get','post',], 'book/delete', [BookController::class,'delete']);