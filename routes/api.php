<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\TasksController;
use App\Http\Controllers\API\UserTasksController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});
Route::group(['prefix' => Null], function(){
    Route::get('/users', [AuthController::class,'index'])->name('index');
    Route::apiResource('tasks', TasksController::class);
    Route::apiResource('statuses', StatusController::class);
    Route::apiResource('usertasks', UserTasksController::class);
});

// Route::middleware('auth:sanctum')->group(function() {
//     Route::get('/users', [AuthController::class,'index'])->name('index');
//     Route::apiResource('statuses', StatusController::class);
//     Route::apiResource('tasks', TasksController::class);
//     Route::apiResource('usertasks', UserTasksController::class);
// });
