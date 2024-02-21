<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class,'login'])->name('auth.login');
Route::post('/', [AuthController::class,'loginPost'])->name('auth.login.post');

Route::get('/register', [AuthController::class,'registeation'])->name('auth.register');
Route::post('/register', [AuthController::class,'registrationPost'])->name('auth.register.post');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::group(['middleware'=>'auth'], function (){
    Route::get('/personal', [ProfileController::class,'profile'])->name('personal.profile');
});


