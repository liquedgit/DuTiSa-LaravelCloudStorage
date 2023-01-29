<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [AuthController::class, 'viewLogin']);

Route::get("/login", [AuthController::class, 'viewLogin']);

Route::post("/login", [AuthController::class, 'executeLogin']);

Route::get('/logout', [AuthController::class, 'executeLogout']);

Route::get('/dashboard', [FileController::class, 'viewDashboard']);

Route::post('/upload', [FileController::class, 'uploadFiles']);

Route::post('/delete/{id}', [FileController::class, 'delete']);
Route::post('/download/{id}', [FileController::class, 'download']);

Route::get('/settings', [UserController::class, 'settings']);
Route::put('/settings', [UserController::class, 'updatePassword']);


