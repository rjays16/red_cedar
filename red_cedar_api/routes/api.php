<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsolidatedController;
use App\Http\Controllers\BiomedController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\MergedController;
use App\Http\Controllers\PropertyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('biomed')->group(function () {
    Route::get('', [BiomedController::class,'getBiomed']);
});

Route::prefix('consolidated')->group(function () {
    Route::get('', [ConsolidatedController::class,'getConsolidated']);
    Route::get('limit', [ConsolidatedController::class,'getConsolidatedlimit']);
    Route::get('xls', [ConsolidatedController::class, 'getConsolidatedXLS']);
});

Route::prefix('merged')->group(function () {
    Route::get('', [MergedController::class,'getMergedData']);
});

Route::prefix('property')->group(function () {
    Route::get('', [PropertyController::class,'getProperty']);
});

Route::prefix('result')->group(function (){
    Route::get('', [ResultController::class, 'getResult']);
    Route::get('xls', [ResultController::class, 'getResultXLS']);
});

Route::prefix('config')->group(function (){
    Route::get('', [ConfigController::class,'getConfig']);
    Route::put('{id}', [ConfigController::class,'update']);
});
