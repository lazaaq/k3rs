<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RegulasiController;
use App\Http\Controllers\API\AparController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ManagerController;
use App\Http\Controllers\API\BriefingController;
use App\Http\Controllers\API\AccidentController;
use App\Http\Controllers\API\DiseaseController;
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
    Route::put('/employee/{employee}/ganti_password', [EmployeeController::class, 'ganti_password']);
    Route::resource('/manager', ManagerController::class)->only(['index', 'show']);
    Route::resource('/briefing', BriefingController::class)->only(['index', 'show', 'update']);
    Route::resource('/accident', AccidentController::class);
    Route::resource('/disease', DiseaseController::class);
});

Route::post('/login', [AuthController::class, 'login']);