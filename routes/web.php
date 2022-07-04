<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return view('landingpage.login');
});

Route::get('/dashboard', function () {
    return view('index');
});

// Route::get('/materiUser', function () {
//     return view('materidanTugas.materiUser');
// });
Route::get('/materiGuru', [KelasController::class, 'kelas']);
Route::get('/materiUser', [KelasController::class, 'materiUser']);

Route::get('/detailMateri', function () {
    return view('materidanTugas.detailMateri');
});

Route::get('/detailTugas', function () {
    return view('materidanTugas.detailTugas');
});

// Route::get('/materiGuru', function () {
//     return view('materidanTugas.materiGuru');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [LoginController::class, 'dashboard']);
    Route::resource('users', UserController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
// routing url untuk mencoba vendor PDF di BukuController, tepatnya di fungsi generatePDF
Route::get('generate-pdf', [UserController::class, 'generatePDF']);
// routing url untuk mengunduh data buku dalam format PDF di BukuController, tepatnya di fungsi bukuPDF.
Route::get('users-pdf', [UserController::class, 'usersPDF']);
// routing url untuk mengunduh data user dalam format EXCEL
Route::get('users-excel', [UserController::class, 'usersExcel']);
