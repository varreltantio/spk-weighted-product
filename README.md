# Sistem Pemilihan Karyawan Terbaik dengan Weighted Product

## Instalasi

Silakan periksa panduan instalasi laravel resmi untuk mengetahui persyaratan server sebelum Anda mulai. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone repositori

```
git clone https://github.com/varreltantio/sistem-pemilihan-karyawan-terbaik-dengan-weighted-product.git
```

Beralih ke folder repo

```
cd sistem-pemilihan-karyawan-terbaik-dengan-weighted-product
```

Instal semua dependensi menggunakan composer

```
composer install
```

Salin contoh berkas env dan buat perubahan konfigurasi yang diperlukan dalam berkas .env

```
cp .env.example .env
```

Buat application key baru

```
php artisan key:generate
```

Import database yang ada di [database/weighted_product.sql](https://github.com/varreltantio/sistem-pemilihan-karyawan-terbaik-dengan-weighted-product/blob/main/database/weighted_product.sql) ke DBMS

Mulai local development server

```
php artisan serve
```

Akses aplikasi di http://localhost:8000

## Daftar Akun

### Akun Admin

email = admin@gmail.com

password = 12345

### Akun Karyawan

email = deni@gmail.com

password = 12345
