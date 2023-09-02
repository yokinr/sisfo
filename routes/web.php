<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Coba;
use App\Livewire\DokumentSiswa;
use App\Livewire\DokumentUserComponent;
use App\Livewire\PesertaDidik;
use App\Livewire\Users;
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

Route::get('/', [AuthenticatedSessionController::class, 'create']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:Operator Sekolah'])->group(function () {
    Route::get('/users', Users::class)->name('user');
    Route::get('/peserta-didik', PesertaDidik::class)->name('peserta-didik');
});

Route::middleware(['auth', 'role:Peserta Didik'])->group(function () {
    Route::get('/dokument', DokumentUserComponent::class)->name('dokument');
});

require __DIR__ . '/auth.php';
