<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//for Get

Route::get("list",[UserController::class,'list']);


Route::get("list/{id}",[UserController::class,'list']);

 //when colum name is id run this for get data

Route::get("list/{id?}",[UserController::class,'list']);

  //when columname is categoryID run this for get data by id

Route::get('list/{categoryID}',[UserController::class,'list']);

//for Post

Route::post("add",[UserController::class,'add']);

//for Update

Route::put("update",[UserController::class,'update']);

//for delete

Route::delete("delete/{categoryID}",[UserController::class,'delete']);

// for search

Route::get("search/{categoryEng}",[UserController::class,'search']);