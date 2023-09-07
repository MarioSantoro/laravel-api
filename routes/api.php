<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/show/{id}', [ProjectController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/contact-us', [LeadController::class, 'store']);
