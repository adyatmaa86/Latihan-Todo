<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Aplikasi Ini

Ini adalah aplikasi Todo List sederhana yang dibangun menggunakan framework Laravel. Aplikasi ini mendemonstrasikan operasi dasar CRUD (Create, Read, Update, Delete), yang memungkinkan pengguna untuk mengelola tugas atau kegiatan sehari-hari mereka dengan mudah.

## Cara Instalasi

Ikuti langkah-langkah berikut untuk mengatur dan menjalankan aplikasi di komputer lokal Anda:

1. **Clone dulu**
   ```bash
   git clone https://github.com/adyatmaa86/Latihan-Todo.git

2. **Instal Dependensi PHP (Composer)**
   ```bash
   composer install
   ```

3. **Instal Dependensi Node.js (NPM)**
   ```bash
   npm install
   ```

4. **Build Asset**
   ```bash
   npm run build
   ```

5. **Pengaturan Environment**
   Ganti nama file `.env.example` menjadi `.env` dan konfigurasikan koneksi database Anda:
   ```bash
   ganti aja yang .env.example menjadi .env, database udah saya sesuaikan, tinggal migrate aja nanti.
   ```
   **Catatan:** Buka file `.env` dan sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan pengaturan database lokal Anda (kalo phpmyadmin defaultnya root, passwordnya kosongin aja).
   
6. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

7. **Jalankan Migrasi Database**
   Buat tabel yang diperlukan di database Anda:
   ```bash
   php artisan migrate
   ```

8. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```

9. **Isi Database Otomatis**
   ```bash
   php artisan db:seed
   ```
10. **Login Setiap Role**
    ***Admin***
    Username/email : admin@gmail.com
    Password : admin123

    ***Staff***
    Username/email : staff@gmail.com
    Password : staff123

    ***Customer***
    Username/email : customer@gmail.com
    Password : customer123

11. **Catatan**
    NB : Tombol yang mengarah ke halaman todo muncul ketika anda login menggunakan admin  
