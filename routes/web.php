<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DropdownsController;
use App\Http\Livewire\SiswaLw;
use App\Http\Livewire\MapelLw;
use App\Http\Livewire\KelasLw;

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

Route::get('siswa' , SiswaLw::class)->name('siswa');
Route::get('mapel' , MapelLw::class)->name('mapel');
Route::get('kelas' , KelasLw::class)->name('kelas');

Route::get('/', function () {
    return view('welcome');
});
Route::resource('biodata',DataController::class);
Route::resource('jkel',DataController::class);

// Route::get('/coba', [DropdownsController::class,'index'])
//     ->name('admin.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/dashboard', function () {
//     return view('admin.dashboard');})->name('admin.dashboard');

Route::get('/home',[HomeController::class,'index'])->name('index');
Route::get('/dasboard',[HomeController::class,'dasboard'])->name('dasboard');
Route::get('/biodatasiswa',[DataController::class,'index'])->name('kelas6a');
// Route::get('biodatapage', [DataController::class, 'pagination']);
