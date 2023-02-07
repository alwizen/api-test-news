<?php

use App\Http\Controllers\Api\Admin\LoginController;
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


Route::prefix('admin')->group(function(){
    Route::post('login', [LoginController::class, 'index']);

    Route::group(['middleware'=>'auth:api'], function() {

        Route::get('/user', [LoginController::class, 'getUser']);

        Route::get('/refresh', [LoginController::class, 'refreshToken']);

        Route::post('/logout', [LoginController::class, 'logout']);
    });
});
