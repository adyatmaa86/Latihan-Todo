<?php

// Namespace: menentukan lokasi Model ini berada di folder app/Models/
namespace App\Models;

// Import class Model dari Eloquent ORM Laravel
// Eloquent = fitur Laravel untuk berinteraksi dengan database tanpa menulis SQL manual
use Illuminate\Database\Eloquent\Model;

// ============================================================
// Model Todo: representasi dari tabel 'todolist' di database
// Model ini menjadi "jembatan" antara Controller dan Database
// Semua operasi database (select, insert, update, delete) dilakukan melalui Model ini
// ============================================================
class Todo extends Model
{
    // Menentukan nama tabel yang terhubung dengan Model ini
    // Secara default, Laravel akan mencari tabel 'todos' (nama model + s)
    // Karena nama tabel kita 'todolist' (bukan 'todos'), maka harus didefinisikan manual
    protected $table = 'todolist';

    // Menentukan kolom mana yang menjadi Primary Key di tabel
    // Default Laravel sudah 'id', tapi ditulis eksplisit agar lebih jelas
    protected $primaryKey = 'id';

    // $fillable = daftar kolom yang BOLEH diisi secara mass assignment
    // Mass assignment = mengisi banyak kolom sekaligus menggunakan create() atau update()
    // Kolom yang TIDAK ada di $fillable akan diabaikan (keamanan dari input berbahaya)
    protected $fillable = [
        'task',     // Kolom untuk menyimpan nama/isi task
        'is_done',  // Kolom untuk menyimpan status task (0 = belum selesai, 1 = selesai)
    ];

    // Mengaktifkan fitur timestamps bawaan Laravel
    // Laravel otomatis mengisi kolom 'created_at' dan 'updated_at' di tabel
    // 'created_at' = kapan data dibuat, 'updated_at' = kapan data terakhir diubah
    public $timestamps = true;
}

