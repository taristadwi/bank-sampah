# 🌿 Sistem Informasi Bank Sampah – Laravel 

Sistem Informasi Bank Sampah berbasis Laravel yang mendukung pengelolaan transaksi jual beli sampah secara online, terintegrasi dengan fitur marketplace, manajemen pengguna, tracking pesanan, dan sistem ulasan.

## 👥 Role & Use Case

### 1. SuperAdmin
- Mengelola Aktivitas Marketplace
- Mengelola Admin Bank Sampah
- Melihat Laporan Secara Global

### 2. Bank Sampah (Admin Cabang)
- Mengelola Produk
- Mengelola Transaksi
- Melihat Ulasan

### 3. User (Nasabah / Konsumen)
- Melakukan Registrasi & Login
- Mencari Produk
- Melakukan Transaksi
- Melihat Riwayat Pembelian
- Memberikan Ulasan
- Melihat Profil Bank Sampah
- Tracking Pesanan

## 🔧 Teknologi yang Digunakan

- **Laravel 8**
- **MySQL**
- **Blade Template / Bootstrap** (atau bisa pakai Tailwind)
- **Spatie Laravel Permission** (untuk role-based access control)
- **Laravel Excel** (opsional, untuk ekspor laporan)
- **Laravel Sanctum** (jika pakai SPA / token login)

## 📦 Fitur Aplikasi

- Autentikasi dan otorisasi pengguna
- CRUD Produk oleh Bank Sampah
- Transaksi pembelian sampah oleh User
- Ulasan produk & tracking pesanan
- Pengelolaan data global oleh SuperAdmin
- Dashboard & riwayat transaksi
- Profil Bank Sampah untuk publik

## ⚙️ Instalasi

```bash
# Clone repo
git clone https://github.com/username/bank-sampah-laravel8.git
cd bank-sampah-laravel8

# Install dependency PHP
composer install

# Setup file env
cp .env.example .env
php artisan key:generate

# Konfigurasi database
# Buka dan isi .env file:
# DB_DATABASE=bank_sampah
# DB_USERNAME=root
# DB_PASSWORD=

# Migrasi dan seeding
php artisan migrate --seed

# Jalankan server
php artisan serve
```

## 📁 Struktur Utama

```
app/
├── Models/            # User, Produk, Transaksi, Ulasan, dll
├── Http/
│   ├── Controllers/   # SuperAdminController, ProdukController, dll
│   └── Middleware/
routes/
├── web.php            # Routing aplikasi web
resources/
├── views/             # Blade template
database/
├── migrations/        # Struktur tabel
├── seeders/           # Seeder user & role
```

## 📃 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).
 
