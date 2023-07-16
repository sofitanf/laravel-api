<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\SourceDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    //logout
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('export', [PegawaiController::class, 'exportPegawai']);

    // data
    Route::get('data', [SourceDataController::class, 'index']);

    // Pegawai
    Route::get('pegawai', [PegawaiController::class, 'index']);
    Route::get('pegawai/{id}', [PegawaiController::class, 'show']);
    Route::post('pegawai', [PegawaiController::class, 'store']);
    Route::post('pegawai/{id}', [PegawaiController::class, 'update']);
    Route::delete('pegawai/{id}', [PegawaiController::class, 'destroy']);
    Route::post('avatar/{id}', [PegawaiController::class, 'updateAvatar']);
});
