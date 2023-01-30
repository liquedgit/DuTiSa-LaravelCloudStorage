<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicFileController;
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

Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('/register', [AuthController::class, 'executeRegister']);

Route::get("/login", [AuthController::class, 'viewLogin']);
Route::post("/login", [AuthController::class, 'executeLogin']);

Route::get('/logout', [AuthController::class, 'executeLogout']);
Route::get('/dashboard', [FileController::class, 'viewDashboard'])->middleware('auth.middleware');
Route::get('/dashboardPublic', [PublicFileController::class, 'viewDashboard'])->middleware('auth.middleware');

Route::post('/upload', [FileController::class, 'uploadFiles'])->middleware('auth.middleware');
Route::post('/uploadPublic', [PublicFileController::class, 'uploadFiles'])->middleware('auth.middleware');

Route::post('/delete/{id}', [FileController::class, 'delete'])->middleware('auth.middleware');
Route::post('/download/{id}', [FileController::class, 'download'])->middleware('auth.middleware');

Route::post('/downloadPublic/{id}', [PublicFileController::class, 'download'])->middleware('auth.middleware');
Route::post('/deletePublic/{id}', [PublicFileController::class, 'delete'])->middleware('auth.middleware');

Route::get('/settings', [UserController::class, 'settings'])->middleware('auth.middleware');
Route::put('/settings', [UserController::class, 'updatePassword'])->middleware('auth.middleware');

Route::post('/upload', [FileController::class, 'store'])->name('uploadPrivate');

Route::post('/uploadPublic', [PublicFileController::class, 'store'])->name('uploadPublic');

