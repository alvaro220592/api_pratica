<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function (){
    
    Route::get('/user', function(Request $request){
        return $request->user;
    });

    Route::get('clients', [ClientController::class, 'index']);

    Route::post('client/store', [ClientController::class, 'store']);

    Route::get('client/show/{id}', [ClientController::class, 'show']);

    Route::put('client/update/{id}', [ClientController::class, 'update']);

    Route::delete('client/delete/{id}', [ClientController::class, 'destroy']);

    Route::post('logout', [LoginController::class, 'logout']);

});
/* 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
