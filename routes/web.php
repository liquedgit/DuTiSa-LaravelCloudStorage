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


Route::get('/logindirect', function () {
    return view('/auth/login');
});

Route::get('/registerdirect', function () {
    return view('/auth/register');
});

Route::post('/registerpage', [AuthController::class, 'register']);

Route::get("/login", [AuthController::class, 'viewLogin']);

Route::post("/login", [AuthController::class, 'executeLogin']);

Route::get('/logout', [AuthController::class, 'executeLogout']);

Route::get('/dashboard', [FileController::class, 'viewDashboard']);

Route::get('/dashboardPublic', [PublicFileController::class, 'viewDashboard']);



Route::post('/upload', [FileController::class, 'uploadFiles']);

Route::post('/uploadPublic', [PublicFileController::class, 'uploadFiles']);




Route::post('/delete/{id}', [FileController::class, 'delete']);
Route::post('/download/{id}', [FileController::class, 'download']);

Route::post('/downloadPublic/{id}', [PublicFileController::class, 'download']);
Route::post('/deletePublic/{id}', [PublicFileController::class, 'delete']);

Route::post('/view/{id}', [FileController::class, 'view']);

Route::get('/settings', [UserController::class, 'settings']);
Route::put('/settings', [UserController::class, 'updatePassword']);


