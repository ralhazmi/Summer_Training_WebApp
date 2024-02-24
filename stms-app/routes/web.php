<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;


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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Requests/{id?}', [RequestController::class, 'index'])->name('requests');




// Add a new route to handle POST requests for /Requests
Route::post('/Requests', [RequestController::class, 'store'])->name('requests.store');


Route::get('/Dashboard/{id?}', function () {

    return view ('Dash ') ;
    });
    


    

Route::get('/Announcement/{id?}', function () {

    return view ('A ') ;
    });
    
    
    Route::get('/Reports/{id?}', function () {

        return view ('R ') ;
        });
        

 
//Route::get('/Requests/{id?}', function () {

//return view ('RQ ') ;
//});

    

Route::get('/Manage student/{id?}', function () {

    return view ('MS ') ;
    });
    

    
Route::get('/Contact with student/{id?}', function () {

    return view ('CS') ;
    });



Route::get('/Contact with supervisor/{id?}', function () {

    return view ('CSuper') ;
    });
    
   

    

Route::get('/Log out/{id?}', function () {

    return view ('Lout') ;
    });
    
    
