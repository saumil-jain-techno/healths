<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * @unauthenticated
 */
Route::get('/healthcheck', function () {
    return [
        'status' => 'up',
        'services' => [
            'database' => 'up',
            'redis' => 'up',
        ],
    ];
});

Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('/user/register',[UserController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => '/users'],function(){

        Route::get('/index',[UserController::class,'index']);     
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::post('/update',[UserController::class,'update']);
        Route::delete('/destroy/{id}',[UserController::class,'destroy']);
    });
});