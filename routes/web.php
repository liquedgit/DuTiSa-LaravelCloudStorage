<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/login', [AuthController::class, 'auth']);

Route::get('/dashboard', [FileController::class, 'index'])->middleware('auth');

// Route::get('/dashboard',function(){
//     return view('homepage');
// })->middleware('auth');

Route::post('/upload', [FileController::class, 'insert']);
Route::get('/menu', [AuthController::class, 'menu']);

//Route::get('/dashboard',[FileController::class, 'logoutTime']);

Route::post('/delete/{id}', [FileController::class, 'delete']);
Route::post('/download/{id}', [FileController::class, 'download']);






