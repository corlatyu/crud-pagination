<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TicketController::class, 'index']); // untuk memastikan bahwa ketika seseorang mengunjungi http://127.0.0.1:8000/



Route::resource('/ticket', TicketController::class); 

Route::resource('mahasiswa', MahasiswaController::class);