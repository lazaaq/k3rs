<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BriefingController;
use App\Http\Controllers\AccidentController;
use App\Http\Controllers\AccidentVictimEmployeeController;
use App\Http\Controllers\AccidentVictimNonEmployeeController;
use App\Http\Controllers\AccidentWitnessController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DiseaseVictimEmployeeController;
use App\Http\Controllers\DiseaseVictimNonEmployeeController;
use App\Http\Controllers\DiseaseWitnessController;
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
    Route::resource('/dashboard/news', NewsController::class);
    Route::post('/dashboard/news/create/store', [NewsController::class, 'add']);
    Route::resource('/dashboard/employee', EmployeeController::class);
    Route::resource('/dashboard/manager', ManagerController::class);
    Route::resource('/dashboard/briefing', BriefingController::class);
    Route::resource('/dashboard/accident', AccidentController::class);
    Route::get('/dashboard/accident/{accident}/ve/{victim}', [AccidentVictimEmployeeController::class, 'index']);
    Route::get('/dashboard/accident/{accident}/vne/{victim}', [AccidentVictimNonEmployeeController::class, 'index']);
    Route::get('/dashboard/accident/{accident}/w/{witness}', [AccidentWitnessController::class, 'index']);
    Route::resource('/dashboard/disease', DiseaseController::class);
    Route::get('/dashboard/disease/{disease}/ve/{victim}', [DiseaseVictimEmployeeController::class, 'index']);
    Route::get('/dashboard/disease/{disease}/vne/{victim}', [DiseaseVictimNonEmployeeController::class, 'index']);
    Route::get('/dashboard/disease/{disease}/w/{witness}', [DiseaseWitnessController::class, 'index']);
});

