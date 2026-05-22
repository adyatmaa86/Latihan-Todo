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

1. **Instal Dependensi PHP (Composer)**
   ```bash
   composer install
   ```

2. **Instal Dependensi Node.js (NPM)**
   ```bash
   npm install
   ```

3. **Build Asset**
   ```bash
   npm run build
   ```

4. **Pengaturan Environment**
   Salin file `.env.example` menjadi `.env` dan konfigurasikan koneksi database Anda:
   ```bash
   cp .env.example .env
   ```
   *Catatan: Buka file `.env` dan sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan pengaturan database lokal Anda.*

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi Database**
   Buat tabel yang diperlukan di database Anda:
   ```bash
   php artisan migrate
   ```

**Catatan:** Anda tidak perlu menjalankan `php artisan serve` untuk mengecek web karena perintah tersebut diasumsikan sudah berjalan di terminal.
