<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicFileController;

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
    return view('/auth/login');
});

Route::get('/logindirect', function () {
    return view('/auth/login');
});

Route::get('/registerdirect', function () {
    return view('/auth/register');
});

Route::post('/registerpage', [AuthController::class, 'register']);


Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/login', [AuthController::class, 'auth']);

Route::get('/dashboard', [FileController::class, 'index'])->middleware('auth');

//PENGERJAAN GW
Route::get('/dashboardPublic', [PublicFileController::class, 'index']);



//============
// Route::get('/dashboard',function(){
//     return view('homepage');
// })->middleware('auth');

Route::post('/upload', [FileController::class, 'insert']);
Route::get('/menu', [AuthController::class, 'menu']);

//=======================
Route::post('/uploadPublic', [PublicFileController::class, 'insert']);


//======================



Route::post('/delete/{id}', [FileController::class, 'delete']);
Route::post('/download/{id}', [FileController::class, 'download']);

Route::post('/downloadPublic/{id}', [PublicFileController::class, 'download']);
Route::post('/deletePublic/{id}', [PublicFileController::class, 'delete']);






