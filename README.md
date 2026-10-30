<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Daily Notes (Laravel)

Aplikasi catatan sederhana dengan autentikasi, CRUD Notes, dan tampilan modern (Laravel Breeze + Blade + Tailwind).

### Persyaratan

- Windows 10/11
- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm (dibutuhkan untuk menyiapkan asset tampilan)
- Visual Studio Code (disarankan; editor lain juga bisa digunakan)

> Panduan berikut menggunakan SQLite agar bisa langsung dijalankan tanpa memasang atau menyiapkan server MySQL.

### Menjalankan di Windows setelah Composer terpasang

#### 1. Buka folder project di Visual Studio Code

1. Buka **Visual Studio Code**.
2. Pilih **File → Open Folder...**.
3. Cari dan pilih folder project `daily-notes-web`, lalu klik **Select Folder**.
4. Pilih **Terminal → New Terminal** dari menu atas.
5. Pastikan terminal berada di folder project. Jika belum, jalankan perintah berikut:

   ```powershell
   cd C:\All_Project_Kuliah\TRIAL\daily-notes-web
   ```

   Jika project disimpan di lokasi lain, sesuaikan alamat folder tersebut.

#### 2. Install dependency PHP

Di terminal VS Code, jalankan:

```powershell
composer install
```

Tunggu sampai proses selesai dan prompt terminal muncul kembali. Perintah ini mengunduh library PHP yang dibutuhkan Laravel. Jika perintah gagal, selesaikan error Composer terlebih dahulu sebelum lanjut.

#### 3. Buat file konfigurasi `.env`

Laravel membaca pengaturan lokal dari file `.env`. File ini memang tercantum di `.gitignore`, sehingga tidak ikut dilacak atau dikirim ke Git. **Itu normal dan tidak menghalangi aplikasi berjalan**—Laravel tetap dapat membaca file tersebut di komputer Anda.

1. Di terminal yang masih berada di folder project, jalankan:

   ```powershell
   if (!(Test-Path .env)) { Copy-Item .env.example .env }
   ```

2. Perintah tersebut membuat `.env` dari `.env.example` hanya jika `.env` belum ada. Jika sudah ada, isinya tidak ditimpa.
3. Untuk melihatnya di VS Code, buka panel **Explorer**. Jika file tersembunyi, pilih **View → Show Hidden Files** jika tersedia; Anda juga dapat membuka file dengan **File → Open File...** dan memasukkan `.env`.
4. Untuk cara SQLite pada panduan ini, pastikan `.env` berisi:

   ```env
   DB_CONNECTION=sqlite
   ```

   Jangan menghapus `.env` dari `.gitignore` dan jangan membagikan file `.env`, karena file tersebut menyimpan pengaturan lokal dan kunci aplikasi.

#### 4. Buat file database SQLite

Di terminal VS Code, jalankan:

```powershell
if (!(Test-Path database\database.sqlite)) { New-Item -ItemType File -Path database\database.sqlite }
```

Perintah ini membuat file database kosong di folder `database` jika belum tersedia. File yang sudah ada tidak ditimpa.

#### 5. Buat kunci aplikasi Laravel

Jalankan:

```powershell
php artisan key:generate
```

Perintah ini membuat `APP_KEY` dan menyimpannya ke `.env`. Tunggu sampai terminal menampilkan pesan bahwa kunci berhasil dibuat.

#### 6. Buat tabel-tabel database

Jalankan:

```powershell
php artisan migrate
```

Laravel menjalankan migration dan membuat tabel aplikasi, termasuk tabel untuk pengguna dan notes. Jika ditanya apakah migration boleh dijalankan, ketik `yes`, lalu tekan **Enter**.

Jika project sudah pernah dijalankan dan memiliki data, migration biasa hanya menerapkan perubahan skema yang masih tertunda. Migration tambahan membuat index gabungan untuk mempercepat daftar catatan milik pengguna. Migration ini tidak menghapus atau mengisi ulang data.

**Jangan gunakan `php artisan migrate:fresh` atau menghapus `database\database.sqlite` untuk menyinkronkan skema**, karena tindakan tersebut menghapus data.

#### 7. Install dan build asset tampilan

Pastikan Node.js dan npm sudah terpasang. Periksa versinya:

```powershell
node -v
npm -v
```

Jika kedua perintah menampilkan nomor versi, jalankan:

```powershell
npm install
npm run build
```

Tunggu sampai kedua perintah selesai. Build ini menyiapkan CSS dan JavaScript yang digunakan halaman aplikasi.

#### 8. Jalankan server Laravel

Jalankan:

```powershell
php artisan serve
```

Biarkan terminal ini tetap terbuka selama aplikasi digunakan. Perhatikan alamat URL yang muncul pada terminal. Buka alamat tersebut di browser. Biasanya:

**http://127.0.0.1:8000**

Jika terminal menampilkan port yang berbeda, misalnya `8001`, gunakan port yang ditampilkan terminal tersebut.

#### 9. Buat akun sendiri dan gunakan aplikasi

Project ini tidak menyediakan akun demo. Setiap pengguna membuat akun sendiri:

1. Buka URL server di browser, biasanya `http://127.0.0.1:8000`. Jika terminal menampilkan port lain, gunakan port tersebut.
2. Pada halaman awal, klik **Register**. Jika halaman login terbuka, klik **Register** di halaman tersebut atau buka `http://127.0.0.1:8000/register`.
3. Isi **Name**, **Email Address**, **Password**, dan **Confirm Password**. Gunakan email yang belum pernah didaftarkan dan password yang memenuhi aturan validasi.
4. Klik **Register**. Aplikasi membuat akun dan memasukkan Anda secara otomatis.
5. Setelah masuk, buka menu **Notes**. Klik **Buat Catatan**, isi **Judul**, **Kategori** (boleh dikosongkan), pilih **Status** (`Active` atau `Archived`), lalu isi **Konten**.
6. Klik **Simpan**. Catatan muncul di halaman Notes. Gunakan **Lihat** untuk membuka detail, **Edit** untuk mengubah catatan, atau **Hapus** untuk menghapusnya setelah konfirmasi.
7. Untuk masuk lagi di lain waktu, buka halaman **Log in** dan gunakan email serta password yang Anda daftarkan. Untuk keluar, buka menu navigasi akun lalu pilih **Log Out**.

Jika database baru saja dibuat dan tabel `users` masih kosong, itu normal: buat akun melalui **Register**. Jangan menjalankan seeder untuk membuat akun demo.

Untuk menghentikan server, kembali ke terminal yang menjalankan `php artisan serve`, lalu tekan **Ctrl+C**.

### Menggunakan MySQL (opsional)

Jika ingin menggunakan MySQL, nyalakan server MySQL terlebih dahulu dan buat database bernama `daily_notes` (misalnya melalui phpMyAdmin). Lalu buka `.env` dan sesuaikan pengaturan berikut dengan akun MySQL di komputer Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=daily_notes
DB_USERNAME=root
DB_PASSWORD=
```

Simpan `.env`, lalu buat cadangan database menggunakan fitur **Export** di phpMyAdmin sebelum migration. Jika MySQL Anda memakai password, isi nilai `DB_PASSWORD` dengan password tersebut. Jangan menambahkan tanda kutip kecuali memang diperlukan oleh nilainya.

Kemudian jalankan:

```powershell
php artisan config:clear
php artisan migrate
```

### Memperbarui skema database dengan aman

UI baru tidak mengubah struktur tabel. Migration index catatan mempercepat query yang memfilter berdasarkan pengguna lalu mengurutkan catatan terbaru. Untuk database SQLite yang sudah berisi data:

1. Hentikan server aplikasi dengan **Ctrl+C** di terminal yang menjalankan `php artisan serve`.
2. Buat cadangan file database. Jalankan di PowerShell dari folder project:

   ```powershell
   New-Item -ItemType Directory -Force database\backups
   Copy-Item -LiteralPath database\database.sqlite -Destination (Join-Path database\backups ("database-" + (Get-Date -Format "yyyyMMdd-HHmmss") + ".sqlite"))
   ```

   File cadangan disimpan lokal di `database\backups` dan diabaikan oleh Git.
3. Terapkan hanya migration yang belum dijalankan:

   ```powershell
   php artisan migrate
   ```

4. Verifikasi status migration:

   ```powershell
   php artisan migrate:status
   ```

5. Jalankan kembali aplikasi:

   ```powershell
   php artisan serve
   ```

`php artisan migrate` menambahkan index tanpa menghapus baris pengguna atau catatan. Tetap simpan cadangan sebelum perubahan skema. Jangan menjalankan `migrate:fresh`, `migrate:refresh`, atau `db:wipe` pada database yang datanya ingin dipertahankan.

### Kendala umum

- **`.env` tidak terlihat di Git atau panel perubahan Source Control:** itu normal karena `.env` sengaja diabaikan oleh `.gitignore`. Pastikan file lokalnya dibuat dari `.env.example`.
- **Login menampilkan “These credentials do not match our records”:** pastikan email sama persis dengan yang didaftarkan dan password yang dimasukkan benar. Jika belum pernah membuat akun atau tabel `users` masih kosong, klik **Register** dan buat akun sendiri terlebih dahulu. Pastikan browser membuka server dari folder project ini, bukan server lama atau salinan folder lain; gunakan URL/port yang tercetak setelah menjalankan `php artisan serve`.
- **Tidak ingat password:** password di database disimpan dalam bentuk hash dan tidak bisa dibaca kembali. Gunakan fitur **Forgot your password?** di halaman login untuk mengatur ulang password jika pengiriman email reset telah dikonfigurasi.
- **`could not find driver` saat memakai SQLite:** ekstensi PDO SQLite belum aktif di PHP yang digunakan. Aktifkan `pdo_sqlite` dan `sqlite3` pada konfigurasi PHP, lalu buka ulang terminal.
- **`Connection refused` atau MySQL tidak bisa terhubung:** pastikan server MySQL berjalan dan nilai host, port, nama database, username, serta password di `.env` benar.
- **Perubahan `.env` belum terbaca:** jalankan `php artisan config:clear`, lalu ulangi perintah yang gagal.
- **`npm` atau `node` tidak dikenali:** pasang Node.js, tutup dan buka kembali terminal VS Code, lalu periksa lagi dengan `node -v` dan `npm -v`.

### Fitur

- Autentikasi dan pendaftaran akun melalui Laravel Breeze.
- Buat, cari, lihat, ubah, dan hapus catatan.
- Setiap catatan memiliki judul, isi, kategori opsional, serta status aktif atau diarsipkan.
- Catatan dibatasi per pemilik; pengguna hanya dapat mengakses catatannya sendiri.
- Antarmuka responsif untuk desktop dan ponsel dengan tampilan terang.
- SQLite sebagai database awal; MySQL tersedia sebagai pilihan.

### Struktur aplikasi

- `app/Http/Controllers/NoteController.php` menangani alur CRUD catatan dan pencarian.
- `app/Models/Note.php` dan `app/Models/User.php` mewakili data dan relasi pengguna-catatan.
- `app/Policies/NotePolicy.php` membatasi akses catatan berdasarkan pemilik.
- `resources/views/notes/` berisi halaman daftar, tambah, detail, dan ubah catatan.
- `resources/views/auth/` berisi halaman login, pendaftaran, dan pemulihan akun.
- `resources/css/app.css` mengatur token warna, komponen, dan tata letak responsif.
- `database/migrations/` adalah sumber perubahan skema database; perubahan baru diterapkan dengan `php artisan migrate`.

### Alur data dan keamanan

1. Pengguna mendaftar atau login; kata sandi disimpan sebagai hash, bukan teks biasa.
2. Setiap catatan terhubung ke pemilik melalui `user_id`.
3. Daftar catatan hanya mengambil data milik pengguna yang sedang login. Pencarian mencocokkan judul, isi, dan kategori.
4. Policy memeriksa hak akses saat catatan dibuka, diubah, atau dihapus.
5. Catatan diurutkan dari yang terbaru dan ditampilkan bertahap, maksimum 10 catatan per halaman.
6. `.env` menyimpan konfigurasi lokal dan sengaja tidak dilacak Git. Jangan membagikannya atau memasukkan data rahasia ke repositori.

### Perintah pengembangan dan pengujian

Jalankan server aplikasi:

```powershell
php artisan serve
```

Selama mengubah CSS atau JavaScript, buka terminal kedua dan jalankan Vite:

```powershell
npm run dev
```

Biarkan kedua terminal terbuka. Untuk berhenti, tekan **Ctrl+C** pada masing-masing terminal. Untuk membuat asset siap produksi:

```powershell
npm run build
```

Untuk memeriksa seluruh tes:

```powershell
php artisan test
```

Atau gunakan skrip Composer yang juga membersihkan cache konfigurasi:

```powershell
composer test
```

Untuk melihat status dan menerapkan migration:

```powershell
php artisan migrate:status
php artisan migrate
```

Perintah `migrate` menerapkan perubahan skema yang tertunda tanpa mengosongkan database. **Jangan gunakan `migrate:fresh`, `migrate:refresh`, atau `db:wipe` pada database yang datanya ingin dipertahankan.**

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

MIT
