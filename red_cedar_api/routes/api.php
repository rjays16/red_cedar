<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsolidatedController;
use App\Http\Controllers\BiomedController;
use App\Http\Controllers\FileUploadController;
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
    Route::get('', [BiomedController::class,'getConsolidated']);
});

Route::prefix('consolidated')->group(function () {

});
