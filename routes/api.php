<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RegulasiController;
use App\Http\Controllers\API\AparController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ManagerController;
use App\Http\Controllers\API\BriefingController;
use App\Http\Controllers\API\AccidentController;
use App\Http\Controllers\API\B3sController;
use App\Http\Controllers\API\DiseaseController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\NotifController;
use App\Http\Controllers\API\PcraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware => auth:sanctum'], function(){ 
    Route::resource('/regulasi', RegulasiController::class)->only(['index', 'show']);
    Route::resource('/apar', AparController::class)->only(['index', 'show', 'update']);
    Route::resource('/news', NewsController::class)->only(['index', 'show']);
    Route::resource('/employee', EmployeeController::class)->only(['index', 'show', 'update']);
    Route::put('/employee/{employee}/change_password', [EmployeeController::class, 'change_password']);
    Route::resource('/manager', ManagerController::class)->only(['index', 'show']);
    Route::resource('/briefing', BriefingController::class)->only(['store']);
    Route::resource('/accident', AccidentController::class)->only(['index', 'show', 'store']);
    Route::resource('/disease', DiseaseController::class)->only(['index', 'show', 'store']);
    Route::resource('/pcra', PcraController::class)->only(['index', 'show', 'store']);
    Route::resource('/b3s', B3sController::class)->only(['index', 'show', 'store']);

    Route::get('/history/{employee}', [HistoryController::class, 'index']);
    Route::get('/notif', [NotifController::class, 'index']);
});

Route::post('/login', [AuthController::class, 'login']);