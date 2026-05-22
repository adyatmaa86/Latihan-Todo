<?php

// Import facade Route untuk mendefinisikan rute/URL aplikasi
use Illuminate\Support\Facades\Route;
// Import TodoController agar bisa dihubungkan dengan rute
use App\Http\Controllers\Coba\TodoController;

// ============================================================
// ROUTE HALAMAN UTAMA (Landing Page)
// Method: GET | URL: / | Name: 'ay'
// Ketika user mengakses URL utama (http://localhost:8000/),
// akan langsung menampilkan view 'coba/halo.blade.php'
// ============================================================
Route::get('/', function () {
    return view('coba.halo');
})->name('ay');

// ============================================================
// ROUTE RESOURCE UNTUK TODO (CRUD Otomatis)
// Route::resource() = cara singkat Laravel untuk membuat 7 route sekaligus:
//
// | METHOD     | URL              | ACTION  | NAME       | KEGUNAAN                        |
// |------------|------------------|---------|------------|---------------------------------|
// | GET        | /todo            | index   | uy.index   | Menampilkan semua data todo     |
// | GET        | /todo/create     | create  | uy.create  | Menampilkan form tambah (tidak dipakai) |
// | POST       | /todo            | store   | uy.store   | Menyimpan data baru ke database |
// | GET        | /todo/{id}       | show    | uy.show    | Menampilkan detail 1 data (tidak dipakai) |
// | GET        | /todo/{id}/edit  | edit    | uy.edit    | Menampilkan form edit (tidak dipakai)  |
// | PUT/PATCH  | /todo/{id}       | update  | uy.update  | Mengupdate data di database     |
// | DELETE     | /todo/{id}       | destroy | uy.destroy | Menghapus data dari database    |
//
// Yang aktif dipakai di web ini: index, store, update, destroy
// 'uy' = prefix nama route (uy.index, uy.store, dst.)
// ============================================================
Route::resource('/todo', TodoController::class)->names('uy');

