<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BriefingController;
use App\Http\Controllers\AccidentController;
use App\Http\Controllers\AccidentVictimEmployeeController;
use App\Http\Controllers\AccidentVictimNonEmployeeController;
use App\Http\Controllers\AccidentWitnessEmployeeController;
use App\Http\Controllers\AccidentWitnessNonEmployeeController;
use App\Http\Controllers\B3sController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DiseaseVictimEmployeeController;
use App\Http\Controllers\DiseaseVictimNonEmployeeController;
use App\Http\Controllers\DiseaseWitnessEmployeeController;
use App\Http\Controllers\DiseaseWitnessNonEmployeeController;
use App\Http\Controllers\PcraController;

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
    return view('index');
});

// Login & Logout
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //regulasi
    Route::resource('/dashboard/regulasi', RegulasiController::class)->except(['show']);
    Route::post('/dashboard/regulasi/create/store', [RegulasiController::class, 'add']);
    //apar
    Route::resource('/dashboard/apar', AparController::class);
    Route::post('/dashboard/apar/create/store', [AparController::class, 'add']);
    //news
    Route::resource('/dashboard/news', NewsController::class);
    Route::post('/dashboard/news/create/store', [NewsController::class, 'add']);
    //employee
    Route::resource('/dashboard/employee', EmployeeController::class);
    Route::post('/dashboard/employee/create/store', [EmployeeController::class, 'add']);
    //manager
    Route::resource('/dashboard/manager', ManagerController::class);
    Route::post('/dashboard/manager/create/store', [ManagerController::class, 'add']);
    //briefing
    Route::resource('/dashboard/briefing', BriefingController::class);
    Route::post('/dashboard/briefing/create/store', [BriefingController::class, 'add']);

    //accident
    Route::resource('/dashboard/accident', AccidentController::class);
    Route::get('/dashboard/accident/{accident}/ve/{victim}', [AccidentVictimEmployeeController::class, 'index']);
    Route::get('/dashboard/accident/{accident}/vne/{victim}', [AccidentVictimNonEmployeeController::class, 'index']);
    Route::get('/dashboard/accident/{accident}/we/{witness}', [AccidentWitnessEmployeeController::class, 'index']);
    Route::get('/dashboard/accident/{accident}/wne/{witness}', [AccidentWitnessNonEmployeeController::class, 'index']);

    //disease
    Route::resource('/dashboard/disease', DiseaseController::class);
    Route::get('/dashboard/disease/{disease}/ve/{victim}', [DiseaseVictimEmployeeController::class, 'index']);
    Route::get('/dashboard/disease/{disease}/vne/{victim}', [DiseaseVictimNonEmployeeController::class, 'index']);
    Route::get('/dashboard/disease/{disease}/we/{witness}', [DiseaseWitnessEmployeeController::class, 'index']);
    Route::get('/dashboard/disease/{disease}/wne/{witness}', [DiseaseWitnessNonEmployeeController::class, 'index']);

    //pcras
    Route::resource('/dashboard/pcra', PcraController::class);

    //b3s
    Route::resource('/dashboard/b3s', B3sController::class);

    //profil user admin
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::get('/profil/change', [ProfilController::class, 'change']);
    Route::post('/profil', [ProfilController::class, 'change_profil']);
    Route::get('/profil/check', [ProfilController::class, 'check']);
    Route::post('/profil/check', [ProfilController::class, 'check_password']);

    Route::get('/logout', [LoginController::class, 'logout']);
});
