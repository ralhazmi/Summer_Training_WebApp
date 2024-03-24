<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\CommonQuestionsController;
use App\Http\Controllers\TrainingInstitutionController;
use App\Http\Controllers\ReportsController;





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
    Route::get('/Dash', [ProfileController::class,'sideBar'])->name('dashboard');

    Route::get('/manage_students', [StudentsController::class,'show'])->name('show.students');
    Route::post('/manage_students/add', [StudentsController::class,'add'])->name('add.students');
    Route::put('/manage_students/{student}/update', [StudentsController::class,'updatestuedent'])->name('update.students');
    Route::any('/update-activation/{id}/{status}',  [StudentsController::class,'updateActivation'])->name('update.Activation');
    Route::get('/search',  [StudentsController::class,'search'])->name('search');

    Route::get('/req.RQ', [RequestController::class, 'index'])->name("indexrequest");
    Route::post('/store-request', [RequestController::class, 'store'])->name("storerequest");
    Route::get('/download-request/{attachment}',[RequestController::class,'download'])->name("download");
    Route::get('/req.requestdetails/{id}',[RequestController::class,'requestdetails'])->name("requestdetails");
    Route::post('/requestReply/{request_id}',[ReplyController::class,'store'])->name("requestReply");
    Route::get('/requestsFilter', [RequestController::class, 'requestsFilter'])->name('requestsFilter');

    Route::get('/annou.Announcements',[AnnouncementsController::class,'index'])->name("indexannouncement");
    Route::post('/store',[AnnouncementsController::class,'store'])->name("storeannouncement");
    Route::get('/annou.detailsannouncement/{id}',[AnnouncementsController::class,'detailsannouncement'])->name("detailsannouncement");
    Route::get('/download/{attachment}',[AnnouncementsController::class,'download'])->name("download");

    Route::get('/Dashboard',[DashController::class,'index'])->name("Dashindex");
    Route::get('/Dashboardshow',[DashController::class,'show'])->name("Dashshow");
    Route::get('/dashcontent.CommonQuestions',[CommonQuestionsController::class,'index'])->name("commonindex");
    Route::post('/storeQ',[CommonQuestionsController::class,'store'])->name("storequestion");
    Route::get('/dashcontent.TrainingInstitutions',[TrainingInstitutionController::class,'index'])->name("trainingindex");
    Route::post('/storeR',[TrainingInstitutionController::class,'store'])->name("storeR");

    Route::get('/Reports.index',[ReportsController::class,'index'])->name("Reportsindex");
    Route::get('/Reports.show/{id}',[ReportsController::class,'show'])->name("Reportshow");
    Route::post('/StudentReports/store',[ReportsController::class,'store'])->name("Reportstore");
    Route::get('/download/{attachment}',[ReportsController::class,'download'])->name("download");
    Route::post('/reports/{id}/give-degree', [ReportsController::class, 'giveDegree'])->name('reports.give-degree');
    
    Route::get('/MarkAsRead_all',[ReportsController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
});







