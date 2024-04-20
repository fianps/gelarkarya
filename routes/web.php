<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontakController;
use App\Models\User;
use App\Models\Berita;
use App\Models\Lomba;

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
    $beritas = Berita::all();
    $lombas = Lomba::all();
    return view('landing.index', [
        'title' => 'Selamat Datang',
        'beritas' => $beritas,
        'lombas' => $lombas,
    ]);
});
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kirim-pesan', [KontakController::class, 'send'])->name('kirim-pesan');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgot-password', [ForgotPassController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPassController::class, 'submitForgotPassword'])->name('submit-forgot-password');
Route::get('/reset-password/{token}', [ForgotPassController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgotPassController::class, 'submitResetPassword'])->name('submit-reset-password');

Route::get('/beranda', [DashboardController::class, 'berandaAdmin'])->name('beranda')->middleware('auth', 'role:admin');
Route::post('/beranda', [DashboardController::class, 'changePasswordAdmin'])->name('beranda-password')->middleware('auth', 'role:admin');

Route::get('/data-peserta', [ParticipantController::class, 'index'])->name('data-peserta')->middleware('auth', 'role:admin');
Route::get('/data-peserta/detail/{id}', [ParticipantController::class, 'detail'])->name('data-peserta-detail')->middleware('auth', 'role:admin');
Route::get('/data-peserta/edit/{id}', [ParticipantController::class, 'edit'])->name('data-peserta-edit')->middleware('auth', 'role:admin');
Route::post('/data-peserta/edit/{id}', [ParticipantController::class, 'update'])->name('data-peserta-update')->middleware('auth', 'role:admin');
Route::get('/data-peserta/{id}', [ParticipantController::class, 'destroy'])->name('data-peserta-destroy')->middleware('auth', 'role:admin');
Route::get('/karya/download/{id}', [ParticipantController::class, 'downloadKarya'])->name('karya-download')->middleware('auth', 'role:admin,penilai');
Route::get('/sk/download/{id}', [ParticipantController::class, 'downloadSk'])->name('sk-download')->middleware('auth', 'role:admin,penilai');
Route::get('/foto/download/{id}', [ParticipantController::class, 'downloadFoto'])->name('foto-download')->middleware('auth', 'role:admin,penilai');

Route::get('/data-penilai', [EvaluationController::class, 'penilai'])->name('data-penilai')->middleware('auth', 'role:admin');
Route::post('/data-penilai', [EvaluationController::class, 'penilaiStore'])->name('data-penilai-store')->middleware('auth', 'role:admin');
Route::get('/data-penilai/{id}', [EvaluationController::class, 'penilaiDestroy'])->name('data-penilai-destroy')->middleware('auth', 'role:admin');
Route::post('/data-penilai/import', [EvaluationController::class, 'penilaiImport'])->name('data-penilai-import')->middleware('auth', 'role:admin');

Route::get('/indeks-nilai', [EvaluationController::class, 'penilaiIndeks'])->name('indeks-nilai')->middleware('auth', 'role:admin');
Route::post('/indeks-nilai', [EvaluationController::class, 'penilaiIndeksStore'])->name('indeks-nilai-store')->middleware('auth', 'role:admin');
Route::get('/indeks-nilai/{id}', [EvaluationController::class, 'penilaiIndeksDestroy'])->name('indeks-nilai-destroy')->middleware('auth', 'role:admin');

Route::get('/berita', [PostController::class, 'berita'])->name('berita')->middleware('auth', 'role:admin');
Route::post('/berita', [PostController::class, 'beritaStoreJadwal'])->name('berita-jadwal')->middleware('auth', 'role:admin');
Route::post('/berita-edit/{id}', [PostController::class, 'beritaUpdateJadwal'])->name('berita-jadwal-update')->middleware('auth', 'role:admin');
Route::get('/berita/tambah', [PostController::class, 'beritaCreate'])->name('berita-create')->middleware('auth', 'role:admin');
Route::post('/berita/tambah', [PostController::class, 'beritaStore'])->name('berita-store')->middleware('auth', 'role:admin');
Route::get('/berita/detail/{id}', [PostController::class, 'beritaDetail'])->name('berita-detail')->middleware('auth', 'role:admin');
Route::get('/berita/edit/{id}', [PostController::class, 'beritaEdit'])->name('berita-edit')->middleware('auth', 'role:admin');
Route::post('/berita/edit/{id}', [PostController::class, 'beritaUpdate'])->name('berita-update')->middleware('auth', 'role:admin');
Route::get('/berita/{id}', [PostController::class, 'beritaDestroy'])->name('berita-destroy')->middleware('auth', 'role:admin');
// For User
Route::get('/berita-terkini/{id}', [PostController::class, 'beritaUser'])->name('berita-terkini');
Route::get('/jadwal', [PostController::class, 'jadwal'])->name('jadwal');

Route::get('/lomba', [PostController::class, 'lomba'])->name('lomba')->middleware('auth', 'role:admin');
Route::get('/lomba/tambah', [PostController::class, 'lombaCreate'])->name('lomba-create')->middleware('auth', 'role:admin');
Route::post('/lomba/tambah', [PostController::class, 'lombaStore'])->name('lomba-store')->middleware('auth', 'role:admin');
Route::get('/lomba/detail/{id}', [PostController::class, 'lombaDetail'])->name('lomba-detail')->middleware('auth', 'role:admin');
Route::get('/lomba/edit/{id}', [PostController::class, 'lombaEdit'])->name('lomba-edit')->middleware('auth', 'role:admin');
Route::post('/lomba/edit/{id}', [PostController::class, 'lombaUpdate'])->name('lomba-update')->middleware('auth', 'role:admin');
Route::get('/lomba/{id}', [PostController::class, 'lombaDestroy'])->name('lomba-destroy')->middleware('auth', 'role:admin');
// For User
Route::get('/lomba/{id}/{kategori}', [PostController::class, 'lombaUser'])->name('lomba-user');
Route::get('/lomba/{id}/{kategori}/daftar', [ParticipantController::class, 'daftarCreate'])->name('daftar-create')->middleware('auth');
Route::post('/lomba/{id}/{kategori}/daftar', [ParticipantController::class, 'daftarStore'])->name('daftar-store')->middleware('auth');

Route::get('/penilaian', [EvaluationController::class, 'evaluator'])->name('penilaian')->middleware('auth', 'role:penilai');
Route::get('/penilaian/detail/{id}', [EvaluationController::class, 'evaluatorDetail'])->name('penilaian-detail')->middleware('auth', 'role:penilai');
Route::post('/penilaian/detail/{id}', [EvaluationController::class, 'evaluatorStore'])->name('penilaian-store')->middleware('auth', 'role:penilai');
Route::post('/penilaian', [DashboardController::class, 'changePasswordAdmin'])->name('penilai-password')->middleware('auth', 'role:penilai');
Route::get('/finalis', [EvaluationController::class, 'finalis'])->name('finalis')->middleware('auth', 'role:penilai');

// For User
Route::get('/hasil-karya', [ParticipantController::class, 'hasilKarya'])->name('hasil-karya')->middleware('auth');
Route::get('/hasil-karya/detail/{id}', [ParticipantController::class, 'hasilKaryaDetail'])->name('hasil-karya-detail')->middleware('auth');

Route::get('/hasil-lomba', [ParticipantController::class, 'hasilLomba'])->name('hasil-lomba')->middleware('auth');
// route for getKategori in participantController
Route::get('/hasil-lomba/{id}', [ParticipantController::class, 'getKategori'])->name('get-kategori')->middleware('auth');