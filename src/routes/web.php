<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('/',[IndexController::class,'index']);

Route::post('/confirm',[IndexController::class,'confirm']);

Route::post('/thanks',[IndexController::class,'store']);

Route::get('/admin',[IndexController::class,'admin']);

Route::get('/admin/search',[IndexController::class,'search']);

Route::get('/register',[IndexController::class,'registerShow']);

Route::get('/login',[IndexController::class,'loginShow']);