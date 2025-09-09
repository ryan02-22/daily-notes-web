<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Daily Notes (Laravel + MySQL)

Aplikasi catatan sederhana dengan autentikasi, CRUD Notes, dan tampilan modern (Laravel Breeze + Blade + Tailwind).

### Prasyarat
- PHP 8.2+
- Composer
- MySQL server
- Node.js (opsional untuk build asset)

### Konfigurasi Database
1. Pastikan database `daily_notes` tersedia (DDL sudah Anda sediakan).
2. `.env` sudah di-set ke MySQL lokal. Ubah jika perlu:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=daily_notes
DB_USERNAME=root
DB_PASSWORD=
```

### Instalasi
```
composer install
cp .env.example .env   # jika .env belum ada
php artisan key:generate
php artisan migrate
```

Opsional (asset):
```
npm install
npm run build
```

### Menjalankan Aplikasi
```
php artisan serve
```
Buka `http://127.0.0.1:8000`, daftar akun, lalu gunakan menu Notes.

### Fitur
- Autentikasi (login/register) via Laravel Breeze
- CRUD Notes: buat, lihat detail, edit, hapus
- Field: `title`, `content`, `category`, `status(active|archived)`
- Policy membatasi akses hanya untuk pemilik note
- UI dark/light yang rapi

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

MIT
