<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [LoginController::class, 'dashboard']);
    Route::resource('users', UserController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
// Search Data User
Route::post('/DataUser/search', [UserController::class, 'search']);

//Guru
Route::get('/DataGuru', [GuruController::class, 'index']);
// Create Data Guru
Route::get('/tambahGuru', [GuruController::class, 'create']);
Route::post('/tambahGuru', [GuruController::class, 'store']);
// Edit Data Guru
Route::get('/editGuru/{id}', [GuruController::class, 'edit']);
Route::put('/editGuru/{id}', [GuruController::class, 'update']);
// Delete Data Guru
Route::get('/deleteGuru/{id}', [GuruController::class, 'destroy']);
// Search Data Guru
Route::post('/DataGuru/search', [GuruController::class, 'search']);


//Murid
Route::get('/DataMurid', [MuridController::class, 'index'])->name('murid.index');
// Create Data Murid
Route::get('/tambahMurid', [MuridController::class, 'create']);
Route::post('/tambahMurid', [MuridController::class, 'store']);
// Edit Data Murid
Route::get('/editMurid/{id}', [MuridController::class, 'edit']);
Route::put('/editMurid/{id}', [MuridController::class, 'update']);
// Delete Data Murid
Route::get('/deleteMurid/{id}', [MuridController::class, 'destroy']);
// Search Data Murid
Route::post('/DataMurid/search', [MuridController::class, 'search']);

// Kelas
Route::get('/materiGuru', [KelasController::class, 'kelas']);
Route::get('/materiUser', [KelasController::class, 'materiUser']);
// Kelas Homepage
Route::get('/home', [KelasController::class, 'homeKelas']);
// Data Kelas
Route::get('/DataKelas', [KelasController::class, 'index']);
// Create Data Kelas
Route::get('/tambahKelas', [KelasController::class, 'create']);
Route::post('/tambahKelas', [KelasController::class, 'store']);
// Edit Data Kelas
Route::get('/editKelas/{id}', [KelasController::class, 'edit']);
Route::post('/editKelas/{id}', [KelasController::class, 'update']);

// Materi
Route::get("/detailMapel/{id}", [MateriController::class, 'show']);
Route::get("/editMapel/{id}", [MateriController::class, 'editMapel']);
Route::put("/updateMapel/{id}", [MateriController::class, 'updateMapel']);
Route::get("/deleteMapel/{id}", [MateriController::class, 'destroyMapel']);
// Tambah Materi
// Route::get("/tambahMateri", [MateriController::class, 'store']);
Route::post("/tambahMataPelajaran", [MateriController::class, 'storeMapel']);

// Tugas
Route::get("/detailTugas/{materi_id}/{pertemuan_id}
", [TugasController::class, 'show']);
Route::post("/tambahTugas", [TugasController::class, 'store']);
Route::post("/uploadTugas/{id}", [TugasController::class, 'upload'])->name('uploadTugas');
Route::get("/editTugas/{tugas_id}", [TugasController::class, 'edit']);
Route::put("/updateTugas/{Tugas_id}", [TugasController::class, 'update']);
Route::get("/deleteTugas/{Tugas_id}", [TugasController::class, 'destroy']);

// Pertemuan
Route::post("/storePertemuan/{id}", [MateriController::class, 'storePertemuan']);
Route::get("/editPertemuan/{materi_id}/{pertemuan_id}", [MateriController::class, 'editPertemuan']);
Route::put("/updatePertemuan/{materi_id}/{pertemuan_id}", [MateriController::class, 'updatePertemuan']);
Route::get("/deletePertemuan/{materi_id}/{pertemuan_id}", [MateriController::class, 'destroyPertemuan']);

// Absensi
Route::get("/absensi/{nama}", [AbsensiController::class, 'index']);
Route::post("absensi/store", [AbsensiController::class, 'store']);
Route::post('/absensi/search/{nama}', [AbsensiController::class, 'search']);
// Route::get('/materiGuru', function () {
//     return view('materidanTugas.materiGuru');
// });

// routing url untuk mencoba vendor PDF di BukuController, tepatnya di fungsi generatePDF
// Route::get('generate-pdf', [UserController::class, 'generatePDF']);
// routing url untuk mengunduh data buku dalam format PDF di BukuController, tepatnya di fungsi bukuPDF.
Route::get('users-pdf', [UserController::class, 'usersPDF']);
Route::get('absensi-pdf', [AbsensiController::class, 'absensiPDF']);
Route::get('murid-pdf', [MuridController::class, 'muridPDF']);
Route::get('guru-pdf', [GuruController::class, 'guruPDF']);
// routing url untuk mengunduh data user dalam format EXCEL
Route::get('users-excel', [UserController::class, 'usersExcel']);
Route::get('absensi-excel', [AbsensiController::class, 'absensiExcel']);
Route::get('murid-excel', [MuridController::class, 'muridExcel']);
Route::get('guru-excel', [GuruController::class, 'guruExcel']);
// 
