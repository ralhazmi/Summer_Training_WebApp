<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AnnouncementsController;


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
Route::get('/Dashboard', [ProfileController::class,'sideBar'])->name('dashboard');

Route::get('/req.RQ', [RequestController::class, 'index'])->name("indexrequest");
Route::post('/store-request', [RequestController::class, 'store'])->name("storerequest");
Route::get('/download-request/{attachment}',[RequestController::class,'download'])->name("download");
Route::get('/req.requestdetails/{id}',[RequestController::class,'requestdetails'])->name("requestdetails");
Route::post('/requests/{id}/update-status', [RequestController::class, 'updatestatus'])->name('updatestatus');



Route::get('/annou.Announcements',[AnnouncementsController::class,'index'])->name("indexannouncement");
Route::post('/store',[AnnouncementsController::class,'store'])->name("storeannouncement");
Route::get('/annou.detailsannouncement/{id}',[AnnouncementsController::class,'detailsannouncement'])->name("detailsannouncement");
Route::get('/download/{attachment}',[AnnouncementsController::class,'download'])->name("download");

});







