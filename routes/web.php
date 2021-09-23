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
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DiseaseVictimEmployeeController;
use App\Http\Controllers\DiseaseVictimNonEmployeeController;
use App\Http\Controllers\DiseaseWitnessEmployeeController;
use App\Http\Controllers\DiseaseWitnessNonEmployeeController;
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
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// Login & Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/regulasi', RegulasiController::class);
    Route::post('/dashboard/regulasi/create/store', [RegulasiController::class, 'add']);
    Route::resource('/dashboard/apar', AparController::class);
    Route::post('/dashboard/apar/create/store', [AparController::class, 'add']);
    Route::resource('/dashboard/news', NewsController::class);
    Route::post('/dashboard/news/create/store', [NewsController::class, 'add']);
    Route::resource('/dashboard/employee', EmployeeController::class);
    Route::post('/dashboard/employee/create/store', [EmployeeController::class, 'add']);
    Route::resource('/dashboard/manager', ManagerController::class);
    Route::post('/dashboard/manager/create/store', [ManagerController::class, 'add']);
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

    //profil user admin
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::get('/profil/change', [ProfilController::class, 'change']);
    Route::post('/profil', [ProfilController::class, 'change_profil']);
    Route::get('/profil/check', [ProfilController::class, 'check']);
    Route::post('/profil/check', [ProfilController::class, 'check_password']);

});
