<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\KelolaLaporanController;
use App\Http\Controllers\LahirController;
use App\Http\Controllers\MeninggalController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\PrintController;
use App\Models\KartuKeluarga;
use App\Models\Lahir;
use App\Models\Meninggal;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindah;
use App\Models\User;
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
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    $data = [
        'penduduk' => Penduduk::count(),
        'kartu_keluarga' => KartuKeluarga::count(),
        'laki_laki' => Penduduk::where('jk', 'l')->count(),
        'perempuan' => Penduduk::where('jk', 'p')->count(),
        'lahir' => Lahir::count(),
        'meninggal' => Meninggal::count(),
        'pendatang' => Pendatang::count(),
        'pindah' => Pindah::count(),
    ];
    return view('dashboard.main', $data);
})->name('dashboard')->middleware('auth');

// login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/create-admin', function () {
    User::create([
        'roles_id' => 1,
        'name' => 'admin',
        'username' => 'admin',
        'password' => bcrypt('qweasdzxc'),
    ]);

    return 'admin berhasil dibuat';
});
Route::post('/', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('data-penduduk', PendudukController::class)->middleware('auth');
Route::resource('data-kartu-keluarga', KartuKeluargaController::class)->middleware('auth');
Route::get('data-kartu-keluarga/anggota-kk/{data_kartu_keluarga}', [KartuKeluargaController::class, 'anggotaKeluarga'])->name('data-kartu-keluarga.anggota-kk')->middleware('auth');
Route::post('data-kartu-keluarga/anggota-kk/', [KartuKeluargaController::class, 'tambahAnggota'])->name('data-kartu-keluarga.tambah-anggota')->middleware('auth');
Route::delete('data-kartu-keluarga/anggota-kk/{anggota_keluarga}', [KartuKeluargaController::class, 'destroyAnggota'])->name('anggota-keluarga.destroy')->middleware('auth');
Route::resource('data-lahir', LahirController::class)->middleware('auth');
Route::resource('data-meninggal', MeninggalController::class)->middleware('auth');
Route::resource('data-pendatang', PendatangController::class)->middleware('auth');
Route::resource('data-pindah', PindahController::class)->middleware('auth');
Route::resource('data-admin', AdminController::class)->middleware('auth');


// CRUD Kelola Laporan
Route::get('/kelola-laporan', [KelolaLaporanController::class, 'index'])->name('kelola-laporan');
Route::get('/kelola-laporan/create', [KelolaLaporanController::class, 'create'])->name('kelola-laporan.create');
Route::post('/kelola-laporan/create', [KelolaLaporanController::class, 'store'])->name('kelola-laporan.store');
Route::get('/kelola-laporan/edit/{kartuKeluarga}', [KelolaLaporanController::class, 'edit'])->name('kelola-laporan.edit');
Route::post('/kelola-laporan/edit/{kartuKeluarga}', [KelolaLaporanController::class, 'update'])->name('kelola-laporan.update');
Route::get('/kelola-laporan/delete/{kartuKeluarga}', [KelolaLaporanController::class, 'destroy'])->name('kelola-laporan.destroy');
Route::get('/kelola-laporan/{jenis}', [KelolaLaporanController::class, 'show']);
Route::get('/kelola-laporan/{firstDate}/{lastDate}/{keterangan}', [KelolaLaporanController::class, 'laporanRentangTanggal']);

// Print
Route::get('print/{type}', [PrintController::class, 'index'])->name('print')->middleware('auth');
