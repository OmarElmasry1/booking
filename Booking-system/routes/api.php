<?php

use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\Business\ServicesController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::apiResource('user', UserController::class);




Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('service', ServicesController::class);
    Route::apiResource('booking', BookingsController::class);
    Route::post('service_update/{id}',[ServicesController::class, 'update'] );

    Route::apiResource('review', ReviewsController::class);
    Route::post('review_update/{id}',[ReviewsController::class, 'update'] );

});




Route::get('/auth', function() {

    return response()->json(['message'=>'please login first']);

})->name('auth');


