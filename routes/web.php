<?php

use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('health', HealthCheckResultsController::class);

Route::get('test',function(){
    $pass = 'Saumil@123';
    $new_pass = bcrypt($pass);
    User::where('id',1)->update(['password' => $new_pass]);
});
