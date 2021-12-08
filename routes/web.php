<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
    return redirect('/home');
});
// Route::get('/phpinff', function () {
//     return phpinfo();
// });

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/buat-laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index']);

Route::post('/lapor', [LaporanController::class, 'submit'])->middleware('auth');

// Route::get('/detail', function(){
//     return view('detail.detailLaporan');
// });

Route::get('/home/detail/{id}', [LaporanController::class, 'show'])->middleware('auth');
Route::delete('/home/detail/{id}', [LaporanController::class, 'destroy'])->middleware('auth');
Route::get('/home/detail/{id}/edit', [LaporanController::class, 'edit'])->middleware('auth');
Route::put('/home/detail/{id}', [LaporanController::class, 'update'])->middleware('auth');