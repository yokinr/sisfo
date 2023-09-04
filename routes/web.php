<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Coba;
use App\Livewire\DokumentSiswa;
use App\Livewire\DokumentUserComponent;
use App\Livewire\Guest\PembagianTugasComponent;
use App\Livewire\Guest\PembelajaranComponent;
use App\Livewire\Guest\PembelajaranGtkComponent;
use App\Livewire\Operator\DokumentList;
use App\Livewire\PesertaDidik;
use App\Livewire\SuperAdmin\DataUtama;
use App\Livewire\SuperAdmin\Pengguna;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pembelajaran', PembelajaranComponent::class)->name('guest.pembelajaran');
Route::get('pembelajaran/gtk/{ptk_id}/{semester_id}', PembelajaranGtkComponent::class)->name('guest.pembelajaran.gtk');
Route::get('pembagian-tugas', PembagianTugasComponent::class)->name('guest.pembagian-tugas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::get('/super-admin/data-utama', DataUtama::class)->name('super-admin.data-utama');
    Route::get('/super-admin/data-utama/pengguna', Pengguna::class)->name('super-admin.data-utama.pengguna');
});

Route::middleware(['auth', 'role:Operator Sekolah'])->group(function () {
    Route::get('/operator/data-utama', DataUtama::class)->name('operator.data-utama');
    Route::get('/operator/data-utama/pengguna', Pengguna::class)->name('operator.data-utama.pengguna');
    Route::get('/operator/dokumen', DokumentList::class)->name('operator.dokumen');
});

Route::middleware(['auth', 'role:Peserta Didik'])->group(function () {
    Route::get('/dokument', DokumentUserComponent::class)->name('dokument');
});

require __DIR__ . '/auth.php';
