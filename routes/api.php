<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
  //All secure URL's

  
//for Get

Route::get("list",[UserController::class,'list']);

  //for Post

Route::post("add",[UserController::class,'add']);

//for Update

Route::put("update",[UserController::class,'update']);

//for delete

Route::delete("delete/{categoryID}",[UserController::class,'delete']);

// for search

Route::get("search/{categoryEng}",[UserController::class,'search']);

//For Validation

Route::post("save",[UserController::class,'testData']);

// for resource
  Route::apiResource("member",MemberController::class);

// for upload file
// for upload file  

Route::post("upload",[FileController::class,'upload']);


  });




//Check Authentication by sanctum or login

Route::post("login",[LoginController::class,'index']);
