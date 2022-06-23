<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
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

Route::get('/materiUser', function () {
    return view('landingpage.materiUser');
});

Route::get('/materiGuru', function () {
    return view('landingpage.materiGuru');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        // return view('welcome');
        return view('landingpage.home');
    });

    Route::resource('users', UserController::class);
    Route::resource('activity', ActivityController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
