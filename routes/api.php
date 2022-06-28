<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
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

Route::get('user', [UserController::class, 'all']);
// Route::get('activity', [ActivityController::class, 'all']);
Route::get('absensi', [AbsensiController::class, 'all']);
Route::get('guru', [GuruController::class, 'all']);
Route::get('materi', [MateriController::class, 'all']);
Route::get('activity', [ActivityController::class, 'all']);
Route::get('kelas', [KelasController::class, 'all']);
Route::get('tugas', [TugasController::class, 'all']);


