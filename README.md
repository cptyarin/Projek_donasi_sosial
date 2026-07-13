# 🧡 Sistem Donasi dan Bantuan Sosial

Aplikasi web berbasis Laravel untuk mengelola donasi dan bantuan sosial dengan transparansi dan kemudahan.

## 📋 Deskripsi

Sistem Donasi dan Bantuan Sosial adalah platform digital untuk mengelola kegiatan donasi dan penyaluran bantuan. Dibangun dengan pendekatan MVC (Model-View-Controller) menggunakan Laravel 12.

### Fitur Utama
- ✅ Autentikasi dengan 2 role (Admin & Donatur/User)
- ✅ CRUD Program Donasi
- ✅ CRUD Donasi (dengan upload bukti transfer)
- ✅ CRUD Penerima Bantuan
- ✅ CRUD Penyaluran Bantuan
- ✅ Verifikasi donasi oleh admin
- ✅ Dashboard statistik untuk admin dan user
- ✅ Tampilan responsif dengan Bootstrap 5

## 🚀 Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- XAMPP / Laragon (untuk lokal)

### Langkah Instalasi
Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal (XAMPP / Laragon / PHP built-in server).
---

### 🧰 Prasyarat

Pastikan Anda sudah menginstal:

| Software | Versi minimal |
|----------|---------------|
| **PHP** | 8.1 atau lebih tinggi |
| **Composer** | 2.x |
| **MySQL / MariaDB** | 5.7 atau lebih tinggi |
| **Web Server** | Apache / Nginx (atau `php artisan serve`) |
| **Git** | (opsional, untuk clone) |

---

### 1. Clone Repository

```bash
git clone https://github.com/username/donasi-sosial-laravel.git
cd donasi-sosial-laravel
```

> ⚠️ Ganti `username` dengan nama akun GitHub Anda.

---

### 2. Install Dependensi PHP

```bash
composer install
```

Perintah ini akan mengunduh semua *package* yang dibutuhkan Laravel dan menyimpannya di folder `vendor`.

---

### 3. Buat File `.env` dari Contoh

```bash
cp .env.example .env
```

Atau jika di Windows:

```bash
copy .env.example .env
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

Key ini digunakan untuk enkripsi session, cookie, dan hash.

---

### 5. Konfigurasi Database

Buka file `.env` dan sesuaikan bagian database dengan kredensial MySQL Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=donasi_db
DB_USERNAME=root
DB_PASSWORD=
```

> **Catatan:**  
> - Jika Anda menggunakan XAMPP, `DB_HOST` biasanya `127.0.0.1` dan password kosong.  
> - Jika Anda menggunakan MAMP/Laragon, sesuaikan sesuai kebutuhan.

---

### 6. Buat Database

Buka phpMyAdmin (atau terminal MySQL) dan buat database baru:

```sql
CREATE DATABASE donasi_db;
```

Atau gunakan perintah:

```bash
mysql -u root -p -e "CREATE DATABASE donasi_db;"
```

---

### 7. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Migrasi akan membuat semua tabel yang diperlukan, dan seeder akan mengisi data awal:

- **Admin:** `admin@example.com` / `password`  
- **User:** `user@example.com` / `password`

---

### 8. Buat Symbolic Link untuk Storage

```bash
php artisan storage:link
```

Ini diperlukan agar gambar program dan bukti transfer dapat diakses dari browser.

---

### 9. Jalankan Server Lokal

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.

---

### 10. Akses Aplikasi

Buka browser dan kunjungi:  
👉 `http://localhost:8000`

**Login sebagai Admin**  
- Email: `admin@example.com`  
- Password: `password`

**Login sebagai User**  
- Email: `user@example.com`  
- Password: `password`

---

## 🎯 Verifikasi Instalasi

Setelah login, Anda akan melihat dashboard. Coba beberapa fitur:

- ✅ Buka menu **Program** → tambah/edit/hapus program (hanya admin)  
- ✅ Buka menu **Donasi** → buat donasi baru (user) atau verifikasi donasi (admin)  
- ✅ Buka menu **Penerima** dan **Penyaluran** (khusus admin)

Jika semua berjalan tanpa error, instalasi **BERHASIL**! 🎉

---

## ⚠️ Troubleshooting Umum

| Masalah | Solusi |
|---------|--------|
| **“No application key”** | Jalankan `php artisan key:generate` |
| **“Connection refused”** | Pastikan MySQL berjalan dan kredensial di `.env` benar |
| **“Class not found”** | Jalankan `composer dump-autoload` |
| **“View not found”** | Pastikan file `.blade.php` ada dan jalankan `php artisan view:clear` |
| **Gambar tidak muncul** | Jalankan `php artisan storage:link` dan pastikan folder `public/storage` ada |

---

## 🌐 Deployment (Opsional)

Aplikasi juga sudah dideploy ke hosting publik InfinityFree:  
🔗 **Live Demo:** [http://donasisosial.great-site.net](http://donasisosial.great-site.net)

---

**Selamat menjalankan aplikasi Donasi Sosial!** 🙌

---

Silakan salin seluruh teks di atas dan tempelkan ke `README.md` Anda. Jangan lupa ganti `username` pada URL clone GitHub dengan username akun Anda.
