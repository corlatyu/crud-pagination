<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
// Redirect root URL to login form
Route::get('/', [LoginController::class, 'showLoginForm']);
// Route::get('/', [TicketController::class, 'index']); // untuk memastikan bahwa ketika seseorang mengunjungi http://127.0.0.1:8000/tampilan utamanya adalah ticket.index
Route::resource('/ticket', TicketController::class); 
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





//Konfigurasi menggunakan middleware


// // Redirect root URL to login form
// Route::get('/', [LoginController::class, 'showLoginForm'])->middleware('guest');

// // Route for login page and login action with guest middleware
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// // Rute logout dengan metode POST
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('ensure.logout.is.post');

// // Rute logout dengan metode GET yang diarahkan ke 404
// Route::get('/logout', function() {
//     abort(404, 'Page not found');
// });


// // Group routes that require authentication
// Route::middleware('auth.user')->group(function () {
//     Route::resource('/ticket', TicketController::class);
//     Route::resource('/mahasiswa', MahasiswaController::class);
// });


// Step
// php artisan make:middleware AuthenticateUser 
// php artisan make:middleware EnsureLogoutIsPost
// RedirectIfAuthenticated.php
// kernel.php